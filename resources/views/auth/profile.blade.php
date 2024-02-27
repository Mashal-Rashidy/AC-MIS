@extends('layouts.app')

@section('content')
    <!--begin::Details-->
    <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
        <!--begin: Pic-->
        <div class="me-7 mb-4">
            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                <img src="{{ auth()->user()->image != '' ? asset('storage/user_images') . auth()->user()->image : asset('assets/blank.png') }}" alt="image">
                <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px">
                </div>
            </div>
        </div>
        <!--end::Pic-->
        <!--begin::Info-->
        <div class="flex-grow-1">
            <!--begin::Title-->
            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                <!--begin::User-->
                <div class="d-flex flex-column">
                    <!--begin::Name-->
                    <div class="d-flex align-items-center mb-2">
                        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $user->name }}</a>
                        <a href="#">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                    <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="currentColor"></path>
                                    <path d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                    </div>
                    <!--end::Name-->
                    <!--begin::Info-->
                    <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">

                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                            <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                            <span class="svg-icon svg-icon-4 me-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor"></path>
                                    <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->{{ $user->email }}
                        </a>
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::User-->

            </div>
            <!--end::Title-->
            <!--begin::Stats-->
            <div class="d-flex flex-wrap flex-stack">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column flex-grow-1 pe-8">
                    <!--begin::Stats-->
                    <div class="d-flex flex-wrap">
                        <!--begin::Stat-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <!--begin::Number-->
                            <div class="d-flex align-items-center">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="">
                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500" data-kt-countup-prefix="$" data-kt-initialized="1">صلاحیت </div>
                            </div>
                            <!--end::Number-->
                            <!--begin::Label-->
                            <div class="fw-semibold fs-6 text-gray-400">کاربر</div>
                            <!--end::Label-->
                        </div>
                        <!--end::Stat-->
                        <!--begin::Stat-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <!--begin::Number-->
                            <div class="d-flex align-items-center">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="60" data-kt-countup-prefix="%" data-kt-initialized="1">Administrator
                                    {{-- {{ $user->roles->pluck('name')->first() }} --}}
                                </div>
                            </div>
                            <!--end::Number-->
                            <!--begin::Label-->
                            <div class="fw-semibold fs-6 text-gray-400">سیستم</div>
                            <!--end::Label-->
                        </div>
                        <!--end::Stat-->
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Progress-->
                <div class="d-flex  w-200px w-sm-300px ">
                    <button class="btn btn-sm btn-dark fw-bold" data-bs-toggle="modal" data-bs-target="#profileModal">تغییر
                        پروفایل</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-sm btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#changePasswordModal">تغییر رمز</button>
                </div>
                <!--end::Progress-->
            </div>
            <!--end::Stats-->
        </div>
        <!--end::Info-->

    </div>
    <!--end::Details-->


    <!--begin::profile form Modal-->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تغییر در پروفایل</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="profileForm" enctype="multipart/form-data" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
                            <div class="form-group col-lg-12">
                                <label id="username_error" class="required form-label" for="username">نام
                                    کاربر</label>
                                <input type="text" class="form-control form-control-sm" id="username" name="username" value="{{ $user->name }}" placeholder="نام کاربر">
                                <span id="#username"></span>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label id="photo_error" class=" form-label" for="photo">عکس
                                    پروفایل</label>
                                <input type="file" class="form-control form-control-sm" id="photo" name="photo" onchange="checkPhotoValidation(this.id)" accept="image/jpg, image/jpeg, image/png" placeholder="عکس را انتخاب نمایید" accept="image/png, image/jpeg">

                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">بسته کردن</button>
                    <button type="submit" class="btn btn-primary">ذخیره کردن</button>
                </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
    <!--end::profile form Modal-->


    <!--begin::changePassword form Modal-->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تغییر در پروفایل</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!--begin::Form-->
                <div class="modal-body">
                    <form id="changePasswordForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label id="oldPassword_error" class="required form-label" for="oldPassword">رمز
                                    قبلی</label>
                                <input type="password" class="form-control form-control-sm" id="oldPassword" name="oldPassword" placeholder="رمز قبلی تان را وارد نمایید">
                                <span id="oldPassword_error"></span>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label class=" form-label" for="password">رمز جدید</label>
                                <input type="password" class="required form-control form-control-sm" id="password" name="password" placeholder="رمز جدید را وارد نماید">
                                <span id="password_error"></span>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label class=" form-label" for="password_confirmation">تکرار رمز جدید</label>
                                <input type="password" class="required form-control form-control-sm" id="password_confirmation" name="password_confirmation" placeholder="تکرار روز جدید">
                                <span id="password_confirmation_error"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">بسته کردن</button>
                            <button type="submit" class="btn btn-primary">ذخیره کردن</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
        <!--end::changePassword form Modal-->
    @endsection

    @section('scripts')
        <script>
            $('#changePasswordForm').validate({
                rules: {
                    oldPassword: {
                        required: true,
                    },
                    password: {
                        required: true,
                    },
                    password_confirmation: {
                        required: true,
                    },
                },
                messages: {
                    oldPassword: {
                        required: '<span class="text-danger" style="font-size:12px; font-weight:bold;float:left">درج رمز قبلی ضروری میباشد</span>',
                    },
                    password: {
                        required: '<span class="text-danger" style="font-size:12px; font-weight:bold;float:left">درج رمز حدید ضروری میباشد</span>',
                    },
                    password_confirmation: {
                        required: '<span class="text-danger" style="font-size:12px; font-weight:bold;float:left">تکرار رمز جدید ضروری میباشد</span>',
                    },
                }
            });

            $(document).on('submit', '#changePasswordForm', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('profile.changePassword') }}",
                    method: "POST",
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('.someBlock').preloader({
                            zIndex: '6666666666'
                        });
                    },
                    success: function(response) {
                        $('.someBlock').preloader('remove');
                        if (response.status == 'done') {
                            $('#changePasswordModal').modal('hide');
                            Swal.fire(
                                'معلومات',
                                '' + response.data + '',
                                'success'
                            )
                            $('.swal2-confirm').click(function() {
                                location.reload(true);
                            });
                        } else if (response.status == 'err') {
                            $('span#oldPassword_error').html(response.data);
                        } else if (response.status == 'v-err') {
                            $.each(response.data, function(prefix, val) {
                                $('span#' + prefix + '_error').html(val);
                            });
                        }
                    },
                    error: function() {
                        Swal.fire(
                            'معلومات',
                            'system error',
                            'error'
                        )
                    }
                });
            });



            $('#profileForm').validate({
                rules: {
                    username: {
                        required: true,
                    },
                },
                messages: {
                    username: {
                        required: '<span class="text-danger" style="font-size:12px; font-weight:bold;float:left">درج اسم کاربر ضروری میباشد.</span>',
                    },
                }
            });

            $(document).on('submit', '#profileForm', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('profile.store') }}",
                    method: "POST",
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('.someBlock').preloader({
                            zIndex: '6666666666'
                        });
                    },
                    success: function(response) {
                        $('.someBlock').preloader('remove');
                        if (response.status == 'done') {
                            $('#profileModal').modal('hide');
                            Swal.fire(
                                'معلومات',
                                '' + response.data + '',
                                'success'
                            )
                            $('.swal2-confirm').click(function() {
                                location.reload(true);
                            });
                        } else if (response.status == 'err') {
                            $('span#oldPassword_error').html(response.data);
                        } else if (response.status == 'v-err') {
                            $.each(response.data, function(prefix, val) {
                                $('span#' + prefix + '_error').html(val);
                            });
                        }
                    },
                    error: function() {
                        Swal.fire(
                            'معلومات',
                            'system error',
                            'error'
                        )
                    }
                });
            });
        </script>
    @endsection
