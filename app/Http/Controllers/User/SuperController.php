<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperController extends Controller
{
    protected static $data = [];

    public function __construct(Request $request)
    {
        //parent::$data['locale'] = strtolower(\App::getLLocale());
        //$this->middleware('auth');
    }
}
