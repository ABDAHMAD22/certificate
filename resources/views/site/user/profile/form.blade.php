@extends('layouts.site')

@section('css')
@endsection

@section('content')
    <div class="page-container mx-auto">
        <form id="profileForm" action="{{route('user.updateProfile')}}" method="POST" class="form-gray tall-form">
            {{csrf_field()}}

            @if(!$user->is_completed)
                <div class="alert alert-info text-center mb-3">الرجاء قم باكمال ملفك الشخصي لكي تتمكن من رؤية باقي
                    الخدمات
                </div>
            @endif

            <div class="form-group user-avatar">
                <div class="avatar-img">
                    <img src="{{ $user->image_path }}"
                         class="img" alt="image">
                    <img src="{{ asset('site/img/camera-icon.svg') }}" class="icon" alt="image">
                    <input type="file" class="file-img" name="image" value="{{$user->image}}">
                </div><!--avatar img-->
            </div>

            <div class="col-md-6 mx-auto">
                <div class="member-box">
                    <img src="{{ asset('site/img/member-star-icon.svg') }}" alt="image"/>
                    <span class="member-text">رقم العضوية</span>
                    <span class="member-number">{{$user->id}}</span>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">
                            اسم المؤسسة/المركز/المعهد
                            <span class="text-red">*</span>
                        </label>
                        <input id="name" name="name" value="{{$user->name}}" type="text" class="form-control"
                               placeholder="اسم المؤسسة">
                    </div><!--form group-->
                </div><!--col-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name_en">الاسم بالانجليزية</label>
                        <input id="name_en" type="text" name="name_en" value="{{$user->name_en}}" class="form-control"
                               placeholder="الاسم بالانجليزية">
                    </div><!--form group-->
                </div><!--col-->
            </div><!--row-->

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">
                            البريد الالكتروني
                            <span class="text-red">*</span>
                        </label>
                        <input id="email" name="email" value="{{$user->email}}" type="text" class="form-control"
                               placeholder="البريد الالكتروني">
                    </div><!--form group-->
                </div><!--col-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mobile">
                            رقم الجوال
                            <span class="text-red">*</span>
                        </label>
                        <input id="mobile" name="mobile" value="{{$user->mobile}}" type="text" class="form-control"
                               placeholder="رقم الجوال">
                    </div><!--form group-->
                </div><!--col-->
            </div><!--row-->

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="country">
                            الدولة
                            <span class="text-red">*</span>
                        </label>
                        <select id="country" name="country_id" class="select-css">
                            @foreach($countries as $item)
                                <option
                                    {{$item->id == $user->country_id ? 'selected':''}} value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div><!--col-->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="city">
                            المدينة
                            <span class="text-red">*</span>
                        </label>
                        <select id="city" name="city_id" class="select-css" data-selected="{{$user->city_id}}">
                            {{--                            @foreach($cities as $item)--}}
                            {{--                                <option--}}
                            {{--                                    {{$item->id == $user->city_id ? 'selected':''}} value="{{$item->id}}">{{$item->name}}</option>--}}
                            {{--                            @endforeach--}}
                        </select>
                    </div>
                </div><!--col-->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="region">
                            المنطقة
                            <span class="text-red">*</span>
                        </label>
                        <input id="region" name="region" value="{{$user->region}}" type="text" class="form-control"
                               placeholder="المنطقة">
                    </div><!--form group-->
                </div><!--col-->
            </div><!--row-->

            <div class="form-group">
                <label for="manager_name">
                    اسم مدير المركز
                    <span class="text-red">*</span>
                </label>
                <input id="manager_name" name="manager_name" value="{{$user->manager_name}}" type="text"
                       class="form-control"
                       placeholder="اسم مدير المركز">
            </div><!--form group-->

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="training_licence">
                            رخصة التدريب
                            <span class="text-red">*</span>
                        </label>
                        <div class="form-control group-gray group-file">
                            <span class="group-text text-truncate">رخصة التدريب</span>
                            <button type="button" class="btn btn-group-gray btn-primary hover-black">
                                <span>اختر</span>
                                <input id="training_licence" name="training_licence" value="{{$user->training_licence}}"
                                       type="file"
                                       class="file-input-group">
                            </button>
                        </div><!--form control-->
                    </div><!--form group-->
                </div><!--col-->

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="commercial_register">
                            السجل التجاري
                            <span class="text-red">*</span>
                        </label>
                        <div class="form-control group-gray group-file">
                            <span class="group-text text-truncate">السجل التجاري</span>
                            <button type="button" class="btn btn-group-gray btn-primary hover-black">
                                <span>اختر</span>
                                <input id="commercial_register" name="commercial_register"
                                       value="{{$user->commercial_register}}" type="file"
                                       class="file-input-group">
                            </button>
                        </div><!--form control-->
                    </div><!--form group-->
                </div><!--col-->
            </div><!--row-->

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="training_licence_no">
                            رقم رخصة التدريب
                            <span class="text-red">*</span>
                        </label>
                        <input id="training_licence_no" name="training_licence_no"
                               value="{{$user->training_licence_no}}" type="text" class="form-control">
                    </div><!--form group-->
                </div><!--col-->

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="commercial_register_no">
                            رقم السجل التجاري
                            <span class="text-red">*</span>
                        </label>
                        <input id="commercial_register_no" name="commercial_register_no"
                               value="{{$user->commercial_register_no}}" type="text"
                               class="form-control">
                    </div><!--form group-->
                </div><!--col-->
            </div><!--row-->

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account_manager">
                            المسؤول عن الحساب
                            <span class="text-red">*</span>
                        </label>
                        <input id="account_manager" name="account_manager" value="{{$user->account_manager}}"
                               type="text" class="form-control">
                    </div><!--form group-->
                </div><!--col-->

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account_manager_mobile">
                            جوال المسؤول عن الحساب
                            <span class="text-red">*</span>
                        </label>
                        <input id="account_manager_mobile" name="account_manager_mobile"
                               value="{{$user->account_manager_mobile}}" type="text"
                               class="form-control">
                    </div><!--form group-->
                </div><!--col-->
            </div><!--row-->

            <div class="form-group">
                <label for="account_manager_email">
                    البريد الالكتروني للمسؤول عن الحساب
                    <span class="text-red">*</span>
                </label>
                <input id="account_manager_email" name="account_manager_email" value="{{$user->account_manager_email}}"
                       type="text" class="form-control">
            </div><!--form group-->

            <div class="social-box">
                <h4 class="text-center social-title">وسائل التواصل الاجتماعي</h4>

                <div class="input-group-btn-circle">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type">
                                    نوع الحساب
                                </label>
                                <select id="type" class="select-css">
                                    <option value="">اختر</option>
                                    @foreach(\App\User::SOCIAL_ACCOUNTS_LIST as $key=>$item)
                                        <option value="{{$key}}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!--col-->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="link">
                                    الرابط
                                </label>
                                <input id="link" type="text" class="form-control">
                            </div><!--form group-->
                        </div><!--col-->
                    </div><!--row-->
                    <button type="button" class="btn btn-primary hover-black input-btn btn-plus-social">
                        <svg width="18px" height="18px" viewBox="0 0 18 18" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round"
                               stroke-linejoin="round">
                                <g transform="translate(-703.000000, -922.000000)" stroke="#FFFFFF" stroke-width="1.3">
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
                </div><!--inout group plus-->

                <table class="table table-hover custom-table mb-0 table-social display-none">
                    <thead>
                    <tr>
                        <th scope="col">نوع الحساب</th>
                        <th scope="col">الرابط</th>
                        <th scope="col" class="tbl-action"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($user->social_links)
                        @foreach($user->social_links as $key=>$item)
                            @if($item)
                                <tr>
                                    <td>
                                        <span>{{trans('app.'.$key)}}</span>
                                    </td>
                                    <td>
                                        <a class="link-primary" target="_blank"
                                           href="{{$item}}">الرابط</a>
                                        <input type="hidden" name="social_links[{{$key}}]" value="{{$item}}">
                                    </td>
                                    <td>
                                     <span class="table-delete social-delete">
                                        <svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                             class="svg-inline--fa fa-trash-alt fa-w-14 fa-7x">
                                            <path fill="currentColor"
                                                  d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path>
                                        </svg>
                                    </span>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div><!--social box-->

            <div class="col-md-6 mx-auto">
                <button type="submit" class="btn btn-primary btn-block">
                    <span>حفظ</span>
                </button>
            </div>
        </form>
    </div><!--page container-->
