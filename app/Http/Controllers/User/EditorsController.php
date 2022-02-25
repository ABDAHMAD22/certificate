<?php

namespace App\Http\Controllers\User;

use App\Editor;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\EditorProfileRequest;
use App\Http\Requests\User\EditorRequest;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\SpecialRequest;
use App\Jobs\SendEmailPassword;
use App\Permit;
use Illuminate\Http\Request;

class EditorsController extends SuperController
{
    public function index(Request $request)
    {
        self::$data['activeClass'] = 'editors';
        $user = \Auth::user();
        self::$data['editors'] = $user->editors()->where(function ($q) use ($request) {
            if (isset($request["q"]) && $request["q"]) {
                $q->where('name', 'like', '%' . $request['q'] . '%');
            }
            if (isset($request["q"]) && $request["q"]) {
                $q->orWhere('email', 'like', '%' . $request['q'] . '%');
            }
        })->paginate();
        self::$data['permits'] = Permit::whereType(Permit::TYPE_EDITOR)->get();
        return view('site.editor.index', self::$data);
    }

    public function login()
    {
        self::$data['activeClass'] = 'login';
        self::$data['authLayout'] = true;
        return view('site.editor.login', self::$data);
    }

    public function doLogin(LoginRequest $request)
    {
        $model = Editor::getByEmail($request->email);
        if (!$model || !\Hash::check($request->password, $model->password)) {
            return response(["message" => trans("auth.failed")], 422);
        }

        if ($model->status != Editor::STATUS_ACTIVE) {
            return response(['message' => trans('app.your_account_deactivated')], 403);
        }

        if (\Auth::guard('editor')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1], $request->get('remember', 0))) {
            return response(["message" => trans("app.login_successfully")], 200);
        }
    }

    public function store(EditorRequest $request)
    {
        $fields = $request->except('image');
        if ($request['image']) {
            $fields['image'] = $request->file('image')->store('');
        }
        $password = rand(100000, 999999);
        $fields['password'] = bcrypt($password);
        $fields['user_id'] = \Auth::id();
        $editor = Editor::create($fields);
        $editor->permits()->sync($fields['permits']);
        $details = $request->except('image');
        $details['password'] = $password;
        SendEmailPassword::dispatch($details);
        return response(["message" => trans("app.saved_successfully")], 200);
    }

    public function profile()
    {
        self::$data['activeClass'] = 'profile';
        $model = \Auth::guard('editor')->user();
        self::$data['editor'] = $model;
        return view('site.editor.profile.form', self::$data);
    }

    public function updateProfile(EditorProfileRequest $request)
    {
        $model = Editor::find(\Auth::guard('editor')->id());
        $fields = $request->except(['image', 'password']);

        if ($request['image']) {
            $img_path = $request->file('image')->store('');
            $fields['image'] = $img_path;
        }
//        if ($request['password']) {
//            $fields['password'] = bcrypt($request->password);
//        }
        $model->update($fields);

        return response([
            "message" => trans("app.your_profile_updated_successfully"),
            "editor" => $model
        ], 200);
    }

    public function logout()
    {
        \Auth::guard('editor')->logout();
        return redirect()->route('index');
    }

//    public function changePassword()
//    {
//        self::$data['activeClass'] = 'change-password';
//        return view('site.editor.changePassword', self::$data);
//    }
//
//    public function saveChangePassword(ChangePasswordRequest $request)
//    {
//        $model = \Auth::guard('editor')->user();
//        $model->update(['password' => bcrypt($request->password)]);
//
//        return response([
//            "message" => trans("app.saved_successfully"),
//        ], 200);
//    }

    public function delete(Editor $editor)
    {
        $editor->delete();
        return response([
            "message" => trans("app.deleted_successfully"),
        ], 200);
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
        \App\EditorRequest::create($fields);
        return response(["message" => trans("app.saved_successfully")], 200);
    }
}
