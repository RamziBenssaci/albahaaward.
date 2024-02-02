@extends('layouts.panel.app')

@section('title')
    الجوائز
@endsection
@section('sub_title')
    الجوائز
@endsection
@section('sub_title_2')
    تعديل بيانات الطلب
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
                                        - {{\App\Models\Contest::query()->find($order->contest_id)->category->name}}
                                    </h3>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <div class="card-body">
                                <form id="LawsForm">
                                    @csrf
                                    <div class="row">
{{--                                        <div class="col-lg-6 mb-5">--}}
{{--                                            <label class="form-label fw-bolder mb-4">الرجاء تحديد الفئة</label>--}}
{{--                                            <select name="category_id" aria-label="اختر الفئة" data-control="select2"--}}
{{--                                                    data-placeholder="اختر الفئة..."--}}
{{--                                                    class="form-select form-select form-select-lg fw-bold">--}}
{{--                                                <option value="">اختر الفئة</option>--}}
{{--                                                @foreach(\App\Constants\ENUM::CATEGROY as $key => $categoty)--}}
{{--                                                    <option value="{{$key}}">{{$categoty}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                            @if($errors->has('category'))--}}
{{--                                                <div--}}
{{--                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">--}}
{{--                                                    <div data-field="communication[]"--}}
{{--                                                         data-validator="notEmpty">{{ $errors->first('nationality') }}</div>--}}
{{--                                                </div>--}}
{{--                                            @endif--}}

{{--                                        </div>--}}
                                        <div class="col-lg-6 mb-5">
                                            <label class="form-label fw-bolder mb-4">من ترشح</label>
                                            <input type="text" class="form-control" name="fromـnomination"
                                                   placeholder="اسم الشخص ، المؤسسة، او الجهة المراد ترشيحها" value="{{$order->fromـnomination}}">
                                            <div class="error-message" style="color: red"></div>

                                        </div>
                                        <div class="col-lg-6 mb-5">
                                            <label class="form-label fw-bolder mb-4">إسم المشروع </label>
                                            <input type="text" class="form-control" name="project_title"
                                                   placeholder="يتكون من 50 حرف على الاكثر" value="{{$order->project_title}}">
                                            <div class="error-message" style="color: red"></div>

                                        </div>

                                        <div class="col-lg-6 mb-5">
                                            <label class="form-label fw-bolder mb-4">سبب الترشح</label>
                                            <textarea class="form-control" placeholder="يتكون من 255 حرف على الاكثر"
                                                      name="description" id="description"
                                                      rows="4">{{$order->description}}</textarea>
                                            <div class="error-message" style="color: red"></div>
                                        </div>
                                        <div class="col-lg-6 mb-5">
                                            <label class="form-label fw-bolder mb-4 pb-7">مرفق المشروع</label>
                                            <input type="file" class="form-control" placeholder="مرفق المشروع"
                                                   name="file">
                                            <div class="error-message" style="color: red"></div>
                                        </div>


                                    </div>

                                    <div class="card-title m-0 pt-15">
                                        <h3 class="fw-bolder">
                                            ملاحظات المقيم
                                        </h3>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 mb-5">
                                            <textarea class="form-control" disabled
                                                      rows="4">{{$order->description_notes}}</textarea>
                                            <div class="error-message" style="color: red"></div>
                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-end pt-8 mt-10 border-top ">
                                        <button class="btn btn-primary min-w-100px save_form_laws"
                                                data-url="{{ url('dashboard/orders') }}" data-id="{{ $order->id }}"
                                                data-form="#LawsForm" id="kt_btn_reply">
                                            تعديل الطلب
                                        </button>
                                    </div>

                                </form>
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
    <script>
        $(document).on("click", ".save_form_laws", function (e) {
            e.preventDefault();
            $("#loading-spinner").removeClass("d-none");
            var url = $(this).data('url');
            var id = $(this).data('id');
            var save_btn = $(this);
            var form = $(save_btn.data('form'));
            var formData = new FormData(form[0]);
            formData.append('_method', 'put'); // Specify method
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Get a reference to the button element
            var btn = document.getElementById("kt_btn_reply");

            // Add the loading spinner class and text
            btn.classList.add("spinner", "spinner-right", "spinner-white", "pr-15");
            btn.innerText = "الرجاء الانتظار";
            $.ajax({
                url: url + '/' + id,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status) {
                        Swal.fire(
                            'تم التحديث بنجاح',
                            'تم التحديث بنجاح',
                            'success'
                        ).then((result) => {
                            window.location.href = '{{route('orders.index')}}';
                        })
                        $(form)[0].reset();
                        $(form).find('.error-message').empty();

                    } else {

                    }
                },
                error: function (jqXhr) {
                    // Hide the loading spinner on error
                    $("#loading-spinner").addClass("d-none");

                    // Remove the loading spinner class and reset the text
                    btn.classList.remove("spinner", "spinner-right", "spinner-white", "pr-15");
                    btn.innerText = "ارسال";
                    Swal.fire({
                        icon: 'error',
                        title: 'حدث خطأ',
                        text: jqXhr.responseJSON.errors,
                        footer: ''
                    })
                }
            });
        });
    </script>
@endpush
