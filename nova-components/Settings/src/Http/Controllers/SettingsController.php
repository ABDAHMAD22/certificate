<?php

namespace Asalout\Settings\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function store(Request $request)
    {
        collect($request->all())->each(function ($setting, $key) use ($request) {
            Setting::where('key', $key)->update(['value' => $setting]);
        });
        return response()->json([]);
    }
}
