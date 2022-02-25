@extends('layouts.site')

@section('css')
@endsection

@section('content')
    <div class="page-container home-page mx-auto">
        @if((\Auth::guard('web')->check() && \Auth::guard('web')->user()->hasSubscription) ||
        (\Auth::guard('editor')->check() && \Auth::guard('editor')->user()->user->hasSubscription))
            <div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <h2>الشهادات</h2>
                            <div class="d-flex align-items-center">
                                <p>عدد الشهادات تم تصديرها</p>
                                <span class="text-primary num">{{$usedCertificatesNo}}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <p>عدد الشهادات المتبقية</p>
                                <span class="text-primary num">{{$certificatesNo - $usedCertificatesNo}}</span>
                            </div>
                            <ul>
                                {{--                        <li class="{{$usedCertificatesNo!=0?'active':''}}"></li>--}}
                                {{--                        @for($i=2;$i<=20;$i++)--}}
                                {{--                        <li class="{{($i<=($certificatesNo>0?(int)(($usedCertificatesNo/$certificatesNo)*20):0))?'active':''}}"></li>--}}
                                {{--                        @endfor--}}
                                @for($i=1;$i<=20;$i++)
                                    <li class="{{$i<=$certificates_condition?'active':''}}"></li>
                                @endfor
                            </ul>
                            @if(\Auth::guard('web')->check() || (\Auth::guard('editor')->check() && \Auth::guard('editor')->user()->hasSubscription()))
                                <a href="{{route('package')}}" class="btn btn-primary-transparent d-table mx-auto">
                                    <span class="txt">جدد الباقة</span>
                                    <span class="hover"></span>
                                </a>
                            @endif
                        </div><!-- box -->
                    </div>
                    <div class="col-md-6">
                        <div class="box">
                            <h2>الإعلانات</h2>
                            <div class="d-flex align-items-center">
                                <p>عدد الإعلانات تم تصديرها</p>
                                <span class="text-primary num">{{$usedAdsNo}}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <p>عدد الإعلانات المتبقية</p>
                                <span class="text-primary num">{{$adsNo - $usedAdsNo}}</span>
                            </div>
                            <ul>
                                @for($i=1;$i<=20;$i++)
                                    <li class="{{$i<=$ads_condition?'active':''}}"></li>
                                    {{--                            <li class="{{($i<=($adsNo>0?(int)(($usedAdsNo/$adsNo)*20):0))?'active':''}}"></li>--}}
                                @endfor
                            </ul>
                            @if(\Auth::guard('web')->check() || (\Auth::guard('editor')->check() && \Auth::guard('editor')->user()->hasSubscription()))
                                <a href="{{route('package')}}" class="btn btn-primary-transparent d-table mx-auto">
                                    <span class="txt">جدد الباقة</span>
                                    <span class="hover"></span>
                                </a>
                            @endif
                        </div><!-- box -->
                    </div>
                </div>
                {{--                <form action="{{route('home')}}" class="form-gray">--}}
                {{--                    <div class="row">--}}
                {{--                        <div class="col-12">--}}
                {{--                            <div class="form-group flex-grow-1 search-field position-relative">--}}
                {{--                                <button type="submit" class="search-icon">--}}
                {{--                                    <img src="{{ asset('site/img/search.svg') }}" alt="image">--}}
                {{--                                </button>--}}
                {{--                                <input type="text" name="q" class="form-control" value="{{request()->get('q') }}"--}}
                {{--                                       placeholder="ابحث بالاسم أو رقم الشهادة">--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </form>--}}

                <div class="row pt-5">
                    @foreach($certificates as $item)
                        <div class="col-md-6 pb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    <p class="card-text">المدرب:
                                        <span class="text-primary">{{ $item->trainer_name ?? '-' }}</span>
                                    </p>
                                    <p class="card-text">عدد الطلاب:
                                        <span class="text-primary">{{ count($item->certificateStudent) }}</span>
                                    </p>
                                    <div>
                                        <a href="{{ route('certificate.students', ['certificate' => $item->id]) }}"
                                           class="btn btn-primary">
                                            <span>عرض الطلاب</span>
                                        </a>
                                        <a href="{{ route('certificate.formStudents', ['certificate' => $item->id]) }}"
                                           class="btn btn-primary">
                                            <span>اضافة طلاب</span>
                                        </a>
                                    </div>
                                    @if($item->parent_id===0)
                                        <div class="mt-2">
                                            <a href="{{route('certificate.edit', ['certificate'=>$item->id])}}"
                                               class="btn btn-primary">
                                                <span>تعديل مع اضافة الطلاب</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div><!--col-->
                    @endforeach
                </div><!--row-->

                {{--                @foreach($certificate_students as $item)--}}
                {{--                    @include('site.partials.student', ['student'=>$item])--}}
                {{--                @endforeach--}}

                {{--                {{$certificate_students->links()}}--}}
            </div>
        @else
            <div class="no-payments text-center">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="money-bill-wave" role="img"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                     class="svg-inline--fa fa-money-bill-wave fa-w-20 fa-7x">
                    <path fill="currentColor"
                          d="M621.16 54.46C582.37 38.19 543.55 32 504.75 32c-123.17-.01-246.33 62.34-369.5 62.34-30.89 0-61.76-3.92-92.65-13.72-3.47-1.1-6.95-1.62-10.35-1.62C15.04 79 0 92.32 0 110.81v317.26c0 12.63 7.23 24.6 18.84 29.46C57.63 473.81 96.45 480 135.25 480c123.17 0 246.34-62.35 369.51-62.35 30.89 0 61.76 3.92 92.65 13.72 3.47 1.1 6.95 1.62 10.35 1.62 17.21 0 32.25-13.32 32.25-31.81V83.93c-.01-12.64-7.24-24.6-18.85-29.47zM48 132.22c20.12 5.04 41.12 7.57 62.72 8.93C104.84 170.54 79 192.69 48 192.69v-60.47zm0 285v-47.78c34.37 0 62.18 27.27 63.71 61.4-22.53-1.81-43.59-6.31-63.71-13.62zM320 352c-44.19 0-80-42.99-80-96 0-53.02 35.82-96 80-96s80 42.98 80 96c0 53.03-35.83 96-80 96zm272 27.78c-17.52-4.39-35.71-6.85-54.32-8.44 5.87-26.08 27.5-45.88 54.32-49.28v57.72zm0-236.11c-30.89-3.91-54.86-29.7-55.81-61.55 19.54 2.17 38.09 6.23 55.81 12.66v48.89z"></path>
                </svg>
                <h3>لا يوجد لديك اشتراك</h3>
                @if(\Auth::guard('web')->check())
                    <p>يمكنك الاشتراك في احدى الباقات
                        <a href="{{route('package')}}" class="btn btn-primary-transparent hover-black mr-2">
                            <span class="txt">من هنا</span>
                            <span class="hover"></span>
                        </a>
                    </p>
                @endif
            </div>
        @endif
    </div><!--page container-->
@endsection

@section('js')
@endsection
