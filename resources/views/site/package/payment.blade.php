@extends('layouts.site')

@section('css')
@endsection

@section('content')
    <div class="page-container mx-auto">
        <div class="text-center pb-5">
            <h3 class="pb-3">شراء:
                <span class="text-primary">{{$package->name}}</span>
            </h3>
            <h4>السعر:
                <span class="text-primary">{{$package->price}} ريال </span>
            </h4>
        </div>

        @include('site.partials.payment', [
            'package' => $package,
            'payment_companies' => $payment_companies,
        ])
    </div><!--page container-->
@endsection

