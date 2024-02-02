<div class="row">
    <div id="accordionCat5-show">



        <div class="card" >
            <div class="card-header" id="headingOneCat5-show">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOneCat5-show" aria-expanded="true" aria-controls="collapseOneCat5-show">
                    الفائدة التي يحققها الابتكار أو المشروع الريادي في الفترة الحالية
                </button>
              </h5>
            </div>

            <div id="collapseOneCat5-show" class="collapse show" aria-labelledby="headingOneCat5-show" data-parent="#accordionCat5-show">
                @foreach ($order->branche->critrebranchones as $critrebranchones )
                @if ($critrebranchones->name == "Cat5_Tab1")
                <div class="card-body">
                    <div>
                        <div class="row mt-5 row_Cat5_tab1_1">
                          <div class="col-lg-3 mb-5">
                            <label class="form-label fw-bolder mb-4">المؤشر</label>
                            <p>{{$critrebranchones->indice}}</p>

                          </div>
                          <div class="col-lg-4 mb-5">
                            <label class="form-label fw-bolder mb-4">الشاهد</label>
                            <p>{{$critrebranchones->justif}}</p>

                          </div>
                          <div class="col-lg-4">
                            <label class="form-label fw-bolder mb-4">ملف الشواهد</label><br>

                            @if ($critrebranchones->file_path !== "")

                                @if ($critrebranchones->file_ext == "pdf")
                                    <a target="_blank" href="{{asset('/'.$critrebranchones->file_path)}}"><img src="{{asset('images/pdf.png')}}" height="22" width="22"></a>
                                @elseif ($critrebranchones->file_ext == "docx")
                                    <a target="_blank" href="{{asset('/'.$critrebranchones->file_path)}}"><img src="{{asset('images/docx.png')}}" height="22" width="22"></a>
                                @else
                                    <a target="_blank" href="{{asset('/'.$critrebranchones->file_path)}}"><img src="{{asset('images/image.png')}}" height="22" width="22"></a>
                                @endif

                            @else
                                <img src="{{asset('images/empty.png')}}" height="22" width="22">
                            @endif



                          </div>

                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingTwoCat5">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwoCat5" aria-expanded="false" aria-controls="collapseTwoCat5">
                    مدى حاجة الفئة المستهدفة للابتكار أو المشروع الريادي
                </button>
              </h5>
            </div>
            <div id="collapseTwoCat5" class="collapse" aria-labelledby="headingTwoCat5" data-parent="#accordionCat5-show">
                @foreach ($order->branche->critrebranchones as $critrebranchones )
                @if ($critrebranchones->name == "Cat5_Tab2")
                <div class="card-body">
                    <div>
                        <div class="row mt-5 row_Cat5_tab1_1">
                          <div class="col-lg-3 mb-5">
                            <label class="form-label fw-bolder mb-4">المؤشر</label>
                            <p>{{$critrebranchones->indice}}</p>

                          </div>
                          <div class="col-lg-4 mb-5">
                            <label class="form-label fw-bolder mb-4">الشاهد</label>
                            <p>{{$critrebranchones->justif}}</p>

                          </div>
                          <div class="col-lg-4">
                            <label class="form-label fw-bolder mb-4">ملف الشواهد</label><br>

                            @if ($critrebranchones->file_path !== "")

                                @if ($critrebranchones->file_ext == "pdf")
                                    <a target="_blank" href="{{asset('/'.$critrebranchones->file_path)}}"><img src="{{asset('images/pdf.png')}}" height="22" width="22"></a>
                                @elseif ($critrebranchones->file_ext == "docx")
                                    <a target="_blank" href="{{asset('/'.$critrebranchones->file_path)}}"><img src="{{asset('images/docx.png')}}" height="22" width="22"></a>
                                @else
                                    <a target="_blank" href="{{asset('/'.$critrebranchones->file_path)}}"><img src="{{asset('images/image.png')}}" height="22" width="22"></a>
                                @endif

                            @else
                                <img src="{{asset('images/empty.png')}}" height="22" width="22">
                            @endif


                          </div>

                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingThreeCat5">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThreeCat5" aria-expanded="false" aria-controls="collapseThreeCat5">
                    مدى ارتباط الابتكار أو المشروع الريادي بمستهدفات رؤية 2030
                </button>
              </h5>
            </div>
            <div id="collapseThreeCat5" class="collapse" aria-labelledby="headingThreeCat5" data-parent="#accordionCat5-show">

                @foreach ($order->branche->critrebranchones as $critrebranchones )
                @if ($critrebranchones->name == "Cat5_Tab3")
                <div class="card-body">
                    <div>
                        <div class="row mt-5 row_Cat5_tab1_1">
                          <div class="col-lg-3 mb-5">
                            <label class="form-label fw-bolder mb-4">المؤشر</label>
                            <p>{{$critrebranchones->indice}}</p>

                          </div>
                          <div class="col-lg-4 mb-5">
                            <label class="form-label fw-bolder mb-4">الشاهد</label>
                            <p>{{$critrebranchones->justif}}</p>

                          </div>
                          <div class="col-lg-4">
                            <label class="form-label fw-bolder mb-4">ملف الشواهد</label><br>

                            @if ($critrebranchones->file_path !== "")

                                @if ($critrebranchones->file_ext == "pdf")
                                    <a target="_blank" href="{{asset('/'.$critrebranchones->file_path)}}"><img src="{{asset('images/pdf.png')}}" height="22" width="22"></a>
                                @elseif ($critrebranchones->file_ext == "docx")
                                    <a target="_blank" href="{{asset('/'.$critrebranchones->file_path)}}"><img src="{{asset('images/docx.png')}}" height="22" width="22"></a>
                                @else
                                    <a target="_blank" href="{{asset('/'.$critrebranchones->file_path)}}"><img src="{{asset('images/image.png')}}" height="22" width="22"></a>
                                @endif

                            @else
                                <img src="{{asset('images/empty.png')}}" height="22" width="22">
                            @endif


                          </div>

                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingFourCat5">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFourCat5" aria-expanded="false" aria-controls="collapseFourCat5">
                    تقييم الابتكار أو المشروع الريادي بين رأس المال عند التأسيس وقيمته السوقية الحالية
                </button>
              </h5>
            </div>
            <div id="collapseFourCat5" class="collapse" aria-labelledby="headingFourCat5" data-parent="#accordionCat5-show">

                @foreach ($order->branche->critrebranchones as $critrebranchones )
                @if ($critrebranchones->name == "Cat5_Tab4")
                <div class="card-body">
                    <div>
                        <div class="row mt-5 row_Cat5_tab1_1">
                          <div class="col-lg-3 mb-5">
                            <label class="form-label fw-bolder mb-4">المؤشر</label>
                            <p>{{$critrebranchones->indice}}</p>

                          </div>
                          <div class="col-lg-4 mb-5">
                            <label class="form-label fw-bolder mb-4">الشاهد</label>
                            <p>{{$critrebranchones->justif}}</p>

                          </div>
                          <div class="col-lg-4">
                            <label class="form-label fw-bolder mb-4">ملف الشواهد</label><br>

                            @if ($critrebranchones->file_path !== "")

                                @if ($critrebranchones->file_ext == "pdf")
                                    <a target="_blank" href="{{asset('/'.$critrebranchones->file_path)}}"><img src="{{asset('images/pdf.png')}}" height="22" width="22"></a>
                                @elseif ($critrebranchones->file_ext == "docx")
                                    <a target="_blank" href="{{asset('/'.$critrebranchones->file_path)}}"><img src="{{asset('images/docx.png')}}" height="22" width="22"></a>
                                @else
                                    <a target="_blank" href="{{asset('/'.$critrebranchones->file_path)}}"><img src="{{asset('images/image.png')}}" height="22" width="22"></a>
                                @endif

                            @else
                                <img src="{{asset('images/empty.png')}}" height="22" width="22">
                            @endif


                          </div>

                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>



      </div>
</div>
