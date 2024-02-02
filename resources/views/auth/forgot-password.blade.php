<!DOCTYPE html>

<html direction="rtl" dir="rtl" style="direction: rtl">
<!--begin::Head-->
<head>
    <base href="">
    <title>جائزة الباحة للأبداع والتميز</title>
    <meta charset="utf-8"/>
    <meta name="description" content="GIFTR"/>
    <meta name="keywords" content="GIFTR"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="GIFTR"/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <link rel="shortcut icon" href="{{asset('assets/panel/images/fav.png')}}" />
    <link href="{{asset('assets/panel/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/panel/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <link rel="stylesheet" href="{{asset('assets/panel/css/style.css')}}">
    <style>
        .sign-page .logo img {
            width: 219px;
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="bg-body sign-page">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-in -->
    <div
        class="d-flex flex-column flex-column-fluid login-bg">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid p-2 p-md-10 pb-lg-20">
            <!--begin::Wrapper-->
            <div class="w-sm-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto sign-box">
                <!--begin::Form-->
                <form method="POST" action="{{ route('password.email') }}" class="form w-100">
                    @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-10">

                        <!--begin::Logo-->
                        <a href="" class="mb-5 d-inline-block logo">
                            <img alt="Logo" src="{{asset('assets/panel/images/logoApplication.png') }}"/>
                        </a>
                        <!--end::Logo-->

                        <!--begin::Title-->
                        <h1 class="text-dark fs-4 mb-5">استعادة كلمة المرور</h1>
                        <h6 class="fs-6 text-gray-700 fw-semibold">
                            أدخل بريدك الإلكتروني لإعادة تعيين كلمة المرور الخاصة بك.
                        </h6>

                        <br>
                        @if (session('status'))
                            <div class="alert alert-success alert-success__">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!--end::Title-->
                        <!--begin::Link-->
                        <!--end::Link-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label fs-6 fw-bolder text-dark">البريد الإلكتروني</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid" type="email" name="email"
                               placeholder="البريد الإلكتروني" value="" autocomplete="off"/>
                        <!--end::Input-->
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <!--begin::Submit button-->
                        <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                            <span class="indicator-label">ارسال</span>
                        </button>
                        <!--end::Submit button-->
                        <!--begin::Separator-->

                        <!--end::Google link-->
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
        <!--begin::Footer-->

        <!--end::Footer-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
<!--end::Root-->
<!--end::Main-->
<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('assets/panel/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/panel/assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->

</body>
<!--end::Body-->
</html>


{{--<x-guest-layout>--}}
{{--    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">--}}
{{--        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}--}}
{{--    </div>--}}

{{--    <!-- Session Status -->--}}
{{--    <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--    <form method="POST" action="{{ route('password.email') }}">--}}
{{--        @csrf--}}

{{--        <!-- Email Address -->--}}
{{--        <div>--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            <x-primary-button>--}}
{{--                {{ __('Email Password Reset Link') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</x-guest-layout>--}}
