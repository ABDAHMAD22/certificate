@extends('layouts.site')

@section('css')
@endsection

@section('content')
    <div class="page-container mx-auto">
        <form id="certificateStudentsForm" action="{{route('certificate.saveStudents', ['certificate'=>$certificate])}}"
              method="POST" class="form-gray tall-form">
            {{csrf_field()}}
            <div class="users-text">
                <p>بإمكانك الآن رفع أسماء المتدربين في الدورة التدربيبة من خلال ملف اكسل</p>
                <p>وسوف يتم ادخالها بشكل مباشر</p>
                <p>لتحميل نموذج ملف اكسل لتعبئة الأسماء
                    <a href="{{ asset('site/list.xlsx') }}" download="" class="link-primary">اضغط هنا</a>
                </p>
            </div>

            <div class="form-group">
                <div class="upload-file-gray">
                    <div class="file-details">
                        <img src="{{ asset('site/img/upload-icon.svg') }}" alt="image">
                        <div class="file-text">
                            <h3 class="text-primary font-bold">تحميل معلومات المتدربين</h3>
                            <p>(انقر أو السحب والإفلات)</p>
                        </div><!--file text-->
                        <p class="input-text"></p>
                    </div><!--file details-->
                    <input type="file" name="file" class="file-upload">
                </div><!--upload file gray-->
            </div>

            <div class="mt-3">
                <p class="text-black">أو بإمكانك إدخال الأسماء يدوياً</p>

                <div class="user-fields-box mt-2 students-fields">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    اسم المتدرب/ة
                                    <span class="text-red">*</span>
                                </label>
                                <input id="name" type="text" class="form-control input-required">
                            </div><!--form group-->
                        </div><!--col-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_no">
                                    رقم الهوية / جواز السفر
                                </label>
                                <input id="id_no" type="text" class="form-control">
                            </div><!--form group-->
                        </div><!--col-->

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">
                                    البريد الإلكتروني للمتدرب/ة(إختياري)
                                </label>
                                <input id="email" type="text" class="form-control">
                            </div><!--form group-->
                        </div><!--col-->
                    </div><!--row-->

                    <button type="button" class="btn btn-add-student btn-circle btn-primary hover-black">
                        <span><img src="{{ asset('site/img/plus-icon.svg') }}" alt="image"></span>
                    </button>
                </div><!--user fields box-->

                <table class="table custom-table table-students d-none">
                    <thead>
                    <tr>
                        <th scope="col">الاسم</th>
                        <th scope="col">رقم الهوية / جواز السفر</th>
                        <th scope="col">البريد الالكتروني</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6 mx-auto">
                <button type="submit" class="btn btn-primary hover-black btn-lg btn-block">
                    <span>حفظ وتصدير</span>
                </button>
            </div>
        </form>
    </div><!--page container-->
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            let $students = [];

            function deleteTableStudents() {
                $students = [];
                renderStudentsOnTable();
            }

            $('#certificateStudentsForm').ajaxForm({
                success: function (res) {
                    $('#certificateStudentsForm')[0].reset();
                    deleteTableStudents();
                    $('.table-students').addClass('d-none');
                    $('.file-text').removeClass('d-none');
                    $('.input-text').html('');
                    toastr["success"](res.message);
                    setTimeout(function () {
                        window.location.href = res.route;
                    }, 1000);
                },
                error: function (res) {
                    window.handleCSRFError(res);
                    if (res.status === 422) {
                        window.showFormErrors(res);
                    }
                    if (res.responseJSON && res.responseJSON.hasOwnProperty('message')) {
                        toastr["error"](res.responseJSON.message);
                    }
                    if (res.status === 413) {
                        toastr["error"]("يرجى ارفاق ملف اصغر حجما");
                    }
                },
                beforeSubmit: function () {
                    $('.msg.text-danger').remove();
                }
            });

            function validation_fields() {
                let $errors_num = 0;
                $('.students-fields .text-danger').remove();
                $('.input-required').each(function () {
                    let $this = $(this);
                    if (!$this.val().trim()) {
                        $errors_num += 1;
                        $this.parents('.form-group').append('<span class="msg text-danger">هذا الحقل مطلوب</span>');
                    }
                });
                return $errors_num;
            }

            function renderStudentsOnTable() {
                $('.table-students').removeClass('d-none');
                $('.table-students>tbody').html('');
                $students.forEach((x, i) => {
                    let $row = `<tr>
                            <td>
                                <span>${x.name}</span>
                                <input type="hidden" name="students[${i}][name]" value="${x.name}">
                            </td>
                            <td>
                                <span>${x.id_no}</span>
                                <input type="hidden" name="students[${i}][id_no]" value="${x.id_no}">
                            </td>
                            <td>
                                <span>${x.email}</span>
                                <input type="hidden" name="students[${i}][email]" value="${x.email}">
                            </td>
                            <td>
                                <span class="table-delete student-delete">
                                    <svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-trash-alt fa-w-14 fa-7x"><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                </span>
                            </td>
                        </tr>`;
                    $('.table-students>tbody').append($row);
                });
                $('.students-fields .form-control').val('');
            }

            $(document).on('click', '.btn-add-student', function () {
                if (validation_fields() === 0) {
                    let $item = {
                        name: $('#name').val(),
                        id_no: $('#id_no').val(),
                        email: $('#email').val(),
                    };
                    $students.push($item);
                    renderStudentsOnTable();
                }
                return false;
            });

            $(document).on('click', '.student-delete', function () {
                let $index = $(this).parents('tr').index();
                $students.splice($index, 1);
                renderStudentsOnTable();
                if ($students.length === 0) {
                    $('.table-students').addClass('d-none');
                }
                return false;
            });
        });
    </script>
@endsection
