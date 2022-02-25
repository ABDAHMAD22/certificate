@extends('layouts.site')

@section('css')
@endsection

@section('head_meta')
    {{--    @if($all_completed!=0)--}}
    {{--        <meta http-equiv="refresh" content="5">--}}
    {{--    @endif--}}
@endsection

@section('content')
    <div class="page-container export-cv  mx-auto">
        <div class="row justify-content-center">
            <div class="col-md-9">

                <p class="card-text text-center pb-4 font-weight-bold">{{$certificate->title}}
                    <span class="text-primary">( {{ $certificate->trainer_name ?? '-' }} )</span>
                </p>

                <ul class="list-unstyled d-flex align-items-center p-0 justify-content-between cv-option">
                    <li class="d-flex align-items-center">
                        <div class="gray-circle d-flex align-items-center">
                            <label class="checkbox-field custom-label">
                                <div class="remember-checkbox">
                                    <input type="checkbox" class="checkbox checkbox-all">
                                    <img src="{{ asset('site/img/checked.svg') }}" alt="image">
                                </div>
                            </label>
                        </div>
                        <p>تحديد الكل</p>
                    </li>

                    @if($has_update)
                        <li>
                            <a class="d-flex align-items-center"
                               href="{{route('certificate.update', ['certificate'=>$certificate])}}">
                                <svg width="38" height="38" viewBox="0 0 38 38" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <rect width="38" height="38" rx="19" fill="#F3F3F3"/>
                                    <path
                                        d="M18.4286 14.1431H13.4286C12.6396 14.1431 12 14.7827 12 15.5716V25.5716C12 26.3606 12.6396 27.0002 13.4286 27.0002H23.4286C24.2175 27.0002 24.8571 26.3606 24.8571 25.5716V20.5716"
                                        stroke="url(#paint0_linear)" stroke-width="1.3" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M23.7861 13.0712C24.3779 12.4795 25.3373 12.4795 25.929 13.0712C26.5207 13.663 26.5207 14.6224 25.929 15.2141L19.1433 21.9998L16.2861 22.7141L17.0004 19.857L23.7861 13.0712Z"
                                          stroke="url(#paint1_linear)" stroke-width="1.3" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <defs>
                                        <linearGradient id="paint0_linear" x1="24.8571" y1="14.1431" x2="12"
                                                        y2="14.1431"
                                                        gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#039BF9"/>
                                            <stop offset="1" stop-color="#00C8A0"/>
                                        </linearGradient>
                                        <linearGradient id="paint1_linear" x1="26.3728" y1="12.6274" x2="16.2861"
                                                        y2="12.6274" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#039BF9"/>
                                            <stop offset="1" stop-color="#00C8A0"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                                <p>تعديل</p>
                            </a>
                        </li>
                    @endif
                    <li>
                        <a class="d-flex align-items-center download-all" href="#">
                            <svg width="38" height="38" viewBox="0 0 38 38" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="38" height="38" rx="19" fill="#F3F3F3"/>
                                <path
                                    d="M26 22V25.3333C26 26.2538 25.2538 27 24.3333 27H12.6667C11.7462 27 11 26.2538 11 25.3333V22"
                                    stroke="url(#paint0_linear)" stroke-width="1.3" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path d="M14.333 17.8335L18.4997 22.0002L22.6663 17.8335"
                                      stroke="url(#paint1_linear)"
                                      stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M18.4997 22V12" stroke="url(#paint2_linear)" stroke-width="1.3"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                                <defs>
                                    <linearGradient id="paint0_linear" x1="26" y1="22" x2="11" y2="22"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#039BF9"/>
                                        <stop offset="1" stop-color="#00C8A0"/>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear" x1="22.6663" y1="17.8335" x2="14.333"
                                                    y2="17.8335"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#039BF9"/>
                                        <stop offset="1" stop-color="#00C8A0"/>
                                    </linearGradient>
                                    <linearGradient id="paint2_linear" x1="18.9163" y1="12" x2="18.083" y2="12"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#039BF9"/>
                                        <stop offset="1" stop-color="#00C8A0"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                            <p>تنزيل</p>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center btn-shareAll-modal" href="#">
                            <svg width="38" height="38" viewBox="0 0 38 38" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="38" height="38" rx="19" fill="#F3F3F3"/>
                                <path
                                    d="M18 20.25C18.6517 21.1212 19.6497 21.6665 20.735 21.7442C21.8203 21.8219 22.8858 21.4245 23.655 20.655L25.905 18.405C27.3261 16.9336 27.3058 14.5947 25.8593 13.1482C24.4128 11.7017 22.0739 11.6813 20.6025 13.1025L19.3125 14.385"
                                    stroke="url(#paint0_linear)" stroke-width="1.3" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path
                                    d="M20.9997 18.7499C20.3479 17.8787 19.3499 17.3334 18.2647 17.2557C17.1794 17.178 16.1139 17.5754 15.3447 18.3449L13.0947 20.5949C11.6735 22.0664 11.6938 24.4053 13.1403 25.8518C14.5868 27.2983 16.9257 27.3186 18.3972 25.8974L19.6797 24.6149"
                                    stroke="url(#paint1_linear)" stroke-width="1.3" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <defs>
                                    <linearGradient id="paint0_linear" x1="26.9577" y1="12.0498" x2="18"
                                                    y2="12.0498"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#039BF9"/>
                                        <stop offset="1" stop-color="#00C8A0"/>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear" x1="20.9997" y1="17.2461" x2="12.042"
                                                    y2="17.2461" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#039BF9"/>
                                        <stop offset="1" stop-color="#00C8A0"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                            <p>مشاركة</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <p class="mt-2 mb-3 d-none selected_certificates">
            الشهادات المحددة:
            <span class="text-primary">0</span>
        </p>

        <h3 class="certificate_title text-center py-3 d-none">{{$certificate->title}}</h3>

        <div class="alert alert-info text-center certificates-alert d-none">انتهى رصيدك في اصدار الشهادات</div>

        <div class="mt-2 mb-3 loading-message d-none">
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
            <p class="text-info">جاري تصدير جميع الشهادات</p>
        </div>

        <div class="students-list">
            @foreach($students as $key=>$item)
                @include('site.partials.student', [
                    'student'=>$item,
                    'has_check'=>true,
                ])
            @endforeach
        </div>
    </div><!--page container-->

    <div id="share-modal" class="modal share-modal">
        <h3 class="text-center xmodal-title">شارك الشهادات</h3>
        <p class="text-center mt-3">قم بمشاركة الشهادات المختاراة</p>

        <div class="form-gray tall-form mt-lg-3">
            <div class="share-grid">
                <h4 class="text-center">شارك عبر</h4>
                <ul class="share-links shareAll-links list-unstyled" dir="ltr">
                    <li>
                        <a class="twitter-link" data-link="https://twitter.com/intent/tweet?text=" href="#" target="_blank">
                            <img width="16" src="{{ asset('site/img/twitter-icon.svg') }}" alt="image">
                        </a>
                    </li>
                    <li>
                        <a class="email-link" data-link="mailto:" href="#">
                            <img src="{{ asset('site/img/email-icon.svg') }}" alt="image">
                        </a>
                    </li>
                    <li>
                        <a class="whatsapp-link" data-link="https://wa.me/?text=" href="#" target="_blank">
                            <img src="{{ asset('site/img/whatsapp-icon.svg') }}" alt="image">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let $completed = {{ $all_completed }};
        $(document).ready(function () {
            let $completed_timer = null;

            function completed_request() {
                $.ajax({
                    url: `/certificate/{{$certificate->id}}/students/completed`,
                    success: function (res) {
                        let $students_no = res.students_no;
                        let $all_completed = res.all_completed;
                        let $students_html = res.students_html;
                        let $has_certificates = res.has_certificates;
                        if (!$has_certificates) {
                            $('.certificates-alert').removeClass('d-none');
                        } else {
                            $('.certificates-alert').addClass('d-none');
                        }
                        $('.students-list').html($students_html);
                        if ($students_no > 0 && $all_completed) {
                            $('.loading-message').addClass('d-none');
                            clearInterval($completed_timer);
                        } else {
                            $('.loading-message').removeClass('d-none');
                        }
                        if ($students_no === 0) {
                            $('.loading-message').addClass('d-none');
                        }
                    },
                    dataType: 'JSON'
                });
            }

            $completed_timer = setInterval(completed_request, 1000);
            // setTimeout(function () {
            //     clearInterval($completed_timer);
            // }, 60000);
            // if ($students_no > 0 && $completed === 0) {
            //     $completed_timer = setInterval(completed_request, 1000);
            // }

            $(document).on('click', '.btn-certificate-delete', function () {
                let $this = $(this);
                let $url = $(this).attr('href');
                if (confirm('هل أنت متأكد من العملية؟')) {
                    $.ajax({
                        url: $url,
                        success: function (res) {
                            toastr["success"](res.message);
                            $this.parents('.worker-card').remove();
                        },
                        dataType: 'JSON',
                        method: 'DELETE',
                    });
                }
                return false;
            });
        });
    </script>
@endsection
