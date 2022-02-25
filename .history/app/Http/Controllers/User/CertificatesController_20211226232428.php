<?php

namespace App\Http\Controllers\User;

use App\Certificate;
use App\CertificateRequest;
use App\CertificateStudent;
use App\CertificateType;
use App\Classes\Helpers;
use App\Font;
use App\Http\Requests\User\CertificateReqRequest;
use App\Http\Requests\User\CertificateStudentRequest;
use App\Http\Requests\User\CertificateStudentsRequest;
use App\Http\Requests\User\SpecialRequest;
use App\Imports\StudentsImport;
use App\Language;
use App\Template;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Mpdf\Mpdf;

class CertificatesController extends SuperController
{
    public function view()
    {
        self::$data['activeClass'] = 'certificates';
        self::$data['templates'] = Template::whereTypeId(1)->get();
        self::$data['certificateTypes'] = CertificateType::all();
        self::$data['languages'] = Language::all();
        self::$data['is_add'] = true;
        self::$data['is_update'] = false;
        self::$data['button_text'] = 'التالي';
        self::$data['certificate'] = new Certificate();
        self::$data['save_route'] = route('certificate.store');
        return view('site.certificate.form', self::$data);
    }

    public function update(Certificate $certificate)
    {
        self::$data['activeClass'] = 'certificates';
        self::$data['templates'] = Template::whereTypeId(1)->get();
        self::$data['certificateTypes'] = CertificateType::all();
        self::$data['languages'] = Language::all();
        self::$data['is_add'] = false;
        self::$data['is_update'] = true;
        $process =  request()->segment(count(request()->segments()));
        self::$data['process'] = $process;
        self::$data['certificate'] = $certificate;
        self::$data['button_text'] = $process === 'edit' ? 'التالي' : 'حفظ';
        self::$data['save_route'] = route('certificate.doUpdate', ['certificate' => $certificate, 'process' => $process]);
        return view('site.certificate.form', self::$data);
    }

    public function store(CertificateReqRequest $request)
    {
        $fields = $request->all();
        if (\Auth::guard('web')->check()) {
            $fields['user_id'] = \Auth::guard('web')->id();
        }
        if (\Auth::guard('editor')->check()) {
            $fields['user_id'] = \Auth::guard('editor')->user()->user_id;
            $fields['editor_id'] = \Auth::guard('editor')->id();
        }
        $certificate = Certificate::create($fields);
        $route = route('certificate.formStudents', ['certificate' => $certificate]);
        return response(["message" => trans("app.saved_successfully"), "route" => $route], 200);
    }

    public function doUpdate(CertificateReqRequest $request, Certificate $certificate)
    {
        $fields = $request->all();
        if($request->process === 'update') {
            $cer = $certificate;
            $cer->update($fields);
            $students = $cer->certificateStudent;
            if ($students) {
                foreach ($students as $item) {
                    $item->update([
                        'title' => $certificate->title,
                        'subtitle' => $certificate->subtitle,
                        'date_type' => $certificate->date_type,
                        'start_date' => $certificate->start_date,
                        'end_date' => $certificate->end_date,
                        'days_no' => $certificate->days_no,
                        'hours_no' => $certificate->hours_no,
                        'image' => null,
                        'is_completed' => false,
                    ]);
                }
            }
            $route = route('certificate.students', ['certificate' => $cer]);
        }
        if($request->process === 'edit') {
            $fields = $request;
            $fields['parent_id'] = $certificate->id;
            return $this->store($request);
        }
        return response(["message" => trans("app.saved_successfully"), "route" => $route], 200);
    }

    public function saveSpecialRequest(SpecialRequest $request)
    {
        $fields = $request->all();
        if (\Auth::guard('web')->check()) {
            $fields['user_id'] = \Auth::guard('web')->id();
        }
        if (\Auth::guard('editor')->check()) {
            $fields['user_id'] = \Auth::guard('editor')->user()->user_id;
        }
        CertificateRequest::create($fields);
        return response(["message" => trans("app.saved_successfully")], 200);
    }

    public function students(Certificate $certificate)
    {
        self::$data['activeClass'] = 'certificates';
        self::$data['certificate'] = $certificate;
        $students = $certificate->certificateStudent()->where('is_completed', '=', 1);
        self::$data['students'] = $students->get();
        self::$data['template_image'] = $certificate->template->image;
        $students_no = $certificate->certificateStudent()->count();
        $completed_no = $students->count();
        self::$data['students_no'] = $students_no;
        self::$data['all_completed'] = ($students_no == $completed_no) ? 1 : 0;
        self::$data['has_update'] = (\Auth::guard('web')->check() && \Auth::guard('web')->user()->hasUpdateCertificate) || (\Auth::guard('editor')->check() && \Auth::guard('editor')->user()->user->hasUpdateCertificate);
        return view('site.certificate.students.list', self::$data);
    }

    public function completed(Certificate $certificate)
    {
        self::$data['activeClass'] = 'certificates';
        $students_no = $certificate->certificateStudent()->count();
        $certificates_completed = $certificate->certificateStudent()
            ->where('is_completed', '=', 1);
        $students = $certificates_completed->get();
        $completed_no = $certificates_completed->count();
        $all_completed = ($students_no == $completed_no) ? true : false;
        $hasCertificates = User::hasCertificates();
        $has_update = (\Auth::guard('web')->check() && \Auth::guard('web')->user()->hasUpdateCertificate) || (\Auth::guard('editor')->check() && \Auth::guard('editor')->user()->user->hasUpdateCertificate);
        $students_html = view('site.certificate.students.list_ajax', [
            'students' => $students,
            'has_check' => true,
            'has_update' => $has_update,
        ])->render();
        return response([
            "students_no" => $students_no,
            "all_completed" => $all_completed,
            'has_certificates' => $hasCertificates,
            "students_html" => $students_html,
        ], 200);
    }

