<!DOCTYPE html>
<html lang="en" direction="rtl" dir="rtl">

@include('layouts.panel._head')
@stack('styles')
<body id="kt_body" class="header-tablet-and-mobile-fixed aside-enabled">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::P	age-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Aside-->
        <div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
             data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
             data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
             data-kt-drawer-toggle="#kt_aside_mobile_toggle">
            <!--begin::Aside Toolbarl-->
            <div class="aside-toolbar flex-column-auto" id="kt_aside_toolbar">
                <!--begin::Aside user-->

                <!--end::Aside user-->
            </div>
            <!--end::Aside Toolbarl-->
            @include('layouts.panel._sidebar')
        </div>
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            @include('layouts.panel._header')
            @yield('content')

            <!--end::Content-->
        </div>


@include('layouts.panel._footer')

@stack('modals')
@include('layouts.panel._script')

@stack('scripts')


</body>
</html>
