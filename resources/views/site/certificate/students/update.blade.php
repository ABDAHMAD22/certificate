@extends('layouts.site')

@section('css_files')
    <link href="{{ asset('site/js/hijri-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
@endsection

@section('js_files')
    <script src="{{ asset('site/js/hijri-datetimepicker/js/bootstrap-hijri-datetimepicker.min.js') }}"></script>
@endsection

@section('content')
    <div class="page-container mx-auto">
        <form id="updateStudentForm" action="{{route('student.doUpdate', ['certificateStudent'=>$certificateStudent])}}"
              method="POST" class="form-gray tall-form">
            {{csrf_field()}}

            <div class="mt-3">
                <h4 class="text-black pb-3">تحديث المعلومات</h4>

                <div class="user-fields-box mt-2 students-fields">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    اسم المتدرب/ة
                                    <span class="text-red">*</span>
                                </label>
                                <input id="name" name="name" type="text" value="{{$certificateStudent->name}}" class="form-control input-required">
                            </div><!--form group-->
                        </div><!--col-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_no">
                                    رقم الهوية / جواز السفر
                                </label>
                                <input id="id_no" name="id_no" type="text" value="{{$certificateStudent->id_no}}" class="form-control input-required">
                            </div><!--form group-->
                        </div><!--col-->

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">
                                    البريد الإلكتروني للمتدرب/ة(إختياري)
                                </label>
                                <input id="email" name="email" type="text" value="{{$certificateStudent->email}}" class="form-control">
                            </div><!--form group-->
                        </div><!--col-->
                    </div><!--row-->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">
                                    العنوان
                                    <span class="text-red">*</span>
                                </label>
                                <input id="title" name="title" type="text" class="form-control" placeholder="العنوان"
                                       value="{{$certificateStudent->title}}">
                            </div><!--form group-->
                        </div><!--col-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subtitle">العنوان الفرعي(إختياري)</label>
                                <input id="subtitle" name="subtitle" type="text" class="form-control"
                                       placeholder="العنوان الفرعي" value="{{$certificateStudent->subtitle}}">
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
                                    <input type="radio" class="radio-input" name="date_type" value="1"
                                        {{$certificateStudent->date_type == 1 ? 'checked':''}}>
                                    <span></span>
                                </span>
                                        <span class="radio-text">ميلادي</span>
                                    </label>

                                    <label class="radio-form">
                                <span class="radio-style">
                                    <input type="radio" class="radio-input" name="date_type" value="2"
                                        {{$certificateStudent->date_type == 2 ? 'checked':''}}>
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
                                                       class="form-control text-right {{$certificateStudent->date_type == 1 ? '':'d-none'}} datepicker-input datepicker-notHijri-start"
                                                       placeholder="تاريخ البداية" autocomplete="off"
                                                       value="{{$certificateStudent->start_date}}">
                                                <input type="text"
                                                       class="form-control text-right {{$certificateStudent->date_type == 2 ? '':'d-none'}} datepicker-input datepicker-hijri-start"
                                                       placeholder="تاريخ البداية" autocomplete="off"
                                                       value="{{$certificateStudent->start_date}}">
                                                <input type="hidden" class="datepicker-hidden-start" name="start_date"
                                                       value="{{$certificateStudent->start_date ? $certificateStudent->start_date->format('Y-m-d') : ''}}">
                                                <i class="icon"></i>
                                            </div>
                                        </div><!--col-->
                                        <div class="col-md-6">
                                            <div class="input-datepicker">
                                                <input type="text"
                                                       class="form-control text-right {{$certificateStudent->date_type == 1 ? '':'d-none'}} datepicker-input datepicker-notHijri-end"
                                                       placeholder="تاريخ الانتهاء" autocomplete="off"
                                                       value="{{$certificateStudent->end_date}}">
                                                <input type="text"
                                                       class="form-control text-right {{$certificateStudent->date_type == 2 ? '':'d-none'}} datepicker-input datepicker-hijri-end"
                                                       placeholder="تاريخ الانتهاء" autocomplete="off"
                                                       value="{{$certificateStudent->end_date}}">
                                                <input type="hidden" class="datepicker-hidden-end" name="end_date"
                                                       value="{{$certificateStudent->end_date ? $certificateStudent->end_date->format('Y-m-d') : ''}}">
                                                <i class="icon"></i>
                                            </div>
                                        </div><!--col-->
                                    </div><!--row-->
                                </div><!--col-->
                            </div><!--row-->
                        </div>
                    </div><!--form group-->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hours_no">
                                    عدد الأيام
                                    <span class="text-red">*</span>
                                </label>
                                <input id="days_no" name="days_no" type="text" class="form-control"
                                       placeholder="عدد الأيام"
                                       value="{{$certificateStudent->days_no}}">
                            </div><!--form group-->
                        </div><!--col-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hours_no">
                                    عدد الساعات
                                    <span class="text-red">*</span>
                                </label>
                                <input id="hours_no" name="hours_no" type="text" class="form-control"
                                       placeholder="عدد الساعات"
                                       value="{{$certificateStudent->hours_no}}">
                            </div><!--form group-->
                        </div><!--col-->
                    </div><!--row-->

                    <div class="form-group">
                        <label for="trainer_name">
                            اسم المدرب\ة(إختياري)
                        </label>
                        <input id="trainer_name" name="trainer_name" type="text" class="form-control"
                               placeholder="اسم المدرب\ة"
                               value="{{$certificateStudent->trainer_name}}">
                    </div><!--form group-->
                </div><!--user fields box-->
            </div>

            <div class="col-md-6 mx-auto">
                <button type="submit" class="btn btn-primary hover-black btn-lg btn-block">
                    <span>حفظ</span>
                </button>
            </div>
        </form>
    </div><!--page container-->
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#updateStudentForm').ajaxForm({
                success: function (res) {
                    toastr["success"](res.message);
                    window.location.href = res.route;
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
