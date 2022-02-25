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
                <h4 class="login-title">تحديث كلمة المرور</h4>
                <form id="resetForm" action="{{route('doResetPassword', ['type'=>$type, 'code'=>$code])}}"
                      method="post">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="password">
                            كلمة المرور الجديدة
                        </label>
                        <input id="password" name="password" type="password" class="form-control"
                               placeholder="كلمة المرور الجديدة">
                    </div><!--form group-->

                    <div class="form-group">
                        <label for="password_confirmation">تأكيد كلمة المرور</label>
                        <input id="password_confirmation" type="password" name="password_confirmation"
                               class="form-control"
                               placeholder="تأكيد كلمة المرور">
                    </div><!--form group-->

                    <div class="login-btns">
                        <button type="submit" class="btn btn-primary hover-black btn-lg btn-block">
                            <span>تحديث كلمة المرور</span>
                        </button>

                        <a href="{{route($type.'.login')}}" class="btn btn-primary-transparent btn-lg btn-block">
                            <span class="txt">تسجيل  الدخول</span>
                            <span class="hover"></span>
                        </a>
                    </div><!--login btns-->
                </form>
            </div><!--login form-->
        </div><!--form region-->
    </div><!--login container-->
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#resetForm').ajaxForm({
                success: function (res) {
                    toastr["success"](res.message);
                    window.location.href = `${res.route}`;
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
