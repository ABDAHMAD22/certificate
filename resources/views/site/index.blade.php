@extends('layouts.site')

@section('css_files')
    <link rel="stylesheet" href="{{ asset('site/css/swiper.min.css') }}">
@endsection

@section('content')
    <div id="hero" class="section">
        <img src="{{ asset('site/img/purple-shape.svg') }}" class="purple-shape" alt="image">
        <img src="{{ asset('site/img/green-shape.svg') }}" class="green-shape" alt="image">
        <img src="{{ asset('site/img/yellow-shape.svg') }}" class="yellow-shape" alt="image">
        <img src="{{ asset('site/img/green-left-shape.svg') }}" class="green-left-shape" alt="image">
        <img src="{{ asset('site/img/yellow-x-shape.svg') }}" class="yellow-x-shape" alt="image">
        <img src="{{ asset('site/img/hero-bg.jpg') }}" class="hero-bg" alt="image">
        <div class="container-content position-relative">
            <div id="hero-slider" class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($slider as $item)
                        <div class="swiper-slide">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="slider-text">
                                        <h3>{{ $item->title }}</h3>
                                        <p>{{ $item->description }}</p>

                                        @if($item->button_text)
                                            <a href="{{$item->button_link ?? ''}}" target="_blank"
                                               class="btn-slider">
                                                <span class="btn-slider-icon">
                                                   <img src="{{Storage::url($item->button_icon)}}"/>
                                                </span>
                                                <span class="btn-slider-text">{{$item->button_text}}</span>
                                            </a>
                                        @endif
                                    </div><!--slider text-->
                                </div><!--col-->
                                <div class="col-md-6">
                                    <img src="{{ Storage::url($item->image) }}" class="hero-slider-img" alt="image"/>
                                </div><!--col-->
                            </div><!--row-->
                        </div><!--slide-->
                    @endforeach
                </div><!--wrapper-->
            </div><!--hero slider-->
            <div id="hero-pagination" class="swiper-pagination"></div>
        </div><!--container content-->
    </div><!--slider-->

    @include('site.partials.about')

    <div id="centers" class="section shared-bg">
        <div class="container-content">
            <div class="section-title text-center">
                <h3 class="text-primary">أبرز المراكز</h3>
                <p>حين تكون شهادة تك جزءاً يساهم في الرُقيّ</p>
            </div><!--section title-->

            <div class="centers-list">
                <div id="centers-slider">
                    <div class="swiper-wrapper">
                        @foreach($centers as $item)
                            <div class="swiper-slide">
                                <div class="center-region">
                                    <div class="center-img">
                                        <img src="{{ Storage::url($item->logo) }}" alt="image"/>
                                    </div><!--center img-->
                                    <div class="center-details">
                                        <h4>{{ $item->name }}</h4>
                                        <p class="text-primary">{{ $item->address }}</p>
                                    </div><!--center details-->
                                </div><!--center region-->
                            </div><!--item-->
                        @endforeach
                    </div><!--swipper slider-->
                </div><!--slider-->
                <div class="btns-slider" dir="ltr">
                    <button class="btn-prev centers-prev">
                        <img src="{{ asset('site/img/arrow-prev-icon.svg') }}" alt="image"/>
                    </button>
                    <button class="btn-next centers-next">
                        <img src="{{ asset('site/img/arrow-next-icon.svg') }}" alt="image"/>
                    </button>
                </div><!--btns slider-->
            </div>
        </div><!--container content-->
    </div><!--centers-->

    <div id="statistics" class="section">
        <img src="{{ asset('site/img/statistics-bg.png') }}" class="statistics-bg" alt="image">
        <div class="container-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="statistics-part">
                        <div class="statistics-title">
                            <h3>شهــادة تــك
                                فـي أرقـام</h3>
                            <p>حينَ تكونُ الأرقامُ لغتنا</p>
                        </div>
                        <ul class="list-unstyled statistics-items">
                            <li>
                                <span class="number counter_number">{{$certificates_no}}</span>
                                <span class="text text-primary">شهادة</span>
                            </li>
                            {{--                            <li>--}}
                            {{--                                <span class="number counter_number">{{$trainers_no}}</span>--}}
                            {{--                                <span class="text text-primary">مدرب</span>--}}
                            {{--                            </li>--}}
                            <li>
                                <span class="number counter_number">{{$users_no}}</span>
                                <span class="text text-primary">مركز</span>
                            </li>
                        </ul>
                    </div><!--statistics part-->
                </div><!--col-->
                <div class="col-md-6">
                    <div class="be-partner">
                        <img src="{{ asset('site/img/partner-icon.svg') }}" alt="image">
                        <div class="be-partner-title">
                            <h4>كُن شريكاً</h4>
                            <p>سجّل معنا وحلِّق في سماء الإبداع</p>
                        </div><!--be partner title-->
                        <a href="{{route('user.register')}}" class="btn btn-primary">
                            <span>اشترك الآن</span>
                        </a>
                    </div><!--be partner-->
                </div><!--col-->
            </div><!--row-->
        </div><!--container content-->
    </div><!--statistics-->

    <div id="trainers" class="section shared-bg">
        <div class="container-content">
            <div class="section-title text-center">
                <h3 class="text-primary">أبرز المدربين</h3>
                <p>نسعد بك في منظومة شهادة تك فكن معنا</p>
            </div><!--section title-->

            <div class="trainers-list overflow-hidden">
                <div id="trainers-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="trainer-region">
                                <img class="trainer-img" src="{{ asset('site/img/trainer-img1.jpg') }}" alt="image"/>

                                <div class="trainer-details">
                                    <h5 class="text-primary">مدرب تنمية بشرية</h5>
                                    <h4>عبد الله محمد الخالدي</h4>
                                    <ul class="list-unstyled trainer-info">
                                        <li>
                                            <img src="{{ asset('site/img/map-icon.svg') }}" alt="image">
                                            <span>السعودية</span>
                                        </li>
                                        <li>
                                            <img src="{{ asset('site/img/smartphone-icon.svg') }}" alt="image">
                                            <span>3937379</span>
                                        </li>
                                    </ul>
                                </div><!--trainer details-->
                            </div><!--trainer region-->
                        </div><!--item-->
                        <div class="swiper-slide">
                            <div class="trainer-region">
                                <img class="trainer-img" src="{{ asset('site/img/trainer-img2.jpg') }}" alt="image"/>

                                <div class="trainer-details">
                                    <h5 class="text-primary">مدرب تنمية بشرية</h5>
                                    <h4>أشرف هشام الشرفا</h4>
                                    <ul class="list-unstyled trainer-info">
                                        <li>
                                            <img src="{{ asset('site/img/map-icon.svg') }}" alt="image">
                                            <span>السعودية</span>
                                        </li>
                                        <li>
                                            <img src="{{ asset('site/img/smartphone-icon.svg') }}" alt="image">
                                            <span>3937379</span>
                                        </li>
                                    </ul>
                                </div><!--trainer details-->
                            </div><!--trainer region-->
                        </div><!--item-->
                        <div class="swiper-slide">
                            <div class="trainer-region">
                                <img class="trainer-img" src="{{ asset('site/img/trainer-img3.jpg') }}" alt="image"/>

                                <div class="trainer-details">
                                    <h5 class="text-primary">مدرب تنمية بشرية</h5>
                                    <h4>كــــــرم حــــامــــد البيـــاع</h4>
                                    <ul class="list-unstyled trainer-info">
                                        <li>
                                            <img src="{{ asset('site/img/map-icon.svg') }}" alt="image">
                                            <span>السعودية</span>
                                        </li>
                                        <li>
                                            <img src="{{ asset('site/img/smartphone-icon.svg') }}" alt="image">
                                            <span>3937379</span>
                                        </li>
                                    </ul>
                                </div><!--trainer details-->
                            </div><!--trainer region-->
                        </div><!--item-->
                        <div class="swiper-slide">
                            <div class="trainer-region">
                                <img class="trainer-img" src="{{ asset('site/img/trainer-img4.jpg') }}" alt="image"/>

                                <div class="trainer-details">
                                    <h5 class="text-primary">مدرب تنمية بشرية</h5>
                                    <h4>آدم إيـــاد عبـــد الهـــادي</h4>
                                    <ul class="list-unstyled trainer-info">
                                        <li>
                                            <img src="{{ asset('site/img/map-icon.svg') }}" alt="image">
                                            <span>السعودية</span>
                                        </li>
                                        <li>
                                            <img src="{{ asset('site/img/smartphone-icon.svg') }}" alt="image">
                                            <span>3937379</span>
                                        </li>
                                    </ul>
                                </div><!--trainer details-->
                            </div><!--trainer region-->
                        </div><!--item-->
                        <div class="swiper-slide">
                            <div class="trainer-region">
                                <img class="trainer-img" src="{{ asset('site/img/trainer-img1.jpg') }}" alt="image"/>

                                <div class="trainer-details">
                                    <h5 class="text-primary">مدرب تنمية بشرية</h5>
                                    <h4>عبد الله محمد الخالدي2</h4>
                                    <ul class="list-unstyled trainer-info">
                                        <li>
                                            <img src="{{ asset('site/img/map-icon.svg') }}" alt="image">
                                            <span>السعودية</span>
                                        </li>
                                        <li>
                                            <img src="{{ asset('site/img/smartphone-icon.svg') }}" alt="image">
                                            <span>3937379</span>
                                        </li>
                                    </ul>
                                </div><!--trainer details-->
                            </div><!--trainer region-->
                        </div><!--item-->
                    </div><!--swiper wrapper-->
                </div><!--trainers slider-->
                <div id="trainers-pagination" class="swiper-pagination"></div>
            </div><!--trainers list-->
        </div><!--container content-->
    </div><!--trainers-->

    <div id="certificate-process" class="section">
        <div class="container-content">
            <div class="title mx-auto">
                <h3>آلية إصدار الشهادة</h3>
                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من لوريم ابسوم.</p>
            </div><!--title-->

            <div class="row process-row">
                <div class="col-md-3 col-sm-6">
                    <div class="process-region">
                        <div class="process-icon">
                            <img src="{{ asset('site/img/process-icon1.svg') }}" alt="image"/>
                        </div><!--process icon-->
                        <div class="process-details">
                            <h4>قم بالتسجيل</h4>
                            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة</p>
                        </div><!--process details-->
                    </div><!--process region-->
                </div><!--col-->
                <div class="col-md-3 col-sm-6">
                    <div class="process-region">
                        <div class="process-icon">
                            <img src="{{ asset('site/img/process-icon2.svg') }}" alt="image"/>
                        </div><!--process icon-->
                        <div class="process-details">
                            <h4>انشاء عضوية</h4>
                            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة</p>
                        </div><!--process details-->
                    </div><!--process region-->
                </div><!--col-->
                <div class="col-md-3 col-sm-6">
                    <div class="process-region">
                        <div class="process-icon">
                            <img src="{{ asset('site/img/process-icon3.svg') }}" alt="image"/>
                        </div><!--process icon-->
                        <div class="process-details">
                            <h4>بيانات الشهادة</h4>
                            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة</p>
                        </div><!--process details-->
                    </div><!--process region-->
                </div><!--col-->
                <div class="col-md-3 col-sm-6">
                    <div class="process-region">
                        <div class="process-icon">
                            <img src="{{ asset('site/img/process-icon4.svg') }}" alt="image"/>
                        </div><!--process icon-->
                        <div class="process-details">
                            <h4>قم بتصدير الشهادة</h4>
                            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة</p>
                        </div><!--process details-->
                    </div><!--process region-->
                </div><!--col-->
            </div><!--row-->
        </div><!--container content-->
    </div><!--certificate process-->

    <div id="partners" class="section">
        <img src="{{ asset('site/img/contact-shape.svg') }}" class="contact-shape" alt="image"/>
        <div class="container-content">
            <div class="section-title text-center">
                <h3 class="text-primary">شركاء النجاح</h3>
                <p>نفخر بشركاء شهادة تك
                    ونطمح أن نكون معهم لبنةً في صرح الجودة والتميز</p>
            </div><!--section title-->

            <div class="partners-list overflow-hidden">
                <div id="partners-slider">
                    <div class="swiper-wrapper">
                        @foreach($partners as $key=>$item)
                            <div class="swiper-slide">
                                <div class="item">
                                    <a target="_blank" title="{{$item->name}}" href="{{$item->link}}"
                                       class="partner-region">
                                        <img src="{{ Storage::url($item->logo) }}" alt="image"/>
                                    </a>
                                </div><!--item-->
                            </div>
                        @endforeach
                    </div>
                </div><!--slider-->
                <div class="btns-slider" dir="ltr">
                    <button class="btn-prev partners-prev">
                        <img src="{{ asset('site/img/arrow-prev-icon.svg') }}" alt="image"/>
                    </button>
                    <button class="btn-next partners-next">
                        <img src="{{ asset('site/img/arrow-next-icon.svg') }}" alt="image"/>
                    </button>
                </div><!--btns slider-->
            </div><!--partners list-->
        </div><!--container content-->
    </div><!--partners-->

    @include('site.partials.contact')

    <div id="search-modal" class="modal search-modal">
        <h3 class="text-center xmodal-title">قم بالبحث عن شهادتك وحفظها بكل سهولة</h3>

        <form id="certificateSearchForm" action="{{route('search')}}" class="form-gray tall-form mt-lg-5">
            <div class="form-group search-field position-relative pl-0">
                <button type="button" class="search-icon">
                    <img src="{{ asset('site/img/search.svg') }}" alt="image">
                </button>
                <input type="text" class="form-control" name="name" placeholder="ابحث بالاسم كامل أو رقم الهوية">
            </div>

            <div class="certificates-list">
            </div><!--certificates-->

            <button type="submit" class="btn btn-block btn-primary hover-black">
                <span>بحث</span>
            </button>
        </form>
    </div>

    @include('site.partials.special_design_request')
@endsection

@section('js')
    <script src="{{ asset('site/js/counter/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('site/js/counter/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('site/js/swiper.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#certificateSearchForm').ajaxForm({
                success: function (res) {
                    //$('#certificateSearchForm')[0].reset();
                    $('.certificates-list').html(res.certificates_html);
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
