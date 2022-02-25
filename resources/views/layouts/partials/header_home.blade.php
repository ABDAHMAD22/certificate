<header id="header">
    <div class="container-content">
        <h1 class="head-logo">
            <a href="{{route('index')}}">
                <img src="{{ asset('site/img/logo.svg') }}" alt="image"/>
                <span class="sr-only">{{ trans('app.title') }}</span>
            </a>
        </h1>
        <ul class="list-unstyled main-menu">
            <li class="{{$activeClass=='index'?'active':''}}">
                <a class="link-goto" data-id="hero" href="{{route('index')}}">الرئيسية</a>
            </li>
            <li>
                <a class="link-goto" data-id="about" href="{{route('about')}}">من نحن</a>
            </li>
            <li>
                <a class="link-goto" data-id="certificate-process" href="{{route('certificate')}}">إصدار الشهادات</a>
            </li>
            <li>
                <a class="special-request-request" data-id="special-design" href="{{route('special-design')}}">تصميم خاص</a>
            </li>
            <li>
                <a href="{{route('packages')}}">الباقات</a>
            </li>
            <li>
                <a class="link-goto" data-id="contact" href="{{route('contact')}}">تواصل معنا</a>
            </li>
            <li>
                <a href="#" class="btn-search-menu btn-search-modal">ابحث عن شهادتك</a>
            </li>
        </ul>

        <ul class="member-menu">
            @if(!\Auth::guard('web')->check() && !\Auth::guard('editor')->check())
                <li class="menu-item">
                    <a href="{{route('user.login')}}">الدخول</a>
                </li>
            @endif
            @auth('web')
                <li class="menu-item">
                    <a href="{{route('user.profileView')}}">ملفي الشخصي</a>
                </li>
                <li class="menu-item">
                    <a href="{{route('user.logout')}}">
                        <svg width="16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="power-off"
                             role="img"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                             class="svg-inline--fa fa-power-off fa-w-16 fa-7x">
                            <path fill="currentColor"
                                  d="M400 54.1c63 45 104 118.6 104 201.9 0 136.8-110.8 247.7-247.5 248C120 504.3 8.2 393 8 256.4 7.9 173.1 48.9 99.3 111.8 54.2c11.7-8.3 28-4.8 35 7.7L162.6 90c5.9 10.5 3.1 23.8-6.6 31-41.5 30.8-68 79.6-68 134.9-.1 92.3 74.5 168.1 168 168.1 91.6 0 168.6-74.2 168-169.1-.3-51.8-24.7-101.8-68.1-134-9.7-7.2-12.4-20.5-6.5-30.9l15.8-28.1c7-12.4 23.2-16.1 34.8-7.8zM296 264V24c0-13.3-10.7-24-24-24h-32c-13.3 0-24 10.7-24 24v240c0 13.3 10.7 24 24 24h32c13.3 0 24-10.7 24-24z"></path>
                        </svg>
                    </a>
                </li>
            @endauth
            @auth('editor')
                    <li class="menu-item">
                        <a href="{{route('editor.profile')}}">ملفي الشخصي</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('editor.logout')}}">
                            <svg width="16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="power-off"
                                 role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                 class="svg-inline--fa fa-power-off fa-w-16 fa-7x">
                                <path fill="currentColor"
                                      d="M400 54.1c63 45 104 118.6 104 201.9 0 136.8-110.8 247.7-247.5 248C120 504.3 8.2 393 8 256.4 7.9 173.1 48.9 99.3 111.8 54.2c11.7-8.3 28-4.8 35 7.7L162.6 90c5.9 10.5 3.1 23.8-6.6 31-41.5 30.8-68 79.6-68 134.9-.1 92.3 74.5 168.1 168 168.1 91.6 0 168.6-74.2 168-169.1-.3-51.8-24.7-101.8-68.1-134-9.7-7.2-12.4-20.5-6.5-30.9l15.8-28.1c7-12.4 23.2-16.1 34.8-7.8zM296 264V24c0-13.3-10.7-24-24-24h-32c-13.3 0-24 10.7-24 24v240c0 13.3 10.7 24 24 24h32c13.3 0 24-10.7 24-24z"></path>
                            </svg>
                        </a>
            @endauth
            <li class="btn-header2">
                <a href="#" class="btn btn-primary-transparent btn-search-modal">
                    <span class="txt">ابحث عن شهادتك</span>
                    <span class="hover"></span>
                </a>
            </li>
        </ul>

        <div id="hamburger" class="hamburger hamburger--spin unactive is-active2">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div><!--box-->
        </div><!--hamburger-->
    </div><!--container content-->
</header><!--header-->
