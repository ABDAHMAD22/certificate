@extends('layouts.site')

@section('css')
@endsection

@section('content')
    <div class="page-container packages-container mx-auto">
        <h3 class="mt-3 packages-title text-center">اشترك الآن واستمتع بالتجربة المجانية</h3>
        <div class="row">
            @foreach($packages as $item)
                @include('site.partials.package', [
                    'package' => $item
                ])
            @endforeach
        </div><!--row-->
    </div><!--page container-->

    <div id="subscription-modal" class="modal">
        <ul class="list-unstyled tabs-list tabs-event">
            <li class="active">
                <a href="#" class="btn-tab">
                    <span>التحويل البنكي</span>
                </a>
            </li>
            <li>
                <a href="#" class="btn-tab tab-clicked2 tab-payment">
                    <span>البطاقة الإلكترونية</span>
                </a>
            </li>
            <li>
                <a href="#" class="btn-tab">
                    <span>PayPal</span>
                </a>
            </li>
        </ul>

        <div class="tabs-region mt-lg-5">
            <div class="tab-item active">
                <form id="subscriptionForm" method="POST" action="#" class="form-gray tall-form">
                    <div class="form-group">
                        <label for="bank_id">
                            اختر الحساب الذي تريد التحويل له
                            <span class="text-red">*</span>
                        </label>
                        <select id="bank_id" name="bank_id" class="select-css">
                            <option></option>
                            @foreach($banks as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="account_holder">
                            اسم صاحب الحساب الذي تم التحويل منه
                            <span class="text-red">*</span>
                        </label>
                        <input id="account_holder" name="account_holder" type="text" class="form-control"
                               placeholder="اسم صاحب الحساب">
                    </div><!--form group-->

                    <div class="form-group">
                        <label for="invoice">
                            فاتورة الدفع
                            <span class="text-red">*</span>
                        </label>
                        <div class="form-control group-gray group-file">
                            <span class="group-text text-truncate">صورة الفاتورة</span>
                            <button type="button" class="btn btn-group-gray btn-primary hover-black">
                                <span>اختر</span>
                                <input id="invoice" name="invoice" type="file" class="file-input-group">
                            </button>
                        </div><!--form control-->
                    </div><!--form group-->

                    <button type="submit" class="btn btn-primary hover-black btn-block mt-lg-5">
                        <span>ارسال الطلب</span>
                    </button>
                </form>
            </div><!--item-->

            <div class="tab-item active2">
                @include('site.partials.payment', [
                    'package' => new \App\Package(),
                    'payment_companies' => $payment_companies,
                ])
            </div><!--item-->

            <div class="tab-item">
                <div class="paypal-text">
                    <img src="{{ asset('site/img/paypal-e-icon.svg') }}" alt="image">
                    <p>سيتم الانتقال لموقع بايبال لتأكيد الدفع بأمان</p>
                </div>

                <form id="paypalForm" method="POST" action="{{ route('paypal.charge') }}" class="form-gray tall-form">
                    <input type="hidden" name="package_id" id="package_id" value="" />
                    {{ csrf_field() }}

                    <button type="submit" name="submit" value="submit" class="btn btn-primary hover-black btn-block mt-lg-5">
                        <span>شراء</span>
                    </button>
                </form>

{{--                <div id="paypal-button-group" class="mt-3">--}}
{{--                    <div id="paypal-button-container"></div>--}}
{{--                </div>--}}
            </div><!--item-->
        </div><!--tabs region-->
    </div><!--modal-->
@endsection

{{--@section('start_body_js')--}}
{{--    <script--}}
{{--        src="https://www.paypal.com/sdk/js?client-id=AWxU0Iy7xPitL4AeopPcmcZcp8DcJryEj8sDlLAJ_o0qepdWYBTP1_481gb7u1RhMUvCP8QWniS-a4xS"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.--}}
{{--    </script>--}}
{{--@endsection--}}

@section('js')
    <script>
        window.payment_message = "{{ request()->get('type') == 'paypal' && request()->get('status') == 'cancelled' ? trans('app.the_process_was_cancelled_by_user') : '' }}"
        if (window.payment_message) {
            let message_type = 'error';
            toastr[message_type](window.payment_message);
        }
        $(document).ready(function () {
            $('#subscriptionForm').ajaxForm({
                success: function (res) {
                    $('#subscriptionForm')[0].reset();
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
        });
    </script>
@endsection
