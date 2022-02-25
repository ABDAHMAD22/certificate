<form id="paymentForm" accept-charset="UTF-8" action="https://api.moyasar.com/v1/payments" method="POST">

    <input type="hidden" name="callback_url" id="callback_url" value="{{route('payments', ['package_id'=>$package->id])}}"/>
    <input type="hidden" name="publishable_api_key" value="{{env('MOYASAR_API_PUBLISHABLE_KEY')}}"/>
    <input type="hidden" name="amount" id="amount" value="{{($package->payment_price)}}"/>
    <input type="hidden" name="source[type]" value="creditcard"/>
    <input type="hidden" name="source[transaction_url]" value=""/>
    <input type="hidden" name="description" id="description" value="{{$package->name}}"/>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="company">
                    نوع البطاقة
                    <span class="text-red">*</span>
                </label>
                <select id="company" name="source[company]" class="select-css">
                    @foreach($payment_companies as $key=>$item)
                        <option value="{{$key}}">{{$item}}</option>
                    @endforeach
                </select>
            </div>
        </div><!--col-->

        <div class="col-md-6">
            <div class="form-group">
                <label for="number">
                    رقم البطاقة
                    <span class="text-red">*</span>
                </label>
                <input id="number" name="source[number]" type="text" class="form-control"
                       placeholder="رقم البطاقة">
            </div>
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col-md-6">
            <div class="form-group group_input_first_name group_input_last_name">
                <label for="name">
                    الاسم
                    <span class="text-red">*</span>
                </label>
                <input id="name" name="source[name]" type="text" class="form-control" placeholder="الاسم">
            </div>
        </div><!--col-->
        <div class="col-md-6">
            <div class="form-group">
                <label for="cvc">
                    CVC
                    <span class="text-red">*</span>
                </label>
                <input id="cvc" name="source[cvc]" type="text" class="form-control" placeholder="CVC">
            </div>
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="month">
                    الشهر
                    <span class="text-red">*</span>
                </label>
                <select id="month" name="source[month]" class="select-css">
                    <option></option>
                    @for($i=1;$i<=12;$i++)
                        <option value="{{$i<10?'0'.$i:$i}}">{{$i<10?'0'.$i:$i}}</option>
                    @endfor
                </select>
            </div>
        </div><!--col-->
        <div class="col-md-6">
            <div class="form-group">
                <label for="year">
                    السنة
                    <span class="text-red">*</span>
                </label>
                <input id="year" name="source[year]" type="text" class="form-control" placeholder="السنة">
            </div>
        </div><!--col-->
    </div><!--row-->

    <button type="submit" id="btn_payment_package" class="btn btn-primary hover-black btn-block mt-lg-5">
        <span>شراء</span>
    </button>
</form>

@section('partial_js')
    <script>
        window.validation_errors = {
            "is not supported. Only Mastercard, Visa, MADA and American Express card numbers are supported": "{{trans('app.is not supported. Only Mastercard, Visa, MADA and American Express card numbers are supported')}}",
            "can't be blank": "{{trans("app.can't be blank")}}",
            "is too short (minimum is 3 characters)": "{{trans("app.is too short (minimum is 3 characters)")}}",
            "is not a number": "{{trans("app.is not a number")}}",
            "should be a two-digit month": "{{trans("app.should be a two-digit month")}}",
            "should be a two-digit or four-digit year": "{{trans("app.should be a two-digit or four-digit year")}}",
        };

        function showPaymentFormErrors(err) {
            $('.msg.text-danger').remove();
            if (err.responseJSON.hasOwnProperty('errors')) {
                $.each(err.responseJSON.errors, function (i, error) {
                    var el = $(document).find('#' + i + '');
                    if (el.length) {
                        el.parents('.form-group').find('.msg.text-danger').remove();
                        el.parents('.form-group').append($('<span class="msg text-danger">' + window.validation_errors[error[0]] + '</span>'));
                    } else {
                        let $field = $('.group_input_' + i);
                        if ($field.find('.msg.text-danger').length === 0) {
                            $field.append($('<span class="msg text-danger">' + window.validation_errors[error[0]] + '</span>'));
                        }
                    }
                });
            }
        }

        $(document).ready(function () {
            $('#paymentForm').ajaxForm({
                success: function (data) {
                    let $url = data.source.transaction_url;
                    window.location.href = $url;
                },
                error: function (res) {
                    window.handleCSRFError(res);
                    let $res = res.responseJSON;
                    if ($res.type === 'invalid_request_error') {
                        toastr["error"]('الرجاء قم بالتحقق من جميع الحقول');
                        window.showPaymentFormErrors(res);
                    }
                },
                beforeSubmit: function () {
                    $('.msg.text-danger').remove();
                }
            });

            // $("#btn_payment_package").click(function (event) {
            //     event.preventDefault();
            //     // Get form data
            //     var form_data = $("#paymentForm").serialize();
            //     // Sending a POST request to Moyasar API using AJAX
            //     $.ajax({
            //         url: "https://api.moyasar.com/v1/payments",
            //         type: "POST",
            //         data: form_data,
            //         dataType: "json",
            //     })
            //         // uses `.done` callback to handle a successful AJAX request
            //         .done(function (data) {
            //             // Here we will handle JSON response and do step3 & step4
            //             var url = data.source.transaction_url;
            //             window.location.href = url;
            //         });
            //     return false;
            // });
        });
    </script>
@endsection
