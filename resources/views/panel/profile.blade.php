@extends('layouts.panel.app')

@section('title')
    نظرة عامة
@endsection
@section('sub_title')
    الملف الشخصي
@endsection
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Basic info-->

                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                         data-bs-target="#kt_account_profile_details" aria-expanded="true"
                         aria-controls="kt_account_profile_details">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">تعديل الملف الشخصي / رقم اشتراكك({{\Illuminate\Support\Facades\Auth::user()->id}})</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_profile_details" class="collapse show">
                        <!--begin::Form-->
                        <form action="{{route('profile.update',\Illuminate\Support\Facades\Auth::user()->id)}}"
                              method="POST" id="kt_account_profile_details_form" class="form"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="col-lg-6">
                                    <!--begin::Label-->
                                    <label class="col-form-label required fw-bold fs-6">الصورة الشخصيه</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-outline" data-kt-image-input="true"
                                             style="background-image: url('@if($user->image !== null) {{ asset('public/images/' . $user->image)}} @endif')">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-125px h-125px"
                                                 style="background-image: url('@if($user->image !== null) {{ asset('public/images/' . $user->image)}}  @endif')"></div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                title="Change avatar">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg"/>
                                                <input type="hidden" name="avatar_remove"/>
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Cancel-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                title="Cancel avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
                                            <!--end::Cancel-->
                                            <!--begin::Remove-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="Remove avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
                                            <!--end::Remove-->
                                        </div>
                                        <!--end::Image input-->
                                        <!--begin::Hint-->
                                        <div class="form-text">أنواع الملفات المسموح بها: png، jpg، jpeg.</div>
                                        <!--end::Hint-->

                                    </div>
                                    <!--end::Col-->
                                    @if($errors->has('avatar'))
                                        <div class="error">{{ $errors->first('avatar') }}</div>
                                    @endif
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!-- First Pair of Inputs -->
                                    <div class="col-lg-6">
                                        <!--begin::Label-->
                                        <label class="col-form-label required fw-bold fs-6">الاسم كاملا</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="fv-row">
                                            <input type="text" name="name"
                                                   class="form-control form-control-lg form-control-solid"
                                                   placeholder="الاسم كاملا"
                                                   value="{{\Illuminate\Support\Facades\Auth::user()->name}}"/>
                                        </div>
                                        @if($errors->has('name'))
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                <div data-field="communication[]"
                                                     data-validator="notEmpty">{{ $errors->first('name') }}</div>
                                            </div>
                                        @endif
                                        <!--end::Col-->
                                    </div>

                                    <div class="col-lg-6">
                                        <!--begin::Label-->
                                        <label class="col-form-label required fw-bold fs-6">البريد الالكتروني</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="fv-row">
                                            <input type="email" name="email"
                                                   class="form-control form-control-lg form-control-solid"
                                                   placeholder="البريد الالكتروني" value="{{$user->email}}"/>
                                        </div>
                                        @if($errors->has('email'))
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                <div data-field="communication[]"
                                                     data-validator="notEmpty">{{ $errors->first('email') }}</div>
                                            </div>
                                        @endif
                                        <!--end::Col-->
                                    </div>
                                    <!-- End of First Pair of Inputs -->
                                </div>

                                <div class="row mb-6">
                                    <!-- Second Pair of Inputs -->
                                    <div class="col-lg-6">
                                        <!--begin::Label-->
                                        <label class="col-form-label required fw-bold fs-6">رقم الهوية</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="fv-row">
                                            <input type="number" name="ssn"
                                                   class="form-control form-control-lg form-control-solid"
                                                   placeholder=" رقم الهوية" value="{{$user->ssn}}"/>
                                        </div>
                                        @if($errors->has('ssn'))
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                <div data-field="communication[]"
                                                     data-validator="notEmpty">{{ $errors->first('ssn') }}</div>
                                            </div>
                                        @endif
                                        <!--end::Col-->
                                    </div>

                                    <div class="col-lg-6">
                                        <!--begin::Label-->
                                        <label class="col-form-label required fw-bold fs-6">كلمة المرور الجديدة</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="fv-row">
                                            <input type="password" name="password"
                                                   class="form-control form-control-lg form-control-solid"
                                                   placeholder="كلمة المرور الجديدة" value=""/>
                                        </div>
                                        @if($errors->has('password'))
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                <div data-field="communication[]"
                                                     data-validator="notEmpty">{{ $errors->first('password') }}</div>
                                            </div>
                                        @endif
                                        <!--end::Col-->
                                    </div>
                                    <!-- End of Second Pair of Inputs -->
                                </div>

                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!-- First Pair of Inputs -->
                                    <div class="col-lg-6">
                                        <!--begin::Label-->
                                        <label class="col-form-label required fw-bold fs-6">الجنس</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="fv-row">
                                            <div class="d-flex align-items-center mt-3">
                                                <!--begin::Option-->
                                                @foreach(\App\Constants\ENUM::Gender as $gender)
                                                    <label class="form-check form-check-inline form-check-solid me-5">
                                                        <input class="form-check-input" name="gender" type="radio"
                                                               value="{{$gender}}"
                                                               @if($user->gender == $gender) checked @endif />
                                                        <span class="fw-bold ps-2 fs-6">{{$gender}}</span>
                                                    </label>
                                                @endforeach
                                                <!--end::Option-->
                                            </div>
                                            @if($errors->has('gender'))
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="communication[]"
                                                         data-validator="notEmpty">{{ $errors->first('gender') }}</div>
                                                </div>
                                            @endif
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <div class="col-lg-6">
                                        <!--begin::Label-->
                                        <label class="col-form-label required fw-bold fs-6">الجنسيه</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                         <div class="fv-row">
                                          {{--  <select name="nationality" aria-label="اختر الجنسيه" data-control="select2"
                                                    data-placeholder="اختر الجنسيه..."
                                                    class="form-select form-select-solid form-select-lg fw-bold">
                                                <option value="">اختر الجنسيه</option>
                                                @foreach(\App\Constants\ENUM::Nationality as $Nationality)
                                                    <option @if($user->nationality == $Nationality) selected
                                                            @endif value="{{$Nationality}}">{{$Nationality}}</option>
                                                @endforeach
                                            </select> --}}
                                            <input type="text" name="nationality"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="الجنسيه"
                                            value="{{\Illuminate\Support\Facades\Auth::user()->nationality}}"/>
                                            @if($errors->has('nationality'))
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="communication[]"
                                                         data-validator="notEmpty">{{ $errors->first('nationality') }}</div>
                                                </div>
                                            @endif
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!-- End of First Pair of Inputs -->
                                </div>

                                <div class="row mb-6">
                                    <!-- Second Pair of Inputs -->
                                    <div class="col-lg-6">
                                        <!--begin::Label-->
                                        <label class="col-form-label required fw-bold fs-6">الدوله</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="fv-row">
                                            {{-- <select name="country" id="countrySelect" aria-label="اختر الدوله"
                                                    data-control="select2" data-placeholder="اختر الدوله..."
                                                    class="form-select form-select-solid form-select-lg fw-bold">
                                                <option value="">اختر الدوله</option>
                                                @foreach(\App\Constants\ENUM::countries as $country)
                                                    <option @if($user->country == $country) selected
                                                            @endif  value="{{$country}}">{{$country}}</option>
                                                @endforeach
                                            </select> --}}
                                            <input type="text" name="country"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="الدوله"
                                            value="{{\Illuminate\Support\Facades\Auth::user()->country}}"/>
                                            @if($errors->has('country'))
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="communication[]"
                                                         data-validator="notEmpty">{{ $errors->first('country') }}</div>
                                                </div>
                                            @endif
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <div class="col-lg-6">
                                        <!--begin::Label-->
                                        <label class="col-form-label required fw-bold fs-6">المدينة</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="fv-row">
                                            {{-- <select name="city" id="citySelect" aria-label="اختر المدينة"
                                                    data-control="select2" data-placeholder="اختر المدينة..."
                                                    class="form-select form-select-solid form-select-lg fw-bold">
                                                <option value="">اختر المدينة</option>
                                            </select> --}}
                                            <input type="text" name="city"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="المدينة"
                                            value="{{\Illuminate\Support\Facades\Auth::user()->city}}"/>
                                            @if($errors->has('city'))
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="communication[]"
                                                         data-validator="notEmpty">{{ $errors->first('city') }}</div>
                                                </div>
                                            @endif
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!-- End of Second Pair of Inputs -->
                                </div>

                                <div class="row mb-6">
                                    <!-- First Pair of Inputs -->
                                    <div class="col-lg-6">
                                        <!--begin::Label-->
                                        <label class="col-form-label required fw-bold fs-6">آخر مؤهل علمي</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="fv-row">
                                            {{-- <select name="course" aria-label="اختر مؤهل علمي" data-control="select2"
                                                    data-placeholder="اختر مؤهل علمي..."
                                                    class="form-select form-select-solid form-select-lg fw-bold">
                                                <option value="">اختر مؤهل علمي</option>
                                                @foreach(\App\Constants\ENUM::courses as $course)
                                                    <option @if($user->course == $course) selected
                                                            @endif  value="{{$course}}">{{$course}}</option>
                                                @endforeach
                                            </select> --}}
                                            <input type="text" name="course"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="مؤهل علمي"
                                            value="{{\Illuminate\Support\Facades\Auth::user()->course}}"/>
                                            @if($errors->has('course'))
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="communication[]"
                                                         data-validator="notEmpty">{{ $errors->first('course') }}</div>
                                                </div>
                                            @endif
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <div class="col-lg-6">
                                        <!--begin::Label-->
                                        <label class="col-form-label fw-bold fs-6"><span class="required">التخصص</span></label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="fv-row">
                                            <input type="text" name="specialization"
                                                   class="form-control form-control-lg form-control-solid"
                                                   placeholder="التخصص" value="{{$user->specialization}}"/>
                                            @if($errors->has('specialization'))
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="communication[]"
                                                         data-validator="notEmpty">{{ $errors->first('specialization') }}</div>
                                                </div>
                                            @endif
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!-- End of First Pair of Inputs -->
                                </div>

                                <div class="row mb-6">
                                    <!-- Second Pair of Inputs -->
                                    <div class="col-lg-6">
                                        <!--begin::Label-->
                                        <label class="col-form-label fw-bold fs-6"><span
                                                class="required">جهة التخصص</span></label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="fv-row">
                                            <input type="text" name="area_of_specialization"
                                                   class="form-control form-control-lg form-control-solid"
                                                   placeholder="جهة التخصص" value="{{$user->area_of_specialization}}"/>
                                            @if($errors->has('area_of_specialization'))
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="communication[]"
                                                         data-validator="notEmpty">{{ $errors->first('area_of_specialization') }}</div>
                                                </div>
                                            @endif
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <div class="col-lg-6">
                                        <!--begin::Label-->
                                        <label class="col-form-label fw-bold fs-6"><span
                                                class="required">المسمى الوظيفي</span></label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="fv-row">
                                            <input type="text" name="job"
                                                   class="form-control form-control-lg form-control-solid"
                                                   placeholder="المسمى الوظيفي" value="{{$user->job}}"/>
                                            @if($errors->has('job'))
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="communication[]"
                                                         data-validator="notEmpty">{{ $errors->first('job') }}</div>
                                                </div>
                                            @endif
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!-- End of Second Pair of Inputs -->
                                </div>

                                <div class="row mb-6">
                                    <!-- First Pair of Inputs -->
                                    <div class="col-lg-6">
                                        <!--begin::Label-->
                                        <label class="col-form-label fw-bold fs-6"><span class="required">السيرة الذاتية المختصرة</span></label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="fv-row">
            <textarea type="text" name="cv_description"
                      class="form-control form-control-lg form-control-solid"
                      placeholder="السيرة الذاتية المختصرة">{{$user->cv_description}}</textarea>
                                            @if($errors->has('cv_description'))
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="communication[]"
                                                         data-validator="notEmpty">{{ $errors->first('cv_description') }}</div>
                                                </div>
                                            @endif
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <div class="col-lg-6">
                                        <!--begin::Label-->
                                        <label class="col-form-label fw-bold fs-6">
                                            <span class="required">رقم الجوال</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                               title="يجب إدخال رقم الجوال بإستخدام رمز المنطقة - مثال: 9665xxxxxxx"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="fv-row">
                                            <input type="number" name="phone"
                                                   class="form-control form-control-lg form-control-solid"
                                                   placeholder="9665xxxxxxx" value="{{$user->phone}}"/>
                                            @if($errors->has('phone'))
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="communication[]"
                                                         data-validator="notEmpty">{{ $errors->first('phone') }}</div>
                                                </div>
                                            @endif
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!-- End of First Pair of Inputs -->
                                </div>

                                <div class="row mb-6">
                                    <!-- Second Pair of Inputs -->
                                    <div class="col-lg-6">
                                        <!--begin::Label-->
                                        <label class="col-form-label fw-bold fs-6"><span
                                                class="required">اختر القطاع</span></label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="fv-row">
                                            {{-- <select name="section" id="section" aria-label="اختر القطاع" data-control="select2"
                                                    data-placeholder="اختر القطاع..."
                                                    class="form-select form-select-solid form-select-lg fw-bold">
                                                <option value="">اختر القطاع</option>
                                                @foreach(\App\Constants\ENUM::sections as $section)
                                                    <option @if($user->section == $section) selected
                                                            @endif  value="{{$section}}">{{$section}}</option>
                                                @endforeach
                                            </select> --}}
                                            <input type="text" name="section"
                                                   class="form-control form-control-lg form-control-solid"
                                                   placeholder="القطاع" value="{{$user->section}}"/>
                                            @if($errors->has('section'))
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="communication[]"
                                                         data-validator="notEmpty">{{ $errors->first('section') }}</div>
                                                </div>
                                            @endif
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <div class="col-lg-6" style="display: none">
                                        <!--begin::Label-->
                                        <label class="col-form-label fw-bold fs-6"><span
                                                class="required">المسمى الوظيفي</span></label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="fv-row">

                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!-- End of Second Pair of Inputs -->
                                </div>

                            </div>
                            <!--end::Card body-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">حفظ
                                    التغيرات
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Basic info-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
    <!--begin::Footer-->
    <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
        <!--begin::Container-->
        <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
            <!--begin::Copyright-->
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted fw-bold me-1">2021©</span>
                <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
            </div>
            <!--end::Copyright-->
            <!--begin::Menu-->
            <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                <li class="menu-item">
                    <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                </li>
                <li class="menu-item">
                    <a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a>
                </li>
                <li class="menu-item">
                    <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
                </li>
            </ul>
            <!--end::Menu-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Footer-->
