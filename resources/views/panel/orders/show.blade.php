@extends('layouts.panel.app')

@section('title')
    الجوائز
@endsection
@section('sub_title')
    الجوائز
@endsection
@section('sub_title_2')
    عرض تفاصيل الطلب
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
                                <div class="card-title">
                                    <h3 class="fw-bolder">
                                        تفاصيل الطلب -                                                     جائزة {{$order->contest->category->name}}
                                    </h3>
                                    

                                </div>

                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 mb-4">

                                    </div>

                                    <div class="col-lg-4 mb-4">

                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div
                                            class="fw-bold fs-6 d-flex justify-content-between align-items-center bg-gray-100  p-5 py-6 rounded-3">
                                            <label class="text-gray-800">
                                                حاله الطلب :
                                                @if ($order)
                                                    @php
                                                        $statusClass = [
                                                            1 => 'badge-info',
                                                            2 => 'badge-secondary',
                                                            3 => 'badge-warning',
                                                            4 => 'badge-danger',
                                                            5 => 'badge-success',
                                                        ];

                                                        $statusText = [
                                                            1 => \App\Constants\ENUM::STATUS[1],
                                                            2 => \App\Constants\ENUM::STATUS[2],
                                                            3 => \App\Constants\ENUM::STATUS[3],
                                                            4 => \App\Constants\ENUM::STATUS[4],
                                                            5 => \App\Constants\ENUM::STATUS[5],
                                                        ];
                                                    @endphp

                                                    @if (array_key_exists($order->status, $statusClass))
                                                        <span class="badge {{ $statusClass[$order->status] }}">
                                                            {{ $statusText[$order->status] }}
                                                        </span>
                                                    @else
                                                        <span class="badge badge-primary">لا يوجد طلبات</span>
                                                    @endif
                                                @endif
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mb-8 fs-2">
                                    تفاصيل الطلب المقدم
                                </h4>
                                    <div class="row">
                                        <div class="col-lg-4 mb-5">
                                            <label class="form-label fw-bolder mb-4">الاسم الأول</label>
                                            <p>{{$order->branche->w_first_name}}</p>


                                        </div>
                                        <div class="col-lg-4 mb-5">
                                            <label class="form-label fw-bolder mb-4">الأب</label>
                                            <p>{{$order->branche->w_pere}}</p>
                                        </div>

                                        <div class="col-lg-4 mb-5">
                                            <label class="form-label fw-bolder mb-4">اسم الجد</label>
                                            <p>{{$order->branche->w_grand_pere}}</p>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 mb-5">
                                            <label class="form-label fw-bolder mb-4">اسم العائلة</label>
                                            <p>{{$order->branche->w_familiy_name}}</p>

                                        </div>
                                        <div class="col-lg-4 mb-5">
                                            <label class="form-label fw-bolder mb-4">رقم الهوية</label>
                                            <p>{{$order->branche->w_identity}}</p>

                                        </div>

                                        <div class="col-lg-4 mb-5">
                                            <label class="form-label fw-bolder mb-4">الجنس</label>
                                            <p>{{$order->branche->w_sexe}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 mb-5">
                                            <label class="form-label fw-bolder mb-4">المؤهل العلمي</label>
                                            <p>{{$order->branche->w_niveau_etude}}</p>

                                        </div>

                                        <div class="col-lg-4 mb-5">
                                            <label class="form-label fw-bolder mb-4"> المسمى الوظيفي</label>
                                            <p>{{$order->branche->w_name_jobs}}</p>
                                        </div>


                                        <div class="col-lg-4 mb-5">
                                            <label class="form-label fw-bolder mb-4">التخصص</label>
                                            <p>{{$order->branche->w_spacialite}}</p>

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-5">
                                            <label class="form-label fw-bolder mb-4">عنوان المشاركة</label>
                                            <p>{{$order->branche->w_adress_parti}}</p>

                                        </div>

                                        <div class="col-lg-6 mb-5">
                                            <label class="form-label fw-bolder mb-4">وصف المشاركة</label>
                                            <p>{{$order->branche->w_note_parti}}</p>
                                        </div>

                                    </div>
                                    @if ($order->branche->w_cycle_cat5 !== NULL)
                                        <div class="row">
                                            <div class="col-lg-6 mb-5">
                                                <label class="form-label fw-bolder mb-4"> المسار</label>
                                                <p>{{$order->branche->w_cycle_cat5}}</p>
                                            </div>
                                        </div>
                                    @endif



                                {{-- <div class="row">
                                    <div class="col-lg-4 mb-4">
                                        <div
                                            class="fw-bold fs-6 d-flex justify-content-between align-items-center bg-gray-100  p-5 rounded-3">
                                            <label class="text-gray-800">
                                                تحميل مرفق المشروع :
                                            </label>
                                            <a href="{{asset('files/'.$order->file)}}" class="btn w-30px h-30px btn-primary btn-icon btn-circle" download>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="9.341"
                                                     height="14.679" viewBox="0 0 9.341 14.679">
                                                    <path id="download_1_" data-name="download (1)"
                                                          d="M9.667,18.344h8.007a.667.667,0,0,1,0,1.334H9.667a.667.667,0,0,1,0-1.334Zm4.49-.874h-.033a.667.667,0,0,1-.173.12h0a.55.55,0,0,1-.534.033.769.769,0,0,0-.073-.047.881.881,0,0,1-.133-.08h0l-3.336-3.51a.67.67,0,1,1,.974-.921L13,15.342V5.667a.667.667,0,1,1,1.334,0v9.675l2.182-2.3a.67.67,0,0,1,.974.921Z"
                                                          transform="translate(-9 -5)" fill="#fff" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div
                                            class="fw-bold fs-6 d-flex justify-content-between align-items-center bg-gray-100  p-5 rounded-3">
                                            <label class="text-gray-800">
                                                تحميل مرفق التقيم :
                                            </label>
                                            <a href="{{asset('files/'.$order->file_notes)}}" class="btn w-30px h-30px btn-primary btn-icon btn-circle" download>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="9.341"
                                                     height="14.679" viewBox="0 0 9.341 14.679">
                                                    <path id="download_1_" data-name="download (1)"
                                                          d="M9.667,18.344h8.007a.667.667,0,0,1,0,1.334H9.667a.667.667,0,0,1,0-1.334Zm4.49-.874h-.033a.667.667,0,0,1-.173.12h0a.55.55,0,0,1-.534.033.769.769,0,0,0-.073-.047.881.881,0,0,1-.133-.08h0l-3.336-3.51a.67.67,0,1,1,.974-.921L13,15.342V5.667a.667.667,0,1,1,1.334,0v9.675l2.182-2.3a.67.67,0,0,1,.974.921Z"
                                                          transform="translate(-9 -5)" fill="#fff" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div
                                            class="fw-bold fs-6 d-flex justify-content-between align-items-center bg-gray-100  p-5 py-6 rounded-3">
                                            <label class="text-gray-800">
                                                حاله الطلب :
                                                @if ($order)
                                                    @php
                                                        $statusClass = [
                                                            1 => 'badge-info',
                                                            2 => 'badge-secondary',
                                                            3 => 'badge-warning',
                                                            4 => 'badge-danger',
                                                            5 => 'badge-success',
                                                        ];

                                                        $statusText = [
                                                            1 => \App\Constants\ENUM::STATUS[1],
                                                            2 => \App\Constants\ENUM::STATUS[2],
                                                            3 => \App\Constants\ENUM::STATUS[3],
                                                            4 => \App\Constants\ENUM::STATUS[4],
                                                            5 => \App\Constants\ENUM::STATUS[5],
                                                        ];
                                                    @endphp

                                                    @if (array_key_exists($order->status, $statusClass))
                                                        <span class="badge {{ $statusClass[$order->status] }}">
                                                            {{ $statusText[$order->status] }}
                                                        </span>
                                                    @else
                                                        <span class="badge badge-primary">لا يوجد طلبات</span>
                                                    @endif
                                                @endif
                                            </label>
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- <div class="row">
                                    <div class="col-12">
                                        <div class="p-3 py-8">
                                            <div>
                                                <h4 class="mb-8 fs-2">
                                                    تفاصيل الطلب المقدم
                                                </h4>
                                            </div>
                                            <div class="fs-5">
                                                <h6 class="text-gray-900">
                                                    من ترشح :
                                                </h6>
                                                <p>
                                                    {{$order->fromـnomination}}
                                                </p>
                                            </div>
                                            <div class="fs-5">
                                                <h6 class="text-gray-900">
                                                    إسم المشروع :
                                                </h6>
                                                <p>
                                                    {{$order->project_title}}
                                                </p>
                                            </div>
                                            <div class="fs-5">
                                                <h6 class="text-gray-900">
                                                    سبب الترشح :
                                                </h6>
                                                <p>
                                                    {{$order->description}}
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <h4 class="mb-8 fs-2">
                                        تفاصيل المعايير
                                    </h4>
                                </div>

                                @if ($order->contest->category->type == "cat1")
                                    @include('panel.orders.show.cat1')
                                @endif
                                @if ($order->contest->category->type == "cat2")
                                    @include('panel.orders.show.cat2')
                                @endif

                                @if ($order->contest->category->type == "cat3")
                                    @include('panel.orders.show.cat3')
                                @endif
                                @if ($order->contest->category->type == "cat4")
                                    @include('panel.orders.show.cat4')
                                @endif
                                @if ($order->contest->category->type == "cat5")
                                    @include('panel.orders.show.cat5')
                                @endif


                                <div class="row">
                                    <div class="col-12">
                                        <div class="p-3 py-8">
                                            <div>
                                                <h4 class="mb-8 fs-2">
                                                    تفاصيل التقييم
                                                </h4>
                                            </div>
                                            <div class="fs-5">
                                                <h6 class="text-gray-900">
                                                    ملاحظات المقيم :
                                                </h6>
                                                <p>
                                                    {{$order->description_notes}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
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

@endsection
@push('scripts')
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
