@extends('layouts.panel.app')

@section('title')
    الطلبات
@endsection
@section('sub_title')
    الطلبات
@endsection
@push('meta')

@endpush
@section('content')
    <style>
        /* Define a custom class for a larger alert */
        .larger-alert {
            max-width: 1000px; /* Adjust the max-width as needed */
        }

    </style>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">

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
                                        الطلبات
                                    </h3>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-wrap justify-content align-items-center gap-2 mb-3">
                                    <!-- Search Input -->
                                    <div class="position-relative">
        <span class="svg-icon svg-icon-1 position-absolute ms-2">
            <!-- Your search icon SVG code here -->
        </span>
                                        <input type="text" data-kt-filter="search" id="name_search"
                                               class="form-control form-control-solid ps-10"
                                               placeholder="بحث عن مقدم الطلب"/>
                                    </div>

                                    <!-- First Select -->
                                    <div class="w-100 w-sm-auto ms-sm-2">
                                        <select class="form-select" id="active_search" name="active_search" data-control="select2"
                                                data-placeholder="اختر المسابقه">
                                            <option></option>
                                            <option value="-1">الكل</option>
                                            @foreach($category as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Second Select -->
                                    <div class="w-100 w-sm-auto ms-sm-2">
                                        <select class="form-select" id="type_of_type" name="type_of_type" data-control="select2"
                                                data-placeholder="اختر الحاله ">
                                            <option></option>
                                            <option value="-1">الكل</option>
                                            @foreach(\App\Constants\ENUM::STATUS as $key => $STATUS)
                                                <option value="{{$key}}">{{$STATUS}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <!--end::Search-->

                                    <div id="kt_datatable_example_buttons" class="d-none"></div>
                                    <!--end::Toolbar-->
                                    <!--begin::Group actions-->
                                </div>

                                <div class="table-responsive">
                                    <table id="kt_datatable_example_1"
                                           class="table align-middle table-row-dashed fs-6 gy-5 custom-table d-table">
                                        <thead>
                                        <tr class="text-center fw-bolder fs-7 text-uppercase gs-0">
                                            <th>#</th>
                                            <th> المسابقه</th>
                                            <th> الموسم</th>
                                            <th>مقدم الطلب</th>
                                            <th>تاريخ تقديم الطلب</th>
                                            <th>تقيم بواسطه</th>
                                            <th>حاله الطلب</th>
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

    <div class="modal fade change_status_order " tabindex="-1" id="kt_modal_2">
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
                                <input class="form-control form-control-solid" name="date_update"
                                       placeholder="Pick date rage" id="kt_daterangepicker_2"/>

                            </div>
                        </div>
                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary change_status_order"
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
        window.datatable_url = "{{ route('order.datatable.all') }}";
        window.selected_column = [0,1,2,3,4];

    </script>
    <script src="{{ vAsset('assets/panel/js/tabels/orders.js') }}"></script>
    <script src="{{ vAsset('assets/panel/js/tabels/data-ajaxUsers.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

    <script>

        $(document).on("click", ".change_status_order", function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            var id = $(this).data('id');
            var status = $(this).data('value');
            var message = $(this).data('action');
            var inputField1, fileInput;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Define formData here
            var formData = new FormData();

            var htmlContent = '';
            if (status === 2 || status === 3) {
                htmlContent =
                    '<div style="max-height: 400px; overflow-y: auto;">' +
                    '<label class="text-start form-label fw-bolder mb-4">تفاصيل</label>' +
                    '<textarea class="form-control" placeholder="يتكون من 255 حرف على الأكثر" name="description" id="description" rows="2"></textarea>' +
                    '<br>' +
                    '<label class="text-start form-label fw-bolder mb-4">مرفق التقييم</label>' +
                    '<input type="file" class="form-control" placeholder="مرفق المشروع" name="file" id="file">' +
                    '</div>';
            }

            Swal.fire({
                title: 'تغير حاله الطلب الى ' + message,
                html: htmlContent,
                showCancelButton: true,
                confirmButtonText: 'تغير الحاله',
                cancelButtonText: 'الغاء',
                preConfirm: () => {
                    // Check if #description and #file elements exist
                    const descriptionElement = Swal.getPopup().querySelector('#description');
                    const fileElement = Swal.getPopup().querySelector('#file');

                    // Check if descriptionElement is not null and not undefined
                    inputField1 = descriptionElement ? descriptionElement.value : '';
                    // Check if fileElement is not null and not undefined
                    fileInput = fileElement ? fileElement.files[0] : null; // Access the file object

                    // Append data to the formData object
                    formData.append('id', id);
                    formData.append('status', status);
                    formData.append('description_notes', inputField1);
                    formData.append('file', fileInput); // Append the file
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'الرجاء الانتظار...',
                        allowOutsideClick: false, // Prevent clicking outside the alert
                        showConfirmButton: false // Hide the confirm button
                    });
                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: formData, // Use FormData for file uploads
                        contentType: false, // Set contentType to false for FormData
                        processData: false, // Set processData to false for FormData
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
            });
        });




    </script>

@endpush
