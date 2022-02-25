@extends('layouts.site')

@section('css')
@endsection

@section('content')
    <div class="page-container special-design mx-auto">
        <div class="row">
            @foreach($services as $key=>$item)
                <div class="col-md-6">
                    <div class="price-box">
                        <h3>{{$item->name}}</h3>
                        <p class="text-primary"><span class="price">0</span> ريال</p>
                        <form id="form_{{$item->id}}" class="specialDesignForm" method="POST"
                              action="{{route('special-design.save', ['specialDesign'=>$item])}}">
                            @foreach($item->designSubServices as $k=>$i)
                                <label class="checkbox-field custom-label">
                                    <div class="remember-checkbox">
                                        <input type="checkbox" name="services[]" data-price="{{$i->price}}"
                                               value="{{$i->id}}" class="checkbox">
                                        <img src="{{ asset('site/img/checked.svg') }}" alt="image">
                                    </div>
                                    {{$i->name}}
                                </label>
                            @endforeach
                            <button type="submit" class="btn btn-primary-transparent btn-block">
                                <span class="txt">اطلب الأن</span>
                                <span class="hover"></span>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="order-button">
            <button type="button" class="btn btn-primary hover-black btn-block special-request-request">
                <span>قم بتخصيص طلب التصميم</span>
            </button>
        </div>
    </div><!--page container-->

    @include('site.partials.special_design_request')
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            let $form_id = 'form_1';
            $(document).on('change', '.specialDesignForm .checkbox', function () {
                let $finalPrice = 0;
                $form_id = $(this).parents('.specialDesignForm').attr('id');
                $('#' + $form_id + ' .checkbox:checked').each(function () {
                    let $price = $(this).attr('data-price');
                    $finalPrice = +$finalPrice + +$price;
                });
                $(this).parents('.price-box').find('.price').html($finalPrice);
            });

            $(document).on('change', '.specialDesignForm .checkbox', function () {
                if ($(this).prop('checked')) {
                    $(this).addClass('checked');
                } else {
                    $(this).removeClass('checked');
                }
            });

            $('.specialDesignForm').ajaxForm({
                success: function (res) {
                    toastr["success"](res.message);
                },
                error: function (res) {
                    window.handleCSRFError(res);
                    if (res.status === 422) {
                        window.showFormErrors(res);
                        if (res.responseJSON.errors.hasOwnProperty('services')) {
                            toastr["error"]('الرجاء اختيار خدمة واحدة على الاقل');
                        } else {
                            toastr["error"](res.responseJSON.message);
                        }
                    } else {
                        toastr["error"](res.responseJSON.message);
                    }
                },
                beforeSubmit: function () {
                    $('.msg.text-danger').remove();
                }
            });
        });
    </script>
@endsection
