 <!--begin::Subheader-->
 <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
     <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
         <!--begin::Info-->
         <div class="d-flex align-items-center flex-wrap mr-2 ">
             <!--begin::Page Title-->
             <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 " style="width: 300px !important"><b>
            </b>
            @yield('header')
        </h5>
             <!--end::Page Title-->
             <!--begin::Action-->
             <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
             @if (Route::currentRouteName() != 'home')
                 @yield('button')
             @endif

             <!--end::Action-->
         </div>
         <!--end::Info-->

         <div>
             <h4>@yield('page_title')</h4>
         </div>

         <!--begin::Toolbar-->
         <div class="d-flex align-items-center flex-wrap">
             <a href="{{ route('home') }}" class="btn btn-primary font-weight-bolder btn-sm">برگشت به صفحه اصلی</a>
         </div>
         <!--end::Toolbar-->
     </div>
 </div>
 <!--end::Subheader-->
