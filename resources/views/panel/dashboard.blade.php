@extends('layouts.panel.app')

@section('title')
    نظرة عامة
@endsection
@section('sub_title')
    نظرة عامة
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

                <div class="mb-8">
                    <!--begin::Row-->
                    <div class="row mb-5 g-5">
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <!--begin::Statistics Widget 5-->
                            <div class="card home-card">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                    <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="#888888" d="M2 21q-.825 0-1.413-.588T0 19V5q0-.825.588-1.413T2 3h20q.825 0 1.413.588T24 5v14q0 .825-.588 1.413T22 21H2Zm13.9-2H22V5H2v14h.1q1.05-1.875 2.9-2.938T9 15q2.15 0 4 1.063T15.9 19ZM9 14q1.25 0 2.125-.875T12 11q0-1.25-.875-2.125T9 8q-1.25 0-2.125.875T6 11q0 1.25.875 2.125T9 14Zm6-3h5q.425 0 .713-.288T21 10V7q0-.425-.288-.713T20 6h-5q-.425 0-.713.288T14 7v3q0 .425.288.713T15 11ZM4.55 19h8.9q-.85-.95-2.012-1.475T9 17q-1.275 0-2.425.525T4.55 19ZM9 12q-.425 0-.713-.288T8 11q0-.425.288-.713T9 10q.425 0 .713.288T10 11q0 .425-.288.713T9 12Zm3 0Zm5.5-2.25L15 8V7l2.5 1.75L20 7v1l-2.5 1.75Z"/></svg>

												</span>
                                    <!--end::Svg Icon-->
                                    <div class="text-gray-800 fw-bolder fs-5 mb-2 mt-3">
                                        اجمالي عدد المستخدمين
                                    </div>
                                    <div class="fw-bold fs-2 fw-bolder text-gray-800">{{$users }}</div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Statistics Widget 5-->
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <!--begin::Statistics Widget 5-->
                            <div class="card home-card">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen008.svg-->
                                    <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">

													<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="#888888" d="m12 22l-.25-3h-.25q-3.55 0-6.025-2.475T3 10.5q0-3.55 2.475-6.025T11.5 2q1.775 0 3.313.662t2.7 1.825q1.162 1.163 1.824 2.7T20 10.5q0 1.875-.613 3.6t-1.675 3.2q-1.062 1.475-2.525 2.675T12 22Zm2-3.65q1.775-1.5 2.888-3.513T18 10.5q0-2.725-1.888-4.612T11.5 4Q8.775 4 6.888 5.888T5 10.5q0 2.725 1.888 4.612T11.5 17H14v1.35Zm-2.525-2.375q.425 0 .725-.3t.3-.725q0-.425-.3-.725t-.725-.3q-.425 0-.725.3t-.3.725q0 .425.3.725t.725.3ZM10.75 12.8h1.5q0-.75.15-1.05t.95-1.1q.45-.45.75-.975t.3-1.125q0-1.275-.863-1.913T11.5 6q-1.1 0-1.85.613T8.6 8.1l1.4.55q.125-.425.475-.838T11.5 7.4q.675 0 1.012.375t.338.825q0 .425-.25.763t-.6.687q-.875.75-1.063 1.188T10.75 12.8Zm.75-1.625Z"/></svg>

												</span>
                                    <!--end::Svg Icon-->
                                    <div class="text-gray-800 fw-bolder fs-5 mb-2 mt-3">
                                        اجمالي الطلبات
                                    </div>
                                    <div class="fw-bold fs-2 fw-bolder text-gray-800">{{$orders}}</div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Statistics Widget 5-->
                        </div>

                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <!--begin::Statistics Widget 5-->
                            <div class="card home-card">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen008.svg-->
                                    <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">

													<svg xmlns="http://www.w3.org/2000/svg" width="28" height="32" viewBox="0 0 14 16"><path fill-rule="evenodd" d="M7 4c-.83 0-1.5-.67-1.5-1.5S6.17 1 7 1s1.5.67 1.5 1.5S7.83 4 7 4zm7 6c0 1.11-.89 2-2 2h-1c-1.11 0-2-.89-2-2l2-4h-1c-.55 0-1-.45-1-1H8v8c.42 0 1 .45 1 1h1c.42 0 1 .45 1 1H3c0-.55.58-1 1-1h1c0-.55.58-1 1-1h.03L6 5H5c0 .55-.45 1-1 1H3l2 4c0 1.11-.89 2-2 2H2c-1.11 0-2-.89-2-2l2-4H1V5h3c0-.55.45-1 1-1h4c.55 0 1 .45 1 1h3v1h-1l2 4zM2.5 7L1 10h3L2.5 7zM13 10l-1.5-3l-1.5 3h3z" fill="currentColor"></path></svg>

												</span>
                                    <!--end::Svg Icon-->
                                    <div class="text-gray-800 fw-bolder fs-5 mb-2 mt-3">
                                        اجمالي المسابقات
                                    </div>
                                    <div class="fw-bold fs-2 fw-bolder text-gray-800">{{$contest}}</div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Statistics Widget 5-->
                        </div>
                        <!--end::Row-->
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
