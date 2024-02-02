@extends('layouts.panel.app')

@section('title')
    تذاكر الدعم
@endsection
@section('sub_title')
    تذاكر الدعم
@endsection
@push('meta')

@endpush
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content" xmlns="http://www.w3.org/1999/html">
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
                                        تذاكر الدعم
                                    </h3>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <div class="card-body">
                                <div
                                    class="d-flex justify-content-between align-items-center flex-wrap gap-5 mb-5">
                                    <!--begin::Search-->
                                    <div class="d-flex align-items-center position-relative">
                                                    <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                                        <svg width="18" height="18" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                  d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14z"/>
                                                        </svg>
                                                    </span>
                                        <input type="text" data-kt-filter="search" id="name_search"
                                               class="form-control form-control-solid w-250px ps-14"
                                               placeholder="بحث في تذاكر الدعم "/>
                                    </div>

                                    <div class="d-flex justify-content-between gap-2">
                                        <a href="javascritp:;" class="btn btn-primary"
                                           data-bs-toggle="modal" data-bs-target=".add-category">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                 viewBox="0 0 24 24">
                                                <path fill="#FFFFFF"
                                                      d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2z"/>
                                            </svg>
                                            <span class="ms-1">انشاء تذكرة جديدة</span>
                                        </a>
                                    </div>


                                </div>

                                <div class="table-responsive">
                                    <table id="kt_datatable_example_1"
                                           class="table align-middle table-row-dashed fs-6 gy-5 custom-table d-table">
                                        <thead>
                                        <tr class="text-center fw-bolder fs-7 text-uppercase gs-0">
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>رقم الجوال</th>
                                            <th>البريد الالكتروني</th>
                                            <th>الفرع </th>
                                            <th>الحاله</th>
                                            <th>الاجرائات</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-gray-800 text-center fw-bold">

                                        </tbody>
                                    </table>
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

    <div class="modal fade add-category " tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">
                        اضافة تذكرة جديدة
                    </h3>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                         aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                            <path fill="#888888"
                                  d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z"/>
                        </svg>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">

                    <form id="categoryFormCreate">
                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="fw-bold fs-6 mb-2"> اختر الفرع </label>
                                <select name="category_id" aria-label="اختر الفرع" data-control="select2"
                                        data-placeholder="اختر الفرع..."
                                        class="form-select form-select-solid form-select-lg fw-bold">
                                    <option value="">اختر الفرع</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                    <option value="-1">اخرى</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="fw-bold fs-6 mb-2"> تفاصيل المشكله </label>
                                <textarea class="form-control form-control-solid " rows="6" name="description"></textarea>

                            </div>
                        </div>

                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary create_category"
                            data-url="{{ route('contacts.store') }}" data-form="#categoryFormCreate">
                        اضافة
                    </button>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('scripts')
    <script>
        window.datatable_url = "{{ route('contacts.datatable') }}";
        window.create = "{{ route('contacts.create') }}";
    </script>
    <script src="{{ vAsset('assets/panel/js/tabels/contacts.js') }}"></script>
    <script src="{{ vAsset('assets/panel/js/data-ajax.js') }}"></script>
    <script>
        $(document).on("click", ".create_category", function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            var form = $(this).data('form');
            var formData = new FormData($(form)[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status) {
                        $('#kt_modal_1').modal('hide');
                        var dataTable = $('#kt_datatable_example_1').DataTable();
                        dataTable.ajax.reload();
                        Swal.fire(
                            'تم الإنشاء بنجاح',
                            'تم الإنشاء بنجاح',
                            'success'
                        )
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'حدث خطأ',
                            text: response.errors,
                            footer: ''
                        })
                    }

                },
                error: function (jqXhr) {
                    var errorMessage = jqXhr.responseJSON.message;
                    Swal.fire(
                        'حدث خطأ',
                        errorMessage, // Display the error message
                        'error'
                    );
                }
            });

        });

    </script>
@endpush
