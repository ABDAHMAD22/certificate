@extends('layouts.site')

@section('css_files')
    <link href="{{ asset('site/js/hijri-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/js/croppie/croppie.css') }}" rel="stylesheet">
@endsection

@section('js_files')
    <script src="{{ asset('site/js/hijri-datetimepicker/js/bootstrap-hijri-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('site/js/croppie/croppie.min.js') }}"></script>
@endsection

@section('content')
    <div class="page-container mx-auto">
        @if($is_update || \App\User::hasAds())
            <form id="adsForm" action="{{$save_route}}" method="POST" class="form-gray tall-form">
                {{csrf_field()}}
                <div class="form-group">
                    <label>
                        اختر القالب المناسب
                    </label>
                    <div class="row templates-row">
                        @foreach($templates as $key=>$item)
                            <div class="col-sm-4">
                                <div class="template-img">
                                    <img src="{{ Storage::url($item->image)}}" alt="image">
                                    <input type="radio" class="template-radio" name="template_id" value="{{$item->id}}"
                                        {{$is_add && $key==0 ? 'checked':''}}
                                        {{$is_update && $item->id == $ads->template_id ? 'checked':''}}>
                                    <span class="template-layer"></span>
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
                            <input id="title" name="title" type="text" class="form-control"
                                   placeholder="العنوان"
                                   value="{{$ads->title}}">
                        </div><!--form group-->
                    </div><!--col-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="subtitle">العنوان الفرعي(إختياري)</label>
                            <input id="subtitle" name="subtitle" type="text" class="form-control"
                                   placeholder="العنوان الفرعي" value="{{$ads->subtitle}}">
                        </div><!--form group-->
                    </div><!--col-->
                </div><!--row-->

                <div class="form-group">
                    <label for="trainer_name">
                        اسم المدرب\ة
                        <span class="text-red">*</span>
                    </label>
                    <input id="trainer_name" name="trainer_name" type="text"
                           class="form-control"
                           placeholder="اسم المدرب"
                           value="{{$ads->trainer_name}}">
                </div><!--form group-->

                <div class="form-group">
                    <label for="trainer_about">
                        نبذة تعريفية عن المدرب\ة(إختياري)
                    </label>
                    <textarea class="form-control" name="trainer_about" maxlength="35" id="trainer_about" cols="30"
                              rows="10"
                              placeholder="لقب المدرب ، يُوضع تحت اسمه (عدد الحروف 35)">{{$ads->trainer_about}}</textarea>
                </div><!--form group-->

                <div class="form-group">
                    <label>
                        صورة معبرة
                    </label>
                    <div class="form-control group-gray group-file">
                        <span class="group-text text-truncate">اختار الصورة المناسبة</span>
                        <button type="button"
                                class="btn btn-group-gray btn-primary-transparent hover-black black-button btn-album-modal mx-2">
                            <span>اختر صورة</span>
                            <input type="hidden" id="media_id" name="media_id" value="{{$ads->media_id}}">
                        </button>
                        <button type="button" class="btn btn-group-gray btn-primary hover-black">
                            <span>اختر ملف</span>
                            <input type="file" name="attached_image" id="attached_file" class="file-input-group">
                        </button>
                    </div><!--form control-->
                    <span class="pt-2 d-table text-info">أبعاد الصورة المناسبة 400x400</span>
                </div><!--form group-->

                <div class="crop-wrap-region display-none">
                    <div id="crop-wrap"></div>
                </div><!--crop wrap region-->

                <div class="form-group">
                    <label for="certificate_type_id">
                        نوع الإعلان
                        <span class="text-red">*</span>
                    </label>
                    <select id="ads_type_id" name="ads_type_id" class="select-css">
                        @foreach($adsTypes as $item)
                            <option value="{{$item->id}}"
                                {{$is_update && $item->id == $ads->ads_type_id ? 'selected':''}}>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="axes_input">
                                المحاور(إختياري)
                            </label>
                            <div class="input-group-btn-circle">
                                <input id="axes_input" maxlength="46" type="text" class="form-control"
                                       placeholder="حد أقصى 8 محاور">
                                <button type="button" class="btn btn-primary hover-black input-btn btn-plus-axes">
                                    <svg width="18px" height="18px" viewBox="0 0 18 18" version="1.1"
                                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                           stroke-linecap="round" stroke-linejoin="round">
                                            <g transform="translate(-703.000000, -922.000000)" stroke="#FFFFFF"
                                               stroke-width="1.3">
                                                <g transform="translate(693.000000, 883.000000)">
                                                    <g transform="translate(0.000000, 29.000000)">
                                                        <path d="M19,11.4 L19,26.6 M11.4,19 L26.6,19"
                                                              transform="translate(19.000000, 19.000000) rotate(-270.000000) translate(-19.000000, -19.000000) "></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </div><!--form group-->
                        <ol class="axes-list">
                            @foreach($ads->contents as $item)
                                <li class="form-group">
                                    <div class="input-group-btn-circle">
                                        <div class="form-control input-show">{{$item->title}}</div>
                                        <input type="hidden" name="contents[]" class="form-control" readonly
                                               value="{{$item->title}}">
                                        <button type="button" class="btn btn-danger input-btn btn-minus-axes">
                                            <svg width="12" role="img" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 448 512"
                                                 class="svg-inline--fa fa-trash-alt fa-w-14 fa-7x">
                                                <path fill="currentColor"
                                                      d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </li>
                            @endforeach
                        </ol><!--axes list-->
                    </div><!--col-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="feature_input">
                                المميزات(إختياري)
                            </label>
                            <div class="input-group-btn-circle">
                                <input id="feature_input" maxlength="40" type="text" class="form-control"
                                       placeholder="حد أقصى 4 مميزات">
                                <button type="button" class="btn btn-primary hover-black input-btn btn-plus-feature">
                                    <svg width="18px" height="18px" viewBox="0 0 18 18" version="1.1"
                                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                           stroke-linecap="round" stroke-linejoin="round">
                                            <g transform="translate(-703.000000, -922.000000)" stroke="#FFFFFF"
                                               stroke-width="1.3">
                                                <g transform="translate(693.000000, 883.000000)">
                                                    <g transform="translate(0.000000, 29.000000)">
                                                        <path d="M19,11.4 L19,26.6 M11.4,19 L26.6,19"
                                                              transform="translate(19.000000, 19.000000) rotate(-270.000000) translate(-19.000000, -19.000000) "></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </div><!--form group-->
                        <ol class="features-list">
                            @foreach($ads->features as $item)
                                <li class="form-group">
                                    <div class="input-group-btn-circle">
                                        <div class="form-control input-show">{{$item->title}}</div>
                                        <input type="hidden" name="features[]" class="form-control" readonly
                                               value="{{$item->title}}">
                                        <button type="button" class="btn btn-danger input-btn btn-minus-feature">
                                            <svg width="12" role="img" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 448 512"
                                                 class="svg-inline--fa fa-trash-alt fa-w-14 fa-7x">
                                                <path fill="currentColor"
                                                      d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </li>
                            @endforeach
                        </ol><!--features list-->
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
                                    <input type="radio" class="radio-input" name="date_type" value="1"
                                        {{$is_add ? 'checked':''}}
                                        {{$is_update && $ads->date_type == 1 ? 'checked':''}}>
                                    <span></span>
                                </span>
                                    <span class="radio-text">ميلادي</span>
                                </label>

                                <label class="radio-form">
                                <span class="radio-style">
                                    <input type="radio" class="radio-input" name="date_type" value="2"
                                        {{$is_update && $ads->date_type == 2 ? 'checked':''}}>
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
                                                   class="form-control text-right {{$is_add || $is_update && $ads->date_type == 1 ? '':'d-none'}} datepicker-input datepicker-notHijri-start"
                                                   placeholder="تاريخ البداية" autocomplete="off"
                                                   value="{{$ads->start_date}}">
                                            <input type="text"
                                                   class="form-control text-right {{$is_add ? 'd-none':''}} {{$is_update && $ads->date_type == 2 ? '':'d-none'}} datepicker-input datepicker-hijri-start"
                                                   placeholder="تاريخ البداية" autocomplete="off"
                                                   value="{{$ads->start_date}}">
                                            <input type="hidden" class="datepicker-hidden-start" name="start_date"
                                                   value="{{$ads->start_date ? $ads->start_date->format('Y-m-d') : ''}}">
                                            <i class="icon"></i>
                                        </div>
                                    </div><!--col-->
                                    <div class="col-md-6">
                                        <div class="input-datepicker">
                                            <input type="text"
                                                   class="form-control text-right {{$is_add || $is_update && $ads->date_type == 1 ? '':'d-none'}} datepicker-input datepicker-notHijri-end"
                                                   placeholder="تاريخ الانتهاء" autocomplete="off"
                                                   value="{{$ads->end_date}}">
                                            <input type="text"
                                                   class="form-control text-right {{$is_add ? 'd-none':''}} {{$is_update && $ads->date_type == 2 ? '':'d-none'}} datepicker-input datepicker-hijri-end"
                                                   placeholder="تاريخ الانتهاء" autocomplete="off"
                                                   value="{{$ads->end_date}}">
                                            <input type="hidden" class="datepicker-hidden-end" name="end_date"
                                                   value="{{$ads->end_date ? $ads->end_date->format('Y-m-d') : ''}}">
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
                    <input id="hours_no" name="hours_no" type="text" class="form-control"
                           placeholder="مثال : 25"
                           value="{{$ads->hours_no}}">
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
                                        <option value="{{$item}}">{{$ads::getTimeTextRTL($item)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!--col-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group-btn-circle">
                                    <select id="end_time" class="select-css">
                                        @foreach($times as $item)
                                            <option value="{{$item}}">{{$ads::getTimeTextRTL($item)}}</option>
                                        @endforeach
                                    </select>

                                    <button type="button" class="btn btn-primary hover-black input-btn btn-add-time">
                                        <svg width="18px" height="18px" viewBox="0 0 18 18" version="1.1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                               stroke-linecap="round" stroke-linejoin="round">
                                                <g transform="translate(-703.000000, -922.000000)" stroke="#FFFFFF"
                                                   stroke-width="1.3">
                                                    <g transform="translate(693.000000, 883.000000)">
                                                        <g transform="translate(0.000000, 29.000000)">
                                                            <path d="M19,11.4 L19,26.6 M11.4,19 L26.6,19"
                                                                  transform="translate(19.000000, 19.000000) rotate(-270.000000) translate(-19.000000, -19.000000) "></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div><!--col-->
                    </div><!--row-->
                    <div class="times-list">
                        @foreach($ads->times as $key=>$item)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" readonly
                                               value="{{$ads::getTimeTextRTL($item->from)}}">
                                        <input type="hidden" name="times[{{$key}}][from]" class="form-control" readonly
                                               value="{{$item->from}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group-btn-circle">
                                            <input type="text" class="form-control" readonly
                                                   value="{{$ads::getTimeTextRTL($item->to)}}">
                                            <input type="hidden" name="times[{{$key}}][to]" class="form-control"
                                                   readonly value="{{$item->to}}">
                                            <button type="button" class="btn btn-danger input-btn btn-remove-time">
                                                <svg width="12" role="img" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 448 512"
                                                     class="svg-inline--fa fa-trash-alt fa-w-14 fa-7x">
                                                    <path fill="currentColor"
                                                          d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div><!--times list-->
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">
                                السعر
                                <span class="text-red">*</span>
                            </label>
                            <input id="price" name="price" maxlength="4" type="text" class="form-control"
                                   placeholder="مثال: 140"
                                   value="{{$ads->price}}">
                        </div><!--form group-->
                    </div><!--col-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="place">
                                المكان
                                <span class="text-red">*</span>
                            </label>
                            <input id="place" name="place" type="text" class="form-control"
                                   placeholder="مثال : اونلاين ، اسم قاعة فندقية"
                                   value="{{$ads->place}}">
                        </div><!--form group-->
                    </div><!--col-->
                </div><!--row-->


                <div class="form-group">
                    <label for="mobile_inquiry">
                        رقم الاستفسار في الإعلان
                        <span class="text-red">*</span>
                    </label>
                    <input id="mobile_inquiry" name="mobile" type="text" class="form-control"
                           placeholder="رقم الاتصال بالمدرب/ة"
                           value="{{$ads->mobile}}">
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
                                           value="{{$item->id}}"
                                           {{$is_add && $key==0 ? 'checked':''}}
                                        {{$is_update && $item->id == $ads->target_id ? 'checked':''}}>
                                    <span></span>
                                </span>
                                <span class="radio-text">{{$item->name}}</span>
                            </label>
                        @endforeach
                    </div>
                </div><!--form group-->

                {{--                <div class="form-group">--}}
                {{--                    <label for="font">--}}
                {{--                        نوع الخط--}}
                {{--                        <span class="text-red">*</span>--}}
                {{--                    </label>--}}
                {{--                    <select id="font" name="font_id" class="select-css">--}}
                {{--                        @foreach($fonts as $item)--}}
                {{--                            <option value="{{$item->id}}"--}}
                {{--                                {{$is_update && $item->id == $ads->font_id ? 'selected':''}}>{{$item->name}}</option>--}}
                {{--                        @endforeach--}}
                {{--                    </select>--}}
                {{--                </div>--}}

                <div class="row">
                    <div class="col-md-6">
                        <button type="submit"
                                name="preview"
                                class="btn btn-primary-transparent black-button hover-black btn-sm btn-block">
                            <span>معاينة</span>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit"
                                name="save"
                                class="btn btn-primary hover-black btn-sm btn-block">
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

    <div id="album-modal" class="modal images-modal">
        <ul class="list-unstyled tabs-list tabs-event">
            @foreach($albums as $key=>$item)
                <li class="{{$key==0?'active':''}}">
                    <a href="#" class="btn-tab">
                        <span>{{ $item->name }}</span>
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="tabs-region">
            @foreach($albums as $key=>$item)
                <div class="tab-item {{$key==0?'active':''}}">
                    <div class="images-row">
                        @foreach($item->getMedia('images') as $k=>$media)
                            <div class="image-col">
                                <img src="{{ $media->getUrl() }}" data-id="{{$media->id}}"
                                     class="media-item {{$ads->media_id==$media->id?'active':''}}" alt="image">
                            </div><!--col-->
                        @endforeach
                    </div><!--row-->
                </div><!--tab item-->
            @endforeach
        </div><!--tabs region-->
    </div><!--modal-->
@endsection

@section('js')
    <script>
        let $axes = {!! json_encode($ads->contents->pluck('title')) !!};
        let $features = {!! json_encode($ads->features->pluck('title')) !!};
        let $times = {!! json_encode($ads->times) !!};

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
                    // $('#adsForm')[0].reset();
                    toastr["success"](res.message);
                    setTimeout(function () {
                        window.location.href = res.route;
                    }, 500);
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
                beforeSubmit: function (arr, $form, options) {
                    let $x = arr.find((x) => {
                        return x.name === 'attached_image'
                    });
                    $x.value = $hidden_image;
                    $('.msg.text-danger').remove();
                }
            });

            function renderAxesToList() {
                $('.axes-list').html('');
                $axes.forEach((x, i) => {
                    let $item = `<li class="form-group">
                                <div class="input-group-btn-circle">
                                    <div class="form-control input-show">${x}</div>
                                    <input type="hidden" name="contents[]" class="form-control" value="${x}">
                                    <button type="button" class="btn btn-danger input-btn btn-minus-axes">
                                        <svg width="12" role="img" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 448 512"
                                             class="svg-inline--fa fa-trash-alt fa-w-14 fa-7x">
                                            <path fill="currentColor"
                                                  d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </li>`;
                    $('.axes-list').append($item);
                });
            }

            $(document).on('click', '.btn-plus-axes', function () {
                let $axesList = $('.axes-list');
                let $value = $('#axes_input').val().trim();
                $('#axes_input').parents('.form-group').find('.msg.text-danger').remove();
                if (!$value) {
                    $('#axes_input').parents('.form-group').append('<span class="msg text-danger">حقل المحور مطلوب</span>')
                    return false;
                }
                if ($axesList.find('.form-group').length < 8) {
                    $axes.push($value);
                    renderAxesToList();
                } else {
                    toastr["error"]('العدد المتاح هو 8 محاور فقط');
                }
                $('#axes_input').val('');
                return false;
            });

            $(document).on('click', '.btn-minus-axes', function () {
                let $index = $(this).parents('.form-group').index();
                $axes.splice($index, 1);
                renderAxesToList();
                return false;
            });

            function renderFeaturesToList() {
                $('.features-list').html('');
                $features.forEach((x, i) => {
                    let $item = `<li class="form-group">
                                <div class="input-group-btn-circle">
                                    <div class="form-control input-show">${x}</div>
                                    <input type="hidden" name="features[]" class="form-control" readonly value="${x}">
                                    <button type="button" class="btn btn-danger input-btn btn-minus-feature">
                                        <svg width="12" role="img" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 448 512"
                                             class="svg-inline--fa fa-trash-alt fa-w-14 fa-7x">
                                            <path fill="currentColor"
                                                  d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </li>`;
                    $('.features-list').append($item);
                });
            }

            $(document).on('click', '.btn-plus-feature', function () {
                let $featuresList = $('.features-list');
                let $value = $('#feature_input').val().trim();
                $('#feature_input').parents('.form-group').find('.msg.text-danger').remove();
                if (!$value) {
                    $('#axes_input').parents('.form-group').append('<span class="msg text-danger">حقل الميزات مطلوب</span>')
                    return false;
                }
                if ($featuresList.find('.form-group').length < 4) {
                    $features.push($value);
                    renderFeaturesToList();
                } else {
                    toastr["error"]('العدد المتاح هو 4 مميزات فقط');
                }
                $('#feature_input').val('');
                return false;
            });

            $(document).on('click', '.btn-minus-feature', function () {
                let $index = $(this).parents('.form-group').index();
                $features.splice($index, 1);
                renderFeaturesToList()
                return false;
            });

            function getTimeText($time) {
                let $text = '';
                if ($time.includes("am")) {
                    $text = $time.replace("am", " ص ")
                } else {
                    $text = $time.replace("pm", " م ")
                }
                return $text;
            }

            function renderTimesToList() {
                $('.times-list').html('');
                $times.forEach((x, i) => {
                    let $item = `<div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" readonly value="${getTimeText(x.from)}">
                                    <input type="hidden" name="times[${i}][from]" class="form-control" readonly value="${x.from}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group-btn-circle">
                                        <input type="text" class="form-control" readonly value="${getTimeText(x.to)}">
                                        <input type="hidden" name="times[${i}][to]" class="form-control" readonly value="${x.to}">
                                        <button type="button" class="btn btn-danger input-btn btn-remove-time">
                                            <svg width="12" role="img" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 448 512"
                                                 class="svg-inline--fa fa-trash-alt fa-w-14 fa-7x">
                                                <path fill="currentColor"
                                                      d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    $('.times-list').append($item);
                });
            }

            $(document).on('click', '.btn-add-time', function () {
                let $timesList = $('.times-list');
                let $from = $('#start_time').val();
                let $to = $('#end_time').val();
                let $from_index = $('#start_time>option:selected').index();
                let $to_index = $('#end_time>option:selected').index();
                $timesList.find('.form-group').find('.msg.text-danger').remove();

                if ($timesList.find('.row').length >= 2) {
                    toastr["error"]('يمكنك اضافة موعدين فقط');
                    return false;
                }

                if ($to_index > $from_index) {
                    let $item = {
                        from: $from,
                        to: $to,
                    };
                    $times.push($item);
                    renderTimesToList();
                } else {
                    toastr["error"]('موعد نهاية العرض يجب ان يكون اكبر من بداية العرض');
                }
                return false;
            });

            $(document).on('click', '.btn-remove-time', function () {
                let $index = $(this).parents('.form-group').index();
                $times.splice($index, 1);
                renderTimesToList()
                return false;
            });
        });
    </script>
@endsection
