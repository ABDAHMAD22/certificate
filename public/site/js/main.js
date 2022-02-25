/* global jQuery */
var $links = [];
var $hijri = false;
var $uploadCrop;
var $hidden_image = null;
var main = function () {
    function close_menu() {
        $('.main-menu,.overlay-menu').removeClass('active');
        $('.hamburger').removeClass('is-active').addClass('unactive');
        $('body').removeClass('overflow-hidden');
    };
    var handleMenuResponsive = function () {
        jQuery(document).on('click', '.hamburger.unactive', function () {
            $('.main-menu,.overlay-menu').addClass('active');
            $('.hamburger').removeClass('unactive').addClass('is-active');
            $('body').addClass('overflow-hidden');
            return false
        });
        jQuery(document).on('click', '.hamburger.is-active', function () {
            close_menu();
            return false
        });
        if (document.getElementsByClassName('overlay-menu').length) {
            document.getElementsByClassName('overlay-menu')[0].addEventListener('click', () => {
                close_menu();
            });
        }
    };
    var handleAos = function () {
        AOS.init({
            once: true,
            duration: 500, // values from 0 to 3000, with step 50ms
            easing: 'ease',
            startEvent: 'DOMContentLoaded',
            disable: 'mobile'
        });
    };
    var handleHeroSlider = function () {
        if ($('#hero-slider').length) {
            let $hero_slider = new Swiper('#hero-slider', {
                pagination: {
                    el: '#hero-pagination',
                    clickable: true,
                },
                effect: "fade",
                fadeEffect: {
                    crossFade: true
                },
                slidesPerView: 1,
            });
        }
    };
    var handleCentersSlider = function () {
        if ($('#centers-slider').length) {
            let $centers_slider = new Swiper('#centers-slider', {
                slidesPerView: 4,
                spaceBetween: 25,
                nav: false,
                navigation: {
                    nextEl: '.centers-next',
                    prevEl: '.centers-prev',
                },
                breakpoints: {
                    300: {
                        slidesPerView: 1,
                    },
                    480: {
                        slidesPerView: 2,
                    },
                    768: {
                        slidesPerView: 3,
                    },
                    1020: {
                        slidesPerView: 4,
                    }
                }
            });
        }
    };
    var handleTrainersSlider = function () {
        if ($('#trainers-slider').length) {
            let $trainers_slider = new Swiper('#trainers-slider', {
                slidesPerView: 4,
                spaceBetween: 25,
                nav: false,
                pagination: {
                    el: '#trainers-pagination',
                    clickable: true,
                },
                breakpoints: {
                    300: {
                        slidesPerView: 1,
                    },
                    576: {
                        slidesPerView: 2,
                    },
                    768: {
                        slidesPerView: 3,
                    },
                    1100: {
                        slidesPerView: 4,
                    }
                }
            });
        }
    };
    var handlePartnersSlider = function () {
        if ($('#partners-slider').length) {
            let $partners_slider = new Swiper('#partners-slider', {
                slidesPerView: 5,
                spaceBetween: 25,
                nav: false,
                navigation: {
                    nextEl: '.partners-next',
                    prevEl: '.partners-prev',
                },
                breakpoints: {
                    300: {
                        slidesPerView: 1,
                    },
                    400: {
                        slidesPerView: 2,
                    },
                    600: {
                        slidesPerView: 3,
                    },
                    900: {
                        slidesPerView: 4,
                    },
                    1300: {
                        slidesPerView: 5,
                    }
                }
            });
        }
    };
    var handleChangeDateType = function () {
        $(document).on('change', '.radio-input[name="date_type"]', function () {
            $hijri = parseInt($(this).val()) === 2;
            $('.datepicker-hidden-start,.datepicker-hidden-end,.datepicker-input').val('');
            if ($hijri) {
                $('.datepicker-input.datepicker-hijri-start,.datepicker-input.datepicker-hijri-end').removeClass('d-none');
                $('.datepicker-input.datepicker-notHijri-start,.datepicker-input.datepicker-notHijri-end').addClass('d-none');
            } else {
                $('.datepicker-input.datepicker-notHijri-start,.datepicker-input.datepicker-notHijri-end').removeClass('d-none');
                $('.datepicker-input.datepicker-hijri-start,.datepicker-input.datepicker-hijri-end').addClass('d-none');
            }
        });
    };
    var handleDatePicker = function () {
        // if (jQuery().datepicker) {
        //     $('.datepicker').datepicker({
        //         language: 'ar',
        //         autoclose: true,
        //         format: 'yyyy-mm-dd'
        //     });
        // }
        if (jQuery().hijriDatePicker) {
            $('.datepicker-hijri-start,.datepicker-hijri-end').hijriDatePicker({
                hijriFormat: 'iYYYY-iM-iD',
                format: 'YYYY-MM-DD',
                hijri: true,
                showSwitcher: false,
            });
            $('.datepicker-notHijri-start,.datepicker-notHijri-end').hijriDatePicker({
                hijriFormat: 'iYYYY-iMM-idd',
                format: 'YYYY-MM-DD',
                hijri: false,
                showSwitcher: false,
            });
            $('.datepicker-hijri-start').on('dp.change', function (arg) {
                let date = arg.date;
                date.format("iYYYY/iM/iD");
                let year = date.format("iYYYY");
                let month = date.format("iM");
                month = month <= 9 ? `0${month}` : month;
                let day = date.format("iD");
                day = day <= 9 ? `0${day}` : day;
                $date = `${year}-${month}-${day}`
                $('.datepicker-hidden-start').val($date);
            });
            $('.datepicker-hijri-end').on('dp.change', function (arg) {
                let date = arg.date;
                date.format("iYYYY/iM/iD");
                let year = date.format("iYYYY");
                let month = date.format("iM");
                month = month <= 9 ? `0${month}` : month;
                let day = date.format("iD");
                day = day <= 9 ? `0${day}` : day;
                $date = `${year}-${month}-${day}`
                $('.datepicker-hidden-end').val($date);
            });
            $('.datepicker-notHijri-start').on('dp.change', function (arg) {
                $('.datepicker-hidden-start').val($(arg.target).val());
            });
            $('.datepicker-notHijri-end').on('dp.change', function (arg) {
                $('.datepicker-hidden-end').val($(arg.target).val());
            });
        }
    };

    function checkSelected() {
        return $('.students-list .worker-card.selected').length;
    }

    var handleModalTemplate = function () {
        let close = '<svg width="17px" height="17px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">\n' +
            '    <title>Combined Shape</title>\n' +
            '    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">\n' +
            '        <g id="6" transform="translate(-391.000000, -129.000000)" stroke="#FFFFFF" stroke-width="2">\n' +
            '            <g id="Group-4" transform="translate(312.000000, 114.000000)">\n' +
            '                <g id="plus-circle" transform="translate(64.000000, 0.000000)">\n' +
            '                    <path d="M23.5,14.1 L23.5,32.9 M14.1,23.5 L32.9,23.5" id="Combined-Shape" transform="translate(23.500000, 23.500000) rotate(-315.000000) translate(-23.500000, -23.500000) "></path>\n' +
            '                </g>\n' +
            '            </g>\n' +
            '        </g>\n' +
            '    </g>\n' +
            '</svg>';

        $(document).on('click', '.template-request', function () {
            $('#template-modal1').modal({
                closeClass: 'icon-remove',
                closeText: close
            });
            return false;
        });

        $(document).on('click', '.template-request2', function () {
            $('#template-modal2').modal({
                closeClass: 'icon-remove',
                closeText: close
            });
            return false;
        });
        $(document).on('click', '.btn-album-modal', function () {
            $('#attached_file').val('');
            $hidden_image = null;
            $('.crop-wrap-region').addClass('display-none');
            $('#album-modal').modal({
                closeClass: 'icon-remove',
                closeText: close
            });
            return false;
        });
        $(document).on('click', '.btn-search-modal', function () {
            $('#search-modal').modal({
                closeClass: 'icon-remove',
                closeText: close
            });
            close_menu();
            return false;
        });
        $(document).on('click', '.special-request-request', function () {
            close_menu();
            $('#special-request-modal').modal({
                closeClass: 'icon-remove',
                closeText: close
            });
            return false;
        });
        $(document).on('click', '.editor-request', function () {
            $('#request-editor-modal').modal({
                closeClass: 'icon-remove',
                closeText: close
            });
            return false;
        });
        $(document).on('click', '.btn-share-modal', function () {
            $('#share-modal').modal({
                closeClass: 'icon-remove',
                closeText: close
            });
            return false;
        });
        $(document).on('click', '.btn-shareAll-modal', function () {
            if (checkSelected()) {
                $('#share-modal').modal({
                    closeClass: 'icon-remove',
                    closeText: close
                });
            } else {
                toastr["error"]("قم باختيار شهادة واحدة على الاقل");
            }
            return false;
        });

        function renderPayPal() {
            var FUNDING_SOURCES = [
                paypal.FUNDING.PAYPAL,
            ];

            // Loop over each funding source/payment method
            FUNDING_SOURCES.forEach(function(fundingSource) {

                // Initialize the buttons
                var button = paypal.Buttons({
                    fundingSource: fundingSource,
                    createOrder: function(data, actions) {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: '0.01'
                                }
                            }]
                        });
                    },
                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(details) {
                            alert('Transaction completed by ' + details.payer.name.given_name);
                        });
                    }
                });

                // Check if the button is eligible
                if (button.isEligible()) {

                    // Render the standalone button for that funding source
                    button.render('#paypal-button-container');
                }
            });
        }

        $(document).on('click', '.subscription-request', function () {
            let $action = $(this).attr('data-link');
            let $package_id = $(this).attr('data-package_id');
            let $payment_action = $(this).attr('data-payment');
            let $callback_url_action = $(this).attr('data-callback_url');
            $('#subscriptionForm').attr('action', $action);
            $('#callback_url').val($callback_url_action);
            let $price = $(this).parents('.package-box').find('.package_price').attr('data-payment_price');
            let $package_title = $(this).parents('.package-box').find('.package-title').text();
            $('#amount').val($price);
            $('#description').val($package_title);
            $('#package_id').val($package_id);
            $('.tab-payment').attr('href', $payment_action);
            $('#subscription-modal').modal({
                closeClass: 'icon-remove',
                closeText: close
            });
            //renderPayPal();
            return false;
        });
        $(document).on('click', '.show-payment', function () {
            const $row = $(this);
            const $payment_no = $row.find('.payment_no').text();
            const $payment_date = $row.find('.payment_date').text();
            const $package_name = $row.find('.package_name').text();
            const $payment_price = $row.find('.payment_price').text();
            const $payment_status = $row.find('.payment_status').text();
            const $payment_type = $row.find('.payment_type').text();
            $('.bills-modal .payment_no').html($payment_no);
            $('.bills-modal .payment_date').html($payment_date);
            $('.bills-modal .package_name').html($package_name);
            $('.bills-modal .payment_price').html($payment_price);
            $('.bills-modal .payment_status').html($payment_status);
            $('.bills-modal .payment_type').html($payment_type);
            $('#payment-modal').modal({
                closeClass: 'icon-remove',
                closeText: close
            });
            return false;
        });
    };
    var copyText = function () {
        let copyText = document.getElementById("link_field");
        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /*For mobile devices*/
        /* Copy the text inside the text field */
        document.execCommand("copy");
        // alert("Copied the text: " + copyText.value);
    };
    var handleCopyText = function () {
        $(document).on('click', '#btn-copy', function () {
            copyText();
        });
    };
    var handleFileOnChange = function () {
        $(document).on('change', '.group-file .file-input-group', function (e) {
            let fileName = e.target.files[0].name;
            let $parent = $(this).parents('.group-file');
            $parent.find('.group-text').html(fileName);
            if ($(this).attr('id') === 'attached_file') {
                $('#media_id').val('');
                $('.crop-wrap-region').removeClass('display-none');
                readFile(this);
                fileCroppedImgToFile();
            }
        });
    };
    var handleTabsEvent = function () {
        $(document).on('click', '.tabs-event .btn-tab:not(.tab-clicked)', function () {
            let $li = $(this).parent();
            let $idx = $li.index();
            $('.tabs-event>li').removeClass('active');
            $li.addClass('active');
            $('.tabs-region .tab-item').removeClass('active');
            $('.tabs-region .tab-item').eq($idx).addClass('active');
            return false;
        });
    };
    var handleUploadFileChange = function () {
        $(document).on('change', '.upload-file-gray .file-upload', function (e) {
            let fileName = e.target.files[0].name;
            let $parent = $(this).parents('.upload-file-gray');
            $parent.find('.file-text').addClass('d-none');
            $parent.find('.input-text').html(fileName);
        });
    };
    var handleShowPassword = function () {
        $(document).on('click', '.eye-password.unactive', function () {
            $(this).addClass('active').removeClass('unactive');
            $(this).parent().find('.form-control').attr('type', 'text');
        });
        $(document).on('click', '.eye-password.active', function () {
            $(this).addClass('unactive').removeClass('active');
            $(this).parent().find('.form-control').attr('type', 'password');
        });
    };
    var openDropDown = function () {
        function closeSubmenu() {
            $('.menu-user').removeClass('active').addClass('unactive');
            $('.sub-menu').removeClass('active');
            $('.overlay-transparent').removeClass('active');
        }

        $(document).on('click', '.menu-user.unactive', function () {
            $(this).removeClass('unactive').addClass('active');
            $('.sub-menu').addClass('active');
            $('.overlay-transparent').addClass('active');
        });
        $(document).on('click', '.menu-user.active', function (e) {
            closeSubmenu();
        });
        document.getElementsByClassName('overlay-transparent')[0].addEventListener('click', (e) => {
            closeSubmenu();
        });
    };
    var handleScrollToSection = function () {
        $(document).on('click', '.link-goto', function (e) {
            let tag = $('#' + $(this).attr('data-id'));
            if (tag.length) {
                close_menu();
                let top = tag.offset().top - 70;
                $('html, body').animate(
                    {
                        scrollTop: top,
                    },
                    500,
                    'linear'
                );
            }
            return false;
        });
    };
    var handleCounterNumbers = function () {
        if (jQuery().counterUp) {
            $('.counter_number').counterUp({
                delay: 10,
                time: 1000
            });
        }
    };
    var handleGoToTop = function () {
        $(document).on('click', '.move-top,.goto-top', function (e) {
            let tag = $('html,body');
            if (tag.length) {
                let top = tag.offset().top;
                $('html, body').animate(
                    {
                        scrollTop: top,
                    },
                    500,
                    'linear'
                );
            }
            return false;
        });
    };

    function generateSocialAll() {
        let $links_text = '';
        let title = $('.certificate_title').text();
        $links.forEach((x) => {
            $links_text += x + '%0a';
        });
        let $twitter_link = $('.shareAll-links .twitter-link').attr('data-link');
        $('.shareAll-links .twitter-link').attr('href', $twitter_link + title + $links_text);
        let $email_link = $('.shareAll-links .email-link').attr('data-link');
        let $links_text_body = `?subject=${title}&body=${$links_text}`;
        $('.shareAll-links .email-link').attr('href', `${$email_link} ${$links_text_body}`);
        let $whatsapp_link = $('.shareAll-links .whatsapp-link').attr('data-link');
        $('.shareAll-links .whatsapp-link').attr('href', `${$whatsapp_link} ${title} %0a ${$links_text}`);

    }

    var handleCheckAll = function () {
        $(document).on('change', '.worker-card .checkbox', function () {
            let $parent = $(this).parents('.worker-card');
            let $checkboxes_length = $('.students-list .checkbox').length;
            let $checkboxes_checked_length = $('.students-list .checkbox:checked').length;
            let $link = $parent.find('.share-certificate').attr('data-share');
            $('.selected_certificates>span').text($checkboxes_checked_length);
            if($checkboxes_checked_length > 0) {
                $('.selected_certificates').removeClass('d-none');
            } else {
                $('.selected_certificates').addClass('d-none');
            }
            if ($(this).prop('checked')) {
                $parent.addClass('selected');
                let $itemIndex = $links.findIndex((x) => {
                    return x === $link;
                });
                if ($itemIndex < 0) {
                    $links.push($link);
                }
            } else {
                $parent.removeClass('selected');
                let $itemIndex = $links.findIndex((x) => {
                    return x === $link;
                });
                $links.splice($itemIndex, 1);
            }
            generateSocialAll();
            if ($checkboxes_length === $checkboxes_checked_length) {
                $('.checkbox-all').prop('checked', true);
            } else {
                $('.checkbox-all').prop('checked', false);
            }
        });

        $(document).on('change', '.checkbox-all', function () {
            if ($(this).prop('checked')) {
                $('.students-list .checkbox').prop('checked', true);
                $('.students-list .worker-card').addClass('selected');
                $('.students-list .worker-card').each(function () {
                    let $link = $(this).find('.share-certificate').attr('data-share');
                    $links.push($link);
                });
                generateSocialAll();
            } else {
                $('.students-list .checkbox').prop('checked', false);
                $('.students-list .worker-card').removeClass('selected');
                $links = [];
            }
            let $checkboxes_checked_length = $('.students-list .checkbox:checked').length;
            $('.selected_certificates>span').text($checkboxes_checked_length);
            if($checkboxes_checked_length > 0) {
                $('.selected_certificates').removeClass('d-none');
            } else {
                $('.selected_certificates').addClass('d-none');
            }
        });
    };
    var handlaDownloadAll = function () {
        $(document).on('click', '.download-all', function () {
            if (checkSelected()) {
                $('.students-list .worker-card.selected').each(function () {
                    $(this).find('.download-certificate')[0].click();
                });
            } else {
                toastr["error"]("قم باختيار شهادة واحدة على الاقل");
            }
            return false;
        });
    };

    function popupResult(result) {
        var html;
        if (result.html) {
            html = result.html;
        }
        if (result.src) {
            html = '<img src="' + result.src + '" />';
        }
    };

    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                //$('#crop-wrap').addClass('ready');
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                }).then(function () {
                    //console.log('jQuery bind complete');
                });
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            alert("Sorry - you're browser doesn't support the FileReader API");
        }
    };

    function fileCropUpload() {
        if (jQuery().croppie) {
            $uploadCrop = $('#crop-wrap').croppie({
                viewport: {
                    width: 400,
                    height: 400,
                    //type: 'circle'
                },
                enableExif: true
            });
            $uploadCrop.on('update.croppie', function (ev, data) {
                // console.log('jquery update', ev, data);
                fileCroppedImgToFile();
            });
        }
        //$('#upload').on('change', function () { readFile(this); });
    };

    function fileCroppedImgToFile() {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {
            let file_name = new Date().getTime();
            fetch(resp)
                .then(res => res.blob())
                .then(blob => {
                    const file = new File([blob], file_name, {type: "image/jpg"});
                    $hidden_image = file;
                    //console.log(file);
                });
        });
    };
    var handleMediaImage = function () {
        $(document).on('click', '.media-item', function () {
            let $id = $(this).attr('data-id');
            $('.media-item').removeClass('active');
            $(this).addClass('active');
            $('#media_id').val($id);
            return false;
        });
    };
    return {
        init: function () {
            handleMenuResponsive();
            // handleAos();
            handleHeroSlider();
            handleCentersSlider();
            handleTrainersSlider();
            handlePartnersSlider();
            handleChangeDateType();
            handleDatePicker();
            handleModalTemplate();
            handleCopyText();
            handleFileOnChange();
            handleTabsEvent();
            handleUploadFileChange();
            handleShowPassword();
            openDropDown();
            handleScrollToSection();
            handleCounterNumbers();
            handleGoToTop();
            handleCheckAll();
            handlaDownloadAll();
            fileCropUpload();
            handleMediaImage();
        }
    };
}();

$(document).ready(function () {
    main.init();
});
