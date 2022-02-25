@extends('layouts.site')

@section('css')
@endsection

@section('content')
    <div class="page-container mx-auto">
        <form id="profileForm" action="{{route('editor.updateProfile')}}" method="POST" class="form-gray tall-form">
            {{csrf_field()}}
            <div class="form-group">
                <div class="avatar-img">
                    <img src="{{ $editor->image_path }}"
                         class="img" alt="image">
                    <img src="{{ asset('site/img/camera-icon.svg') }}" class="icon" alt="image">
                    <input type="file" class="file-img" name="image" value="{{$editor->image}}">
                </div><!--avatar img-->
            </div>

            <div class="form-group">
                <label for="name">
                    اسم المحرر
                    <span class="text-red">*</span>
                </label>
                <input id="name" name="name" value="{{$editor->name}}" type="text" class="form-control"
                       placeholder="اسم المحرر">
            </div><!--form group-->

            <div class="form-group">
                <label for="email">
                    البريد الالكتروني
                    <span class="text-red">*</span>
                </label>
                <input id="email" name="email" value="{{$editor->email}}" type="text" class="form-control"
                       placeholder="البريد الالكتروني">
            </div><!--form group-->

            <div class="col-md-6 mx-auto">
                <button type="submit" class="btn btn-primary hover-black btn-block">
                    <span>حفظ</span>
                </button>
            </div>
        </form>
    </div><!--page container-->
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#profileForm').ajaxForm({
                success: function (res) {
                    // $('#profileForm')[0].reset();
                    toastr["success"](res.message);
                    window.location.reload();
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
