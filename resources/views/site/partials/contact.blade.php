<div id="contact" class="section {{isset($classes)?$classes:''}}">
    <div class="container-content">
        <div class="row">
            <div class="col-md-5">
                <div class="contact-text">
                    <h3>اتصل بنا</h3>
                    <p>نسعد بتواصلكم ونهتم بآرائكم لأنكم جزءٌ من منظومتنا في شهادة تك</p>
                    <div class="contact-lines">
                        <p class="contact-line">Phone: <a href="tel:{{$settings['mobile']}}">{{$settings['mobile']}}</a></p>
                        <p class="contact-line">Email: <a href="mailto:{{$settings['email']}}">{{$settings['email']}}</a></p>
                    </div>
                </div>
            </div><!--col-->
            <div class="col-md-7">
                <div class="contact-form">
                    <h4>ابقى على تواصل</h4>
                    <form id="contactForm" action="{{route('contact.save')}}" method="POST" class="form"
                          novalidate="novalidate">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="الاسم"/>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="mobile" class="form-control" placeholder="رقم الجوال"/>
                                </div>
                            </div><!--col-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control"
                                           placeholder="البريد الالكتروني"/>
                                </div>
                            </div><!--col-->
                        </div><!--row-->

                        <div class="form-group">
                            <textarea class="form-control" name="message" placeholder="الرسالة"></textarea>
                        </div>

                        <div class="text-left">
                            <button type="submit" class="btn btn-primary hover-black">
                                <span>ارسال الرسالة</span>
                            </button>
                        </div>
                    </form>
                </div><!--contact form-->
            </div><!--col-->
        </div><!--row-->
    </div><!--container content-->
</div><!--contact-->

@section('partial_js')
    <script>
        $(document).ready(function () {
            $('#contactForm').ajaxForm({
                success: function (res) {
                    $('#contactForm')[0].reset();
                    toastr["success"](res.message);
                },
                error: function (res) {
                    window.handleCSRFError(res);
                    if (res.status === 422) {
                        window.showFormErrors(res);
                        toastr["error"](res.responseJSON.message);
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
