@extends('layouts.panel.app')

@section('title')
    طلبات التواصل
@endsection
@section('sub_title')
    طلبات التواصل@section('sub_title_2')- تفاصيل الطلب@endsection
@endsection
@push('meta')

@endpush
@section('content')
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .loader {
            display: none;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
        }

        .loading {
            border: 2px solid #ccc;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border-top-color: #1ecd97;
            border-left-color: #1ecd97;
            animation: spin 1s infinite ease-in;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
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
                                        تفاصيل الطلب
                                    </h3>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <div class="card-body">

                                <div class="flex-lg-row-fluid me-xl-15 mb-20 mb-xl-0">
                                    <!--begin::Ticket view-->
                                    <div class="mb-0">
                                        <!--begin::Heading-->
                                        <div class="d-flex align-items-center mb-12">
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <!--begin::Title-->
                                                <!--end::Title-->
                                                <!--begin::Info-->
                                                <div class="" style="font-size: 15px;">
                                                    <!--begin::Label-->
                                                    <span class="fw-semibold text-muted me-6">بواسطة:
                                                                    <span class="fw-bold text-gray-600 me-1">
                                                                        {{$contact->user->name}}
                                                                    </span>
                                                                </span>
                                                    <!--end::Label-->
                                                    <!--begin::Label-->
                                                    <span class="fw-semibold text-muted">التاريخ :
                                                                    <span class="fw-bold text-gray-600 me-1">
                                                                          {{$contact->created_at->diffForHumans()}}</span></span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Comments-->
                                        <div class="">
                                            <!--begin::Comment-->
                                            <div class="mb-9">
                                                <!--begin::Card-->
                                                <div class="card card-bordered w-100">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
                                                        <!--begin::Wrapper-->
                                                        <div class="w-100 d-flex flex-stack mb-8">
                                                            <!--begin::Container-->
                                                            <div class="d-flex align-items-center f">
                                                                <!--begin::Author-->
                                                                <div class="symbol symbol-50px me-5">
                                                                    <div
                                                                        class="symbol-label fs-1 fw-bold bg-light-success text-success">
                                                                        {{mb_substr($contact->user->name, 0, 1)}}
                                                                    </div>
                                                                </div>
                                                                <!--end::Author-->
                                                                <!--begin::Info-->
                                                                <div
                                                                    class="d-flex flex-column fw-semibold fs-5 text-gray-600 text-dark">
                                                                    <!--begin::Text-->
                                                                    <div class="d-flex align-items-center">
                                                                        <!--begin::Username-->
                                                                        <p class="text-gray-800 fw-bold fs-5 me-3 mb-0">
                                                                            {{$contact->user->name}} </p>
                                                                        <!--end::Username-->
                                                                        <span class="m-0"></span>
                                                                    </div>
                                                                    <!--end::Text-->
                                                                    <!--begin::Date-->
                                                                    <span
                                                                        class="text-muted fw-semibold fs-6">
                                                                                    {{$contact->created_at->diffForHumans()}}</span>
                                                                    <!--end::Date-->
                                                                </div>
                                                                <!--end::Info-->
                                                            </div>
                                                            <!--end::Container-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                        <!--begin::Desc-->
                                                        <p class="fw-normal fs-5 text-gray-700 m-0">
                                                            الفرع : {{$contact->category_id !== -1 ? \App\Models\Category::query()->find($contact->category_id)->name : 'اخرى'}}
                                                        </p>
                                                        <p class="fw-normal fs-5 text-gray-700 m-0">
                                                            التفاصيل : {{$contact->description}}
                                                        </p>
                                                        <!--end::Desc-->
                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <!--end::Comment-->
                                            <!--begin::Comment-->
                                            @foreach($contact->replies as $reply)
                                            <div class="mb-9">
                                                <!--begin::Card-->
                                                <div class="card card-bordered w-100">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
                                                        <!--begin::Wrapper-->
                                                        <div class="w-100 d-flex flex-stack mb-8">
                                                            <!--begin::Container-->
                                                            <div class="d-flex align-items-center f">
                                                                <!--begin::Author-->
                                                                <div class="symbol symbol-50px me-5">
                                                                    <div
                                                                        class="symbol-label fs-1 fw-bold bg-light-info text-info">
                                                                        {{mb_substr($reply->user->name, 0, 1)}}</div>
                                                                </div>
                                                                <!--end::Author-->
                                                                <!--begin::Info-->
                                                                <div
                                                                    class="d-flex flex-column fw-semibold fs-5 text-gray-600 text-dark">
                                                                    <!--begin::Text-->
                                                                    <div class="d-flex align-items-center">
                                                                        <!--begin::Username-->
                                                                        <p class="text-gray-800 fw-bold fs-5 me-3 mb-0">
                                                                            {{$reply->user->name}}</p>
                                                                        <!--end::Username-->
                                                                        <span
                                                                            class="badge badge-light-primary">{{$reply->user->userType}}</span>
                                                                    </div>
                                                                    <!--end::Text-->
                                                                    <!--begin::Date-->
                                                                    <span
                                                                        class="text-muted fw-semibold fs-6">
                                                                                    {{$reply->created_at->diffForHumans()}}</span>
                                                                    <!--end::Date-->
                                                                </div>
                                                                <!--end::Info-->
                                                            </div>
                                                            <!--end::Container-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                        <!--begin::Desc-->
                                                        <p class="fw-normal fs-5 text-gray-700 m-0">
                                                            {{$reply->reply}}
                                                        </p>
                                                        <!--end::Desc-->
                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            @endforeach
                                            <!--end::Comment-->
                                            <!--begin::Comment-->
                                            <div class="overflow-hidden position-relative card-rounded">
                                                <!--begin::Ribbon-->
                                                <div
                                                    class="ribbon ribbon-triangle ribbon-top-start border-success">
                                                    <!--begin::Ribbon icon-->
                                                    <div class="ribbon-icon mt-n5 ms-n6">
                                                        <i class="bi bi-check2 fs-2 text-white"></i>
                                                    </div>
                                                    <!--end::Ribbon icon-->
                                                </div>
                                                <!--end::Ribbon-->
                                            </div>
                                            <!--end::Comment-->
                                        </div>
                                        <!--end::Comments-->

                                        <!--begin::Input group-->
                                        <div class="mb-0">
                                            <form id="replyForm">
                                                        <textarea
                                                            class="form-control form-control-solid placeholder-gray-600 fw-bold fs-4 ps-9 pt-7"
                                                            rows="6" name="message"
                                                            placeholder="تفاصيل الرسالة"></textarea>
                                            <!--begin::Submit-->
                                                <button type="button" class="btn btn-primary mt-n20 mb-20 position-relative float-end me-7 send_reply" id="kt_btn_reply" data-url="{{ route('contacts.reply',$contact->id) }}" data-form="#replyForm">ارسال</button>
                                                <!--end::Submit-->
                                            </form>

                                        </div>
                                        <!--end::Input group-->

                                    </div>
                                    <!--end::Ticket view-->
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

    <div id="loading-spinner" class="d-none">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        Loading...
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

        // Add a click event listener to the button

        $(document).on("click", ".send_reply", function (e) {
            e.preventDefault();

            // Show the loading spinner
            $("#loading-spinner").removeClass("d-none");

            var url = $(this).data('url');
            var form = $(this).data('form');
            var formData = new FormData($(form)[0]);
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
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Hide the loading spinner when the response is received
                    $("#loading-spinner").addClass("d-none");

                    // Remove the loading spinner class and reset the text
                    btn.classList.remove("spinner", "spinner-right", "spinner-white", "pr-15");
                    btn.innerText = "ارسال";

                    if (response.status) {
                        Swal.fire(
                            'تم الإنشاء بنجاح',
                            'تم الإنشاء بنجاح',
                            'success'
                        ).then((result) => {
                            window.location.reload();
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'حطأ',
                            text: response.errors.message,
                            footer: ''
                        })
                    }
                },
                error: function (jqXhr) {
                    // Hide the loading spinner on error
                    $("#loading-spinner").addClass("d-none");

                    // Remove the loading spinner class and reset the text
                    btn.classList.remove("spinner", "spinner-right", "spinner-white", "pr-15");
                    btn.innerText = "ارسال";

                }
            });
        });



    </script>
@endpush
