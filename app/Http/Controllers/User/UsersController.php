<?php

namespace App\Http\Controllers\User;

use App\City;
use App\Country;
use App\Editor;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\ResetPasswordRequest;
use App\Http\Requests\User\UpdatePasswordRequest;
use App\Http\Requests\User\UserProfileRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UsersController extends SuperController
{
    public function login()
    {
//        self::$data['bodyClass'] = 'user-page';
        self::$data['activeClass'] = 'login';
        self::$data['authLayout'] = true;
        return view('site.user.login', self::$data);
    }

    public function doLogin(LoginRequest $request)
    {
        $user = User::getByEmail($request->email);
        if (!$user || !\Hash::check($request->password, $user->password)) {
            return response(["message" => trans("auth.failed")], 422);
        }

        if ($user->status != User::STATUS_ACTIVE) {
            return response(['message' => trans('app.your_account_deactivated')], 403);
        }

        if (\Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1], $request->get('remember', 0))) {
            return response(["message" => trans("app.login_successfully")], 200);
        }
    }

    public function register()
    {
        self::$data['bodyClass'] = 'user-page';
        self::$data['activeClass'] = 'register';
        self::$data['authLayout'] = true;
        return view('site.user.register', self::$data);
    }

    public function store(RegisterRequest $request)
    {
        $fields = $request->all();
        $fields['password'] = bcrypt($request->password);
        User::create($fields);
        return response(["message" => trans("app.you_are_registered_successfully")], 200);
    }

    public function profileView()
    {
        self::$data['activeClass'] = 'profile';
        $user = \Auth::user();
        self::$data['user'] = $user;
        return view('site.user.profile.view', self::$data);
    }

    public function profile()
    {
        self::$data['activeClass'] = 'profile';
        self::$data['countries'] = Country::whereHas('cities')->get();
        self::$data['cities'] = City::all();
        $user = \Auth::user();
        self::$data['user'] = $user;
        return view('site.user.profile.form', self::$data);
    }

    public function updateProfile(UserProfileRequest $request)
    {
        $user = User::find(\Auth::id());
        $fields = $request->except(['image', 'training_licence', 'commercial_register', 'password']);

        if ($request['image']) {
            $img_path = $request->file('image')->store('');
            $fields['image'] = $img_path;
        }

        if ($request['training_licence']) {
            $training_licence_path = $request->file('training_licence')->store('');
            $fields['training_licence'] = $training_licence_path;
        }

        if ($request['commercial_register']) {
            $commercial_register_path = $request->file('commercial_register')->store('');
            $fields['commercial_register'] = $commercial_register_path;
        }
        $fields['is_completed'] = 1;
        $user->update($fields);
        return response([
            "message" => trans("app.your_profile_updated_successfully"),
            "user" => $user
        ], 200);
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()->route('index');
    }

    public function changePassword()
    {
        self::$data['activeClass'] = 'change-password';
        return view('site.user.changePassword', self::$data);
    }

    public function saveChangePassword(ChangePasswordRequest $request)
    {
        $model = null;
        if (\Auth::guard('web')->check()) {
            $model = \Auth::guard('web')->user();
        }
        if (\Auth::guard('editor')->check()) {
            $model = \Auth::guard('editor')->user();
        }

        $model->update(['password' => bcrypt($request->password)]);

        return response([
            "message" => trans("app.saved_successfully"),
        ], 200);
    }

    public function resetPassword($type)
    {
        self::$data['activeClass'] = 'reset-password';
        self::$data['type'] = $type;
        self::$data['authLayout'] = true;
        return view('site.user.password.reset', self::$data);
    }

    public function sendResetPassword(ResetPasswordRequest $request, $type)
    {
        self::$data['type'] = $type;
        $uniqid = uniqid();
        if ($type == 'user') {
            $user = User::whereEmail($request->email);
            $user->update(['reset_code' => $uniqid]);
        }
        if ($type == 'editor') {
            $editor = Editor::whereEmail($request->email);
            $editor->update(['reset_code' => $uniqid]);
        }
        $to_name = env('APP_NAME') . ' - Reset Password';
        $to_email = $request->email;
        $data = [
            'link' => route('getResetPassword', ['type' => $type, 'code' => $uniqid])
        ];
        try {
            Mail::send('emails.password.reset', $data, function ($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject('Reset Password');
                $message->from($to_email, 'Reset Password');
            });
        } catch (\Exception $e) {
        }
        return response([
            "message" => trans("app.sent_link_reset_to_your_email"),
        ], 200);
    }

    public function getResetPassword($type, $code)
    {
        self::$data['activeClass'] = 'reset-password';
        self::$data['type'] = $type;
        self::$data['code'] = $code;
        self::$data['authLayout'] = true;
        if (($type == 'user' && !User::where('reset_code', '=', $code)->count()) || ($type == 'editor' && !Editor::where('reset_code', '=', $code)->count())) {
            return redirect()->route($type . '.login');
        }
        return view('site.user.password.doReset', self::$data);
    }

    public function doResetPassword(UpdatePasswordRequest $request, $type, $code)
    {
        if ($type == 'user') {
            $user = User::where('reset_code', '=', $code);
            $user->update(['reset_code' => null, 'password' => bcrypt($request->password)]);
        }
        if ($type == 'editor') {
            $editor = Editor::where('reset_code', '=', $code);
            $editor->update(['reset_code' => null, 'password' => bcrypt($request->password)]);
        }

        return response([
            "message" => trans("app.saved_successfully"),
            "route" => route($type . '.login'),
        ], 200);
    }

    public function getCities(Country $country)
    {
        return response([
            "data" => $country->cities,
        ], 200);
    }
}
