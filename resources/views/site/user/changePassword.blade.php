@extends('layouts.site')

@section('css')
@endsection

@section('content')
    <div class="page-container mx-auto">
        <form id="changePasswordForm" action="{{route('changePassword')}}" method="POST" class="form-gray tall-form">
            {{csrf_field()}}

            <div class="row mt-4">
                <div class="col-md-12">
                    <h3 class="text-center pb-5">تغيير كلمة المرور</h3>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="current_password">
                            كلمة المرور الحالية
                        </label>
                        <input id="current_password" name="current_password" type="password" class="form-control"
                               placeholder="كلمة المرور الحالية">
                    </div><!--form group-->
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">
                            كلمة المرور
                        </label>
                        <input id="password" name="password" type="password" class="form-control"
                               placeholder="كلمة المرور">
                    </div><!--form group-->
                </div><!--col-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password_confirmation">تأكيد كلمة المرور</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control"
                               placeholder="تأكيد كلمة المرور">
                    </div><!--form group-->
                </div><!--col-->
            </div><!--row-->

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
            $('#changePasswordForm').ajaxForm({
                success: function (res) {
                    $('#changePasswordForm')[0].reset();
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
