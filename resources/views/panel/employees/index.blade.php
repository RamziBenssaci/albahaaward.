@extends('layouts.panel.app')

@section('title')
    الموظفين والصلاحيات
@endsection
@section('sub_title')
    الموظفين والصلاحيات
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
                                        الموظفين والصلاحيات
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
                                               placeholder="بحث في الموظفين "/>
                                    </div>


                                    <!--end::Search-->

                                    <div class="d-flex justify-content-between gap-3">
                                        @can('show_permissions')

                                            <a href="{{route('permissions.index')}}" class="btn btn-light-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-lock-fill"
                                                     viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z">
                                                    </path>
                                                </svg>
                                                الصلاحيات
                                            </a>

                                        @endcan

                                        <button class="btn btn-primary open_employees">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                 viewBox="0 0 24 24">
                                                <path fill="#FFFFFF"
                                                      d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2z"/>
                                            </svg>
                                            <span class="ms-1">اضافة</span>
                                        </button>

                                    </div>

                                </div>

                                <div class="table-responsive">
                                    <table id="kt_datatable_example_1"
                                           class="table align-middle table-row-dashed fs-6 gy-5 custom-table d-table">
                                        <thead>
                                        <tr class="text-center fw-bolder fs-7 text-uppercase gs-0">
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>بريد الالكتروني</th>
                                            <th>الصلاحيه</th>
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

    <div class="modal fade edit-employees" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">
                        تعديل بيانات مستخدم
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

                    <form id="employeesFormEdit">
                        <input type="hidden" name="id">
                        <div class="row">
                            <div class="col-12 mb-5">
                                <div>
                                    <label class="form-label"> صورة المستخدم </label>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="image-input image-input-empty mt-3"
                                         data-kt-image-input="true"
                                         style="background-image: url(./assets/images/default-image.png)">
                                        <!--begin::Image preview wrapper-->
                                        <div class="image-input-wrapper w-100px h-100px"></div>
                                        <!--end::Image preview wrapper-->
                                        <!--begin::Edit button-->
                                        <label
                                            class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change"
                                            data-bs-toggle="tooltip" data-bs-dismiss="click"
                                            title="صورة المستخدم">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="image"
                                                   accept=".png, .jpg, .jpeg"/>
                                            <input type="hidden" name="avatar_remove"/>
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Edit button-->
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-5">
                                <label class="fw-bold fs-6 mb-2">الاسم كاملا</label>
                                <input type="text" class="form-control form-control-solid" name="name"
                                       placeholder="الاسم كاملا">
                            </div>

                            <div class="col-lg-6 mb-5">
                                <label class="fw-bold fs-6 mb-2">الإيميل</label>
                                <input type="email" class="form-control form-control-solid" name="email"
                                       placeholder="الإيميل">
                            </div>

                            <div class="col-lg-6 mb-5">
                                <label class="fw-bold fs-6 mb-2">الصلاحية</label>
                                <select class="form-select" data-control="select2" name="role_id"
                                        data-placeholder="الصلاحية">
                                    <option></option>
                                    @foreach($roles as $row)
                                        <option
                                            value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-6 mb-5">
                                <label class="fw-bold fs-6 mb-2">رقم الجوال</label>
                                <input type="number" class="form-control form-control-solid" name="mobile"
                                       placeholder="رقم الجوال">
                            </div>

                            <div class="col-lg-6 mb-5">
                                <label class="fw-bold fs-6 mb-2">كلمة المرور</label>
                                <input type="password" name="password" class="form-control form-control-solid"
                                       placeholder="كلمة المرور">
                            </div>

                        </div>

                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary update_employees" id="updateEmployeesButton"
                            data-url="{{ url('dashboard/employees') }}" data-form="#employeesFormEdit">
                        تعديل
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade add-employees" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">
                        اضافة مستخدم
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

                    <form id="employeesFormCreate">

                        <div class="row">
                            <div class="col-12 mb-5">
                                <div>
                                    <label class="form-label"> صورة المستخدم </label>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="image-input image-input-empty mt-3"
                                         data-kt-image-input="true"
                                         style="background-image: url({{asset('assets/panel/images/default-image.png')}})">
                                        <!--begin::Image preview wrapper-->
                                        <div class="image-input-wrapper w-100px h-100px"></div>
                                        <!--end::Image preview wrapper-->
                                        <!--begin::Edit button-->
                                        <label
                                            class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change"
                                            data-bs-toggle="tooltip" data-bs-dismiss="click"
                                            title="صورة المستخدم">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="image"
                                                   accept=".png, .jpg, .jpeg"/>
                                            <input type="hidden" name="avatar_remove"/>
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Edit button-->
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-5">
                                <label class="fw-bold fs-6 mb-2">الاسم كاملا</label>
                                <input type="text" class="form-control form-control-solid" name="name"
                                       placeholder="الاسم كاملا">
                            </div>

                            <div class="col-lg-6 mb-5">
                                <label class="fw-bold fs-6 mb-2">الإيميل</label>
                                <input type="email" class="form-control form-control-solid" name="email"
                                       placeholder="الإيميل">
                            </div>

                            <div class="col-lg-6 mb-5">
                                <label class="fw-bold fs-6 mb-2">الصلاحية</label>
                                <select class="form-select" data-control="select2" name="role_id"
                                        data-placeholder="الصلاحية">
                                    <option></option>
                                    @foreach($roles as $row)
                                        <option
                                            value="{{ $row->id }}" {>{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-6 mb-5">
                                <label class="fw-bold fs-6 mb-2">رقم الجوال</label>
                                <input type="number" class="form-control form-control-solid" name="mobile"
                                       placeholder="رقم الجوال">
                            </div>

                            <div class="col-lg-6 mb-5">
                                <label class="fw-bold fs-6 mb-2">كلمة المرور</label>
                                <input type="password" class="form-control form-control-solid" name="password"
                                       placeholder="كلمة المرور">
                            </div>

                        </div>

                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary create_employees"
                            data-url="{{ url('dashboard/employees') }}" data-form="#employeesFormCreate">
                        اضافة
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        window.datatable_url = "{{ route('employees.datatable') }}";
        window.create = "{{ route('employees.create') }}";
    </script>
    <script src="{{ vAsset('assets/panel/js/tabels/employees.js') }}"></script>
    <script src="{{ vAsset('assets/panel/js/data-ajax.js') }}"></script>

    <script>

        $(document).on("click", ".open_employees", function (e) {
            var imageUrl = '{{asset('assets/panel/images/default-image.png')}}';
            $('.image-input-wrapper').css('background-image', 'url("' + imageUrl + '")');
            $('.add-employees').modal('show');
        });


        $(document).on("click", ".create_employees", function (e) {
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
                        $('.add-employees').modal('hide');
                        $(".modal-body input").val("");
                        var dataTable = $('#kt_datatable_example_1').DataTable();
                        dataTable.ajax.reload();
                        Swal.fire(
                            'تم الإنشاء بنجاح',
                            'تم الإنشاء بنجاح',
                            'success'
                        )
                        var imageUrl = '{{asset('assets/panel/images/default-image.png')}}';
                        $('.image-input-wrapper').css('background-image', 'url("' + imageUrl + '")');
                    } else {

                    }

                },
                error: function (jqXhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'حدث حطأ',
                        text: jqXhr.responseJSON.message,
                        footer: ''
                    })
                }
            });

        });

        $(document).on("click", ".edit_employees", function (e) {
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
                    var allData = response.data;
                    // Set the value of the input field in the modal
                    $('#employeesFormEdit input[name="name"]').val(allData.name);
                    $('#employeesFormEdit input[name="email"]').val(allData.email);
                    $('#employeesFormEdit input[name="mobile"]').val(allData.phone);
                    $('#employeesFormEdit input[name="id"]').val(allData.id);
                    var imageUrl = '{{asset('images')}}' + '/' + allData.image;
                    $('.image-input-wrapper').css('background-image', 'url("' + imageUrl + '")');
                    $('#employeesFormEdit select[name="role_id"]').val(response.role_id).trigger('change');

                    $('#updateEmployeesButton').attr('data-id', id);
                    $('.edit-employees').modal('show');
                },
                error: function (jqXhr) {
                    console.log(jqXhr);
                }
            });

        });

        $(document).on("click", ".update_employees", function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            var id = $(this).data('id');
            var form = $(this).data('form');
            var formData = new FormData($(form)[0]);
            formData.append('_method', 'PUT'); // Specify method
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
                        $('.edit-employees').modal('hide');
                        var dataTable = $('#kt_datatable_example_1').DataTable();
                        dataTable.ajax.reload();
                        Swal.fire(
                            'تم التحديث بنجاح',
                            'تم التحديث بنجاح',
                            'success'
                        )
                        var imageUrl = '{{asset('assets/panel/images/default-image.png')}}';
                        $('.image-input-wrapper').css('background-image', 'url("' + imageUrl + '")');
                    } else {

                    }
                },
                error: function (jqXhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'حدث خطأ',
                        text: jqXhr.responseJSON.message,
                        footer: ''
                    })
                }
            });
        });

        $(document).on("click", ".delete_employees", function (e) {
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
                            var dataTable = $('#kt_datatable_example_1').DataTable();
                            dataTable.ajax.reload();
                            Swal.fire(
                                'تم الحذف!',
                                'لقد تم حذف السجل الخاص بك.',
                                'success'
                            )
                        },
                        error: function (jqXhr) {
                            console.log(jqXhr);
                        }
                    });
                }
            })

        });

        $(document).on("click", ".disable_employees", function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            var id = $(this).data('id');
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
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
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
                            console.log(jqXhr);
                        }
                    });
                }
            })

        });

    </script>

    <script>

        var KTDatatablesExample = function () {

            var table;
            var datatable;

            var initDatatable = function () {
                const tableRows = table.querySelectorAll('tbody tr');

                datatable = $(table).DataTable({
                    "info": false,
                    'order': [],
                    'sort': false,
                    'responsive': false,
                    'pageLength': 10,
                    "lengthChange": false
                });
            }
            var handleSearchDatatable = () => {
                const filterSearch = document.querySelector('[data-kt-filter="search"]');
                filterSearch.addEventListener('keyup', function (e) {
                    datatable.search(e.target.value).draw();
                });
            }

            return {
                init: function () {
                    table = document.querySelector('#kt_datatable_example');

                    if (!table) {
                        return;
                    }

                    initDatatable();
                    handleSearchDatatable();
                }
            };
        }();

        KTUtil.onDOMContentLoaded(function () {
            KTDatatablesExample.init();
        });
    </script>

@endpush
