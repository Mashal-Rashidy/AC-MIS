<!--begin::Header Menu-->

<ul class="menu-nav ">
    <li class="menu-item {{ Route::currentRouteName() == 'home' ? 'menu-item-active' : '' }} {{ Route::currentRouteName() == 'home.search' ? 'menu-item-active' : '' }}"
        data-menu-toggle="click" aria-haspopup="true">
        <a href="{{ route('home') }}" class="menu-link">
            <span class="menu-text">صفحه اصلی</span>
            <i class="menu-arrow"></i>
        </a>
    </li>

    @php
        $routeActive = '';
    @endphp
    @if (Route::currentRouteName() == 'employee-list')
        @php
            $routeActive = 'menu-item-active';
        @endphp
    @endif
    <li class="menu-item menu-item-submenu menu-item-rel {{ $routeActive }}" data-menu-toggle="click"
        aria-haspopup="true">
        <a href="javascript:;" class="menu-link menu-toggle">
            <span class="menu-text"> بخش کارمندان </span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
            <ul class="menu-subnav">
                <li class="menu-item " aria-haspopup="true">
                    <a href="{{ route('employee-list') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\User.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
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
                        <span class="menu-text">لست کارمندان</span>
                    </a>
                </li>
                @can('Checking')
                <li class="menu-item " aria-haspopup="true">
                    <a href="{{ route('employee-card-check-page') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Shield-protected.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                        fill="#000000" opacity="0.3" />
                                    <path
                                        d="M14.5,11 C15.0522847,11 15.5,11.4477153 15.5,12 L15.5,15 C15.5,15.5522847 15.0522847,16 14.5,16 L9.5,16 C8.94771525,16 8.5,15.5522847 8.5,15 L8.5,12 C8.5,11.4477153 8.94771525,11 9.5,11 L9.5,10.5 C9.5,9.11928813 10.6192881,8 12,8 C13.3807119,8 14.5,9.11928813 14.5,10.5 L14.5,11 Z M12,9 C11.1715729,9 10.5,9.67157288 10.5,10.5 L10.5,11 L13.5,11 L13.5,10.5 C13.5,9.67157288 12.8284271,9 12,9 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">چک نمودن</span>
                    </a>
                </li>
                @endcan

            </ul>
        </div>
    </li>

    @php
        $routeActive = '';
    @endphp
    @if (Route::currentRouteName() == 'users.index' || Route::currentRouteName() == 'roles.index')
        @php
            $routeActive = 'menu-item-active';
        @endphp
    @endif
    <li class="menu-item menu-item-submenu menu-item-rel {{ $routeActive }}" data-menu-toggle="click"
        aria-haspopup="true">
        <a href="javascript:;" class="menu-link menu-toggle">
            <span class="menu-text">تنظیمات</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
            <ul class="menu-subnav">
                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                    @canany(['Show Users', 'Show Roles And Permissions'])
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Send.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M3,13.5 L19,12 L3,10.5 L3,3.7732928 C3,3.70255344 3.01501031,3.63261921 3.04403925,3.56811047 C3.15735832,3.3162903 3.45336217,3.20401298 3.70518234,3.31733205 L21.9867539,11.5440392 C22.098181,11.5941815 22.1873901,11.6833905 22.2375323,11.7948177 C22.3508514,12.0466378 22.2385741,12.3426417 21.9867539,12.4559608 L3.70518234,20.6826679 C3.64067359,20.7116969 3.57073936,20.7267072 3.5,20.7267072 C3.22385763,20.7267072 3,20.5028496 3,20.2267072 L3,13.5 Z"
                                            fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">مدیریت کاربران</span>
                            <i class="menu-arrow"></i>
                        </a>
                    @endcanany
                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                        <ul class="menu-subnav">
                            @can('Show Users')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ route('users.index') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-line">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">کاربران</span>
                                    </a>
                                </li>
                            @endcan
                            @can('Show Roles And Permissions')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ route('roles.index') }}" class="menu-link">

                                        <i class="menu-bullet menu-bullet-line">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">صلاحیت</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </li>

</ul>
<!--end::Header Nav-->
