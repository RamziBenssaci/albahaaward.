@extends('layouts.panel.app')

@section('title')
    المسابقات
@endsection
@section('sub_title')
    المسابقات
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
                                        المسابقات
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
                                               placeholder="بحث في المسابقات "/>
                                    </div>


                                    <!--end::Search-->

                                    <div class="d-flex justify-content-between gap-2">
                                        <a href="javascritp:;" class="btn btn-primary"
                                           data-bs-toggle="modal" data-bs-target=".add-category">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                 viewBox="0 0 24 24">
                                                <path fill="#FFFFFF"
                                                      d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2z"/>
                                            </svg>
                                            <span class="ms-1">اضافة</span>
                                        </a>
                                    </div>

                                </div>

                                <div class="table-responsive">
                                    <table id="kt_datatable_example_1"
                                           class="table align-middle table-row-dashed fs-6 gy-5 custom-table d-table">
                                        <thead>
                                        <tr class="text-center fw-bolder fs-7 text-uppercase gs-0">
                                            <th>#</th>
                                            <th>تصنيف المسابقه</th>
                                            <th> الموسم</th>
                                            <th>تم انشاء بواسطه</th>
                                            <th>تاريخ البدايه</th>
                                            <th>تاريخ النهايه</th>
                                            <th>الحاله</th>
                                            <th>الخيارات</th>
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

    <!-- add-ads -->
    <div class="modal fade add-category " tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">
                        اضافة مسابقه
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
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="fw-bold fs-6 mb-2"> اختر الموسم </label>
                                <select name="season_id" aria-label="اختر الموسم" data-control="select2"
                                        data-placeholder="اختر الموسم..."
                                        class="form-select form-select-solid form-select-lg fw-bold">
                                    <option value="">اختر الموسم</option>
                                    @foreach($seasons as $season)
                                        <option value="{{$season->id}}">{{$season->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="fw-bold fs-6 mb-2"> مدة المسابقه </label>
                                <input class="form-control form-control-solid" name="date" placeholder="Pick date rage" id="kt_daterangepicker_1"/>

                            </div>
                        </div>

                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary create_category"
                            data-url="{{ route('contests.store') }}" data-form="#categoryFormCreate">
                        اضافة
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade add-category " tabindex="-1" id="kt_modal_2">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">
                        تعديل المسابقه
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

                    <form id="categoryForm">
                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="fw-bold fs-6 mb-2"> اختر الفرع </label>
                                <select name="category_id_update" aria-label="اختر الفرع" data-control="select2"
                                        data-placeholder="اختر الفرع..."
                                        class="form-select form-select-solid form-select-lg fw-bold">
                                    <option value="">اختر الفرع</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="fw-bold fs-6 mb-2"> اختر الموسم </label>
                                <select name="season_id_update" aria-label="اختر الموسم" data-control="select2"
                                        data-placeholder="اختر الموسم..."
                                        class="form-select form-select-solid form-select-lg fw-bold">
                                    <option value="">اختر الموسم</option>
                                    @foreach($seasons as $season)
                                        <option value="{{$season->id}}">{{$season->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="fw-bold fs-6 mb-2"> مدة المسابقه </label>
                                <input class="form-control form-control-solid" name="date_update" placeholder="Pick date rage" id="kt_daterangepicker_2"/>

                            </div>
                        </div>
                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary update_category"
                            data-url="{{ url('dashboard/contests') }}" id="updateCategoryButton"
                            data-form="#categoryForm">
                        تعديل
                    </button>

                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        window.datatable_url = "{{ route('contest.datatable') }}";
        window.create = "{{ route('contests.create') }}";
    </script>
    <script src="{{ vAsset('assets/panel/js/tabels/contests.js') }}"></script>
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

        $(document).on("click", ".edit_category", function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            var id = $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: url + '/' + id + '/edit',
                type: 'GET',
                processData: false,
                contentType: false,
                success: function (response) {
                    var categoryName = response.data;
                    // Set the value of the input field in the modal
                    $('#categoryForm select[name="category_id_update"]').val(categoryName.category_id);
                    $('#categoryForm select[name="category_id_update"]').trigger('change');
                    $('#categoryForm select[name="season_id_update"]').val(categoryName.season_id);
                    $('#categoryForm select[name="season_id_update"]').trigger('change');
                    $('#kt_daterangepicker_2').val(categoryName.start_date + ' - ' + categoryName.end_date);
                    $('#updateCategoryButton').attr('data-id', id);

                    // Open the modal
                    $('#kt_modal_2').modal('show');
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

        $(document).on("click", ".update_category", function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            var id = $(this).data('id');
            var form = $(this).data('form');
            var formData = new FormData($(form)[0]);
            formData.append('_method', 'put'); // Specify method
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: url + '/' + id,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status) {
                        $('#kt_modal_2').modal('hide');
                        var dataTable = $('#kt_datatable_example_1').DataTable();
                        dataTable.ajax.reload();
                        Swal.fire(
                            'تم التحديث بنجاح',
                            'تم التحديث بنجاح',
                            'success'
                        )
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'حدث خطأ',
                            text: response.errors.name,
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

        $(document).on("click", ".delete_category", function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            var id = $(this).data('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            Swal.fire({
                title: 'هل أنت متأكد؟',
                text: "لن تكون قادرًا على التراجع عن هذا!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم، احذفه!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url + '/' + id,
                        method: 'DELETE',
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (response.status === true){
                                var dataTable = $('#kt_datatable_example_1').DataTable();
                                dataTable.ajax.reload();
                                Swal.fire(
                                    'تم الحذف!',
                                    'لقد تم حذف السجل الخاص بك.',
                                    'success'
                                )
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'حدث خطأ',
                                    text: response.message,
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
                }
            })

        });

        $(document).on("change", ".form-check-input", function (e) {
            e.preventDefault();
            var isChecked = $(this).prop("checked");
            var url = "{{ url('dashboard/disableContests') }}";
            var id = $(this).data('id');
            var data = {
                status: isChecked ? 1 : 0
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            Swal.fire({
                title: 'هل أنت متأكد أنك تريد تغيير الحالة؟',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تعم'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url + '/' + id,
                        method: 'GET',
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            var dataTable = $('#kt_datatable_example_1').DataTable();
                            dataTable.ajax.reload();
                            Swal.fire(
                                'تم تغيير الحالة بنجاح!',
                                'تم تغيير الحالة.',
                                'success'
                            )
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
                }
            })

        });
        $("#kt_daterangepicker_1").daterangepicker({
            locale: {
                format: 'DD/MM/YYYY'
            }
        });

        $("#kt_daterangepicker_2").daterangepicker({
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
    </script>

@endpush
