<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl">
{{-- <html direction="ltr" dir="ltr" style="direction: ltr"> --}}
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Laravel Project</title>
    <meta name="description" content="CE-MIS" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/header/base/dark.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/header/menu/dark.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/brand/dark.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/aside/dark.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('datepicker/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('dropify/css/dropify.css') }}">
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />

    <style>
        * {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
        }

        label {
            font-weight: bold !important;
        }

        /* Line Awesome Initialization */
        .la,
        .las,
        .lar,
        .lal,
        .lad,
        .lab {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
        }

        /* Font Awesome Initialization */
        .fa,
        .far,
        .fas {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
        }

        #kt_datatable {
            text-align: center !important;
        }

        th {
            font-weight: bold !important;
        }

        th.datatable-cell>span {
            font-weight: 900 !important;
            font-size: 1.2rem !important;
        }

        td.datatable-cell>span {
            font-size: 1.1rem !important;
        }

        .btn {
            font-weight: bold !important;
        }

        .select2 {
            width: 100% !important;
        }

        .header .header-menu .menu-nav>.menu-item>.menu-link .menu-text {
            color: #6e7899;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .header-menu .menu-nav>.menu-item .menu-submenu>.menu-subnav>.menu-item>.menu-link .menu-text {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .header-menu .menu-nav>.menu-item .menu-submenu>.menu-subnav>.menu-item.menu-item-active>.menu-link .menu-text {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .form-group label {
            font-weight: 600;
        }

        .header .header-menu .menu-nav>.menu-item>.menu-link .menu-text {
            color: #fff !important;
        }

        .header .header-menu .menu-nav>.menu-item.menu-item-active>.menu-link {
            background-color: #4c5162 !important;
        }

        label.error {
            color: red !important;
        }

        input,
        .select2 {
            font-size: 14px !important;
        }

        .btn {
            font-weight: bold !important;
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed page-loading">
    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
        <!--begin::Logo-->
        <a href="{{ route('home') }}">
            <img alt="Logo" src="{{ asset('logo\blank.png') }}" style="max-width: 4rem;" />
        </a>
        <!--end::Logo-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Header Menu Mobile Toggle-->
            <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
                <span></span>
            </button>
            <!--end::Header Menu Mobile Toggle-->
            <!--begin::Topbar Mobile Toggle-->
            <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
                <span class="svg-icon svg-icon-xl">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path
                                d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path
                                d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </button>
            <!--end::Topbar Mobile Toggle-->
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header header-fixed">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex align-items-stretch justify-content-between">
                        <!--begin::Header Menu Wrapper-->
                        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                            <!--begin::Header Logo-->
                            <div class="header-logo">
                                <a href="{{ route('home') }}">
                                    <img alt="Logo" class="img-fluid rounded-circle" src="{{ asset('logo\blank.png') }}"
                                        style="max-width: 4rem;" />
                                </a>
                            </div>
                            <!--end::Header Logo-->
                            <!--begin::Header Menu-->
                            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                                <!--begin::Header Nav-->
                                @include('layouts.menu.header-menu')
                                <!--end::Header Nav-->
                            </div>
                            <!--end::Header Menu-->
                        </div>
                        <!--end::Header Menu Wrapper-->
                        <!--begin::Topbar-->
                        <div class="topbar">
                            <!--begin::Chat-->
                            <div class="topbar-item" style="padding-left:40px; margin-top:10px;">
                                @if (session()->has('branch'))
                                    <h3><span class="badge badge-dark"
                                            style="font-weight: bold">{{ session()->get('branch') }}</span></h3>
                                @endif
                            </div>

                            <div class="topbar-item">
                                <div class="btn btn-icon btn-clean btn-lg mr-1" data-toggle="modal"
                                    data-target="#kt_chat_modal">
                                    <span class="svg-icon svg-icon-xl svg-icon-primary">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                            </div>
                            <!--end::Chat-->
                            <!--begin::User-->
                            <div class="topbar-item">
                                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                                    id="kt_quick_user_toggle">
                                    {{-- <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span> --}}
                                    <span
                                        class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ Auth::user()->name }}</span>
                                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                                        <span class="symbol-label font-size-h5 font-weight-bold">SA</span>
                                    </span>
                                </div>
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::Topbar-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    {{-- @if (Route::currentRouteName() != 'home') --}}
                    @include('layouts.menu.toolbar')
                    {{-- @endif --}}
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container-fluid">
                            @yield('content')
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div
                        class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted font-weight-bold mr-2">2023©</span>
                            <a href="#" target="_blank"
                                class="text-dark-75 text-hover-primary">mashal.rashidy50@gmail.com</a>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Nav-->
                        <div class="nav nav-dark">
                            {{-- <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">About</a>
                            <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">Team</a>
                            <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-0">Contact</a> --}}
                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->
    <!-- begin::User Panel-->
    <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
        <!--begin::Header-->
        <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
            <h3 class="font-weight-bold m-0 text-primary">مشخصات کاربر</h3>
            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
                <i class="ki ki-close icon-xs text-muted"></i>
            </a>
        </div>
        <!--end::Header-->
        <!--begin::Content-->
        <div class="offcanvas-content pr-5 mr-n5">
            <!--begin::Header-->
            <div class="d-flex align-items-center mt-5">
                <div class="symbol symbol-100 mr-5">
                    <form id="avatar_store_form">
                        @csrf
                        <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar"
                            style="background-image: @if (Auth::user()->image != null) url({{ asset('storage/user_images/' . Auth::user()->image) }}) @else url(logo/blank.png) @endif">
                            {{-- <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-image: url(assets/media/users/blank.png)"> --}}
                            <div class="image-input-wrapper"></div>
                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="change" data-toggle="tooltip" title=""
                                data-original-title="تبدیل عکس کاربر">
                                <i class="fa fa-pen icon-sm text-muted"></i>
                                <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="profile_avatar_remove" />
                            </label>
                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>
                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>
                        </div>
                    </form>

                    {{-- <div class="symbol-label" style="background-image:url({{ asset('moi-img/user_default.jpg') }})"></div> --}}
                    {{-- <i class="symbol-badge bg-success"></i> --}}
                </div>
                <div class="d-flex flex-column">
                    <a href="#"
                        class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{ Auth::user()->name }}</a>
                    {{-- <div class="text-muted mt-1">
                        @if (Auth::user()->roles->pluck('section')[0] == 1)
                            Tashkilat
                        @elseif (Auth::user()->roles->pluck('section')[0] == 2)
                            Pezhanton
                        @elseif (Auth::user()->roles->pluck('section')[0] == 3)
                            Card
                        @endif
                    </div> --}}
                    <div class="navi mt-2">
                        <a href="#" class="navi-item">
                            <span class="navi-link p-0 pb-2">
                                <span class="navi-icon mr-1">
                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                    fill="#000000" />
                                                <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5"
                                                    r="2.5" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="navi-text text-muted text-hover-primary">{{ Auth::user()->email }}</span>
                            </span>
                        </a>
                        <a href="{{ route('logout') }}"
                            class="btn btn-sm btn-outline-danger font-weight-bolder py-2 px-5 btn-block"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <span class="bi bi-file float-left mt-1"></span>
                            خروج
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <!--end::Header-->

            <!--begin::Separator-->
            <div class="separator separator-dashed mt-8 mb-5"></div>
            <!--end::Separator-->

            <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
                <h3 class="font-weight-bold m-0 text-primary">رمز عبور</h3>
            </div>

            <form action="{{ route('change-user-password') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <label>رمز گذشته</label>
                        <input type="password" class="form-control" oninvalid="InvalidMsg(this);"
                            name="old_password" required>
                    </div>
                    <div class="col-xs-12 col-md-12">
                        <label>رمز جدید</label>
                        <input type="password" class="form-control" oninvalid="InvalidMsg(this);" name="password"
                            required>
                    </div>
                    <div class="col-xs-12 col-md-12">
                        <label>تایید رمز جدید</label>
                        <input type="password" class="form-control" oninvalid="InvalidMsg(this);"
                            name="password_confirmation" required>
                    </div>
                </div>
                <div class="mt-4">
                    <button class="btn btn-outline-dark btn-block" type="submit">تغییر رمز</button>
                </div>
            </form>
            <!--begin::Separator-->
            <div class="separator separator-dashed mt-8 mb-5"></div>
            <!--end::Separator-->
        </div>
        <!--end::Content-->
    </div>
    <!-- end::User Panel-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop">
        <span class="svg-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10"
                        rx="1" />
                    <path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
    </div>
    <!--end::Scrolltop-->

    <!--end::Demo Panel-->

    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    {{-- <script src="{{ asset('assets/plugins/custom/gmaps/gmaps.js') }}"></script> --}}
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('assets/js/pages/widgets.js') }}"></script>
    {{-- <script src="assets/js/pages/crud/forms/widgets/select2.js"></script> --}}
    <script src="{{ asset('assets/plugins/jquery validation/jquery.validate.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/plugins/jquery validation/jquery.validation.extra.js') }}"></script> --}}
    <script src="{{ asset('datepicker/bootstrap-datepicker.fa.min.js') }}"></script>
    <script src="{{ asset('datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('dropify/js/dropify.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>


    <!--end::Page Scripts-->

    <script>
        $('.select2').select2({
            width: '100%'
        });

        var avatar = new KTImageInput('kt_user_edit_avatar');

        $("input[name=profile_avatar]").change(function() {
            startModalLoader();
            var myformData = new FormData($('#avatar_store_form')[0]);
            $.ajax({
                method: 'POST',
                processData: false,
                contentType: false,
                cache: false,
                data: myformData,
                enctype: 'multipart/form-data',
                url: "{{ route('change-user-image') }}",
                success: function(response) {
                    if (response == true) {
                        success("موفقانه تبدیل گردید.!");
                        setTimeout(() => {
                            location.reload();
                        }, 700);
                    } else {
                        var response = JSON.parse(response);
                        $.each(response, function(prefix, val) {
                            error_function(val[0]);
                        });
                    }
                    stopModalLoader();
                },
                error: function() {
                    error_function("لطفا دوباره کوشش نمایید");
                    stopModalLoader();
                }
            });
        });

        const success = (msg) => {
            Swal.fire({
                title: msg,
                text: "",
                icon: "success",
                confirmButtonText: 'بستن'
            });
        }

        const warning = (msg) => {
            Swal.fire({
                title: msg,
                text: "",
                icon: "warning",
                confirmButtonText: 'بستن'
            });
        }

        const error_function = (msg) => {
            Swal.fire({
                title: msg,
                text: "",
                icon: "error",
                confirmButtonText: 'بستن'
            });
        }

        const startPageLoader = () => {
            KTApp.blockPage({
                overlayColor: '#000000',
                state: 'primary',
                opacity: 0.5,
                size: 'lg',
                message: 'لطفا منتظر باشید...'
            });
        }

        const stopPageLoader = () => {
            KTApp.unblockPage();
        }

        const startModalLoader = (modalId) => {
            KTApp.block('.modal .modal-content', {
                overlayColor: '#000000',
                state: 'primary',
                opacity: 0.5,
                size: 'lg', //available custom sizes: sm|lg
                message: 'لطفا منتظر باشید...'
            });
        }

        const stopModalLoader = (modalId) => {
            KTApp.unblock('.modal .modal-content');
        }

        var timeout = ({{ config('session.lifetime') }} * 60000) + 1000;
        setTimeout(function() {
            window.location.reload(1);
        }, timeout);
    </script>

    @if (Session::has('success'))
        <script>
            success("{{ Session::get('success') }}");
        </script>
    @endif

    @if (Session::has('warning'))
        <script>
            error_function("{{ Session::get('warning') }}");
        </script>
    @endif

    @yield('scripts')

</body>
<!--end::Body-->

</html>
