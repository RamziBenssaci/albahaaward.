@extends('layouts.panel.app')

@section('title')
    الصلاحيات
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
                                        الصلاحيات
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
                                               placeholder="بحث في  الصلاحيات "/>
                                    </div>


                                    <!--end::Search-->

                                    <div class="d-flex justify-content-between gap-3">

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
                                            <th>تاريخ الانشاء</th>
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

    <div class="modal fade edit-permission" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">
                        تعديل الصلاحيات
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

                    <form id="permissionsFormEdit">
                        <input type="hidden" name="id">
                        <div class="row mb-8">
                            <div class="col-12 mb-5">
                                <label class="fw-bold fs-6 mb-2"> الصلاحية </label>
                                <input type="text" class="form-control form-control-solid" name="name" placeholder="الصلاحية">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h4 class="fw-bold fs-4 mb-5 border-bottom pb-4">
                                    الصلاحيات
                                </h4>

                                <div class="row">
                                    @php
                                        $permissionsChunks = array_chunk($permissions->toArray(), 6);
                                    @endphp

                                    @foreach ($permissionsChunks as $columnPermissions)
                                        <div class="col-md-3">
                                            <ul>
                                                @foreach ($columnPermissions as $permission)
                                                    <li>
                                                        <!--begin::Checkbox-->
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid fw-bold mb-9">
                                                            <input class="form-check-input p user_management_checkboxs" onclick="check('{{ $permission['name'] }}', this)" type="checkbox" value="{{ $permission['id'] }}" name="user_management_read[]">
                                                            <span class="form-check-label">{{ trans('translate.' . $permission['name']) }}</span>
                                                        </label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary update_permissions" id="updatePermissionsButton"
                            data-url="{{ url('dashboard/permissions') }}" data-form="#permissionsFormEdit">
                        تعديل
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade add-permission" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">
                        اضافة صلاحية
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

                    <form id="permissionsFormCreate">

                        <div class="row mb-8">
                            <div class="col-12 mb-5">
                                <label class="fw-bold fs-6 mb-2"> الصلاحية </label>
                                <input type="text" class="form-control form-control-solid" name="name" placeholder="الصلاحية">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h4 class="fw-bold fs-4 mb-5 border-bottom pb-4">
                                    الصلاحيات
                                </h4>

                                <div class="row">
                                    @php
                                        $permissionsChunked = $permissions->chunk(6);
                                    @endphp

                                    @foreach ($permissionsChunked as $columnPermissions)
                                        <div class="col-md-3">
                                            <ul>
                                                @foreach ($columnPermissions as $permission)
                                                    <li>
                                                        <!--begin::Checkbox-->
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid fw-bold mb-9">
                                                            <input class="form-check-input p user_management_checkbox" onclick="check('{{ $permission->name}}',this)" type="checkbox" value="{{ $permission->id }}" name="user_management_read[]">
                                                            <span class="form-check-label ">{{ trans('translate.' . $permission->name) }}</span>
                                                        </label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary create_permissions"
                            data-url="{{ url('dashboard/permissions') }}" data-form="#permissionsFormCreate">
                        اضافة
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        window.datatable_url = "{{ route('permissions.datatable') }}";
        window.create = "{{ route('permissions.create') }}";
    </script>
    <script src="{{ vAsset('assets/panel/js/tabels/permissions.js') }}"></script>
    <script src="{{ vAsset('assets/panel/js/data-ajax.js') }}"></script>

    <script>

        $(document).on("click", ".open_employees", function (e) {
            var imageUrl = '{{asset('assets/panel/images/default-image.png')}}';
            $('.image-input-wrapper').css('background-image', 'url("' + imageUrl + '")');
            $('.add-permission').modal('show');
        });


        $(document).on("click", ".create_permissions", function (e) {
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
                    if (response.status == true) {
                        $('.add-permission').modal('hide');
                        $(".modal-body input").val("");
                        var dataTable = $('#kt_datatable_example_1').DataTable();
                        dataTable.ajax.reload();
                        Swal.fire({
                            title: 'تم الانشاء بنجاح',
                            text: 'تم الانشاء بنجاح',
                            icon: 'success',
                        }).then(function() {
                            location.reload();
                        });

                        var imageUrl = '{{asset('assets/panel/images/default-image.png')}}';
                        $('.image-input-wrapper').css('background-image', 'url("' + imageUrl + '")');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'حدث خطأ',
                            text: jqXhr.responseJSON.message,
                            footer: ''
                        })
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

        $(document).on("click", ".edit_permissions", function (e) {
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
                    var allData = response;
                    $('#permissionsFormEdit input[name="name"]').val(allData.item.name);
                    $('#permissionsFormEdit input[name="id"]').val(allData.item.id);

                    var rolePermissions = response.permissions;

                    $('.user_management_checkboxs').each(function() {
                        var permissionId = $(this).val();
                        console.log(rolePermissions);
                        if (rolePermissions.indexOf(parseInt(permissionId)) !== -1) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                    $('#updatePermissionsButton').attr('data-id', id);
                    $('.edit-permission').modal('show');
                },
                error: function (jqXhr) {
                    console.log(jqXhr);
                }
            });

        });

        $(document).on("click", ".update_permissions", function (e) {
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
                        $('.edit-permission').modal('hide');
                        var dataTable = $('#kt_datatable_example_1').DataTable();
                        dataTable.ajax.reload();
                        Swal.fire(
                            'تم التحديث بنجاح',
                            'تم التحديث بنجاح',
                            'success'
                        )
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

        $(document).on("click", ".delete_permissions", function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            var id = $(this).data('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            Swal.fire({
                title: 'Are you sure?',
                text: "You wont be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url + '/' + id,
                        method: 'DELETE',
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (response.status == true){
                                alert(response.status);
                                var dataTable = $('#kt_datatable_example_1').DataTable();
                                dataTable.ajax.reload();
                                Swal.fire(
                                    'Deleted!',
                                    'Your record has been deleted.',
                                    'success'
                                )
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response.message,
                                    footer: ''
                                })
                            }

                        },
                        error: function (jqXhr) {

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
