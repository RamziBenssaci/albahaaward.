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
                                        -  فرع الإبتكار وريادة الأعمال     <span class="text-color"> (أفراد)</span>
                                    </h3>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <div class="card-body">
                                <div class="Cat5-Info">
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
                                        <div class="col-lg-4 mb-5">
                                            <label class="form-label fw-bolder mb-4">المسار </label>
                                            <select name="w_cycle" aria-label="المسار" data-control="select2"
                                                   data-placeholder="المسار"
                                                    class="form-select form-select form-select-lg fw-bold">
                                               <option value="">المسار </option>

                                                    <option value="مسار الأبتكار">مسار الأبتكار</option>
                                                    <option value="ريادة الأعمال">ريادة الأعمال</option>

                                            </select>
                                            <div class="error-message" style="color: red"></div>
                                        </div>
                                        <div class="col-lg-4 mb-5">
                                            <label class="form-label fw-bolder mb-4">عنوان المشاركة</label>
                                            <textarea class="form-control" placeholder="عنوان المشاركة"
                                                   name="w_adress_parti"
                                                   rows="4"></textarea>
                                            <div class="error-message" style="color: red"></div>

                                        </div>

                                        <div class="col-lg-4 mb-5">
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
                                        <div id="accordion">
                                            <div class="card">
                                              <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    	الفائدة التي يحققها الابتكار أو المشروع الريادي في الفترة الحالية.
                                                  </button>
                                                </h5>
                                              </div>

                                              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="FormCat5Tab1">
                                                        <div class="row mt-5 row_Cat5_tab1_1">
                                                          <div class="col-lg-3 mb-5">
                                                            <label class="form-label fw-bolder mb-4">المؤشر</label>
                                                            <input type="text" class="form-control" name="Cat5_Tab1_Point_1" placeholder="المؤشر">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4 mb-5">
                                                            <label class="form-label fw-bolder mb-4">الشاهد</label>
                                                            <input type="text" class="form-control" name="Cat5_Tab1_Cahid_1" value="لا يوجد"  placeholder="الشاهد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4">
                                                            <label class="form-label fw-bolder mb-4">ملف الشواهد</label>
                                                            <input type="file" class="form-control" id="Cat5_Tab1_File_1" name="Cat5_Tab1_File_1" placeholder="ملف الشواهد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-1 d-flex flex-column align-items-center justify-content-center">
                                                            <button type="button" class="btn btn-info mt-4 add_Cat5_tab1">أضف</button>
                                                            <div class="error-message" style="color: red;"></div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="card">
                                              <div class="card-header" id="headingTwo">
                                                <h5 class="mb-0">
                                                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    	مدى حاجة الفئة المستهدفة للابتكار أو المشروع الريادي
                                                  </button>
                                                </h5>
                                              </div>
                                              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="FormCat5Tab2">
                                                        <div class="row mt-5 row_Cat5_tab2_1">
                                                          <div class="col-lg-3 mb-5">
                                                            <label class="form-label fw-bolder mb-4">المؤشر</label>
                                                            <input type="text" class="form-control" name="Cat5_Tab2_Point_1" placeholder="المؤشر">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4 mb-5">
                                                            <label class="form-label fw-bolder mb-4">الشاهد</label>
                                                            <input type="text" class="form-control" value="لا يوجد" name="Cat5_Tab2_Cahid_1" placeholder="الشاهد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4">
                                                            <label class="form-label fw-bolder mb-4">ملف الشواهد</label>
                                                            <input type="file" class="form-control" name="Cat5_Tab2_File_1" id="Cat5_Tab2_File_1" placeholder="ملف الشواهد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-1 d-flex flex-column align-items-center justify-content-center">
                                                            <button type="button" class="btn btn-info mt-4 add_Cat5_tab2">أضف</button>
                                                            <div class="error-message" style="color: red;"></div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="card">
                                              <div class="card-header" id="headingThree">
                                                <h5 class="mb-0">
                                                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    	مدى ارتباط الابتكار أو المشروع الريادي بمستهدفات رؤية 2030
                                                  </button>
                                                </h5>
                                              </div>
                                              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="FormCat5Tab3">
                                                        <div class="row mt-5 row_Cat5_tab3_1">
                                                          <div class="col-lg-3 mb-5">
                                                            <label class="form-label fw-bolder mb-4">المؤشر</label>
                                                            <input type="text" class="form-control" name="Cat5_Tab3_Point_1" placeholder="المؤشر">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4 mb-5">
                                                            <label class="form-label fw-bolder mb-4">الشاهد</label>
                                                            <input type="text" class="form-control" name="Cat5_Tab3_Cahid_1" placeholder="الشاهد" value="لا يوجد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4">
                                                            <label class="form-label fw-bolder mb-4">ملف الشواهد</label>
                                                            <input type="file" class="form-control" name="Cat5_Tab3_File_1" id="Cat5_Tab3_File_1" placeholder="ملف الشواهد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-1 d-flex flex-column align-items-center justify-content-center">
                                                            <button type="button" class="btn btn-info mt-4 add_Cat5_tab3">أضف</button>
                                                            <div class="error-message" style="color: red;"></div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingFoure">
                                                  <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFoure" aria-expanded="false" aria-controls="collapseFoure">
                                                        	تقييم الابتكار أو المشروع الريادي بين رأس المال عند التأسيس وقيمته السوقية الحالية
                                                    </button>
                                                  </h5>
                                                </div>
                                                <div id="collapseFoure" class="collapse" aria-labelledby="headingFoure" data-parent="#accordion">
                                                  <div class="card-body">
                                                    <div class="FormCat5Tab4">
                                                        <div class="row mt-5 row_Cat5_tab4_1">
                                                          <div class="col-lg-3 mb-5">
                                                            <label class="form-label fw-bolder mb-4">المؤشر</label>
                                                            <input type="text" class="form-control" name="Cat5_Tab4_Point_1" placeholder="المؤشر">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4 mb-5">
                                                            <label class="form-label fw-bolder mb-4">الشاهد</label>
                                                            <input type="text" class="form-control" name="Cat5_Tab4_Cahid_1" placeholder="الشاهد" value="لا يوجد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4">
                                                            <label class="form-label fw-bolder mb-4">ملف الشواهد</label>
                                                            <input type="file" class="form-control" name="Cat5_Tab4_File_1" id="Cat5_Tab4_File_1" placeholder="ملف الشواهد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-1 d-flex flex-column align-items-center justify-content-center">
                                                            <button type="button" class="btn btn-info mt-4 add_Cat5_tab4">أضف</button>
                                                            <div class="error-message" style="color: red;"></div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingFive">
                                                  <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                        	عدد المشغلين للابتكار أو المشروع الريادي ونسبة السعودة فيه
                                                    </button>
                                                  </h5>
                                                </div>
                                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                                  <div class="card-body">
                                                    <div class="FormCat5Tab5">
                                                        <div class="row mt-5 row_Cat5_tab5_1">
                                                          <div class="col-lg-3 mb-5">
                                                            <label class="form-label fw-bolder mb-4">المؤشر</label>
                                                            <input type="text" class="form-control" name="Cat5_Tab5_Point_1" placeholder="المؤشر">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4 mb-5">
                                                            <label class="form-label fw-bolder mb-4">الشاهد</label>
                                                            <input type="text" class="form-control" name="Cat5_Tab5_Cahid_1" placeholder="الشاهد" value="لا يوجد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4">
                                                            <label class="form-label fw-bolder mb-4">ملف الشواهد</label>
                                                            <input type="file" class="form-control" name="Cat5_Tab5_File_1" id="Cat5_Tab5_File_1" placeholder="ملف الشواهد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-1 d-flex flex-column align-items-center justify-content-center">
                                                            <button type="button" class="btn btn-info mt-4 add_Cat5_tab5">أضف</button>
                                                            <div class="error-message" style="color: red;"></div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                          </div>
                                    </div>

                                    <div class="row mt-8 pr-5 correct_info_Cat5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefaultCat5">
                                            <label class="form-check-label fw-bolder" for="flexCheckDefaultCat5">
                                                أوافق على صحبة البيانات المدخلة وعلى كافة الشروط والاحكام الخاصة بجائزة الباحة للابداع والتميز
                                            </label>
                                        </div>
                                    </div>





                                <div class="d-flex justify-content-end pt-8 mt-10 border-top ">
                                    <button class="btn btn-primary min-w-100px save-Cat5"

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
    <div id="loading-spinner" class="d-none">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        Loading...
    </div>


@endsection

@push('scripts')
<script src="{{ asset('js/Categorie/style_Cat5.js') }}"></script>
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



