@extends('layouts.site')

@section('css')
@endsection

@section('js')
@endsection

@section('content')
    <!-- START SECTION TOP -->
    <section class="section-top">
        <div class="container">
            <div class="col-lg-12 col-sm-12 col-xs-12 text-center">
                <div class="section-top-title">
                    <h1>{{trans('app.services')}}</h1>
                </div><!-- //.HERO-TEXT -->
            </div><!--- END COL -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END SECTION TOP -->

    <!-- START ABOUT CONTENT -->
    <section id="services" class="about-content section-padding">
        <div class="container">
            <div class="row">
                @foreach($services as $item)
                    <div class="col-md-6">
                        <a href="{{route('serviceDetails', ['service' => $item->id])}}" class="flip-card">
                            <div class="icon">
                                <img src="{{Storage::url($item->icon)}}" class="max-h-80px" alt="image"/>
                            </div>
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <div class="card-inner-item">
                                        <div>
                                            <h3>{{$item->title}}</h3>
                                            <p>{{$item->description}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flip-card-back">
                                    <div class="card-inner-item">
                                        <div>
                                            <h3>{{trans('app.spectrum_of_services')}}</h3>
                                            @foreach($item->section as $child)
                                                <p>{{$child->title}}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div><!--col-->
                @endforeach
            </div><!--row-->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END ABOUT CONTENT -->
@endsection
