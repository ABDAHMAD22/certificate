@extends('layouts.site')

@section('css')
@endsection

@section('head_meta')
    <meta property="og:title" content="{{$certificateStudent->certificate->title}}">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{Storage::url($certificate_image)}}">
    <meta property="og:url" content="{{route('certificate.share', ['certificateStudent'=>$certificateStudent->id])}}">
    <meta property="og:description" content="{{$certificateStudent->certificate->title}}">
    <link rel="image_src" href="{{Storage::url($certificate_image)}}">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content="{{route('certificate.share', ['certificateStudent'=>$certificateStudent->id])}}">
    <meta name="twitter:title" content="{{$certificateStudent->certificate->title}}">
    <meta name="twitter:description" content="{{$certificateStudent->certificate->title}}">
    <meta name="twitter:image" content="{{Storage::url($certificate_image)}}">
    @if($certificateStudent->is_completed==0)
        <meta http-equiv="refresh" content="5">
    @endif
@endsection

@section('content')
    <div class="page-container export-cv2 mx-auto">
        @if($certificateStudent->is_completed==0)
            <div class="mt-2 mb-3 loading-message">
                <div class="sk-circle">
                    <div class="sk-circle1 sk-child"></div>
                    <div class="sk-circle2 sk-child"></div>
                    <div class="sk-circle3 sk-child"></div>
                    <div class="sk-circle4 sk-child"></div>
                    <div class="sk-circle5 sk-child"></div>
                    <div class="sk-circle6 sk-child"></div>
                    <div class="sk-circle7 sk-child"></div>
                    <div class="sk-circle8 sk-child"></div>
                    <div class="sk-circle9 sk-child"></div>
                    <div class="sk-circle10 sk-child"></div>
                    <div class="sk-circle11 sk-child"></div>
                    <div class="sk-circle12 sk-child"></div>
                </div>
                <p class="text-info">جاري تصدير الشهادة</p>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <img class="img-fluid d-block cv-img mx-auto" src="{{ Storage::url($certificate_image) }}"
                     alt="image">
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex align-items-center buttons">
                <a target="_blank"
                   href="{{ route('certificate.exportPDF', ['certificateStudent'=>$certificateStudent]) }}"
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
                <a href="{{ Storage::url($certificate_image) }}"
                   download="{{$certificateStudent->name}}" class="btn btn-primary-transparent btn-block">
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
                <a href="{{route('student.update', ['certificateStudent'=>$certificateStudent])}}"
                   class="btn btn-gray btn-block">
                    <span class="txt">تعديل</span>
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.42857 3.14307H2.42857C1.63959 3.14307 1 3.78266 1 4.57164V14.5716C1 15.3606 1.63959 16.0002 2.42857 16.0002H12.4286C13.2175 16.0002 13.8571 15.3606 13.8571 14.5716V9.57164"
                            stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M12.7861 2.07124C13.3779 1.47951 14.3373 1.47951 14.929 2.07124C15.5207 2.66298 15.5207 3.62237 14.929 4.2141L8.14328 10.9998L5.28613 11.7141L6.00042 8.85696L12.7861 2.07124Z"
                              stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <a class="btn btn-gray btn-block btn-share-modal">
                    <span class="txt">مشاركة</span>
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 9.24998C7.65172 10.1212 8.64972 10.6665 9.73499 10.7442C10.8203 10.8219 11.8858 10.4245 12.655 9.65497L14.905 7.40497C16.3261 5.93355 16.3058 3.59466 14.8593 2.14816C13.4128 0.701653 11.0739 0.681329 9.6025 2.10247L8.3125 3.38497"
                            stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M9.99966 7.74994C9.34795 6.87867 8.34994 6.33341 7.26467 6.25569C6.17941 6.17796 5.11389 6.57543 4.34466 7.34494L2.09466 9.59494C0.673517 11.0664 0.693841 13.4053 2.14034 14.8518C3.58684 16.2983 5.92574 16.3186 7.39716 14.8974L8.67966 13.6149"
                            stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </div>
    </div><!--page container-->

    <div id="share-modal" class="modal share-modal">
        <h3 class="text-center xmodal-title">شارك الشهادة</h3>
        <p class="text-center mt-3">قم بنسخ رابط الشهادة وشاركها مع المتدرب/ة ليقوم بتحميلها بشكل مباشر</p>

        <form action="#" class="form-gray tall-form mt-lg-5">
            <div class="field-has-btn">
                <div class="form-group">
                    <input type="text" id="link_field" class="form-control"
                           value="{{route('certificate.share', ['certificateStudent'=>$certificateStudent])}}"
                           placeholder="الرابط">
                </div><!--form group-->
                <button id="btn-copy" type="button" class="btn btn-primary hover-black">
                    <span>نسخ</span>
                </button>
            </div><!--field has btn-->

            <div class="share-grid">
                <h4 class="text-center">أو شارك عبر</h4>
                <ul class="share-links list-unstyled" dir="ltr">
                    <li>
                        <a href="https://twitter.com/intent/tweet?text={{$certificateStudent->certificate->title}}&url={{route('certificate.exportPDFByName', [
    'certificate' => $certificateStudent->certificate->id,
    'name' => str_replace(" ", "-", $certificateStudent->name),
    ])}}"
                           target="_blank">
                            <img width="16" src="{{ asset('site/img/twitter-icon.svg') }}" alt="image">
                        </a>
                    </li>
                    <li>
                        <a href="mailto:?subject={{$certificateStudent->certificate->title}}&amp;body={{route('certificate.exportPDFByName', [
    'certificate' => $certificateStudent->certificate->id,
    'name' => str_replace(" ", "-", $certificateStudent->name),
    ])}}"
                           target="_blank">
                            <img src="{{ asset('site/img/email-icon.svg') }}" alt="image">
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/?text={{$certificateStudent->certificate->title}}&nbsp;&nbsp;{{route('certificate.exportPDFByName', [
    'certificate' => $certificateStudent->certificate->id,
    'name' => str_replace(" ", "-", $certificateStudent->name),
    ])}}"
                           target="_blank">
                            <img src="{{ asset('site/img/whatsapp-icon.svg') }}" alt="image">
                        </a>
                    </li>
                </ul>
            </div>
        </form>
    </div>
@endsection

@section('js')
@endsection
