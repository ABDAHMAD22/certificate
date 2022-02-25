<!DOCTYPE html>
<html dir="{{ strtolower(app()->getLocale())=="en"?'ltr':'rtl' }}"
      lang="{{ strtolower(app()->getLocale()) }}">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>{{ trans('app.title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('site/img/logo.svg') }}"/>
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css') }}"/>
    {{--    <link rel="stylesheet" href="{{ asset('site/css/swiper.min.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('site/js/toastr/toastr.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('site/js/modal/jquery.modal.min.css') }}"/>
    {{--page--}}
    @yield('css_files')
    @yield('head_meta')
    <meta property="og:site_name" content="ShahadaTech">
    <meta name="twitter:site" content="@shahadatech">
    <meta name="twitter:creator" content="@shahadatech">
    <link rel="stylesheet" href="{{ asset('site/css/main-rtl.css?v=10.14') }}"/>
    <link rel="stylesheet" href="{{ asset('site/css/custom.css?v=10.14') }}"/>
</head>
<body class="{{$bodyClass}}">
@yield('start_body_js')
<div class="main-wrapper overflow-hidden">
    @if(!$authLayout && $withoutHeader!=1)
        @if($activeClass==='index' || $activeClass==='about' || $activeClass==='contact' || $activeClass==='packages')
            @include('layouts.partials.header_home')
        @else
            @include('layouts.partials.header')
        @endif
    @endif

    @yield('content')
</div><!--wrapper-->

@if(!$authLayout && ($activeClass==='index' || $activeClass==='about' || $activeClass==='contact'))
    @include('layouts.partials.footer')
@endif

<div class="overlay-transparent"></div>

<script src="{{ asset('site/js/jquery-3.5.1.min.js') }}"></script>
<!--page js-->
<script src="{{ asset('site/js/bootstrap.min.js') }}"></script>
<!--<script src="js/swiper.min.js"></script>-->
<!--<script src="js/aos/aos.js"></script>-->
@yield('js_files')
<!--end page js-->
<script src="{{ asset('site/js/modal/jquery.modal.min.js') }}"></script>

<script src='{{ asset('site/js/jquery.form.min.js') }}'></script>
<script src='{{ asset('site/js/toastr/toastr.min.js') }}'></script>
<script>
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers:
            {'X-CSRF-TOKEN': csrfToken}
    });

    function showFormErrors(err) {
        $('.msg.text-danger').remove();
        if (err.responseJSON.hasOwnProperty('errors')) {
            $.each(err.responseJSON.errors, function (i, error) {
                var el = $(document).find('[name="' + i + '"]');
                el.parents('.form-group').append($('<span class="msg text-danger">' + error[0] + '</span>'));
            });
        }
    }

    function handleCSRFError(res) {
        if (res.status === 419) {
            toastr["error"]("انتهت صلاحية رمز الحماية، قم بتحديث الصفحة");
        }
    }

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
@yield('partial_js')
@yield('second_partial_js')
@yield('footer_js')
@yield('js')
<script src="{{ asset('site/js/main.js?v=10.14') }}"></script>
@yield('end_body_js')
</body>
</html>
