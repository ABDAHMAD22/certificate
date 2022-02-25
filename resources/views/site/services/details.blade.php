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
                <div class="section-top-title section-details-title">
                    <h1>{{$data->title}}</h1>
                </div><!-- //.HERO-TEXT -->
            </div><!--- END COL -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END SECTION TOP -->

    <!-- START BLOG -->
    <section class="blog-page blog-details-page section-padding">
        <div class="container">
            @if(isset($data->paragraph[0]))
            <h5 class="text-center font-weight-bold">{{$data->paragraph[0]->title}}</h5>
            @endif
            <div class="row">
                @if(isset($data->paragraph[1]))
                <div class="col-md-6">
                    <div class="editor-text mt-5 text-center">
                        <p>{{$data->paragraph[1]->title}}</p>
                    </div>
                </div><!--col-->
                @endif
                @if(isset($data->paragraph[2]))
                <div class="col-md-6">
                    <div class="single_home_blog mt-5 text-center">
                        <div class="post-slide">
                            <div class="post-content editor-text bg-primary text-white">
                                <p>{{$data->paragraph[2]->title}}</p>
                            </div>
                        </div>
                    </div><!--- END BLOG-->
                </div><!--col-->
                @endif
            </div><!--- END ROW -->

            <div class="text-center pb-5 editor-text other-editor">
                {!! $data->details !!}
            </div>

            <div class="section-title text-center">
                <h1>{{trans('app.our_process')}}</h1>
            </div>

            <div class="service-process">
                @foreach($data->process as $key=>$item)
                    <div class="process-item">
                        {{--                        <h3 class="process-title" style="background-color: {{$colors[$key]}}; color: {{$text_color[$key]}}">--}}
                        <h3 class="process-title" style="color: {{$text_color[$key]}}">
                            <img src="{{Storage::url($item->bg_image)}}" alt="image"/>
                            <span class="text font-weight-bold">{{$item->title}}</span>
                            <div class="text-no">
                                <span>{{++$key}}</span>
                            </div>
                        </h3>
                        <p class="process-desc font-weight-bold">{{$item->description}}</p>
                    </div><!--process item-->
                @endforeach
            </div><!--service process-->

            <div class="section-title text-center">
                <h1>{{trans('app.spectrum_of_services')}}</h1>
            </div>

            <div class="row service-sections-row">
                @foreach($data->section as $item)
                    <div class="col-lg-6">
                        <div class="single_home_blog border-0 boxshadow-none">
                            <div class="post-slide">
                                <div class="post-content editor-text">
                                    <img class="sub-service-icon" src="{{Storage::url($item->image)}}?v=1" alt="image"/>
                                    @if(isset($item->title) && $item->title)
                                        <h3>{{$item->title}}</h3>
                                    @endif
                                    <div>{!! $item->details !!}</div>
                                </div>
                            </div>
                        </div><!--- END BLOG-->
                    </div><!--- END COL -->
                @endforeach
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END BLOG -->
@endsection

