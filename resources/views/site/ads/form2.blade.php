@extends('layouts.site')

@section('css_files')
    <link href="{{ asset('site/js/hijri-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
@endsection

@section('js_files')
    <script src="{{ asset('site/js/hijri-datetimepicker/js/bootstrap-hijri-datetimepicker.min.js') }}"></script>
@endsection

@section('content')
    <div class="page-container mx-auto">
        @if(\App\User::hasAds())
            <form id="adsForm" action="{{route('ads.store')}}" method="POST" class="form-gray tall-form">
                {{csrf_field()}}
                <div class="form-group">
                    <label>
                        اختر القالب المناسب
                    </label>
                    <div class="row templates-row">
                        @foreach($templates as $key=>$item)
                            <div class="col-sm-4">
                                <div
                                    class="template-img {{$is_add && $key==0 ? 'active':''}}">
                                    <img src="{{ Storage::url($item->image)}}" alt="image">
                                    <input type="radio" class="d-none" name="template_id" value="{{$item->id}}"
                                        {{$is_add && $key==0 ? 'checked':''}}>
                                </div><!--template-->
                            </div><!--col-->
                        @endforeach
                    </div><!--row-->
                </div><!--form group-->

                <div class="form-group">
                    <label>
                        قالب خاص
                    </label>
                    <div class="form-control group-gray group-file">
                        <span class="group-text text-truncate">تواصل معنا لطلب قالب الاعلان الخاص بكم</span>
                        <button type="button" class="btn btn-group-gray btn-primary hover-black template-request">
                            <span>اطلب الان</span>
                        </button>
                    </div><!--form control-->
                </div><!--form group-->

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">
                                العنوان
                                <span class="text-red">*</span>
                            </label>
                            <input id="title" name="title" type="text" class="form-control" placeholder="العنوان">
                        </div><!--form group-->
                    </div><!--col-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="trainer_name">
                                اسم المدرب\ة
                                <span class="text-red">*</span>
                            </label>
                            <input id="trainer_name" name="trainer_name" type="text" class="form-control"
                                   placeholder="اسم المدرب">
                        </div><!--form group-->
                    </div><!--col-->
                </div><!--row-->

                <div class="form-group">
                    <label for="trainer_about">
                        نبذة تعريفية عن المدرب\ة(إختياري)
                    </label>
                    <textarea class="form-control" name="trainer_about" id="trainer_about" cols="30" rows="10"
                              placeholder="لقب المدرب ، يُوضع تحت اسمه (عدد الحروف ٧٠)"></textarea>
                </div><!--form group-->

                <div class="form-group">
                    <label>
                        صورة معبرة
                    </label>
                    <div class="form-control group-gray group-file">
                        <span class="group-text text-truncate">اختار الصورة المناسبة</span>
                        <button type="button"
                                class="btn btn-group-gray btn-primary-transparent hover-black black-button template-request2 mx-2">
                            <span>اختر صورة</span>
                        </button>
                        <button type="button" class="btn btn-group-gray btn-primary hover-black">
                            <span>اختر ملف</span>
                            <input type="file" name="image" class="file-input-group">
                        </button>
                    </div><!--form control-->
                </div><!--form group-->


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="axes">
                                المحاور(إختياري)
                            </label>
                            <div class="d-flex align-items-center">
                                <input id="axes" type="text" class="form-control" placeholder="حد أقصى 8 محاور">
                                <button type="button" class="plus-button">
                                    <img src="{{ asset('site/img/plus-circle.svg') }}" alt="image">
                                </button>
                            </div>
                        </div><!--form group-->
                    </div><!--col-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="features">
                                المميزات(إختياري)
                            </label>
                            <div class="d-flex align-items-center">
                                <input id="features" type="text" class="form-control"
                                       placeholder="حد أقصى 4 مميزات">
                                <button type="button" class="plus-button">
                                    <img src="{{ asset('site/img/plus-circle.svg') }}" alt="image">
                                </button>
                            </div>
                        </div><!--form group-->
                    </div><!--col-->
                </div><!--row-->

                <div class="form-group">
                    <label>
                        التاريخ
                        <span class="text-red">*</span>
                    </label>
                    <div class="group-inputs date-group">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label class="radio-form">
                                <span class="radio-style">
                                    <input type="radio" class="radio-input" name="date_type" value="1" checked>
                                    <span></span>
                                </span>
                                    <span class="radio-text">ميلادي</span>
                                </label>

                                <label class="radio-form">
                                <span class="radio-style">
                                    <input type="radio" class="radio-input" name="date_type" value="2">
                                    <span></span>
                                </span>
                                    <span class="radio-text">هجري</span>
                                </label>
                            </div><!--col-->
                            <div class="col-md-8">
                                <div class="row date-row">
                                    <div class="col-md-6">
                                        <div class="input-datepicker">
                                            <input type="text"
                                                   class="form-control text-right datepicker-input datepicker-notHijri-start"
                                                   placeholder="تاريخ البداية" autocomplete="off">
                                            <input type="text"
                                                   class="form-control text-right d-none datepicker-input datepicker-hijri-start"
                                                   placeholder="تاريخ البداية" autocomplete="off">
                                            <input type="hidden" class="datepicker-hidden-start" name="start_date">
                                            <i class="icon"></i>
                                        </div>
                                    </div><!--col-->
                                    <div class="col-md-6">
                                        <div class="input-datepicker">
                                            <input type="text"
                                                   class="form-control text-right datepicker-input datepicker-notHijri-end"
                                                   placeholder="تاريخ الانتهاء" autocomplete="off">
                                            <input type="text"
                                                   class="form-control text-right d-none datepicker-input datepicker-hijri-end"
                                                   placeholder="تاريخ الانتهاء" autocomplete="off">
                                            <input type="hidden" class="datepicker-hidden-end" name="end_date">
                                            <i class="icon"></i>
                                        </div>
                                    </div><!--col-->
                                </div><!--row-->
                            </div><!--col-->
                        </div><!--row-->
                    </div>
                </div><!--form group-->

                <div class="form-group">
                    <label for="hours_no">
                        عدد الساعات
                        <span class="text-red">*</span>
                    </label>
                    <input id="hours_no" name="hours_no" type="text" class="form-control" placeholder="مثال : 25">
                </div><!--form group-->

                <div class="form-group2">
                    <label for="show_time">
                        مواعيد العرض(إختياري)
                    </label>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select id="start_time" class="select-css">
                                    @foreach($times as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!--col-->
                        <div class="col-md-6">
                            <div class="input-group-btn">
                                <div class="form-group">
                                    <select id="end_time" class="select-css">
                                        @foreach($times as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="button" class="plus-button">
                                    <img src="{{ asset('site/img/plus-circle.svg') }}" alt="image">
                                </button>
                            </div>
                        </div><!--col-->
                    </div><!--row-->
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">
                                السعر
                                <span class="text-red">*</span>
                            </label>
                            <input id="price" name="price" type="text" class="form-control" placeholder="مثال: 140">
                        </div><!--form group-->
                    </div><!--col-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="place">
                                المكان
                                <span class="text-red">*</span>
                            </label>
                            <input id="place" name="place" type="text" class="form-control"
                                   placeholder="مثال : اونلاين ، اسم قاعة فندقية">
                        </div><!--form group-->
                    </div><!--col-->
                </div><!--row-->


                <div class="form-group">
                    <label for="mobile">
                        رقم الاستفسار في الإعلان
                        <span class="text-red">*</span>
                    </label>
                    <input id="mobile" name="mobile" type="text" class="form-control"
                           placeholder="رقم الاتصال بالمدرب/ة">
                </div><!--form group-->


                <div class="form-group">
                    <label>
                        الفئات المستهدفة(إختياري)
                    </label>
                    <div class="group-inputs">
                        @foreach($targets as $key=>$item)
                            <label class="radio-form">
                            <span class="radio-style">
                                <input type="radio" class="radio-input" name="target_id"
                                       {{$is_add && $key==0 ? 'checked':''}}
                                       value="{{$item->id}}">
                                <span></span>
                            </span>
                                <span class="radio-text">{{$item->name}}</span>
                            </label>
                        @endforeach
                    </div>
                </div><!--form group-->

                <div class="form-group">
                    <label for="font">
                        نوع الخط
                        <span class="text-red">*</span>
                    </label>
                    <select id="font" name="font_id" class="select-css">
                        @foreach($fonts as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <button type="submit"
                                class="btn btn-primary-transparent black-button hover-black btn-sm btn-block">
                            <span>معاينة</span>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary hover-black btn-sm btn-block">
                            <span>حفظ</span>
                        </button>
                    </div>
                </div>
            </form>
        @else
            <div class="no-payments text-center">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="money-bill-wave" role="img"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                     class="svg-inline--fa fa-money-bill-wave fa-w-20 fa-7x">
                    <path fill="currentColor"
                          d="M621.16 54.46C582.37 38.19 543.55 32 504.75 32c-123.17-.01-246.33 62.34-369.5 62.34-30.89 0-61.76-3.92-92.65-13.72-3.47-1.1-6.95-1.62-10.35-1.62C15.04 79 0 92.32 0 110.81v317.26c0 12.63 7.23 24.6 18.84 29.46C57.63 473.81 96.45 480 135.25 480c123.17 0 246.34-62.35 369.51-62.35 30.89 0 61.76 3.92 92.65 13.72 3.47 1.1 6.95 1.62 10.35 1.62 17.21 0 32.25-13.32 32.25-31.81V83.93c-.01-12.64-7.24-24.6-18.85-29.47zM48 132.22c20.12 5.04 41.12 7.57 62.72 8.93C104.84 170.54 79 192.69 48 192.69v-60.47zm0 285v-47.78c34.37 0 62.18 27.27 63.71 61.4-22.53-1.81-43.59-6.31-63.71-13.62zM320 352c-44.19 0-80-42.99-80-96 0-53.02 35.82-96 80-96s80 42.98 80 96c0 53.03-35.83 96-80 96zm272 27.78c-17.52-4.39-35.71-6.85-54.32-8.44 5.87-26.08 27.5-45.88 54.32-49.28v57.72zm0-236.11c-30.89-3.91-54.86-29.7-55.81-61.55 19.54 2.17 38.09 6.23 55.81 12.66v48.89z"></path>
                </svg>
                <h3>لا يوجد لديك رصيد في اصدار الاعلانات</h3>
                <p>يمكنك الاشتراك في احدى الباقات
                    <a href="{{route('package')}}" class="btn btn-primary-transparent hover-black mr-2">
                        <span class="txt">من هنا</span>
                        <span class="hover"></span>
                    </a>
                </p>
            </div>
        @endif
    </div><!--page container-->

    <div id="template-modal1" class="modal">
        <h3 class="text-center xmodal-title">تواصل معنا لطلب قالب الاعلان الخاص بكم</h3>

        <form id="specialRequestForm" action="{{route('ads.specialRequest')}}" method="POST"
              class="form-gray tall-form mt-lg-5">
            <div class="form-group">
                <label for="name">
                    اسم المؤسسة/المركز/المعهد
                    <span class="text-red">*</span>
                </label>
                <input id="name" name="name" type="text" class="form-control" placeholder="اسم المؤسسة">
            </div><!--form group-->

            <div class="form-group">
                <label for="email">
                    البريد الالكتروني
                    <span class="text-red">*</span>
                </label>
                <input id="email" name="email" type="text" class="form-control" placeholder="البريد الالكتروني">
            </div><!--form group-->

            <div class="form-group">
                <label for="mobile">
                    رقم الجوال(واتسآب)
                    <span class="text-red">*</span>
                </label>
                <input id="mobile" name="mobile" type="text" class="form-control" placeholder="رقم الجوال">
            </div><!--form group-->

            <button type="submit" class="btn btn-primary hover-black btn-block mt-lg-5">
                <span>ارسال الطلب</span>
            </button>
        </form>
    </div>

    <div id="template-modal2" class="modal images-modal">
        <ul class="list-unstyled tabs-list tabs-event">
            <li class="active">
                <a href="#" class="btn-tab">
                    <span>تربية</span>
                </a>
            </li>
            <li>
                <a href="#" class="btn-tab">
                    <span>ادارة أعمال</span>
                </a>
            </li>
            <li>
                <a href="#" class="btn-tab">
                    <span>تكنولوجيا</span>
                </a>
            </li>
        </ul>

        <div class="images-row">
            <div class="image-col">
                <img src="{{ asset('site/img/img1.jpg') }}" alt="image">
            </div><!--col-->
            <div class="image-col">
                <img src="{{ asset('site/img/img2.jpg') }}" alt="image">
            </div><!--col-->
            <div class="image-col">
                <img src="{{ asset('site/img/img3.jpg') }}" alt="image">
            </div><!--col-->
            <div class="image-col">
                <img src="{{ asset('site/img/img4.jpg') }}" alt="image">
            </div><!--col-->
            <div class="image-col">
                <img src="{{ asset('site/img/img5.jpg') }}" alt="image">
            </div><!--col-->
            <div class="image-col">
                <img src="{{ asset('site/img/img6.jpg') }}" alt="image">
            </div><!--col-->
            <div class="image-col">
                <img src="{{ asset('site/img/img7.jpg') }}" alt="image">
            </div><!--col-->
            <div class="image-col">
                <img src="{{ asset('site/img/img1.jpg') }}" alt="image">
            </div><!--col-->
            <div class="image-col">
                <img src="{{ asset('site/img/img2.jpg') }}" alt="image">
            </div><!--col-->
            <div class="image-col">
                <img src="{{ asset('site/img/img3.jpg') }}" alt="image">
            </div><!--col-->
            <div class="image-col">
                <img src="{{ asset('site/img/img4.jpg') }}" alt="image">
            </div><!--col-->
            <div class="image-col">
                <img src="{{ asset('site/img/img5.jpg') }}" alt="image">
            </div><!--col-->
            <div class="image-col">
                <img src="{{ asset('site/img/img6.jpg') }}" alt="image">
            </div><!--col-->
            <div class="image-col">
                <img src="{{ asset('site/img/img7.jpg') }}" alt="image">
            </div><!--col-->
            <div class="image-col">
                <img src="{{ asset('site/img/img1.jpg') }}" alt="image">
            </div><!--col-->
            <div class="image-col">
                <img src="{{ asset('site/img/img2.jpg') }}" alt="image">
            </div><!--col-->
            <div class="image-col">
                <img src="{{ asset('site/img/img3.jpg') }}" alt="image">
            </div><!--col-->
            <div class="image-col">
                <img src="{{ asset('site/img/img4.jpg') }}" alt="image">
            </div><!--col-->
            <div class="image-col">
                <img src="{{ asset('site/img/img5.jpg') }}" alt="image">
            </div><!--col-->
            <div class="image-col">
                <img src="{{ asset('site/img/img6.jpg') }}" alt="image">
            </div><!--col-->
            <div class="image-col">
                <img src="{{ asset('site/img/img7.jpg') }}" alt="image">
            </div><!--col-->
        </div><!--row-->

        <div class="row images-btn">
            <div class="col-md-9 mx-auto">
                <button type="button" class="btn btn-primary btn-block hover-black">
                    <span>حفظ</span>
                </button>
            </div>
        </div>
    </div><!--modal-->
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#specialRequestForm').ajaxForm({
                success: function (res) {
                    $('#specialRequestForm')[0].reset();
                    toastr["success"](res.message);
                    $('.close-modal').trigger('click');
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

            $('#adsForm').ajaxForm({
                success: function (res) {
                    $('#adsForm')[0].reset();
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
