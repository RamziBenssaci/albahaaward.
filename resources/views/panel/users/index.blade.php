@extends('layouts.panel.app')

@section('title')
    المتقدمين
@endsection
@section('sub_title')
    المتقدمين
@endsection
@push('meta')

@endpush
@section('content')
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
                                        المتقدمين
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
                                               placeholder="بحث في المتقدمين "/>
                                    </div>


                                    <!--end::Search-->
                                    <div class="d-flex justify-content-between gap-3">
                                        <a class="btn btn-primary" href="{{route('users.create')}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                 viewBox="0 0 24 24">
                                                <path fill="#FFFFFF"
                                                      d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2z"/>
                                            </svg>
                                            <span class="ms-1">اضافة</span>
                                        </a>

                                    </div>

                                </div>

                                <div id="kt_datatable_example_buttons" class="d-none"></div>




                                <div class="table-responsive">
                                    <table id="kt_datatable_example_1"
                                           class="table align-middle table-row-dashed fs-6 gy-5 custom-table d-table">
                                        <thead>
                                        <tr class="text-center fw-bolder fs-7 text-uppercase gs-0">
                                            <th>رقم الاشتراك</th>
                                            <th>الاسم</th>
                                            <th>بريد الالكتروني</th>
                                            <th>الهويه</th>
                                            <th>الجنس</th>
                                            <th>رقم الهاتف</th>
                                            <th>القطاع</th>
                                            <th>الصورة الشخصيه</th>
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
@endsection
@push('scripts')

    <script>
        window.datatable_url = "{{ route('users.datatable') }}";
        window.create = "{{ route('users.create') }}";
    </script>
    <script src="{{ vAsset('assets/panel/js/tabels/users.js') }}"></script>
    <script src="{{ vAsset('assets/panel/js/tabels/data-ajaxUsers.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script>

        $(document).on("click", ".open_employees", function (e) {
            var imageUrl = '{{asset('assets/panel/images/default-image.png')}}';
            $('.image-input-wrapper').css('background-image', 'url("' + imageUrl + '")');
            $('.add-employees').modal('show');
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const countryCities = {
                'الإمارات العربية المتحدة': ['دبي', 'أبو ظبي', 'الشارقة', 'العين', 'رأس الخيمة'],
                'المملكة العربية السعودية': ['الرياض', 'جدة', 'الدمام', 'المدينة المنورة', 'الأحساء'],
                'قطر': ['الدوحة', 'الوكرة', 'الخور', 'الريان', 'الشمال'],
                'عمان': ['مسقط', 'صلالة', 'نزوى', 'صحار', 'البريمي'],
                'الكويت': ['الكويت', 'الفراوانية', 'حولي', 'الجهراء', 'مبارك الكبير'],
                'البحرين': ['المنامة', 'الرفاع', 'المحرق', 'المدينة', 'جد حفص'],
            };

            const countrySelect = document.getElementById('countrySelect');
            const citySelect = document.getElementById('citySelect');

            $(countrySelect).select2();
            const citySelects = $('#citySelect').select2(); // Initialize Select2

            function populateCities(selectedCountry) {
                citySelect.innerHTML = '<option value="">اختر المدينة</option>';
                if (selectedCountry && countryCities[selectedCountry]) {
                    countryCities[selectedCountry].forEach(city => {
                        const option = document.createElement('option');
                        option.value = city;
                        option.textContent = city;
                        citySelect.appendChild(option);
                    });
                }
            }

            $(countrySelect).on('select2:select', function () {
                const selectedCountry = countrySelect.value;
                populateCities(selectedCountry);
            });

            const initialCountry = "<?php echo $user->country ?? ''; ?>";
            const initialCity = "<?php echo $user->city ?? ''; ?>";


            if (initialCountry) {
                countrySelect.value = initialCountry;
                populateCities(initialCountry);
            }

            if (initialCountry) {
                populateCities(initialCountry);
            }

            if (initialCity) {
                selectInitialCity(initialCity);
            }

            function selectInitialCity(cityName) {
                const options = citySelects.find('option');
                options.each(function () {
                    if ($(this).text() === cityName) {
                        $(this).prop('selected', true);
                    }
                });
                citySelects.trigger('change');
            }
        });

    </script>
@endpush
