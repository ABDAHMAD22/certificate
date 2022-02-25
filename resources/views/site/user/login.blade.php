@extends('layouts.site')

@section('css')
@endsection

@section('content')
    <div class="login-container">
        <div class="text-region">
            <div>
                <a href="{{route('index')}}" class="login-logo">
                    <img src="{{asset('site/img/logo-mid-white.svg')}}" alt="image">
                    <span class="sr-only">{{ trans('app.title') }}</span>
                </a>

                <div class="login-text">
                    <h3>حين تكون التقنية بوابةً
                        لخدمتك تكون شهادة تك</h3>
                    <p>صدِّر شهاداتك وقم بتصميم
                        إعلاناتك بخطواتٍ سهلة</p>
                </div><!--login text-->
            </div>
        </div><!--text region-->

        <div class="form-region">
            <div class="login-form-page form-gray">
                <h4 class="login-title">سجل دخولك الآن</h4>
                <form id="login" action="{{route('user.doLogin')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="email">البريد الالكتروني</label>
                        <input id="email" name="email" type="text" class="form-control" placeholder="البريد الالكتروني">
                    </div><!--form group-->
                    <div class="form-group">
                        <label for="password">كلمة المرور</label>
                        <div class="password-group">
                            <input id="password" name="password" type="password" class="form-control"
                                   placeholder="كلمة المرور">
                            <svg class="eye-password unactive" width="20px" height="15px" viewBox="0 0 20 15"
                                 version="1.1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round"
                                   stroke-linejoin="round">
                                    <g transform="translate(-230.000000, -382.000000)" stroke="currentColor"
                                       stroke-width="1.3">
                                        <g transform="translate(213.000000, 183.000000)">
                                            <g transform="translate(0.000000, 158.000000)">
                                                <g transform="translate(18.000000, 42.000000)">
                                                    <path
                                                        d="M0,6.5 C0,6.5 3.25,0 8.9375,0 C14.625,0 17.875,6.5 17.875,6.5 C17.875,6.5 14.625,13 8.9375,13 C3.25,13 0,6.5 0,6.5 Z"></path>
                                                    <circle cx="8.9375" cy="6.5" r="2.4375"></circle>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div><!--form group-->

                    <div class="remember-forget">
                        <div class="remember-wrap">
                            <label for="remember" class="checkbox-field">
                                <div class="remember-checkbox">
                                    <input type="checkbox" class="checkbox" id="remember" name="remember" value="true"/>
                                    <img src="{{asset('site/img/check-true.svg')}}" alt="image">
                                </div>
                                تذكرني
                            </label>
                        </div>

                        <a href="{{route('resetPassword', ['type'=>'user'])}}" class="link-primary">نسيت كلمة
                            المرور؟</a>
                    </div>

                    <div class="login-btns">
                        <button type="submit" class="btn btn-primary hover-black btn-lg btn-block">
                            <span>تسجيل الدخول</span>
                        </button>

                        <a href="{{route('user.register')}}" class="btn btn-primary-transparent btn-lg btn-block">
                            <span class="txt">تسجيل  جديد</span>
                            <span class="hover"></span>
                        </a>

                        <p class="mt-4">
                            لتسجيل الدخول كمحرر قم
                            <a href="{{route('editor.login')}}" class="link-primary">بالدخول من هنا</a>
                        </p>
                    </div><!--login btns-->
                </form>
            </div><!--login form-->
        </div><!--form region-->
    </div><!--login container-->
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#login').ajaxForm({
                success: function (res) {
                    toastr["success"](res.message);
                    window.location.href = '/home';
                },
                error: function (res) {
                    window.handleCSRFError(res);
                    if (res.status === 422) {
                        window.showFormErrors(res);
                        toastr["error"](res.responseJSON.message);
                    } else {
                        toastr["error"](res.responseJSON.message);
                    }
                },
                beforeSubmit: function () {
                    $('.msg.text-danger').remove();
                }
            });
        });
    </script>
@endsection
