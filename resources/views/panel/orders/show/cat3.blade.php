<div class="row">
    <div id="accordionCat3-show">
        @if ($order->branche->Type_Cat_3 == "qoran")

        <div class="card" >
            <div class="card-header" id="headingOneCat3-show">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOneCat3-show" aria-expanded="true" aria-controls="collapseOneCat3-show">
                  حفظ 15 جزء فأكثر
                </button>
              </h5>
            </div>

            <div id="collapseOneCat3-show" class="collapse show" aria-labelledby="headingOneCat3-show" data-parent="#accordionCat3-show">
                @foreach ($order->branche->critrebranchones as $critrebranchones )
                @if ($critrebranchones->name == "Cat3_Tab1")
                <div class="card-body">
                    <div>
                        <div class="row mt-5 row_Cat3_tab1_1">
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
        @else

        <div class="card">
            <div class="card-header" id="headingTwoCat3">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwoCat3" aria-expanded="false" aria-controls="collapseTwoCat3">
                  حفظ الأربعين النبوية مع 20 حديثاً في باب السمع والطاعة من الصحيحين
                </button>
              </h5>
            </div>
            <div id="collapseTwoCat3" class="collapse" aria-labelledby="headingTwoCat3" data-parent="#accordionCat3-show">
                a-parent="#accordionCat3-show">
                @foreach ($order->branche->critrebranchones as $critrebranchones )
                @if ($critrebranchones->name == "Cat3_Tab2")
                <div class="card-body">
                    <div>
                        <div class="row mt-5 row_Cat3_tab1_1">
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
        @endif
      </div>
</div>
