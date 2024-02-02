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
                                        - فرع الأعلامي المتميز    <span class="text-color"> (أفراد)</span>
                                    </h3>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <div class="card-body">
                                <div class="Cat1-Info">
                                    <div class="row">
                                        <input type="text" style="display: none" name="contestId" value="{{$contestId}}">
                                        <div class="col-lg-4 mb-5">
                                            <label class="form-label fw-bolder mb-4">الاسم الأول</label>
                                            <input type="text" class="form-control" name="w_first_name"
                                                   placeholder="الاسم الأول" value="">
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

                                    {{-- <div class="row ">
                                        <ul class="nav nav-tabs" id="myTab_cat1" role="tablist">
                                            <li class="nav-item" role="presentation">
                                              <button class="nav-link active " id="bt_cat1_tab1" data-bs-toggle="tab" data-bs-target="#cat1_tab1" type="button" role="tab" aria-controls="cat1_tab1" aria-selected="true">العضوية المهنية                                                                                           </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                              <button class="nav-link" id="bt_cat1_tab2" data-bs-toggle="tab" data-bs-target="#cat1_tab2" type="button" role="tab" aria-controls="cat1_tab2" aria-selected="false">المشاركات الإعلامية</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                              <button class="nav-link" id="bt_cat1_tab3" data-bs-toggle="tab" data-bs-target="#cat1_tab3" type="button" role="tab" aria-controls="cat1_tab3" aria-selected="false">التطوير المهني</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="bt_cat1_tab4" data-bs-toggle="tab" data-bs-target="#cat1_tab4" type="button" role="tab" aria-controls="cat1_tab4" aria-selected="false">التأثير في المجتمع المحلي</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="bt_cat1_tab5" data-bs-toggle="tab" data-bs-target="#cat1_tab5" type="button" role="tab" aria-controls="cat1_tab5" aria-selected="false">المهنية  في العمل الإعلامي</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="bt_cat1_tab6" data-bs-toggle="tab" data-bs-target="#cat1_tab6" type="button" role="tab" aria-controls="cat1_tab6" aria-selected="false">الإبداع وأصالة الأفكار</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="bt_cat1_tab7" data-bs-toggle="tab" data-bs-target="#cat1_tab7" type="button" role="tab" aria-controls="cat1_tab7" aria-selected="false">سلامة اللغة والمضمون</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="bt_cat1_tab8" data-bs-toggle="tab" data-bs-target="#cat1_tab8" type="button" role="tab" aria-controls="cat1_tab8" aria-selected="false">	الإنتاج والاستمرارية</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content mt-5" id="myTabContent_cat1">

                                            <div class="tab-pane fade show active" id="cat1_tab1" role="tabpanel" aria-labelledby="home-tab">

                                            </div>

                                            <div class="tab-pane fade" id="cat1_tab2" role="tabpanel" aria-labelledby="cat1_tab2">

                                            </div>

                                            <div class="tab-pane fade" id="cat1_tab3" role="tabpanel" aria-labelledby="contact-tab">

                                            </div>

                                            <div class="tab-pane fade" id="cat1_tab4" role="tabpanel" aria-labelledby="contact-tab">

                                            </div>

                                            <div class="tab-pane fade" id="cat1_tab5" role="tabpanel" aria-labelledby="contact-tab">

                                            </div>

                                            <div class="tab-pane fade" id="cat1_tab6" role="tabpanel" aria-labelledby="contact-tab">

                                            </div>

                                            <div class="tab-pane fade" id="cat1_tab7" role="tabpanel" aria-labelledby="contact-tab">

                                            </div>

                                            <div class="tab-pane fade" id="cat1_tab8" role="tabpanel" aria-labelledby="contact-tab">

                                            </div>

                                        </div>
                                    </div> --}}

                                     <div class="row mt-8">
                                        <div id="accordion">
                                            <div class="card">
                                              <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    العضوية المهنية
                                                  </button>
                                                </h5>
                                              </div>

                                              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="FormCat1Tab1">
                                                        <div class="row mt-5 row_cat1_tab1_1">
                                                          <div class="col-lg-3 mb-5">
                                                            <label class="form-label fw-bolder mb-4">المؤشر</label>
                                                            <input type="text" class="form-control" name="Cat1_Tab1_Point_1" placeholder="المؤشر">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4 mb-5">
                                                            <label class="form-label fw-bolder mb-4">الشاهد</label>
                                                            <input type="text" class="form-control" name="Cat1_Tab1_Cahid_1" value="لا يوجد"  placeholder="الشاهد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4">
                                                            <label class="form-label fw-bolder mb-4">ملف الشواهد</label>
                                                            <input type="file" class="form-control" id="Cat1_Tab1_File_1" name="Cat1_Tab1_File_1" placeholder="ملف الشواهد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-1 d-flex flex-column align-items-center justify-content-center">
                                                            <button type="button" class="btn btn-info mt-4 add_cat1_tab1">أضف</button>
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
                                                    المشاركات الإعلامية
                                                  </button>
                                                </h5>
                                              </div>
                                              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="FormCat1Tab2">
                                                        <div class="row mt-5 row_cat1_tab2_1">
                                                          <div class="col-lg-3 mb-5">
                                                            <label class="form-label fw-bolder mb-4">المؤشر</label>
                                                            <input type="text" class="form-control" name="Cat1_Tab2_Point_1" placeholder="المؤشر">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4 mb-5">
                                                            <label class="form-label fw-bolder mb-4">الشاهد</label>
                                                            <input type="text" class="form-control" value="لا يوجد" name="Cat1_Tab2_Cahid_1" placeholder="الشاهد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4">
                                                            <label class="form-label fw-bolder mb-4">ملف الشواهد</label>
                                                            <input type="file" class="form-control" id="Cat1_Tab2_File_1"  name="Cat1_Tab2_File_1" placeholder="ملف الشواهد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-1 d-flex flex-column align-items-center justify-content-center">
                                                            <button type="button" class="btn btn-info mt-4 add_cat1_tab2">أضف</button>
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
                                                    التطوير المهني
                                                  </button>
                                                </h5>
                                              </div>
                                              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="FormCat1Tab3">
                                                        <div class="row mt-5 row_cat1_tab3_1">
                                                          <div class="col-lg-3 mb-5">
                                                            <label class="form-label fw-bolder mb-4">المؤشر</label>
                                                            <input type="text" class="form-control" name="Cat1_Tab3_Point_1" placeholder="المؤشر">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4 mb-5">
                                                            <label class="form-label fw-bolder mb-4">الشاهد</label>
                                                            <input type="text" class="form-control" name="Cat1_Tab3_Cahid_1" placeholder="الشاهد" value="لا يوجد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4">
                                                            <label class="form-label fw-bolder mb-4">ملف الشواهد</label>
                                                            <input type="file" class="form-control" id="Cat1_Tab3_File_1" name="Cat1_Tab3_File_1" placeholder="ملف الشواهد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-1 d-flex flex-column align-items-center justify-content-center">
                                                            <button type="button" class="btn btn-info mt-4 add_cat1_tab3">أضف</button>
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
                                                        التأثير في المجتمع المحلي
                                                    </button>
                                                  </h5>
                                                </div>
                                                <div id="collapseFoure" class="collapse" aria-labelledby="headingFoure" data-parent="#accordion">
                                                  <div class="card-body">
                                                    <div class="FormCat1Tab4">
                                                        <div class="row mt-5 row_cat1_tab4_1">
                                                          <div class="col-lg-3 mb-5">
                                                            <label class="form-label fw-bolder mb-4">المؤشر</label>
                                                            <input type="text" class="form-control" name="Cat1_Tab4_Point_1" placeholder="المؤشر">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4 mb-5">
                                                            <label class="form-label fw-bolder mb-4">الشاهد</label>
                                                            <input type="text" class="form-control" name="Cat1_Tab4_Cahid_1" placeholder="الشاهد" value="لا يوجد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4">
                                                            <label class="form-label fw-bolder mb-4">ملف الشواهد</label>
                                                            <input type="file" class="form-control" name="Cat1_Tab4_File_1" placeholder="ملف الشواهد" id="Cat1_Tab4_File_1">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-1 d-flex flex-column align-items-center justify-content-center">
                                                            <button type="button" class="btn btn-info mt-4 add_cat1_tab4">أضف</button>
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
                                                        المهنية في العمل الإعلامي
                                                    </button>
                                                  </h5>
                                                </div>
                                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                                  <div class="card-body">
                                                    <div class="FormCat1Tab5">
                                                        <div class="row mt-5 row_cat1_tab5_1">
                                                          <div class="col-lg-3 mb-5">
                                                            <label class="form-label fw-bolder mb-4">المؤشر</label>
                                                            <input type="text" class="form-control" name="Cat1_Tab5_Point_1" placeholder="المؤشر">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4 mb-5">
                                                            <label class="form-label fw-bolder mb-4">الشاهد</label>
                                                            <input type="text" class="form-control" name="Cat1_Tab5_Cahid_1" placeholder="الشاهد" value="لا يوجد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4">
                                                            <label class="form-label fw-bolder mb-4">ملف الشواهد</label>
                                                            <input type="file" class="form-control" name="Cat1_Tab5_File_1" placeholder="ملف الشواهد" id="Cat1_Tab5_File_1" >
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-1 d-flex flex-column align-items-center justify-content-center">
                                                            <button type="button" class="btn btn-info mt-4 add_cat1_tab5">أضف</button>
                                                            <div class="error-message" style="color: red;"></div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingSex">
                                                  <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSex" aria-expanded="false" aria-controls="collapseSex">
                                                        الإبداع وأصالة الأفكار
                                                    </button>
                                                  </h5>
                                                </div>
                                                <div id="collapseSex" class="collapse" aria-labelledby="headingSex" data-parent="#accordion">
                                                  <div class="card-body">
                                                    <div class="FormCat1Tab6">
                                                        <div class="row mt-5 row_cat1_tab6_1">
                                                          <div class="col-lg-3 mb-5">
                                                            <label class="form-label fw-bolder mb-4">المؤشر</label>
                                                            <input type="text" class="form-control" name="Cat1_Tab6_Point_1" placeholder="المؤشر">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4 mb-5">
                                                            <label class="form-label fw-bolder mb-4">الشاهد</label>
                                                            <input type="text" class="form-control" name="Cat1_Tab6_Cahid_1" placeholder="الشاهد" value="لا يوجد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4">
                                                            <label class="form-label fw-bolder mb-4">ملف الشواهد</label>
                                                            <input type="file" class="form-control" name="Cat1_Tab6_File_1" placeholder="ملف الشواهد" id="Cat1_Tab6_File_1">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-1 d-flex flex-column align-items-center justify-content-center">
                                                            <button type="button" class="btn btn-info mt-4 add_cat1_tab6">أضف</button>
                                                            <div class="error-message" style="color: red;"></div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingSeven">
                                                  <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                        سلامة اللغة والمضمون
                                                    </button>
                                                  </h5>
                                                </div>
                                                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
                                                  <div class="card-body">
                                                    <div class="FormCat1Tab7">
                                                        <div class="row mt-5 row_cat1_tab7_1">
                                                          <div class="col-lg-3 mb-5">
                                                            <label class="form-label fw-bolder mb-4">المؤشر</label>
                                                            <input type="text" class="form-control" name="Cat1_Tab7_Point_1" placeholder="المؤشر">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4 mb-5">
                                                            <label class="form-label fw-bolder mb-4">الشاهد</label>
                                                            <input type="text" class="form-control" name="Cat1_Tab7_Cahid_1" placeholder="الشاهد" value="لا يوجد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4">
                                                            <label class="form-label fw-bolder mb-4">ملف الشواهد</label>
                                                            <input type="file" class="form-control" name="Cat1_Tab7_File_1" placeholder="ملف الشواهد" id="Cat1_Tab7_File_1">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-1 d-flex flex-column align-items-center justify-content-center">
                                                            <button type="button" class="btn btn-info mt-4 add_cat1_tab7">أضف</button>
                                                            <div class="error-message" style="color: red;"></div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingEight">
                                                  <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                        	الإنتاج والاستمرارية
                                                    </button>
                                                  </h5>
                                                </div>
                                                <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion">
                                                  <div class="card-body">
                                                    <div class="FormCat1Tab8">
                                                        <div class="row mt-5 row_cat1_tab8_1">
                                                          <div class="col-lg-3 mb-5">
                                                            <label class="form-label fw-bolder mb-4">المؤشر</label>
                                                            <input type="text" class="form-control" name="Cat1_Tab8_Point_1" placeholder="المؤشر">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4 mb-5">
                                                            <label class="form-label fw-bolder mb-4">الشاهد</label>
                                                            <input type="text" class="form-control" name="Cat1_Tab8_Cahid_1" placeholder="الشاهد" value="لا يوجد">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-4">
                                                            <label class="form-label fw-bolder mb-4">ملف الشواهد</label>
                                                            <input type="file" class="form-control" name="Cat1_Tab8_File_1" placeholder="ملف الشواهد" id="Cat1_Tab8_File_1">
                                                            <div class="error-message" style="color: red"></div>
                                                          </div>
                                                          <div class="col-lg-1 d-flex flex-column align-items-center justify-content-center">
                                                            <button type="button" class="btn btn-info mt-4 add_cat1_tab8">أضف</button>
                                                            <div class="error-message" style="color: red;"></div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                          </div>
                                    </div>

                                    <div class="row mt-8 pr-5 Cat1_correct_info">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label fw-bolder" for="flexCheckDefault">
                                                أوافق على صحبة البيانات المدخلة وعلى كافة الشروط والاحكام الخاصة بجائزة الباحة للابداع والتميز
                                            </label>
                                        </div>
                                    </div>





                                <div class="d-flex justify-content-end pt-8 mt-10 border-top ">
                                    <button class="btn btn-primary min-w-100px save-cat1"

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
<script src="{{ asset('js/Categorie/style_Cat1.js') }}"></script>
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



