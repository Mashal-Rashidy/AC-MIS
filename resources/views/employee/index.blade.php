@extends('layouts.master')

@section('header')
    لست کارمندان
@endsection
@section('button')
    <button type="button" class="btn btn-light-primary font-weight-bolder" data-toggle="modal" data-target="#add_modal">ثبت
        کارمند جدید</button>
@endsection
@section('content')
    <style>
        label#name_en-error {
            float: left !important;
        }

        label#name_dr-error {
            float: left !important;
        }
    </style>

<textarea id="printing-css" style="display:none;">
    .card-print {
        background-image: url('{{ asset('assets/print_card.jpg') }}');
        max-width: 5.5cm;
        max-height: 8.5cm;
        width: 5.5cm;
        height: 8.5cm;
        background-size: cover;
    }

    .img {
        position: absolute;
        margin-left: 67px;
        margin-top: 23px;
        position: absolute;
        border-radius: 50%;
        width: 80px;
        height: 80px;
    }

    .name {
        position: absolute;
        font-size: 10pt;
        margin-left: 55px;
        position: absolute;
        margin-top: 120px;
        font-weight: bold;
        font-family: Century Gothic;
        color: #fcfeff;
    }

    .body {
        position: absolute;
        font-size: 6pt;
        margin-left: 20px;
        font-family: Century Gothic;
        position: absolute;
        margin-top: 145px;
        font-weight: bold;
        color: white;
    }

    .qr {
        border-radius: 2px;
        margin-left: 30px;
        position: absolute;
        margin-top: 235px;
        background: white;
        padding: 3px;
    }
    @media print{
        *{
            -webkit-print-color-adjust: exact !important;
            color-adjust: exact !important;
        }
    }
</textarea>

    <!-- Create Employee Modal:start -->
    <div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>ثبت کارمند جدید</h5>
                </div>
                <form id="store_form" autocomplete="off">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="name" class="col-form-label required">نام کارمند </label>
                                <input id="name" type="text" class="form-control" name="name" autofocus>
                            </div>
                            <div class="form-group col-lg-6" dir="ltr">
                                <div class="image-input image-input-empty image-input-outline mt-2">
                                    <label for="photo" class="col-form-label required">عکس</label>
                                    <input type="file" id="photo" name="photo" class="dropify" data-height="120"
                                        accept="/image/png, image/jpeg, image/jpg" data-show-loader="true"
                                        data-show-errors="true" data-allowed-file-extensions="png jpg jpeg"
                                        data-max-file-size="3M" data-default-file="{{ asset('blank.png') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">بستن</button>
                        <button type="submit" class="btn btn-primary">ذخیره</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Create Employee Modal:end -->

    <!--  Employee List:start -->
    <div id="accordion">
        <div class="card">
            <div class="pl-8 pt-5" id="headingOne">
                <button class="btn btn-outline-dark btn-sm card-title mt-2" data-toggle="collapse"
                    data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <i class="flaticon-search"></i> جستجو کردن معلومات
                </button>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <form id="search_form">
                        <div class="row">
                            <div class="col-md-2">
                                <input type="text" name="search_id" id="search_id" autofocus="on" class="form-control"
                                    placeholder="ای دی کارمند را بنوسید">
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="search_name" id="search_name" autofocus="on"
                                    class="form-control" placeholder="نام کارمند را بنوسید">
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="search_account" id="search_account" autofocus="on"
                                    class="form-control" placeholder="نمبر کارمند را بنوسید">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-sm btn-outline-primary pr-1"><i
                                        class="flaticon-search"></i></button>
                                <button type="button" id="customer_reset_btn" class="btn btn-sm btn-outline-danger pr-1"><i
                                        class="flaticon-refresh"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-custom">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-checkable data-table" id="kt_datatable"
                    style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th class="text-center">نمبر</th>
                            <th class="text-center">نمبر کارمند</th>
                            <th class="text-center">عکس</th>
                            <th class="text-center">نام کارمند</th>
                            <th class="text-center">مسول ثبت</th>
                            <th class="text-center">تاریخ ختم کارت</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!--  Employee List:end -->

    <!-- Update Employee Modal:start -->
    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>تجدید معلومات کارمند </h5>
                </div>
                <div class="modal-body">
                    <form id="edit_form">
                        @csrf
                        <input type="hidden" id="employee_id" name="employee_id">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="edit_name" class="col-form-label required">نام کارمند </label>
                                <input id="edit_name" type="text" class="form-control" name="edit_name" autofocus>
                            </div>
                            <div class="form-group col-lg-6" dir="ltr">
                                <div class="image-input image-input-empty image-input-outline mt-2">
                                    <label for="edit_photo" class="col-form-label required">عکس</label>
                                    <input type="file" id="edit_photo" name="edit_photo" class="dropify"
                                        data-height="120" accept="/image/png, image/jpeg, image/jpg"
                                        data-show-loader="true" data-show-errors="true"
                                        data-allowed-file-extensions="png jpg jpeg" data-max-file-size="3M"
                                        data-default-file="" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button class="btn btn-danger" type="button" data-dismiss="modal"
                                aria-label="Close">بستن</button>
                            <button type="submit" class="btn btn-primary">ذخیره</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Udpate Employee Modal:end -->

     <!-- Print Modal:start -->
     <div id="print" hidden> </div>
     <iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none; width: 100%"></iframe>
     <!-- Print Modal:end -->
