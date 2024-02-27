@extends('layouts.master')

@section('header')
    صلاحیت ها
@endsection
@section('button')
        <button type="button" class="btn btn-light-primary font-weight-bolder" data-toggle="modal" data-target="#add_modal">صلاحیت
            جدید</button>
@endsection
@section('content')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />

    <style>
        fieldset {
            border: 1px solid #ddd !important;
            min-width: 0;
            width: 100%;
            padding: 10px;
            position: relative;
            border-radius: 6px;
            background-color: #f3f3f3;
            margin-top: 10px;
            padding-left: 10px !important;
        }

        legend {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 0px;
            width: 55%;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px 5px 5px 10px;
            color: white;
            background-color: #3B3F51;
            opacity: 0.8;
        }
    </style>
    <div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>ایجاد صلاحیت جدید</h5>
                </div>
                <div class="modal-body">
                    <form id="store_form" method="POST" action="{{ route('role.store') }}">
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-lg-6">
                                <label>نام صلاحیت</label>
                                <input type="text" class="form-control" oninvalid="InvalidMsg(this);" name="name"
                                    required>
                                <div class="invalid-feedback name_error"></div>
                            </div>

                            <div class="form-group col-12">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <fieldset>
                                            <legend>
                                                بخش ها
                                            </legend>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <ul>
                                                        @php
                                                            $total_records = count($permission);
                                                        @endphp
                                                        @for ($i = 0; $i < $total_records / 2; $i++)
                                                            <li style="overflow-wrap: anywhere;">
                                                                <input type="checkbox" value="{{ $permission[$i]->id }}"
                                                                    name="permissions[]"
                                                                    id="add_role{{ $permission[$i]->id }}">
                                                                @if ($permission[$i]->name == 'Show All Branches Data')
                                                                <label class="text-danger" for="add_role{{ $permission[$i]->id }}">{{ $permission[$i]->name_dr }}</label>
                                                                @else
                                                                <label for="add_role{{ $permission[$i]->id }}">{{ $permission[$i]->name_dr }}</label>
                                                                @endif
                                                            </li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <fieldset>
                                            <legend>
                                                بخش ها
                                            </legend>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <ul>
                                                        @for ($i = $i; $i < $total_records; $i++)
                                                            <li style="overflow-wrap: anywhere;">
                                                                <input type="checkbox" value="{{ $permission[$i]->id }}"
                                                                    name="permissions[]"
                                                                    id="add_role{{ $permission[$i]->id }}">
                                                                <label
                                                                    for="add_role{{ $permission[$i]->id }}">{{ $permission[$i]->name_dr }}</label>
                                                            </li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <br>
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

    <div class="card card-custom">
        <div class="card-body">
            <table class="table table-bordered table-hover table-checkable data-table" id="kt_datatable"
                style="margin-top: 13px !important">
                <thead>
                    <tr>
                        <th>نمبر</th>
                        <th>نام</th>
                        {{-- <th>سیستم</th> --}}
                        <th class="text-center">عملیات</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>تغییرات در سال</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" id="edit_form" action="{{ route('role.update') }}">
                        @csrf
                        <input type="hidden" id="edit_record_id" name="id" value="">
                        <div class="form-row">


                            <div class="form-group col-lg-6">
                                <label for="edit_name">Name</label>
                                <input type="text" class="form-control" name="name" id="edit_name" required>
                                <div class="invalid-feedback name_error"></div>
                            </div>

                            <div class="col-12" id="edit-form-permissions">

                            </div>
                        </div>
                        <br>
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
@endsection
@section('scripts')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    @if (session()->has('success'))
        <script>
            success("{{ session()->get('success') }}")
        </script>
    @endif
    <script type="text/javascript">
        $(document).ready(function() {
            $('#kt_datatable').DataTable({
                responsive: true,
                searchDelay: 500,
                processing: true,
                serverSide: true,
                "bInfo": false,
                "paging": true,
                "lengthChange": true,
                "searching": true,
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
                ajax: "{{ route('roles.index') }}",
                columns: [{
                        "data": 'id'
                    },
                    {
                        "data": 'name'
                    },
                    // {
                    //     "data": 'system_name'
                    // },
                    {
                        "data": 'action'
                    }
                ]
            });

            $(document).ready(function() {
                var store_form_submited = false;
                $(document).on('submit', '#store_form', function(event) {
                    event.preventDefault();

                    if (!store_form_submited) {
                        var url = $(this).attr('action');
                        $.ajax({
                            url: url,
                            type: 'post',
                            data: $(this).serialize(),
                            dataType: 'html',
                            beforeSend: function() {
                                store_form_submited = true;
                                $('body').css('padding-right', 'unset');
                                startModalLoader();
                            },
                            success: function(data) {
                                if (data == true) {
                                    $("input[name=name]").val('');
                                    $("select[name=section]").val('').trigger('change');
                                    $('.data-table').DataTable().ajax.reload();
                                    success("موفقانه ثبت گردید.!");
                                    $('#add_modal').modal('hide');
                                } else {
                                    var response = JSON.parse(data);
                                    $.each(response, function(prefix, val) {
                                        $('div.' + prefix + '_error').text(val[
                                            0]);
                                        $("input[name=" + prefix + "]")
                                            .addClass('is-invalid');
                                    });
                                }
                                stopModalLoader();
                                $('body').css('padding-right', '17px');
                                store_form_submited = false;
                            },
                            error: function() {
                                error_function(
                                    "There Is Problem on Processing Your Request Please Contact Database Administrator!"
                                    );
                                stopModalLoader();
                                $('body').css('padding-right', '17px');
                                store_form_submited = false;
                            }
                        });
                    }
                });

                var edit_form_submited = false;
                $(document).on('submit', '#edit_form', function(event) {
                    event.preventDefault();

                    if (!edit_form_submited) {
                        var url = $(this).attr('action');
                        $.ajax({
                            url: url,
                            type: 'post',
                            data: $(this).serialize(),
                            dataType: 'html',
                            beforeSend: function() {
                                edit_form_submited = true;
                                startModalLoader();
                            },
                            success: function(data) {
                                if (data == true) {
                                    $('#kt_datatable').DataTable().ajax.reload();
                                    $('#edit_modal').modal('hide');
                                    success("تغیرات موفقانه اجرا گردید.!");
                                } else if (data == 'duplicate_year') {
                                    $('div.name_error').text(
                                        'این صلاحیت قبلا ثبت شده است.');
                                    $("input[id=edit_year]").addClass('is-invalid');
                                } else {
                                    var response = JSON.parse(data);
                                    $.each(response, function(prefix, val) {
                                        $('div.' + prefix + '_error').text(val[
                                            0]);
                                        $("input[id=edit_" + prefix + "]")
                                            .addClass('is-invalid');
                                    });
                                }
                                stopModalLoader();
                                edit_form_submited = false;
                            },
                            error: function() {
                                error_function(
                                    "There Is Problem on Processing Your Request Please Contact Database Administrator!"
                                    );
                                stopModalLoader();
                                edit_form_submited = false;
                            }
                        });
                    }
                });

                $(document).on('change', 'input', function(event) {
                    $(this).removeClass('is-invalid');
                });

                $(document).on('click', '.edit_btn', function(event) {
                    var id = $(this).attr('record_id');
                    var section = $(this).attr('section');
                    $('#edit_record_id').val(id);
                    $('#edit_section').val(section);
                    $('#edit_name').val($(this).attr('name'));

                    var action = $(this).attr('action');
                    $.ajax({
                        url: action,
                        type: 'get',
                        data: {
                            'section': section,
                            'id': id
                        },
                        dataType: 'html',
                        beforeSend: function() {
                            $('body').css('padding-right', 'unset');
                            startPageLoader();
                        },
                        success: function(data) {
                            $('#edit-form-permissions').html(data);
                            stopPageLoader();
                            $('body').css('padding-right', '17px');
                        },
                        error: function() {
                            error_function(
                                "There Is Problem on Processing Your Request Please Contact Database Administrator!"
                                );
                            stopPageLoader();
                            $('body').css('padding-right', '17px');
                        }
                    });

                    $('#edit_modal').modal('show');
                });


            });
        });
    </script>
@endsection
