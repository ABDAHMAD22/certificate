<header id="header-profile">
    <div class="container-content">
        <h1 class="main-logo">
            <a href="{{route('index')}}">
                <img src="{{ asset('site/img/logo-mid-white.svg') }}" alt="image"/>
                <span class="sr-only">{{trans('app.title')}}</span>
            </a>
        </h1>

        <ul class="other-menu">
            <li>
                <a href="{{route('home')}}" class="{{$activeClass=='home'?'active':''}}">
                    <i>
                        <img src="{{ asset('site/img/home-icon1.svg') }}" alt="image">
                        <img src="{{ asset('site/img/home-icon2.svg') }}" alt="image">
                    </i>
                    <span>الرئيسية</span>
                </a>
            </li>
            @if(\Auth::guard('web')->check() || (\Auth::guard('editor')->check() && \Auth::guard('editor')->user()->hasCertificate()))
                <li>
                    <a href="{{route('certificate')}}" class="{{$activeClass=='certificates'?'active':''}}">
                        <i>
                            <img src="{{ asset('site/img/certificate-icon1.svg') }}" alt="image">
                            <img src="{{ asset('site/img/certificate-icon2.svg') }}" alt="image">
                        </i>
                        <span>اصدار شهادة</span>
                    </a>
                </li>
            @endif

            @if(\Auth::guard('web')->check() || (\Auth::guard('editor')->check() && \Auth::guard('editor')->user()->hasAds()))
                <li>
                    <a href="{{route('ads')}}" class="{{$activeClass=='ads'?'active':''}}">
                        <i>
                            <img src="{{ asset('site/img/ads-icon1.svg') }}" alt="image">
                            <img src="{{ asset('site/img/ads-icon2.svg') }}" alt="image">
                        </i>
                        <span>اصدار اعلان</span>
                    </a>
                </li>
            @endif
            @auth('web')
                <li>
                    <a href="{{route('special-design')}}" class="{{$activeClass=='special-design'?'active':''}}">
                        <i>
                            <img src="{{ asset('site/img/design-icon1.svg') }}" alt="image">
                            <img src="{{ asset('site/img/design-icon2.svg') }}" alt="image">
                        </i>
                        <span>تصميم خاص</span>
                    </a>
                </li>
            @endauth
            @if(\Auth::guard('web')->check() || (\Auth::guard('editor')->check() && \Auth::guard('editor')->user()->hasSubscription()))
                <li>
                    <a href="{{route('package')}}" class="{{$activeClass=='package'?'active':''}}">
                        <i>
                            <img src="{{ asset('site/img/packages-icon1.svg') }}" alt="image">
                            <img src="{{ asset('site/img/packages-icon2.svg') }}" alt="image">
                        </i>
                        <span>الباقات</span>
                    </a>
                </li>
            @endif
            @auth('web')
                <li>
                    <a href="{{route('editor')}}" class="{{$activeClass=='editors'?'active':''}}">
                        <i>
                            <img src="{{ asset('site/img/team-icon1.svg') }}" alt="image">
                            <img src="{{ asset('site/img/team-icon2.svg') }}" alt="image">
                        </i>
                        <span>فريق العمل</span>
                    </a>
                </li>
            @endauth
            @auth('web')
                <li class="profile-menu">
                    <div class="menu-user unactive">
                        <img class="user-menu" src="{{\Auth::guard('web')->user()->image_path}}" alt="image">
                    </div>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{route('user.profileView')}}">
                                <div class="person-img">
                                    <img src="{{\Auth::guard('web')->user()->image_path}}" alt="image">
                                </div>
                                <p class="title">{{\Auth::guard('web')->user()->name}}</p>
                                <p class="email text-truncate">{{\Auth::guard('web')->user()->email}}</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('payments')}}">فواتيري</a>
                        </li>
                        <li>
                            <a href="{{route('user.profileView')}}">الملف الشخصي</a>
                        </li>
                        <li>
                            <a href="{{route('changePassword')}}">تغير كلمة المرور</a>
                        </li>
                        <li>
                            <a href="{{route('contact')}}">تواصل معنا</a>
                        </li>
                        <li>
                            <a href="{{route('user.logout')}}" class="btn btn-primary-transparent btn-block">
                                <span class="txt">تسجيل خروج</span>
                                <span class="hover"></span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endauth
            @auth('editor')
                <li class="profile-menu">
                    <div class="menu-user unactive">
                        <img class="user-menu" src="{{\Auth::guard('editor')->user()->image_path}}" alt="image">
                    </div>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{route('editor.profile')}}">
                                <div class="person-img">
                                    <img src="{{\Auth::guard('editor')->user()->image_path}}" alt="image">
                                </div>
                                <p class="title">{{\Auth::guard('editor')->user()->name}}</p>
                                <p class="email text-truncate">{{\Auth::guard('editor')->user()->email}}</p>
                            </a>
                        </li>
                        @if(\Auth::guard('web')->check() || (\Auth::guard('editor')->check() && \Auth::guard('editor')->user()->hasSubscription()))
                            <li>
                                <a href="{{route('payments')}}">فواتيري</a>
                            </li>
                        @endif
                        <li>
                            <a href="{{route('editor.profile')}}">الملف الشخصي</a>
                        </li>
                        <li>
                            <a href="{{route('changePassword')}}">تغير كلمة المرور</a>
                        </li>
                        <li>
                            <a href="{{route('contact')}}">تواصل معنا</a>
                        </li>
                        <li>
                            <a href="{{route('editor.logout')}}" class="btn btn-primary-transparent btn-block">
                                <span class="txt">تسجيل خروج</span>
                                <span class="hover"></span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endauth
        </ul>
    </div><!--container-->
</header>
