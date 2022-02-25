<?php

namespace App\Http\Controllers\User;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends SuperController
{
    public function index()
    {
        $services = Service::all();
        return view('site.services.index', ['activeClass' => 'services',
            'bodyClass' => 'services-page',
            'services' => $services
        ]);
    }
    public function details(Request $request)
    {
        $data = Service::where('id', '=', $request->service)->first();
        return view('site.services.details', ['activeClass' => 'services',
            'bodyClass' => 'services-page',
            'data' => $data,
        ]);
    }
}
