@extends('layouts.site')

@section('css')
@endsection

@section('content')
    <div class="page-container my-bills mx-auto">
        @if(count($payments))
            <h2>فواتيري</h2>
            <table class="table table-hover custom-table">
                <thead>
                <tr>
                    <th scope="col">التاريخ</th>
                    <th scope="col">الوصف</th>
                    <th scope="col">السعر</th>
                    <th scope="col">الحالة</th>
                    <th scope="col">طريقة الدفع</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payments as $item)
                    <tr class="show-payment cursor-pointer">
                        <td>
                            <span class="display-none payment_no">{{$item->id}}</span>
                            <span class="payment_date">{{$item->created_at->format('Y-m-d')}}</span>
                        </td>
                        <td class="package_name">{{$item->paymentable->package->name}}</td>
                        <td>
                            <span class="payment_price">{{$item->price}}</span>
                            ريال
                        </td>
                        <td class="payment_status">{{$item->status->name}}</td>
                        <td class="payment_type">{{$item->paymentType->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{$payments->links()}}
        @else
            <div class="no-payments text-center">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="money-bill-wave" role="img"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                     class="svg-inline--fa fa-money-bill-wave fa-w-20 fa-7x">
                    <path fill="currentColor"
                          d="M621.16 54.46C582.37 38.19 543.55 32 504.75 32c-123.17-.01-246.33 62.34-369.5 62.34-30.89 0-61.76-3.92-92.65-13.72-3.47-1.1-6.95-1.62-10.35-1.62C15.04 79 0 92.32 0 110.81v317.26c0 12.63 7.23 24.6 18.84 29.46C57.63 473.81 96.45 480 135.25 480c123.17 0 246.34-62.35 369.51-62.35 30.89 0 61.76 3.92 92.65 13.72 3.47 1.1 6.95 1.62 10.35 1.62 17.21 0 32.25-13.32 32.25-31.81V83.93c-.01-12.64-7.24-24.6-18.85-29.47zM48 132.22c20.12 5.04 41.12 7.57 62.72 8.93C104.84 170.54 79 192.69 48 192.69v-60.47zm0 285v-47.78c34.37 0 62.18 27.27 63.71 61.4-22.53-1.81-43.59-6.31-63.71-13.62zM320 352c-44.19 0-80-42.99-80-96 0-53.02 35.82-96 80-96s80 42.98 80 96c0 53.03-35.83 96-80 96zm272 27.78c-17.52-4.39-35.71-6.85-54.32-8.44 5.87-26.08 27.5-45.88 54.32-49.28v57.72zm0-236.11c-30.89-3.91-54.86-29.7-55.81-61.55 19.54 2.17 38.09 6.23 55.81 12.66v48.89z"></path>
                </svg>
                <h3>لا يوجد لديك فواتير</h3>
                <p>يمكنك الاشتراك في احدى الباقات
                    <a href="{{route('package')}}" class="btn btn-primary-transparent hover-black mr-2">
                        <span class="txt">من هنا</span>
                        <span class="hover"></span>
                    </a>
                </p>
            </div>
        @endif
    </div><!--page container-->

    <div id="payment-modal" class="modal bills-modal">
        <div class="form-gray tall-form">
            <div class="avatar-img text-center">
                <img src="{{ asset('site/img/modal-logo.png') }}" alt="image">
                <h2>فاتورة</h2>
            </div>
            <ul class="list-unstyled">
                <li class="title">
                    <div class="row">
                        <div class="col-md-5">
                            <p>إلى:</p>
                        </div>
                        <div class="col-md-7">
                            <p>تفاصيل:</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-md-5">
                            <p>{{Auth::user()->name}}</p>
                        </div>
                        <div class="col-md-7">
                            <p>رقم الفاتورة:
                                <span class="payment_no"></span>
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-md-5">
                            <p>{{Auth::user()->region}}</p>
                        </div>
                        <div class="col-md-7">
                            <p>تاريخ الفاتورة:
                                <span class="payment_date"></span>
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-md-5">
                            <p>{{Auth::user()->city->name??''}}</p>
                        </div>
                        <div class="col-md-7">
                            <p>تاريخ الشراء:
                                <span class="payment_date"></span>
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-md-5">
                            <p>{{Auth::user()->country->name??''}}</p>
                        </div>
                        <div class="col-md-7">
                            <p>معرف المعاملة:
                                <span class="payment_no"></span>
                            </p>
                        </div>
                    </div>
                </li>
            </ul>

            <table class="table custom-table">
                <thead>
                <tr>
                    <th scope="col">الوصف</th>
                    <th scope="col">السعر</th>
                    <th scope="col">الحالة</th>
                    <th scope="col">طريقة الدفع</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="package_name"></td>
                    <td class="payment_price"></td>
                    <td class="payment_status"></td>
                    <td class="payment_type"></td>
                </tr>
                </tbody>
            </table>

            <h3 class="text-center">
                شكرا لثقتك بنا
                <br>
                لأية استفسارات تتعلق بهذا المستند يرجى الاتصال بنا
            </h3>
            <p class="text-center text-primary">{{env('APP_URL')}}</p>
        </div>
    </div>
@endsection

@section('js')
    <script>
        window.payment_message = "{{ $payment_data ? trans('app.'.$payment_data->source->message) : '' }}";
        if (window.payment_message) {
            let message_type = "{{ $payment_data && $payment_data->status=='paid' ? 'success' : 'error' }}";
            toastr[message_type](window.payment_message);
        }
        @if($payment_paypal_message)
            toastr["{{$payment_paypal_status}}"]("{{$payment_paypal_message}}");
        @endif
    </script>
@endsection
