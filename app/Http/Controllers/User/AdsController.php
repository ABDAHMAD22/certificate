<?php

namespace App\Http\Controllers\User;

use App\Ads;
use App\AdsRequest;
use App\AdsType;
use App\Album;
use App\Font;
use App\Http\Requests\User\AdsReqRequest;
use App\Http\Requests\User\SpecialRequest;
use App\Language;
use App\Target;
use App\Template;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AdsController extends SuperController
{
    public function get()
    {
        self::$data['activeClass'] = 'ads';
        self::$data['templates'] = Template::whereTypeId(2)->get();
        self::$data['languages'] = Language::all();
        self::$data['targets'] = Target::take(20)->get();
        self::$data['adsTypes'] = AdsType::all();
        self::$data['is_add'] = true;
        self::$data['is_update'] = false;
        self::$data['times'] = Ads::Times;
        self::$data['albums'] = Album::take(10)->get();
        self::$data['ads'] = new Ads();
        self::$data['save_route'] = route('ads.store');
        return view('site.ads.form', self::$data);
    }

    public function update(Ads $ads)
    {
        self::$data['activeClass'] = 'ads';
        self::$data['templates'] = Template::whereTypeId(2)->get();
        self::$data['languages'] = Language::all();
        self::$data['targets'] = Target::take(20)->get();
        self::$data['adsTypes'] = AdsType::all();
        self::$data['is_add'] = false;
        self::$data['is_update'] = true;
        self::$data['times'] = Ads::Times;
        self::$data['albums'] = Album::take(10)->get();
        self::$data['ads'] = $ads;
        self::$data['save_route'] = route('ads.doUpdate', ['ads' => $ads]);
        return view('site.ads.form', self::$data);
    }

    public function test()
    {
        self::$data['activeClass'] = 'ads';
        self::$data['templates'] = Template::whereTypeId(2)->get();
        self::$data['languages'] = Language::all();
        self::$data['fonts'] = Font::take(10)->get();
        self::$data['targets'] = Target::take(20)->get();
        self::$data['is_add'] = false;
        self::$data['is_update'] = true;
        self::$data['times'] = Ads::Times;
        return view('site.ads.test', self::$data);
    }

    public function store(AdsReqRequest $request)
    {
        $fields = $request->except(['attached_image']);
        if (\Auth::guard('web')->check()) {
            $fields['user_id'] = \Auth::guard('web')->id();
        }
        if (\Auth::guard('editor')->check()) {
            $fields['user_id'] = \Auth::guard('editor')->user()->user_id;
            $fields['editor_id'] = \Auth::guard('editor')->id();
        }
        if ($request['attached_image']) {
            $img_path = $request->file('attached_image')->store('');
            $fields['attached_image'] = $img_path;
        }
        $ads = Ads::create($fields);
        if ($request->contents) {
            foreach ($request->contents as $item) {
                $ads->contents()->create(['title' => $item]);
            }
        }
        if ($request->features) {
            foreach ($request->features as $item) {
                $ads->features()->create(['title' => $item]);
            }
        }
        if ($request->times) {
            foreach ($request->times as $item) {
                $ads->times()->create([
                    'from' => $item['from'],
                    'to' => $item['to']
                ]);
            }
        }
//        try {
//            $image = Ads::generateAds($ads);
//            $ads->update(['image' => $image]);
//        } catch (\Exception $ex) {
//        }
        $route = route('ads.export', ['ads' => $ads]);
        return response(["message" => trans("app.saved_successfully"), "route" => $route], 200);
    }

    public function doUpdate(AdsReqRequest $request, Ads $ads)
    {
        $fields = $request->except(['attached_image']);
        if ($request['attached_image']) {
            $img_path = $request->file('attached_image')->store('');
            $fields['attached_image'] = $img_path;
        } else {
            $fields['attached_image'] = null;
        }
        $fields['image'] = null;
        $fields['is_completed'] = null;
        $ads->update($fields);
        $ads->contents()->delete();
        if ($request->contents) {
            foreach ($request->contents as $item) {
                $ads->contents()->create(['title' => $item]);
            }
        }
        $ads->features()->delete();
        if ($request->features) {
            foreach ($request->features as $item) {
                $ads->features()->create(['title' => $item]);
            }
        }
        $ads->times()->delete();
        if ($request->times) {
            foreach ($request->times as $item) {
                $ads->times()->create([
                    'from' => $item['from'],
                    'to' => $item['to']
                ]);
            }
        }
//        try {
//            $image = Ads::generateAds($ads);
//            $ads->update(['image' => $image]);
//        } catch (\Exception $ex) {
//        }
        $route = route('ads.export', ['ads' => $ads]);
        return response(["message" => trans("app.saved_successfully"), "route" => $route], 200);
    }

    public function export(Ads $ads)
    {
        self::$data['activeClass'] = 'ads';
        self::$data['is_completed'] = $ads->is_completed;
        self::$data['ads'] = $ads;
        self::$data['ads_image'] = $ads->image ? $ads->image : $ads->template->image;
        return view('site.ads.export.export', self::$data);
    }

    public function exportPDF(Ads $ads)
    {
        self::$data['activeClass'] = 'ads';
        self::$data['ads'] = $ads;
        $ads_image = $ads->image ? $ads->image : $ads->template->image;
        self::$data['ads_image'] = $ads_image;

        try {
            $html = view("site.certificate.students.export.pdf", [
                'certificate_image' => $ads_image,
            ])
                ->render();
            $mpdf = new Mpdf([
                'mode' => 'utf-8',
                'format' => [200, 250],
                'orientation' => 'P'
            ]);
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->useAdobeCJK = false;
            $mpdf->WriteHTML($html);
            $mpdf->Output($ads->title . ".pdf", 'I');
            //$mpdf->Output("export.pdf", 'I');
        } catch (\Exception $x) {
        }

        return view('', self::$data);
    }

    public function share(Ads $ads)
    {
        self::$data['activeClass'] = 'ads';
        self::$data['withoutHeader'] = true;
        self::$data['ads'] = $ads;
        self::$data['ads_image'] = $ads->image ? $ads->image : $ads->template->image;
        return view('site.ads.export.share', self::$data);
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
        AdsRequest::create($fields);
        return response(["message" => trans("app.saved_successfully")], 200);
    }

    public function hasNot()
    {
        self::$data['activeClass'] = 'ads';
        self::$data['type'] = 'ads';
        return view('site.partials.has_not', self::$data);
    }
}
