<div id="special-request-modal" class="modal">
    <h3 class="text-center xmodal-title">تواصل معنا لطلب التصميم الخاص الخاص بكم</h3>

    <form id="specialRequestForm" action="{{route('special-design.specialRequest')}}" method="POST"
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

        <div class="form-group">
            <label for="details">
                التفاصيل
                <span class="text-red">*</span>
            </label>
            <textarea id="details" name="details" class="form-control" placeholder="التفاصيل"></textarea>
        </div><!--form group-->

        <button type="submit" class="btn btn-primary hover-black btn-block mt-lg-5">
            <span>ارسال الطلب</span>
        </button>
    </form>
</div>

@section('second_partial_js')
    <script>
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
    </script>
@endsection
