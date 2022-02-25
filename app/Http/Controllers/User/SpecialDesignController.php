<?php

namespace App\Http\Controllers\User;

use App\DesignService;
use App\DesignSubService;
use App\Http\Requests\User\SpecialDesignReqRequest;
use App\Http\Requests\User\SpecialRequest;
use App\SpecialDesign;
use App\SpecialDesignRequest;
use App\SpecialDesignService;
use Illuminate\Http\Request;

class SpecialDesignController extends SuperController
{
    public function index()
    {
        self::$data['activeClass'] = 'special-design';
        self::$data['services'] = DesignService::take(10)->with('designSubServices')->get();
        return view('site.special-design.index', self::$data);
    }

    public function saveSpecialDesign(SpecialDesignReqRequest $request, $specialDesign)
    {
        $specialDesign = SpecialDesign::updateOrCreate([
            'design_service_id' => $specialDesign,
            'user_id' => \Auth::guard('web')->id(),
        ]);
        if($request->services) {
            foreach ($request->services as $i) {
                $sub_service = DesignSubService::whereId($i)->first();
                $specialDesign->specialDesignServices()->updateOrCreate([
                    'special_design_sub_service_id' => $i,
                    'price' => $sub_service->price
                ]);
            }
        }
        return response(["message" => trans("app.saved_successfully")], 200);
    }

    public function saveSpecialRequest(SpecialRequest $request)
    {
        $fields = $request->all();
        $fields['user_id'] = \Auth::guard('web')->id();
        SpecialDesignRequest::create($fields);
        return response(["message" => trans("app.saved_successfully")], 200);
    }
}