    public function formStudents(Certificate $certificate)
    {
        self::$data['activeClass'] = 'certificates';
        self::$data['certificate'] = $certificate;
        return view('site.certificate.students.form', self::$data);
    }

    public function saveStudents(CertificateStudentsRequest $request, Certificate $certificate)
    {
        $fields = $request->all();
        $import = new StudentsImport($certificate);
        if (isset($fields['file'])) {
            Excel::queueImport($import, $request->file('file'));
        }

        if (isset($fields['students'])) {
            $user_id = null;
            if (\Auth::guard('web')->check()) {
                $user_id = \Auth::guard('web')->id();
            }
            if (\Auth::guard('editor')->check()) {
                $user_id = \Auth::guard('editor')->user()->user_id;
            }
            foreach ($fields['students'] as $student) {
                $student['title'] = $certificate->title;
                $student['subtitle'] = $certificate->subtitle;
                $student['date_type'] = $certificate->date_type;
                $student['trainer_name'] = $certificate->trainer_name;
                $student['start_date'] = $certificate->start_date;
                $student['end_date'] = $certificate->end_date;
                $student['days_no'] = $certificate->days_no;
                $student['hours_no'] = $certificate->hours_no;
                if (User::hasCertificates()) {
                    $student['user_id'] = $user_id;
                    $student['id_no'] = Helpers::convertToEnglish($student['id_no']);
                    $certificate->certificateStudent()->create($student);
                }
            }
        }
        $route = route('certificate.students', ['certificate' => $certificate]);
        return response(["message" => trans("app.saved_successfully"), "route" => $route], 200);
    }

    public function export(CertificateStudent $certificateStudent)
    {
        self::$data['activeClass'] = 'certificates';
        self::$data['certificateStudent'] = $certificateStudent;
        self::$data['certificate_image'] = $certificateStudent->image ? $certificateStudent->image : $certificateStudent->certificate->template->image;
        return view('site.certificate.students.export.export', self::$data);
    }

    public function exportPDF(CertificateStudent $certificateStudent)
    {
        self::$data['activeClass'] = 'certificates';
        self::$data['certificateStudent'] = $certificateStudent;
        self::$data['template_image'] = $certificateStudent->certificate->template->image;

        try {
            $html = view("site.certificate.students.export.pdf", [
                'certificate_image' => $certificateStudent->image ? $certificateStudent->image : $certificateStudent->certificate->template->image,
            ])
                ->render();
            $mpdf = new Mpdf([
                'mode' => 'utf-8',
                'format' => [626, 884],
                'orientation' => 'L'
            ]);
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->useAdobeCJK = false;
            $mpdf->WriteHTML($html);
            $mpdf->Output($certificateStudent->name . ".pdf", 'I');
            //$mpdf->Output("export.pdf", 'I');
        } catch (\Exception $x) {
        }

        return view('', self::$data);
    }

    public function exportPDFByName(Certificate $certificate, Request $request)
    {
        try {
            $certificateStudent = CertificateStudent::where([
                'certificate_id' => $certificate->id,
                'name' => str_replace("-", " ", $request->name),
            ])->first();
            self::$data['activeClass'] = 'certificates';
            self::$data['certificateStudent'] = $certificateStudent;
            self::$data['template_image'] = $certificateStudent->certificate->template->image;

            $html = view("site.certificate.students.export.pdf", [
                'certificate_image' => $certificateStudent->image ? $certificateStudent->image : $certificateStudent->certificate->template->image,
            ])
                ->render();
            $mpdf = new Mpdf([
                'mode' => 'utf-8',
                'format' => [626, 884],
                'orientation' => 'L'
            ]);
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->useAdobeCJK = false;
            $mpdf->WriteHTML($html);
            $mpdf->Output($certificateStudent->name . ".pdf", 'I');
            //$mpdf->Output("export.pdf", 'I');
        } catch (\Exception $x) {
        }

        return view('site.error', self::$data);
    }

    public function share(CertificateStudent $certificateStudent)
    {
        self::$data['activeClass'] = 'certificates';
        self::$data['withoutHeader'] = true;
        self::$data['certificateStudent'] = $certificateStudent;
        self::$data['certificate_image'] = $certificateStudent->image ? $certificateStudent->image : $certificateStudent->certificate->template->image;
        return view('site.certificate.students.export.share', self::$data);
    }

    public function studentUpdate(CertificateStudent $certificateStudent)
    {
        self::$data['activeClass'] = 'certificates';
        self::$data['certificateStudent'] = $certificateStudent;
        return view('site.certificate.students.update', self::$data);
    }

    public function doStudentUpdate(CertificateStudentRequest $request, CertificateStudent $certificateStudent)
    {
        self::$data['activeClass'] = 'certificates';
        $fields = $request->all();
//        $fields['is_completed'] = false;
        $certificateStudent->update($fields);
        try {
            $image = CertificateStudent::generateCertificate($certificateStudent);
            $certificateStudent->update(['image' => $image]);
        } catch (\Exception $ex) {
        }
        $route = route('certificate.export', ['certificateStudent' => $certificateStudent]);
        return response(["message" => trans("app.saved_successfully"), "route" => $route], 200);
    }

    public function hasNot()
    {
        self::$data['activeClass'] = 'certificates';
        self::$data['type'] = 'certificate';
        return view('site.partials.has_not', self::$data);
    }

    public function deleteCertificate(CertificateStudent $certificateStudent)
    {
        if (Storage::exists($certificateStudent->image)) {
            Storage::delete($certificateStudent->image);
        }
        $certificateStudent->delete();
        return response(["message" => trans("app.deleted_successfully")], 200);
    }
}
