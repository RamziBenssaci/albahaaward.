<!DOCTYPE html>

<html direction="rtl" dir="rtl" style="direction: rtl">
<!--begin::Head-->
<head>
    <base href="">
    <title>جائزة الباحة للأبداع والتميز</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{asset('assets/panel/images/fav.ico')}}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="">
    <meta property="twitter:title" content="">
    <meta property="twitter:description" content="">
    <meta property="twitter:image" content="">

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
        class="d-flex flex-column flex-column-fluid login-bg" >
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid p-2 p-md-10 pb-lg-20">
            <!--begin::Logo-->
            <a href="" class="mb-12 logo">
                <img alt="Logo" src="{{asset('assets/panel/images/logoApplication.png') }}"/>
            </a>
            <!--end::Logo-->
            <!--begin::Wrapper-->
            <div class="w-sm-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto sign-box">
                <!--begin::Form-->
                <form class="form w-100" method="POST" action="{{ route('login') }}">
                    @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">تسجيل الدخول</h1>
                        <h1 ><a class="form-label fs-6 fw-bolder text-primary mb-3" href="{{ route('register') }}">او يمكنك انشاء حساب جديد</a></h1>
                        <p class="login-text">
                            لوحة لادارة <span class="fw-semibold">
                                جائزة الباحة للأبداع والتميز
                                    </span>
                        </p>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <!--end::Link-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group-->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label fs-6 fw-bolder text-dark">البريد الإلكتروني</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid" type="email" name="email"
                               placeholder="البريد الإلكتروني" value="" autocomplete="off"/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <!--end::Input-->
                    </div>

                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack mb-2">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder text-dark fs-6 mb-0">كلمة المرور</label>
                            <!--end::Label-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid" type="password" name="password" placeholder="كلمة المرور"
                               autocomplete="off" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                        <!--end::Input-->
                    </div>
                    <h1 ><a class="form-label fs-6 fw-bolder text-primary mb-3" href="{{ route('password.request') }}">هل نسيت كلمه المرور ؟ </a></h1>
                    <br>

                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <!--begin::Submit button-->
                        <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                            <span class="indicator-label">تسجيل الدخول</span>
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
