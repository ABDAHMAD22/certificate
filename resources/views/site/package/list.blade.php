@extends('layouts.site')

@section('css')
@endsection

@section('content')
    <div class="page-container packages-container mx-auto">
        <h3 class="mt-3 packages-title text-center">اشترك الآن واستمتع بالتجربة المجانية</h3>
        <div class="row">
            @foreach($packages as $package)
                @include('site.partials.package', [
                    'package' => $package,
                    'can_subscribe' => false,
                ])
            @endforeach
        </div><!--row-->
    </div><!--page container-->
@endsection

@section('js')
@endsection
