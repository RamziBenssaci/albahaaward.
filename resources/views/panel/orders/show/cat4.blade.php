<div class="row">
    <div id="accordionCat4-show">



        <div class="card" >
            <div class="card-header" id="headingOneCat4-show">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOneCat4-show" aria-expanded="true" aria-controls="collapseOneCat4-show">
                    القصيدة الشعرية
                </button>
              </h5>
            </div>

            <div id="collapseOneCat4-show" class="collapse show" aria-labelledby="headingOneCat4-show" data-parent="#accordionCat4-show">
                @foreach ($order->branche->critrebranchones as $critrebranchones )
                @if ($critrebranchones->name == "Cat4_Tab1")
                <div class="card-body">
                    <div>
                        <div class="row mt-5 row_Cat4_tab1_1">
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
            <div class="card-header" id="headingTwoCat4">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwoCat4" aria-expanded="false" aria-controls="collapseTwoCat4">
                    	السيرة الذاتية
                </button>
              </h5>
            </div>
            <div id="collapseTwoCat4" class="collapse" aria-labelledby="headingTwoCat4" data-parent="#accordionCat4-show">

                @foreach ($order->branche->critrebranchones as $critrebranchones )
                @if ($critrebranchones->name == "Cat4_Tab2")
                <div class="card-body">
                    <div>
                        <div class="row mt-5 row_Cat4_tab1_1">
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
