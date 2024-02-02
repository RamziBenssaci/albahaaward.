@extends('layouts.panel.app')

@section('title')
    الجوائز
@endsection
@section('sub_title')
    الجوائز
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
                                        فروع جائزة الباحة
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
                                               placeholder="بحث في فروع "/>
                                    </div>


                                    <!--end::Search-->
                                </div>

                                <div class="table-responsive">
                                    <table id="kt_datatable_example_1"
                                           class="table align-middle table-row-dashed fs-6 gy-5 custom-table d-table">
                                        <thead>
                                        <tr class="text-center fw-bolder fs-7 text-uppercase gs-0">
                                            <th>#</th>
                                            <th> المسابقه</th>
                                            <th> الموسم</th>
                                            <th>تاريخ البدايه</th>
                                            <th>تاريخ النهايه</th>
                                            <th>حاله المسابقه</th>
                                            <th>حاله الطلب</th>
                                            <th>الخيارات</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-gray-800 text-center fw-bold">
                                            @foreach ($Contests as $Contest)
                                            <tr>
                                                <td></td>
                                                <td>{{$Contest->category->name}}</td>
                                                <td>{{$Contest->season->name}}</td>
                                                <td>{{$Contest->start_date}}</td>
                                                <td>{{$Contest->end_date}}</td>
                                                <td>
                                                    @if ($Contest->status == 1)
                                                    <span class="badge badge-success">فعال</span>
                                                    @else
                                                    <span class="badge badge-danger">غير فعال</span>
                                                    @endif
                                                </td>
                                                <td>

                                                    @if ($Contest->order)
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

                                                                    @if (array_key_exists($Contest->order->status, $statusClass))
                                                                        <span class="badge {{ $statusClass[$Contest->order->status] }}">
                                                                            {{ $statusText[$Contest->order->status] }}
                                                                        </span>
                                                                    @else
                                                                        <span class="badge badge-primary">لا يوجد طلبات</span>
                                                                    @endif
                                                                @else
                                                                    <span class="badge badge-primary">لا يوجد طلبات</span>
                                                                @endif
                                                    </td>
                                                <td>
                                                    @switch($Contest->category->type)
                                                        @case("cat1")
                                                            @if($Contest->order)
                                                            @if($Contest->order !== null && $Contest->order->status == 3)
                                                                {{-- <a href="{{ route('orders.edit',$Contest->order->id) }}" class="menu-link px-3 btn btn-sm btn-warning">
                                                                    تعديل الطلب
                                                                </a> --}}
                                                            @endif
                                                            @else
                                                                <a href="javascript:;" class="menu-link px-3 edit_category btn btn-sm btn-primary btn-get-categorie"  data-url="/dashboard/orders/get/cat1" data-id="{{$Contest->id}}">
                                                                    تقديم طلب
                                                                </a>
                                                            @endif
                                                        @break
                                                        @case("cat2")
                                                            @if($Contest->order)
                                                                @if($Contest->order !== null && $Contest->order->status == 3)
                                                                    {{-- <a href="{{ route('orders.edit',$Contest->order->id) }}" class="menu-link px-3 btn btn-sm btn-warning">
                                                                        تعديل الطلب
                                                                    </a> --}}
                                                                @endif
                                                            @else
                                                                <a href="javascript:;" class="menu-link px-3 edit_category btn btn-sm btn-primary btn-get-categorie"  data-url="/dashboard/orders/get/cat2" data-id="{{$Contest->id}}">
                                                                    تقديم طلب
                                                                </a>
                                                            @endif
                                                        @break
                                                        @case("cat3")
                                                            @if($Contest->order)
                                                                @if($Contest->order !== null && $Contest->order->status == 3)
                                                                    {{-- <a href="{{ route('orders.edit',$Contest->order->id) }}" class="menu-link px-3 btn btn-sm btn-warning">
                                                                        تعديل الطلب
                                                                    </a> --}}
                                                                @endif
                                                                @else
                                                                    <a href="javascript:;" class="menu-link px-3 edit_category btn btn-sm btn-primary btn-get-categorie"  data-url="/dashboard/orders/get/cat3" data-id="{{$Contest->id}}">
                                                                        تقديم طلب
                                                                    </a>
                                                            @endif
                                                        @break
                                                        @case("cat4")
                                                            @if($Contest->order)
                                                                @if($Contest->order !== null && $Contest->order->status == 3)
                                                                    {{-- <a href="{{ route('orders.edit',$Contest->order->id) }}" class="menu-link px-3 btn btn-sm btn-warning">
                                                                        تعديل الطلب
                                                                    </a> --}}
                                                                @endif
                                                            @else
                                                                <a href="javascript:;" class="menu-link px-3 edit_category btn btn-sm btn-primary btn-get-categorie"  data-url="/dashboard/orders/get/cat4" data-id="{{$Contest->id}}">
                                                                    تقديم طلب
                                                                </a>
                                                            @endif
                                                        @break
                                                        @case("cat5")
                                                            @if($Contest->order)
                                                                @if($Contest->order !== null && $Contest->order->status == 3)
                                                                    {{-- <a href="{{ route('orders.edit',$Contest->order->id) }}" class="menu-link px-3 btn btn-sm btn-warning">
                                                                        تعديل الطلب
                                                                    </a> --}}
                                                                @endif
                                                            @else
                                                                <a href="javascript:;" class="menu-link px-3 edit_category btn btn-sm btn-primary btn-get-categorie"  data-url="/dashboard/orders/get/cat5" data-id="{{$Contest->id}}">
                                                                    تقديم طلب
                                                                </a>
                                                            @endif
                                                        @break

                                                        @default

                                                    @endswitch

                                                </td>
                                            </tr>

                                            @endforeach

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
<script src="{{ asset('js/Categorie/test.js') }}"></script>
    {{-- <script>
        window.datatable_url = "{{ route('order.datatable') }}";
        window.create = "{{ route('orders.create') }}";
    </script>
    <script src="{{ vAsset('assets/panel/js/tabels/contest_user.js') }}"></script>
    <script src="{{ vAsset('assets/panel/js/data-ajax.js') }}"></script>

    <script>

        $(document).on("click", ".check", function (e) {
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
                            '{{translate('Created successfully')}}',
                            '{{translate("Created successfully")}}',
                            'success'
                        )
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: '{{translate('Oops...')}}',
                            text: response.errors.name,
                            footer: ''
                        })
                    }

                },
                error: function (jqXhr) {
                    console.log(jqXhr);
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
                url: url,
                data: {id : id},
                type: 'POST',
                // processData: false,
                // contentType: false,
                success: function (response) {
                    var routeUrl = '{{ route('orders.create') }}';
                    window.location.href = routeUrl;
                },
                error: function (jqXhr) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'حدث خطأ',
                        text: jqXhr.responseJSON
                    })
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
                    // Handle the error response
                    console.log(jqXhr);
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
                title: '{{translate('Are you sure?')}}',
                text: "{{translate('You wont be able to revert this!')}}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{translate("Yes, delete it!")}}'
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
                                    '{{translate('Deleted!')}}',
                                    '{{translate("Your record has been deleted.")}}',
                                    'success'
                                )
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: '{{translate('Oops...')}}',
                                    text: response.message,
                                    footer: ''
                                })
                            }

                        },
                        error: function (jqXhr) {
                            console.log(jqXhr);
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
                title: '{{translate('Are you sure want to change status?')}}',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{translate("Yes")}}'
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
                                '{{translate('Status changed successfully!')}}',
                                '{{translate("Status has been changed.")}}',
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
    </script> --}}

@endpush


