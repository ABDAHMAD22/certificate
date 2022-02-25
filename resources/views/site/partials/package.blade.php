<div class="col-md-6 col-lg-3">
    <div class="package-box">
        <h3 class="text-center package-title">{{$package->name}}</h3>
        <h5 class="text-center text-primary">
            <span class="package_price" data-payment_price="{{$package->payment_price}}">{{$package->price}}</span>
            ريال
        </h5>
        <ul>
            <li>{{$package->certificates_no}} شهادة تدريبية</li>
            @if($package->certificates_free_no > 0)
                <li>{{$package->certificates_free_no}} شهادات مجانية</li>
            @endif
            <li>{{$package->ads_no}} إعلان بشعار موثوق</li>
            {{--<li>{{$package->cards_no}} كارت مجاني هدية</li>--}}
        </ul>

        <div class="text-center">
            @if(\Auth::guard('web')->check())
                <a href="#"
                   data-package_id="{{$package->id}}"
                   data-link="{{route('package.subscription', ['package'=>$package->id])}}"
                   data-payment="{{route('package.payment', ['package'=>$package->id])}}"
                   data-callback_url="{{route('payments', ['package_id'=>$package->id])}}"
                   class="btn btn-primary-transparent subscription-request">
                    <span class="txt">اشتراك</span>
                    <span class="hover"></span>
                </a>
            @else
                <a href="{{route('user.login')}}"
                   class="btn btn-primary-transparent">
                    <span class="txt">اشتراك</span>
                    <span class="hover"></span>
                </a>
            @endif
        </div>
    </div>
</div><!--col-->
