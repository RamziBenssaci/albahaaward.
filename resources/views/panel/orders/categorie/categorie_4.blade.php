@extends('layouts.panel.app')



@section('title')
    الجوائز
@endsection
@section('sub_title')

@endsection
@section('sub_title_2')
    تقديم طلب
@endsection
@push('meta')

@endpush
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder">
                                        تقديم طلب على جائزة
                                        - فرع الأبداع في الشعر العربي  <span class="text-color"> (أفراد)</span>
                                    </h3>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <div class="card-body">
                                <div class="Cat4-Info">
                                    <div class="row">
                                        <input type="text" style="display: none" name="contestId" value="{{$contestId}}">
                                        <div class="col-lg-4 mb-5">
                                            <label class="form-label fw-bolder mb-4">الاسم الأول</label>
                                            <input type="text" class="form-control" name="w_first_name"
                                                   placeholder="الاسم الأول">
                                            <div class="error-message" style="color: red"></div>

                                        </div>
                                        <div class="col-lg-4 mb-5">
                                            <label class="form-label fw-bolder mb-4">الأب</label>
                                            <input type="text" class="form-control" name="w_pere"
                                                   placeholder="الأب">
                                            <div class="error-message" style="color: red"></div>

                                        </div>

                                        <div class="col-lg-4 mb-5">
                                            <label class="form-label fw-bolder mb-4">اسم الجد</label>
                                            <input type="text" class="form-control" name="w_grand_pere"
                                                   placeholder="اسم الجد">
                                            <div class="error-message" style="color: red"></div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 mb-5">
                                            <label class="form-label fw-bolder mb-4">اسم العائلة</label>
                                            <input type="text" class="form-control" name="w_familiy_name"
                                                   placeholder="اسم العائلة">
                                            <div class="error-message" style="color: red"></div>

                                        </div>
                                        <div class="col-lg-4 mb-5">
                                            <label class="form-label fw-bolder mb-4">رقم الهوية</label>
                                            <input type="text" class="form-control" name="w_identity"
                                                   placeholder="رقم الهوية">
                                            <div class="error-message" style="color: red"></div>

                                        </div>

                                        <div class="col-lg-4 mb-5">
                                            <label class="form-label fw-bolder mb-4">الجنس</label>
                                            <select name="w_sexe" aria-label="الجنس" data-control="select2"
                                                   data-placeholder="الجنس"
                                                    class="form-select form-select form-select-lg fw-bold">
                                               <option value="">الجنس</option>

                                                    <option value="ذكر">ذكر</option>
                                                    <option value="أنثى">أنثى</option>

                                            </select>
                                            <div class="error-message" style="color: red"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 mb-5">
                                            <label class="form-label fw-bolder mb-4">المؤهل العلمي</label>
                                            <input type="text" class="form-control" name="w_niveau_etude"
                                                   placeholder="المؤهل العلمي">
                                            <div class="error-message" style="color: red"></div>

                                        </div>

                                        <div class="col-lg-4 mb-5">
                                            <label class="form-label fw-bolder mb-4"> المسمى الوظيفي</label>
                                            <input type="text" class="form-control" name="w_name_jobs"
                                                   placeholder="المسمى الوظيفي">
                                            <div class="error-message" style="color: red"></div>
                                        </div>


                                        <div class="col-lg-4 mb-5">
                                            <label class="form-label fw-bolder mb-4">التخصص</label>
                                            <input type="text" class="form-control" name="w_spacialite"
                                                   placeholder="التخصص">
                                            <div class="error-message" style="color: red"></div>

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-5">
                                            <label class="form-label fw-bolder mb-4">عنوان المشاركة</label>
                                            <textarea class="form-control" placeholder="عنوان المشاركة"
                                                   name="w_adress_parti"
                                                   rows="4"></textarea>
                                            <div class="error-message" style="color: red"></div>

                                        </div>

                                        <div class="col-lg-6 mb-5">
                                            <label class="form-label fw-bolder mb-4">وصف المشاركة</label>
                                            <textarea class="form-control" placeholder="وصف المشاركة"
                                                   name="w_note_parti"
                                                   rows="4"></textarea>
                                            <div class="error-message" style="color: red"></div>
                                        </div>

                                    </div>
                                </div>
                                    <h2 class="fw-bolder mb-4 mt-5">المعايير</h2>


                                     <div class="row mt-8">
                                        <div id="accordionCat4">
                                            <div class="card" >
                                              <div class="card-header" id="headingOneCat4">
                                                <h5 class="mb-0">
                                                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOneCat4" aria-expanded="true" aria-controls="collapseOneCat4">
                                                    القصيدة الشعرية
                                                  </button>
                                                </h5>
                                              </div>

                                              <div id="collapseOneCat4" class="collapse show" aria-labelledby="headingOneCat4" data-parent="#accordionCat4">
                                                <div class="card-body">
                                                    <div class="FormCat4Tab1">
                                                        <div class="row mt-5 row_Cat4_tab1_1">
                                                          <div class="col-lg-3 mb-5">
                                                            <label class="form-label fw-bolder mb-4">المؤشر</label>
                                                            <input type="text" class="form-control" name="Cat4_Tab1_Point_1" placeholder="المؤشر">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4 mb-5">
                                                            <label class="form-label fw-bolder mb-4">الشاهد</label>
                                                            <input type="text" class="form-control" name="Cat4_Tab1_Cahid_1" value="لا يوجد"  placeholder="الشاهد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4">
                                                            <label class="form-label fw-bolder mb-4">ملف الشواهد</label>
                                                            <input type="file" class="form-control" id="Cat4_Tab1_File_1" name="Cat4_Tab1_File_1" placeholder="ملف الشواهد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-1 d-flex flex-column align-items-center justify-content-center">
                                                            <button type="button" class="btn btn-info mt-4 add_Cat4_tab1">أضف</button>
                                                            <div class="error-message" style="color: red;"></div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="card">
                                              <div class="card-header" id="headingTwoCat4">
                                                <h5 class="mb-0">
                                                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwoCat4" aria-expanded="false" aria-controls="collapseTwoCat4">
                                                    	السيرة الذاتية
                                                  </button>
                                                </h5>
                                              </div>
                                              <div id="collapseTwoCat4" class="collapse" aria-labelledby="headingTwoCat4" data-parent="#accordionCat4">
                                                <div class="card-body">
                                                    <div class="FormCat4Tab2">
                                                        <div class="row mt-5 row_Cat4_tab2_1">
                                                          <div class="col-lg-3 mb-5">
                                                            <label class="form-label fw-bolder mb-4">المؤشر</label>
                                                            <input type="text" class="form-control" name="Cat4_Tab2_Point_1" placeholder="المؤشر">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4 mb-5">
                                                            <label class="form-label fw-bolder mb-4">الشاهد</label>
                                                            <input type="text" class="form-control" value="لا يوجد" name="Cat4_Tab2_Cahid_1" placeholder="الشاهد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4">
                                                            <label class="form-label fw-bolder mb-4">ملف الشواهد</label>
                                                            <input type="file" class="form-control" id="Cat4_Tab2_File_1" name="Cat4_Tab2_File_1" placeholder="ملف الشواهد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-1 d-flex flex-column align-items-center justify-content-center">
                                                            <button type="button" class="btn btn-info mt-4 add_Cat4_tab2">أضف</button>
                                                            <div class="error-message" style="color: red;"></div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </div>

                                    <div class="row mt-8 pr-5 correct_info_Cat4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefaultCat4">
                                            <label class="form-check-label fw-bolder" for="flexCheckDefaultCat4">
                                                أوافق على صحبة البيانات المدخلة وعلى كافة الشروط والاحكام الخاصة بجائزة الباحة للابداع والتميز
                                            </label>
                                        </div>
                                    </div>





                                <div class="d-flex justify-content-end pt-8 mt-10 border-top ">
                                    <button class="btn btn-primary min-w-100px save-Cat4"

                                            >
                                        اضافة
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
    <div id="loading-spinner-Cat4" class="d-none">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        Loading...
    </div>


@endsection

@push('scripts')
<script src="{{ asset('js/Categorie/style_Cat4.js') }}"></script>
@endpush
<style>
    .nav-link {
    font-size: 15px !important;
    font-weight: 900 !important;
    color: #5E6278 !important;
}
.nav-item .active{
    font-size: 15px !important;
    font-weight: 900 !important;
    background-color: #1e1e2d !important;
    color: #fcfcfc !important;
}
.btn-link {
    font-size: 15px !important;
    font-weight: 900 !important;
    color: #5E6278 !important;
}
.btn-link .active{
    font-size: 15px !important;
    font-weight: 900 !important;
    color: #a67f52 !important;
}
.card-header{
    background-color: #ededf8 !important;
    margin-bottom: 4px;
}
.card {
    border-bottom: 2px solid #d1d1d7 !important;
    margin-bottom: 5px !important;
}
</style>



