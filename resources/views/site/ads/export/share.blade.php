@extends('layouts.site')

@section('css')
@endsection

@section('head_meta')
    <meta property="og:title" content="{{$ads->title}}">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{Storage::url($ads_image)}}">
    <meta property="og:url" content="{{route('ads.export', ['ads'=>$ads->id])}}">
    <meta property="og:description" content="{{$ads->title}}">
    <link rel="image_src" href="{{Storage::url($ads_image)}}">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content="{{route('ads.export', ['ads'=>$ads->id])}}">
    <meta name="twitter:title" content="{{$ads->title}}">
    <meta name="twitter:description" content="{{$ads->title}}">
    <meta name="twitter:image" content="{{Storage::url($ads_image)}}">
@endsection

@section('content')
    <div class="page-container export-cv2 mx-auto">
        <div class="row">
            <div class="col-12">
                <img class="img-fluid d-block cv-img mx-auto" src="{{ Storage::url($ads_image) }}"
                     alt="image">
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex align-items-center buttons">
                <a target="_blank" href="{{ route('ads.exportPDF', ['ads'=>$ads]) }}"
                   class="btn btn-primary hover-black btn-block">
                    <span class="txt">حفظ PDF</span>
                    <span class="hover"></span>
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="currentColor"
                              d="M16 11V14.3333C16 15.2538 15.2538 16 14.3333 16H2.66667C1.74619 16 1 15.2538 1 14.3333V11"
                              stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path stroke="currentColor" d="M4.33301 6.8335L8.49967 11.0002L12.6663 6.8335"
                              stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path stroke="currentColor" d="M8.49967 11V1" stroke-width="1.3" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </a>
                <a href="{{ Storage::url($ads_image) }}"
                   download="{{$ads->title}}" class="btn btn-primary-transparent btn-block">
                    <span class="txt">حفظ JPG</span>
                    <span class="hover"></span>
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16 11V14.3333C16 15.2538 15.2538 16 14.3333 16H2.66667C1.74619 16 1 15.2538 1 14.3333V11"
                            stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4.33301 6.8335L8.49967 11.0002L12.6663 6.8335" stroke="currentColor"
                              stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.49967 11V1" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </div>
    </div><!--page container-->
@endsection

@section('js')
@endsection