@endsection

@section('js')
    <script>
        let $social_links = {!! json_encode($user->social_links) !!};
        let $social_accounts = {!! json_encode(\App\User::SOCIAL_ACCOUNTS_LIST) !!};

        $(document).ready(function () {
            $('#profileForm').ajaxForm({
                success: function (res) {
                    // $('#profileForm')[0].reset();
                    toastr["success"](res.message);
                    window.location.reload();
                },
                error: function (res) {
                    if (res.status === 422) {
                        window.showFormErrors(res);
                    }
                    if (res.responseJSON && res.responseJSON.hasOwnProperty('message')) {
                        toastr["error"](res.responseJSON.message);
                    }
                    if (res.status === 413) {
                        toastr["error"]("يرجى ارفاق صورة اصغر حجما");
                    }
                },
                beforeSubmit: function () {
                    $('.msg.text-danger').remove();
                }
            });
        });

        function getCities($val) {
            $.ajax({
                url: `/country/${$val}`,
                success: function (res) {
                    let $countries = res.data;
                    $('#city').html('');
                    $countries.forEach(function (x) {
                        let $option = `<option value="${x.id}">${x.name}</option>`;
                        if ($('#city').attr('data-selected') == x.id) {
                            $option = `<option selected='' value="${x.id}">${x.name}</option>`;
                        }
                        $('#city').append($option);
                    });
                },
                dataType: 'JSON'
            });
        }

        $(document).on('change', '#country', function () {
            getCities($(this).val());
        });

        if ($('#country').val()) {
            getCities($('#country').val());
        }

        if (Object.keys($social_links).length) {
            $('.table-social').removeClass('display-none');
        }

        function socialValidation() {
            $('#type').parents('.form-group').find('.msg.text-danger').remove();
            $('#link').parents('.form-group').find('.msg.text-danger').remove();
            if (!$('#type').val()) {
                $('#type').parents('.form-group').append('<span class="msg text-danger">حقل نوع الحساب مطلوب</span>')
            }
            if (!$('#link').val()) {
                $('#link').parents('.form-group').append('<span class="msg text-danger">حقل الرابط مطلوب</span>')
            }
            return false;
        }

        function setObjectSocial(type, link) {
            $social_links[type] = link;
        }

        function renderSocialHtml() {
            $('.table-social>tbody').html('');
            for (let i = 0; i < Object.keys($social_links).length; i++) {
                let $key = Object.keys($social_links)[i];
                let $value = $social_links[$key];
                let $row = `<tr>
                        <td>
                            <span>${$social_accounts[$key]}</span>
                        </td>
                        <td>
                            <a class="link-primary" target="_blank"
                               href="${$value}">الرابط</a>
                            <input type="hidden" name="social_links[${$key}]" value="${$value}">
                        </td>
                        <td>
                             <span class="table-delete social-delete">
                                <svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                     class="svg-inline--fa fa-trash-alt fa-w-14 fa-7x">
                                    <path fill="currentColor"
                                          d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path>
                                </svg>
                            </span>
                        </td>
                    </tr>`;
                $('.table-social>tbody').append($row);
            }
            // $social_links.forEach((x, i) => {
            //     console.log(x,i);
            //     let $item = `<tr>
            //         <td>
            //             <span>${$social_accounts[x]}</span>
            //         </td>
            //         <td>
            //             <a class="link-primary" target="_blank"
            //                href="${i}">الرابط</a>
            //             <input type="hidden" name="social_links[${x}]" value="${i}">
            //         </td>
            //         <td>
            //              <span class="table-delete social-delete">
            //                 <svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
            //                      class="svg-inline--fa fa-trash-alt fa-w-14 fa-7x">
            //                     <path fill="currentColor"
            //                           d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path>
            //                 </svg>
            //             </span>
            //         </td>
            //     </tr>`;
            //     $('.table-social>tbody').append($item);
            // });
        }

        $(document).on('click', '.btn-plus-social', function () {
            let $type = $('#type');
            let $link = $('#link');
            socialValidation();
            setObjectSocial($type.val(), $link.val());
            renderSocialHtml();
            $type.val('');
            $link.val('');
            return false;
        });

        $(document).on('change', '#type', function () {
            let $key = $(this).val();
            let $value = $social_links[$key];
            $('#link').val($value);
            return false;
        });
        $(document).on('click', '.social-delete', function () {
            if (confirm('هل أنت متأكد من العملية')) {
                $(this).parents('tr').remove();
            }
            return false;
        });
    </script>
@endsection