@endsection
@section('scripts')
    <script>
        $('.dropify').dropify({
            messages: {
                'default': "Drag and drop a file here or click",
                'replace': "Drag and drop or click to replace",
                'remove': "Remove",
                'error': "Ooops, something wrong happended."
            },
            error: {
                'fileSize': "The file size is too big (3 max).",
                'imageFormat': "The image format is not allowed (jpg,png,jpeg only)."
            }
        });

        function employeeList() {
            $('#kt_datatable').DataTable().destroy();
            $('#kt_datatable').DataTable({
                responsive: true,
                searchDelay: 500,
                processing: true,
                serverSide: true,
                "bInfo": true,
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "aaSorting": [
                    [0, "desc"]
                ],
                "info": true,
                "language": {
                    "sProcessing": 'لطفا منتظر باشد...<span class="spinner spinner-primary ml-10"></span>',
                    "sSearch": "جستجو",
                    "paginate": {
                        "previous": "قبلی",
                        "next": "بعدی"
                    },
                    "sEmptyTable": "دیتا موجود نیست"
                },
                ajax: {
                    url: "{{ route('employee-list') }}",
                    data: {
                        id: $('#search_id').val(),
                        name: $('#search_name').val(),
                        employee_card_id: $('#search_account').val(),
                    },
                },
                columns: [{
                        "data": 'id'
                    },
                    {
                        "data": 'card_number'
                    },
                    {
                        data: 'photo_path',
                        render: function(data, type, full, meta) {
                            return "<img src=" + data + " width='70px' class='chat-img' />";
                        },
                    },
                    {
                        "data": 'name'
                    },
                    {
                        "data": 'created_by'
                    },
                    {
                        "data": 'card_expired_date'
                    },
                    {
                        "data": 'action'
                    },
                ]
            });
        }

        $('#customer_reset_btn').click(function() {
            $('#kt_datatable').DataTable().destroy();
            $('#customer_search_form')[0].reset();
            $('#customer_account').val('');
            $('#customer_name').val('');
            $('#customer_fname').val('');
            $('#customer_nic').val('');
            employeeList();
        });

        $(document).ready(function() {
            employeeList();
            $('#search_form').submit(function(event) {
                event.preventDefault();
                if ($('#search_id').val() == '' && $('#search_name').val() == '' && $('#search_account')
                    .val() == '') {
                    Swal.fire(
                        'لطفا !',
                        'معلومات را درج نماید',
                        'warning'
                    )
                } else {
                    $('#kt_datatable').DataTable().destroy();
                    employeeList();
                }

            });
        });



        $('#store_form').validate({
            rules: {
                name: {
                    required: true,
                },
                photo: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: 'درج نام کارمند ضروری میباشد',
                },
                photo: {
                    required: 'انتخاب عکس ضروری میباشد',
                },
            }
        });

        $(document).on('submit', '#store_form', function(event) {
            event.preventDefault();
            const formData = new FormData(this);
            $.ajax({
                url: '{{ route('employee-create') }}',
                type: 'POST',
                contentType: false,
                cache: false,
                processData: false,
                data: formData,
                beforeSend: function() {
                    startModalLoader();
                },
                success: function(response) {
                    stopModalLoader();
                    if (response.status == true) {
                        $('#add_modal').modal('hide');
                        $('.data-table').DataTable().ajax.reload();
                        $("input[name=name]").val('');
                        $("input[name=photo]").val('');
                        success(response.data);
                    } else {
                        $.each(response.errors, function(prefix, val) {
                            toastr.error('دیتا درست نمیباشد!', val[0]);
                        });
                    }
                },
                error: function() {
                    error_function(
                        "There Is Problem on Processing Your Request Please Contact Database Administrator!"
                    );
                    stopModalLoader();
                }
            });
        });


        function editData(id) {
            $.ajax({
                url: '{{ route('employee-edit') }}/' + id,
                type: 'get',
                beforeSend: function() {
                    startPageLoader();
                },
                success: function(response) {
                    stopPageLoader();
                    if (response.status == true) {
                        $('#employee_id').val(response.data.id);
                        $('#edit_name').val(response.data.name);
                        $('#edit_photo').attr('data-default-file', response.photo_path);
                        $('#edit_modal').modal('show');
                    } else {
                        error_function(
                            "" + response.data + ""
                        );
                    }
                },
                error: function() {
                    error_function(
                        "There Is Problem on Processing Your Request Please Contact Database Administrator!"
                    );
                    stopModalLoader();
                    $('body').css('padding-right', '17px');
                }
            });
        }

        $('#edit_form').validate({
            rules: {
                edit_name: {
                    required: true,
                },
            },
            messages: {
                edit_name: {
                    required: 'درج نام کارمند ضروری میباشد',
                },
            }
        });

        $(document).on('submit', '#edit_form', function(event) {
            event.preventDefault();
            const formData = new FormData(this);
            $.ajax({
                url: '{{ route('employee-update') }}',
                type: 'post',
                contentType: false,
                cache: false,
                processData: false,
                data: formData,
                beforeSend: function() {
                    startModalLoader();
                },
                success: function(response) {
                    if (response.status === true) {
                        $('.data-table').DataTable().ajax.reload();
                        $('#edit_modal').modal('hide');
                        $("input[name=edit_name]").val('');
                        $("input[name=edit_photo]").val('');
                        success(response.data);
                    } else {
                        $.each(response.errors, function(prefix, val) {
                            toastr.error('دیتا درست نمیباشد!', val[0]);
                        });
                    }
                    stopModalLoader();
                },
                error: function() {
                    error_function(
                        "There Is Problem on Processing Your Request Please Contact Database Administrator!"
                    );
                    stopModalLoader();
                    edit_form_submited = false;
                }
            });
        });

        function printEmployeeCard(employee_id) {
            $.ajax({
                url: '{{ route('employee-card-print') }}/'+employee_id,
                type: 'GET',
                beforeSend: function() {
                    startPageLoader();
                },
                success: function(response) {
                    stopPageLoader();
                    $("#print").html(response.card);
                    var a = document.getElementById('printing-css').value;
                    var b = document.getElementById('print').innerHTML;
                    window.frames["print_frame"].document.body.innerHTML = '<style>' + a +
                        '</style>' + b;
                    window.frames["print_frame"].window.focus();
                    setTimeout(function() {
                        window.frames["print_frame"].window.print();
                        window.frames["print_frame"].addEventListener('afterprint',
                        onAfterPrintChangePrintStatusCustomer(employee_id));
                    }, 2000);

                },
                error: function() {
                    error_function(
                        "There Is Problem on Processing Your Request Please Contact Database Administrator!"
                    );
                }
            });
        }

        function onAfterPrintChangePrintStatusCustomer(employee_id) {
            Swal.fire({
                title: 'آیا پرنت کارت موفقانه انجام شد؟',
                // text:'',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'بلی',
                cancelButtonColor: '#d33',
                cancelButtonText: 'نخیر',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('employee-card-status') }}/' + employee_id,
                        type: 'GET',
                        success: function(response) {
                            if (response.status == true) {
                                success("کارت تجدید گردید");
                            }
                        },
                        error: function() {
                            error_function(
                                "There Is Problem on Processing Your Request Please Contact Database Administrator!"
                            );
                        }
                    });
                } else {
                    // $('#print_modal').modal('hide');
                }
            });
        }
    </script>
@endsection
