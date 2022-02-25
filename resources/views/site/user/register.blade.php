@extends('layouts.site')

@section('css')
@endsection

@section('content')
    <div class="login-container">
        <div class="form-region">
            <div class="login-form-page form-gray">
                <h4 class="login-title">أنشئ حساباً لمنشأتك الآن</h4>
                <p class="form-desc">بخطواتٍ بسيطة جداً تستطيع الآن انشاء حساب خاص لمؤسستك على شهادة تك لإصدار الشهادات
                    والإعلانات</p>
                <form id="registerForm" action="{{route('user.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">اسم المؤسسة/المركز/المعهد</label>
                        <input id="name" name="name" type="text" class="form-control" placeholder="اسم المؤسسة">
                    </div><!--form group-->
                    <div class="form-group">
                        <label for="email">البريد الالكتروني</label>
                        <input id="email" name="email" type="text" class="form-control" placeholder="البريد الالكتروني">
                    </div><!--form group-->
                    <div class="form-group">
                        <label for="password">كلمة المرور</label>
                        <input id="password" name="password" type="password" class="form-control" placeholder="كلمة المرور">
                    </div><!--form group-->
                    <div class="form-group">
                        <label for="password_confirmation">تأكيد كلمة المرور</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="تأكيد كلمة المرور">
                    </div><!--form group-->

                    <div class="form-group pr-0">
                        <label for="remember" class="checkbox-field">
                            <div class="remember-checkbox">
                                <input type="checkbox" name="terms_of_use" class="checkbox" id="remember"/>
                                <img src="{{ asset('site/img/check-true.svg') }}" alt="image">
                            </div>
                            <span class="text-primary"> أوافق </span>
                            على شروط وأحكام
                            <span class="text-primary"> الموقع </span>
                            وسياسة الخصوصية
                        </label>
                    </div>

                    <div class="login-btns">
                        <button type="submit" class="btn btn-primary hover-black btn-lg btn-block">
                            <span>تسجيل</span>
                        </button>

                        <a href="{{route('user.login')}}" class="btn btn-primary-transparent btn-lg btn-block">
                            <span class="txt">تسجيل  الدخول</span>
                            <span class="hover"></span>
                        </a>
                    </div><!--login btns-->
                </form>
            </div><!--login form-->
        </div><!--form region-->

        <div class="text-region">
            <div>
                <a href="{{route('index')}}" class="login-logo">
                    <img src="{{ asset('site/img/logo-mid-white.svg') }}" alt="image">
                    <span class="sr-only">{{trans('app.title')}}</span>
                </a>

                <div class="login-text">
                    <h3>حين تكون التقنية بوابةً
                        لخدمتك تكون شهادة تك</h3>
                    <p>صدِّر شهاداتك وقم بتصميم
                        إعلاناتك بخطواتٍ سهلة</p>
                </div><!--login text-->
            </div>
        </div><!--text region-->
    </div><!--login container-->
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#registerForm').ajaxForm({
                success: function (res) {
                    $('#registerForm')[0].reset();
                    toastr["success"](res.message);
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
