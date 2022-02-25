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
                <h4 class="login-title">استعادة كلمة المرور</h4>
                <form id="resetForm" action="{{route('sendResetPassword', ['type'=>$type])}}"
                      method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="email">البريد الالكتروني</label>
                        <input id="email" name="email" type="text" class="form-control" placeholder="البريد الالكتروني">
                    </div><!--form group-->

                    <div class="login-btns">
                        <button type="submit" class="btn btn-primary hover-black btn-lg btn-block">
                            <span>استعادة</span>
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
                    $('#resetForm')[0].reset();
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
