<div id="footer">
    <div class="container-content">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-logo-text">
                    <img src="{{ asset('site/img/logo-white.svg') }}" alt="image"/>
                    <p>شهادة تك ، مؤسسة سعودية تقدم خدمة إصدار الشهادات وأرشفتها للمنظمات والأفراد بأسلوبٍ عصريٍ
                        حديث</p>
                    <ul class="list-unstyled social-links">
                        @if($settings['facebook'])
                            <li>
                                <a href="{{$settings['facebook']}}" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="8.7" height="15"
                                         viewBox="0 0 8.7 15">
                                        <g transform="translate(0.5 0.5)">
                                            <path
                                                d="M7.7,0H5.6A3.5,3.5,0,0,0,2.1,3.5V5.6H0V8.4H2.1V14H4.9V8.4H7l.7-2.8H4.9V3.5a.7.7,0,0,1,.7-.7H7.7Z"
                                                fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-miterlimit="10" stroke-width="1"/>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                        @endif
                        @if($settings['twitter'])
                            <li>
                                <a href="{{$settings['twitter']}}" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13.192" height="11.052"
                                         viewBox="0 0 13.192 11.052">
                                        <path
                                            d="M12.192.006a6.04,6.04,0,0,1-1.74.848A2.483,2.483,0,0,0,6.1,2.516V3.07A5.907,5.907,0,0,1,1.108.56s-2.217,4.987,2.771,7.2A6.45,6.45,0,0,1,0,8.872c4.987,2.771,11.083,0,11.083-6.373a2.494,2.494,0,0,0-.044-.46A4.278,4.278,0,0,0,12.192.006Z"
                                            transform="translate(0.5 0.542)" fill="none" stroke="#fff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                            stroke-width="1"/>
                                    </svg>
                                </a>
                            </li>
                        @endif
                        @if($settings['instagram'])
                            <li>
                                <a href="{{$settings['instagram']}}" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
                                        <g transform="translate(0.5 0.5)">
                                            <rect width="12" height="12" rx="3" stroke-width="1" stroke="#fff"
                                                  stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                  fill="none"/>
                                            <path d="M4.774,2.048A2.4,2.4,0,1,1,2.752.026,2.4,2.4,0,0,1,4.774,2.048Z"
                                                  transform="translate(3.626 3.574)" fill="none" stroke="#fff"
                                                  stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                  stroke-width="1"/>
                                            <path data-name="Path" d="M.3.3H.3" transform="translate(9.003 2.4)"
                                                  fill="none"
                                                  stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-miterlimit="10" stroke-width="1"/>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                        @endif
                        @if($settings['linkedin'])
                            <li>
                                <a href="{{$settings['linkedin']}}" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12.579" height="12"
                                         viewBox="0 0 12.579 12">
                                        <g transform="translate(0.5 0.5)">
                                            <path
                                                d="M3.474,0A3.474,3.474,0,0,1,6.947,3.474V7.526H4.632V3.474a1.158,1.158,0,1,0-2.316,0V7.526H0V3.474A3.474,3.474,0,0,1,3.474,0Z"
                                                transform="translate(4.632 3.474)" fill="none" stroke="#fff"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1"/>
                                            <rect width="2.316" height="6.947" stroke-width="1"
                                                  transform="translate(0 4.053)" stroke="#fff" stroke-linecap="round"
                                                  stroke-linejoin="round" stroke-miterlimit="10" fill="none"/>
                                            <circle cx="1.158" cy="1.158" r="1.158" stroke-width="1"
                                                    transform="translate(0 0)" stroke="#fff" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-miterlimit="10" fill="none"/>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div><!--col-->
            <div class="col-md-4 col-sm-6">
                <div class="footer-links-group footer-menu-links">
                    <h3 class="text-primary">الروابط</h3>
                    <ul class="list-unstyled footer-links">
                        <li>
                            <a class="link-goto" data-id="about" href="#">من نحن</a>
                        </li>
                        <li>
                            <a class="link-goto" data-id="certificate-process" href="#">إصدار الشهادات</a>
                        </li>
                        <li>
                            <a class="link-goto" data-id="ads" href="#">إصدار الإعلانات</a>
                        </li>
                        <li>
                            <a class="link-goto" data-id="special-design" href="#">تصميم خاص</a>
                        </li>
                        <li>
                            <a class="link-goto" data-id="packages" href="#">الباقات</a>
                        </li>
                        <li>
                            <a class="link-goto" data-id="contact" href="#">تواصل معنا</a>
                        </li>
                    </ul>
                </div><!--footer links-->

                <div class="footer-links-group footer-short-links">
                    <h3 class="text-primary">روابط هامة</h3>
                    <ul class="list-unstyled footer-links">
                        <li>
                            <a href="#">الشاوي للتدريب والإستشارات</a>
                        </li>
                        <li>
                            <a href="#">سياسة الإستخدام</a>
                        </li>
                        <li>
                            <a href="#">الشروط والأحكام</a>
                        </li>
                    </ul>
                </div><!--footer links-->
            </div><!--col-->
            <div class="col-md-4 col-sm-6">
                @if(!\Auth::guard('web')->check() && !\Auth::guard('editor')->check())
                    <div class="login-form">
                        <h3 class="text-primary">تسجيل الدخول</h3>
                        <form id="loginForm" action="{{route('user.doLogin')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" name="email" class="form-control input-mail-icon" placeholder="البريد الالكتروني"/>
                            </div><!--form group-->
                            <div class="form-group">
                                <input type="password" name="password" class="form-control input-lock-icon" placeholder="كلمة المرور"/>
                            </div><!--form group-->

                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                <span>تسجيل الدخول</span>
                            </button>
                        </form>
                    </div>
                @endif
            </div><!--col-->
        </div><!--row-->
    </div><!--container content-->
    <div class="footer-bottom">
        <div class="container-content">
            <div class="goto-top">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="7.64"
                     height="13.668" viewBox="0 0 7.64 13.668">
                    <defs>
                        <linearGradient x1="100%" y1="50%" x2="0%" y2="50%" id="gradient-arrow">
                            <stop stop-color="#039BF9" offset="0%"></stop>
                            <stop stop-color="#00C8A0" offset="100%"></stop>
                        </linearGradient>
                    </defs>
                    <g>
                        <path d="M-6.267,13.432a.812.812,0,0,1-.568.235.812.812,0,0,1-.568-.235.8.8,0,0,1,0-1.136l5.461-5.461L-7.4,1.373A.8.8,0,0,1-7.4.237a.8.8,0,0,1,1.136,0L-.237,6.267a.8.8,0,0,1,0,1.136Z"
                              transform="translate(7.64)" fill="url(#gradient-arrow)"/>
                    </g>
                </svg>
            </div>

            <ul class="list-unstyled payments-links">
                <li>
                    <a href="#">
                        <img src="{{ asset('site/img/mada-icon.png') }}" alt="image"/>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('site/img/visa-icon.svg') }}" alt="image"/>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('site/img/mastercard-icon.svg') }}" alt="image"/>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('site/img/paypal-icon.svg') }}" alt="image"/>
                    </a>
                </li>
            </ul>
            <p>© جميع الحقوق محفوظة لموقع شهادة تك 2020</p>
        </div><!--container content-->
    </div><!--footer bottom-->
</div><!--footer-->

@section('footer_js')
    <script>
        $(document).ready(function () {
            $('#loginForm').ajaxForm({
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
