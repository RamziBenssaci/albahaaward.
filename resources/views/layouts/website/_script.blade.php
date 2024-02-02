<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/js/intlTelInput.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script>

    // hero-section-slider
    const swiper = new Swiper('.hero-section-slider', {
        slidesPerView: 1,
        spaceBetween: 0,
        simulateTouch: false,
        loop: true,
        autoplay: {
            delay: 5000,
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true,
        },
    });

    const swiper2 = new Swiper('.testimonials-slider', {
        slidesPerView: 1,
        spaceBetween: 5,
        autoplay: {
            delay: 5000,
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true,
        },

        breakpoints: {
            // when window width is >= 575px
            575: {
                slidesPerView: 1,
                spaceBetween: 5
            },
            992: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            // when window width is >= 991px
            1200: {
                slidesPerView: 2,
                spaceBetween: 50
            }
        }
    });

    $(document).ready(function () {
        $('.laws-category-link').on('click', function (e) {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });
            var categoryId = $(this).data('category-id');
            var selectedLink = $(this); // Store the selected category link reference

            $.ajax({
                url: "{{ route('getLaws') }}",
                method: 'POST',
                data: {
                    category_id: categoryId,
                },
                success: function (response) {
                    console.log(response)
                    // Remove active class from all category links' parent <li> elements
                    $('.laws-category-link').closest('li').removeClass('active');

                    // Add active class to the parent <li> of the selected category link
                    selectedLink.closest('li').addClass('active');
                    $('#laws-container').html(response.html);
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });

    $(document).on("click", ".save_form_inquiry", function (e) {
        e.preventDefault();
        var url = $(this).data('url');
        var save_btn = $(this);
        var form = $(save_btn.data('form'));
        var formData = new FormData(form[0]);

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                if (response.status) {
                    $('.success-modals').modal('show');
                    $(form)[0].reset();
                    $(form).find('.error-message').empty();

                } else {
                    $(form).find('.error-message').empty();

                    $.each(response.errors, function(field, messages) {
                        var errorContainer;

                        if (field === 'inquiry') {
                            errorContainer = form.find('textarea[name="' + field + '"]').closest('.form-group').find('.error-message');
                        } else {
                            errorContainer = form.find('input[name="' + field + '"]').closest('.form-group').find('.error-message');
                        }

                        errorContainer.html('');
                        $.each(messages, function(index, message) {
                            errorContainer.append('<div>' + message + '</div>');
                        });
                    });
                }
            },
            error: function (jqXhr) {
                console.log(jqXhr);
            }
        });
    });

    $(document).on("click", ".save_form_contact", function (e) {
        e.preventDefault();
        var url = $(this).data('url');
        var save_btn = $(this);
        var form = $(save_btn.data('form'));
        var formData = new FormData(form[0]);

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                if (response.status) {
                    $('.contact-modals').modal('hide');
                    $('.success-modals').modal('show');
                    $(form)[0].reset();
                    $(form).find('.error-message').empty();

                } else {
                    $.each(response.errors, function (field, messages) {
                        var errorContainer = $('#' + field).closest('.input-box').find('.error-message');
                        errorContainer.html('');
                        $.each(messages, function (index, message) {
                            errorContainer.append('<div>' + message + '</div>');
                        });
                    });

                }
            },
            error: function (jqXhr) {
                console.log(jqXhr);
            }
        });
    });




</script>
