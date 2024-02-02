<div class="row">
    <div id="accordionCat2-show">



        <div class="card" >
            <div class="card-header" id="headingOneCat2-show">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOneCat2-show" aria-expanded="true" aria-controls="collapseOneCat2-show">
                    المعرفة العلمية والمهنية
                </button>
              </h5>
            </div>

            <div id="collapseOneCat2-show" class="collapse show" aria-labelledby="headingOneCat2-show" data-parent="#accordionCat2-show">
                @foreach ($order->branche->critrebranchones as $critrebranchones )
                @if ($critrebranchones->name == "Cat2_Tab1")
                <div class="card-body">
                    <div>
                        <div class="row mt-5 row_Cat2_tab1_1">
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
            <div class="card-header" id="headingTwoCat2">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwoCat2" aria-expanded="false" aria-controls="collapseTwoCat2">
                    اثراء التنافسية وتعزيزها
                </button>
              </h5>
            </div>
            <div id="collapseTwoCat2" class="collapse" aria-labelledby="headingTwoCat2" data-parent="#accordionCat2-show">
                @foreach ($order->branche->critrebranchones as $critrebranchones )
                @if ($critrebranchones->name == "Cat2_Tab2")
                <div class="card-body">
                    <div>
                        <div class="row mt-5 row_Cat2_tab1_1">
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
            <div class="card-header" id="headingThreeCat2">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThreeCat2" aria-expanded="false" aria-controls="collapseThreeCat2">
                    الأضافة والأستدامة
                </button>
              </h5>
            </div>
            <div id="collapseThreeCat2" class="collapse" aria-labelledby="headingThreeCat2" data-parent="#accordionCat2-show">

                @foreach ($order->branche->critrebranchones as $critrebranchones )
                @if ($critrebranchones->name == "Cat2_Tab3")
                <div class="card-body">
                    <div>
                        <div class="row mt-5 row_Cat2_tab1_1">
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
            <div class="card-header" id="headingFourCat2">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFourCat2" aria-expanded="false" aria-controls="collapseFourCat2">
                    الكفائة والتنفيذ
                </button>
              </h5>
            </div>
            <div id="collapseFourCat2" class="collapse" aria-labelledby="headingFourCat2" data-parent="#accordionCat2-show">

                @foreach ($order->branche->critrebranchones as $critrebranchones )
                @if ($critrebranchones->name == "Cat2_Tab4")
                <div class="card-body">
                    <div>
                        <div class="row mt-5 row_Cat2_tab1_1">
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
