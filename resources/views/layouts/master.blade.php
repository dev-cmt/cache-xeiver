<!doctype html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta name="description" content="">
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">
    <meta property="og:image" content="{{ asset($web_settings->get_logo->file_url) }}">
    <meta property="og:title" content="{{ env('APP_NAME') }}">
    <meta property="og:description" content="">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:type" content="e-commerce">
    <meta name="twitter:title" content="{{ env('APP_NAME') }}">
    <meta name="twitter:description" content="">

    <link rel="shortcut icon"
        href="{{ $web_settings->get_fav ? asset($web_settings->get_fav->file_url) : asset('frontEnd/images/no_image.png') }}">
    {{-- Google fonts --}}
    <link
        href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap"
        rel="stylesheet">
    {{-- Font Awesome --}}
    {{-- <link href="{{ asset('frontEnd/plugins/font-awesome/font-awesome.css') }}" rel="stylesheet"> --}}
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{{ asset('frontEnd/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/style1.css') }}">
    {{-- Owl-Carousel --}}
    <link rel="stylesheet" href="{{ asset('frontEnd/plugins/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/plugins/owl-carousel/owl.theme.default.min.css') }}">
    {{-- toastr --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}backEnd/assets/vendor/toastr/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    @yield('style')
    <style>
        .fixed-contact-buttons {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 5456456456;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .fixed-contact-buttons a {
            display: flex;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            color: white;
            font-size: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out;
            justify-content: center;
            align-items: center;
            text-decoration: 0
        }

        .fixed-contact-buttons a:hover {
            transform: scale(1.1);
        }

        .whatsapp-button {
            background-color: #49e670;
        }

        .messenger-button {
            background-color: #0078FF;
        }

        .call-button {
            background-color: #03e78b;
        }

        @media (max-width: 575.98px) {
            .fixed-contact-buttons {
                bottom: 120px;
                gap: 8px;
            }
        }
    </style>

    {!! $web_settings->fb_pixel ?? null !!}

    {{-- GTM HEAD --}}
    {!! $web_settings->gtm_head ?? null !!}
</head>

<body style="position: relative">
    {{-- GTM BODY --}}
    {!! $web_settings->gtm_body ?? null !!}

    @yield('fb_share')

    <div class="main-wrapper">
        @include('frontEnd.inc.header')

        @yield('body')

        @include('frontEnd.inc.footer')
    </div>
    <div class="fixed-contact-buttons">
        <a href="{{ $web_settings->website_phone3 ? 'https://wa.me/88' . $web_settings->website_phone3 : '#' }}"
            target="_blank" class="whatsapp-button">
            <i class="fab fa-whatsapp"></i>
        </a>
        <a href="tel:{{ $web_settings->website_phone }}" class="call-button">
            <i class="fas fa-phone"></i>
        </a>
        <a href="{{ $web_settings->website_messenger }}" target="_blank" class="messenger-button">
            <i class="fab fa-facebook-messenger"></i>
        </a>
    </div>

    {{-- <script src="{{asset('frontEnd/js/jquery.slim.min.js')}}"></script> --}}
    <script src="{{ asset('frontEnd/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/bootstrap.bundle.min.js') }}"></script>

    {{-- Owl-Carousel --}}
    <script src="{{ asset('frontEnd/plugins/owl-carousel/owl.carousel.min.js') }}"></script>

    {{-- toastr --}}
    <script src="{{ asset('/') }}backEnd/assets/vendor/toastr/toastr.min.js"></script>
    <script>
        @if (session()->has('success'))
            toastr.options = {
                "positionClass": "toast-bottom-left"
            };
            toastr.success("{{ session('success') }}");
        @endif
        @if (Session::has('error'))
            toastr.options = {
                "positionClass": "toast-bottom-left"
            };
            toastr.error("{{ session('error') }}");
        @endif
        @if (Session::has('info'))
            toastr.options = {
                "positionClass": "toast-bottom-left"
            };
            toastr.info("{{ session('info') }}");
        @endif
        @if (Session::has('warning'))
            toastr.options = {
                "positionClass": "toast-bottom-left"
            };
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>

    <script>
        $('#account-btn').on('click', function() {
            $('.login-float').toggle()
        });

        $('#header-top-menu-btn').on('click', function() {
            $('.header-top-menu-m').toggle()
        });

        $('#cat_menu_mobile_btn').on('click', function() {
            $('.cat_menu_m').toggle()
        });

        $('#search_mobile_btn').on('click', function() {
            $('.search-form-m').toggle()
        });

        $('.search_btnclose').on('click', function() {
            $('.search-form-m').toggle()
        });

        function search() {
            // document.getElementById('search-form-menu').classList.toggle('toggle-search');
            $('#search-form-menu').toggleClass('toggle-search')
        }
    </script>

    <script>
        function addToWishlist(productId) {
            $.ajax({
                url: "{{ route('add.wishlist') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                        $('.wishlist').load(location.href + ' .wishlist > *');
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('An error occurred while adding to wishlist.');
                }
            });
        }

        function removeFromWishlist(id) {
            if (confirm("Are you sure you want to remove this item from your wishlist?")) {
                $.ajax({
                    url: "{{ route('remove.wishlist') }}",
                    type: "POST",
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);
                            $('#wishlist-table').load(location.href + ' #wishlist-table > *');
                            $('.wishlist').load(location.href + ' .wishlist > *');
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr) {
                        toastr.error("An error occurred while removing the item.");
                    }
                });
            }
        }
    </script>
    <script>
        const typingInputs = document.getElementsByClassName("typingInput");
        const phrases = [
            "Search for products...",
            "Search for something...",
            "One more search...",
            "What are you looking for?"
        ];
        let phraseIndex = 0;
        let charIndex = 0;
        let isDeleting = false;

        function typeEffect() {
            const currentPhrase = phrases[phraseIndex];
            if (!isDeleting && charIndex <= currentPhrase.length) {
                for (let i = 0; i < typingInputs.length; i++) {
                    typingInputs[i].placeholder = currentPhrase.substring(0, charIndex) + ' |';
                }
                charIndex++;
                if (charIndex > currentPhrase.length) {
                    isDeleting = true;
                    setTimeout(typeEffect, 1500);
                } else {
                    setTimeout(typeEffect, 100);
                }
            } else if (isDeleting && charIndex >= 0) {
                for (let i = 0; i < typingInputs.length; i++) {
                    typingInputs[i].placeholder = currentPhrase.substring(0, charIndex) + ' |';
                }
                charIndex--;
                if (charIndex < 0) {
                    isDeleting = false;
                    phraseIndex = (phraseIndex + 1) % phrases.length;
                    setTimeout(typeEffect, 500);
                } else {
                    setTimeout(typeEffect, 50);
                }
            }
        }

        typeEffect();
    </script>



    @yield('script')
</body>

</html>
