@extends('layouts.site')

@section('css')
@endsection

@section('content')
    <div class="page-container mx-auto">
        <form action="{{route('editor')}}" method="GET" class="staff-search form-gray">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                    <div class="form-group flex-grow-1 search-field position-relative">
                        <button type="submit" class="search-icon">
                            <img src="{{ asset('site/img/search.svg') }}" alt="image">
                        </button>
                        <input type="text" class="form-control" name="q" value="{{ request()->get('q') }}"
                               placeholder="ابحث">
                    </div>
                    <span class="text-primary">محرر ({{count($editors)}})</span>
                </div><!--col-->

                <div class="col-md-6 btns-editor-col">
                    <button type="button" class="btn offer btn-primary hover-black btn-block template-request">
                        <span class="txt">اضافة محرر</span>
                        <span class="hover"></span>
                    </button>
                    <button type="button" class="btn offer btn-primary-transparent btn-block editor-request">
                        <span class="txt">لطلب محرر خاص</span>
                        <span class="hover"></span>
                    </button>
                </div><!--col-->
            </div><!--row-->
        </form>

        @foreach($editors as $item)
            <div class="worker-card position-relative">
                <div class="row align-items-center">
                    <div class="col-md-5 d-flex align-items-center">
                        <div class="img-handler">
                            <img src="{{ $item->image_path }}" alt="image">
                        </div>
                        <div class="card-info">
                            <h3>{{$item->name}}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="email">{{$item->email}}</p>
                    </div>
                    <div class="col-md-3 custom-col">
                        @foreach($item->permits as $i)
                            <button type="button" class="btn-gray btn-block">
                                <span>{{$i->name}}</span>
                            </button>
                        @endforeach
                    </div>
                </div><!--row-->
                <button type="button" class="btn-editor-remove"
                        data-editor-url="{{route('editor.delete', ['editor'=>$item->id])}}">
                    <svg width="12" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                         class="svg-inline--fa fa-trash-alt fa-w-14 fa-7x">
                        <path fill="currentColor"
                              d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path>
                    </svg>
                </button>
            </div><!-- worker-card -->
        @endforeach

        {{$editors->links()}}
    </div><!--page container-->

    <div id="template-modal1" class="modal editor-modal">
        <form id="editorForm" action="{{route('editor.save')}}" method="POST" class="form-gray tall-form">
            {{csrf_field()}}

            <div class="form-group">
                <div class="avatar-img">
                    <img src="{{ asset('site/img/avatar-img.svg') }}" class="img" alt="image">
                    <img src="{{ asset('site/img/camera-icon.svg') }}" class="icon" alt="image">
                    <input type="file" class="file-img" name="image">
                </div><!--avatar img-->
            </div>

            <div class="form-group">
                <label for="name">
                    اسم المحرر
                </label>
                <input id="name" name="name" type="text" class="form-control" placeholder="ادخل اسم المحرر">
            </div><!--form group-->

            <div class="form-group">
                <label for="email">
                    البريد الالكتروني
                </label>
                <input id="email" name="email" type="text" class="form-control" placeholder="البريد الالكتروني">
            </div><!--form group-->

            <div class="form-group">
                <label>
                    إذن الصلاحية
                </label>
                <div class="permission">
                    @foreach($permits as $item)
                        <label for="{{$item->key}}" class="checkbox-field custom-label">
                            <div class="remember-checkbox">
                                <input type="checkbox" name="permits[]" value="{{$item->id}}" class="checkbox"
                                       id="{{$item->key}}">
                                <img src="{{ asset('site/img/checked.svg') }}" alt="image">
                            </div>
                            {{$item->name}}
                        </label>
                    @endforeach
                </div>
            </div><!--form group-->
            <button type="submit" class="btn btn-primary hover-black btn-block mt-lg-5">
                <span>اضافة</span>
            </button>
        </form>
    </div>

    <div id="request-editor-modal" class="modal">
        <h3 class="text-center xmodal-title">تواصل معنا لطلب المحرر الخاص بكم</h3>

        <form id="specialRequestForm" action="{{route('editor.specialRequest')}}" method="POST"
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

            $('#editorForm').ajaxForm({
                success: function (res) {
                    $('#editorForm')[0].reset();
                    toastr["success"](res.message);
                    window.location.reload();
                },
                error: function (res) {
                    window.handleCSRFError(res);
                    if (res.status === 422) {
                        window.showFormErrors(res);
                        if (Object.keys(res.responseJSON.errors).length === 1 && res.responseJSON.errors.hasOwnProperty('permits')) {
                            toastr["error"]('الرجاء اختيار إذن صلاحية');
                        } else {
                            toastr["error"](res.responseJSON.message);
                        }
                    } else {
                        toastr["error"](res.responseJSON.message);
                    }
                },
                beforeSubmit: function () {
                    $('.msg.text-danger').remove();
                }
            });

            $(document).on('click', '.btn-editor-remove', function () {
                let $this = $(this);
                let $url = $(this).attr('data-editor-url');
                if (confirm('هل أنت متأكد من العملية؟')) {
                    $.ajax({
                        url: $url,
                        success: function (res) {
                            toastr["success"](res.message);
                            $this.parents('.worker-card').remove();
                        },
                        dataType: 'JSON',
                        method: 'DELETE',
                    });
                }
                return false;
            });
        });
    </script>
@endsection