@endsection
@push('scripts')
    @if ($errors->any())
        <script>
            $(document).ready(function () {
                @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
                @endforeach
            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const countryCities = {
                'الإمارات العربية المتحدة': ['دبي', 'أبو ظبي', 'الشارقة', 'العين', 'رأس الخيمة'],
                'المملكة العربية السعودية': ['الرياض', 'جدة', 'الدمام', 'المدينة المنورة', 'الأحساء'],
                'قطر': ['الدوحة', 'الوكرة', 'الخور', 'الريان', 'الشمال'],
                'عمان': ['مسقط', 'صلالة', 'نزوى', 'صحار', 'البريمي'],
                'الكويت': ['الكويت', 'الفراوانية', 'حولي', 'الجهراء', 'مبارك الكبير'],
                'البحرين': ['المنامة', 'الرفاع', 'المحرق', 'المدينة', 'جد حفص'],
            };

            const countrySelect = document.getElementById('countrySelect');
            const citySelect = document.getElementById('citySelect');

            $(countrySelect).select2();
            const citySelects = $('#citySelect').select2(); // Initialize Select2

            function populateCities(selectedCountry) {
                citySelect.innerHTML = '<option value="">اختر المدينة</option>';
                if (selectedCountry && countryCities[selectedCountry]) {
                    countryCities[selectedCountry].forEach(city => {
                        const option = document.createElement('option');
                        option.value = city;
                        option.textContent = city;
                        citySelect.appendChild(option);
                    });
                }
            }

            $(countrySelect).on('select2:select', function () {
                const selectedCountry = countrySelect.value;
                populateCities(selectedCountry);
            });

            const initialCountry = "<?php echo $user->country ?? ''; ?>";
            const initialCity = "<?php echo $user->city ?? ''; ?>";


            if (initialCountry) {
                countrySelect.value = initialCountry;
                populateCities(initialCountry);
            }

            if (initialCountry) {
                populateCities(initialCountry);
            }

            if (initialCity) {
                selectInitialCity(initialCity);
            }

            function selectInitialCity(cityName) {
                const options = citySelects.find('option');
                options.each(function () {
                    if ($(this).text() === cityName) {
                        $(this).prop('selected', true);
                    }
                });
                citySelects.trigger('change');
            }
        });

    </script>
@endpush
