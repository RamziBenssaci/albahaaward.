<div class="row">
    <div id="accordionCat1-show">

        <div class="card" >
            <div class="card-header" id="headingOneCat1-show">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOneCat1-show" aria-expanded="true" aria-controls="collapseOneCat1-show">
                    العضوية المهنية
                </button>
              </h5>
            </div>

            <div id="collapseOneCat1-show" class="collapse show" aria-labelledby="headingOneCat1-show" data-parent="#accordionCat1-show">
                @foreach ($order->branche->critrebranchones as $critrebranchones )
                @if ($critrebranchones->name == "Cat1_Tab1")
                <div class="card-body">
                    <div>
                        <div class="row mt-5 ">
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
            <div class="card-header" id="headingTwoCat1">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwoCat1" aria-expanded="false" aria-controls="collapseTwoCat1">
                    المشاركات الإعلامية
                </button>
              </h5>
            </div>
            <div id="collapseTwoCat1" class="collapse" aria-labelledby="headingTwoCat1" data-parent="#accordionCat1-show">
                @foreach ($order->branche->critrebranchones as $critrebranchones )
                @if ($critrebranchones->name == "Cat1_Tab2")
                <div class="card-body">
                    <div>
                        <div class="row mt-5 ">
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
            <div class="card-header" id="headingThreeCat1">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThreeCat1" aria-expanded="false" aria-controls="collapseThreeCat1">
                    التطوير المهني
                </button>
              </h5>
            </div>
            <div id="collapseThreeCat1" class="collapse" aria-labelledby="headingThreeCat1" data-parent="#accordionCat1-show">

                @foreach ($order->branche->critrebranchones as $critrebranchones )
                @if ($critrebranchones->name == "Cat1_Tab3")
                <div class="card-body">
                    <div>
                        <div class="row mt-5 ">
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
            <div class="card-header" id="headingFourCat1">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFourCat1" aria-expanded="false" aria-controls="collapseFourCat1">
                    التأثير في المجتمع المحلي
                </button>
              </h5>
            </div>
            <div id="collapseFourCat1" class="collapse" aria-labelledby="headingFourCat1" data-parent="#accordionCat1-show">

                @foreach ($order->branche->critrebranchones as $critrebranchones )
                @if ($critrebranchones->name == "Cat1_Tab4")
                <div class="card-body">
                    <div>
                        <div class="row mt-5 ">
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
            <div class="card-header" id="headingFiveCat1">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFiveCat1" aria-expanded="false" aria-controls="collapseFiveCat1">
                    المهنية في العمل الإعلامي
                </button>
              </h5>
            </div>
            <div id="collapseFiveCat1" class="collapse" aria-labelledby="headingFiveCat1" data-parent="#accordionCat1-show">

                @foreach ($order->branche->critrebranchones as $critrebranchones )
                @if ($critrebranchones->name == "Cat1_Tab5")
                <div class="card-body">
                    <div>
                        <div class="row mt-5 ">
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
            <div class="card-header" id="headingSexCat1">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSexCat1" aria-expanded="false" aria-controls="collapseSexCat1">
                    الإبداع وأصالة الأفكار
                </button>
              </h5>
            </div>
            <div id="collapseSexCat1" class="collapse" aria-labelledby="headingSexCat1" data-parent="#accordionCat1-show">

                @foreach ($order->branche->critrebranchones as $critrebranchones )
                @if ($critrebranchones->name == "Cat1_Tab6")
                <div class="card-body">
                    <div>
                        <div class="row mt-5 ">
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
            <div class="card-header" id="headingSevenCat1">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSevenCat1" aria-expanded="false" aria-controls="collapseSevenCat1">
                    سلامة اللغة والمضمون
                </button>
              </h5>
            </div>
            <div id="collapseSevenCat1" class="collapse" aria-labelledby="headingSevenCat1" data-parent="#accordionCat1-show">

                @foreach ($order->branche->critrebranchones as $critrebranchones )
                @if ($critrebranchones->name == "Cat1_Tab7")
                <div class="card-body">
                    <div>
                        <div class="row mt-5 ">
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
            <div class="card-header" id="headingEghitCat1">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEghitCat1" aria-expanded="false" aria-controls="collapseEghitCat1">
                    الإنتاج والاستمرارية
                </button>
              </h5>
            </div>
            <div id="collapseEghitCat1" class="collapse" aria-labelledby="headingEghitCat1" data-parent="#accordionCat1-show">

                @foreach ($order->branche->critrebranchones as $critrebranchones )
                @if ($critrebranchones->name == "Cat1_Tab8")
                <div class="card-body">
                    <div>
                        <div class="row mt-5 ">
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
