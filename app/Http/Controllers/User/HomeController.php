<?php

namespace App\Http\Controllers\User;

use App\Ads;
use App\Center;
use App\Certificate;
use App\CertificateStudent;
use App\Contact;
use App\Http\Requests\User\CertificateSearchRequest;
use App\Http\Requests\User\ContactRequest;
use App\Page;
use App\Partner;
use App\Payment;
use App\Slider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Moyasar\Providers\PaymentService;

class HomeController extends SuperController
{
    public function index()
    {
        self::$data['activeClass'] = 'index';
        self::$data['about'] = Page::where('slug', '=', 'about')->first();
        //$certificates = Certificate::all();
        //self::$data['certificates'] = $certificates;
        self::$data['certificates_no'] = CertificateStudent::count();
        self::$data['users_no'] = User::count();
        self::$data['slider'] = Slider::take(10)->get();
        self::$data['partners'] = Partner::take(50)->get();
        self::$data['centers'] = Center::take(50)->get();
        //$certificate_trainers = $certificates->groupBy('trainer_name');
        //$ads_trainers = Ads::all()->groupBy('trainer_name');
        //$certificate_trainers_arr = array_keys($certificate_trainers->toArray());
        //$ads_trainers_arr = array_keys($ads_trainers->toArray());
        //$trainers = array_unique(array_merge($certificate_trainers_arr, $ads_trainers_arr));
        //self::$data['trainers_no'] = count($trainers);
        return view('site.index', self::$data);
    }

    public function home(Request $request)
    {
        self::$data['activeClass'] = 'home';
        $ids = [];
        if (\Auth::guard('web')->check()) {
            $ids = \Auth::guard('web')->user()->certificates()->pluck('id');
        }
        if (\Auth::guard('editor')->check()) {
            $editor_id = \Auth::guard('editor')->id();
            $ids = Certificate::whereEditorId($editor_id)->pluck('id');
        }
        $certificateStudents = CertificateStudent::whereIn('certificate_id', $ids)
            ->where(function ($q) use ($request) {
                if (isset($request["q"]) && $request["q"]) {
                    $q->where('name', 'like', '%' . $request['q'] . '%');
                }
                if (isset($request["q"]) && $request["q"]) {
                    $q->orWhere('email', 'like', '%' . $request['q'] . '%');
                }
                if (isset($request["q"]) && $request["q"]) {
                    $q->orWhere('id_no', '=', $request['q']);
                }
            })->paginate();
        self::$data['certificates'] = Certificate::whereIn('id', $ids)->paginate();
        self::$data['certificate_students'] = $certificateStudents;
        $certificatesNo = User::certificatesNo();
        self::$data['certificatesNo'] = $certificatesNo;
        $usedCertificatesNo = User::usedCertificatesNo();
        self::$data['usedCertificatesNo'] = $usedCertificatesNo;
        $certificates_remainder = \App\Classes\Helpers::get_remainder($certificatesNo, 20);
        self::$data['certificates_remainder'] = $certificates_remainder;
        $certificates_condition = $certificates_remainder > 0 ? (($certificatesNo - $usedCertificatesNo) / $certificates_remainder) : 0;
        self::$data['certificates_condition'] = $certificates_condition < 1 ? ceil($certificates_condition) : $certificates_condition;
        $adsNo = User::adsNo();
        self::$data['adsNo'] = $adsNo;
        $usedAdsNo = User::usedAdsNo();
        self::$data['usedAdsNo'] = $usedAdsNo;
        $ads_remainder = \App\Classes\Helpers::get_remainder($adsNo, 20);
        self::$data['ads_remainder'] = $ads_remainder;
        $ads_condition = $ads_remainder > 0 ? (($adsNo - $usedAdsNo) / $ads_remainder) : 0;
        self::$data['ads_condition'] = $ads_condition < 1 ? ceil($ads_condition) : $ads_condition;
        self::$data['has_update'] = (\Auth::guard('web')->check() && \Auth::guard('web')->user()->hasUpdateCertificate) || (\Auth::guard('editor')->check() && \Auth::guard('editor')->user()->user->hasUpdateCertificate);
        return view('site.home', self::$data);
    }

    public function search(CertificateSearchRequest $request)
    {
        //$fields = $request->all();
        //$id = $fields['certificate'];
        $certificate_students = CertificateStudent::with('certificate')->where(function ($q) use ($request) {
                if (isset($request["name"]) && $request["name"]) {
                    $q->where('name', 'like', '%' . $request['name'] . '%');
                    $q->orWhere('id_no', '=', $request['name']);
                }
            })->take(10)->get();

        $certificates_html = [];
        foreach($certificate_students as $certificate_student) {
            $template_image = $certificate_student ? $certificate_student->certificate->template->image : null;
            $certificates_html[] = view('site.partials.search.certificate', [
                'certificate_student' => $certificate_student,
                'template_image' => $template_image,
            ])->render();
        }
        return response([
            "certificates_html" => $certificates_html,
        ], 200);
    }

    public function about()
    {
        self::$data['activeClass'] = 'about';
        self::$data['about'] = Page::where('slug', '=', 'about')->first();
        return view('site.about', self::$data);
    }

    public function contact()
    {
        self::$data['activeClass'] = 'contact';
        return view('site.contact', self::$data);
    }

    public function contactSave(ContactRequest $request)
    {
        Contact::create($request->all());
        $to_name = env('APP_NAME');
        $to_email = env('MAIL_FROM_ADDRESS');
        $data = ['data' => array_merge($request->all())];
        try {
            Mail::send('emails.contact_us', $data, function ($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject('Contact US');
                $message->from($to_email, 'Contact US');
            });
        } catch (\Exception $e) {
        }
        return response(["message" => trans("app.message_sent_successfully")], 200);
    }
}
