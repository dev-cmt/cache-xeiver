<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }} - Landing Page</title>
    <link rel="stylesheet" href="{{ asset('frontEnd/landing') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontEnd/landing/assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/landing') }}/assets/css/custom.css">
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper {
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-pagination {
            bottom: -25px !important
        }

        #swiper-page2 {
            position: absolute;
            text-align: center;
            transition: .3s opacity;
            transform: translate3d(0, 0, 0);
            z-index: 10;
            bottom: -25px !important
        }

        .section_one_video {
            width: 100%;
            height: 400px;
            border-radius: 15px;
        }

        @media (max-width: 575.98px) {
            .section_one_video {
                height: 250px;
            }
        }
    </style>
    {!! $web_settings->fb_pixel ?? null !!}
</head>

<body>

<section class="section-one">
    <div class="image">
        <img src="{{ asset($page_data['section_one_image']->file_url) }}" alt="">
    </div>
</section>

@if($page_data['section_one_video'])
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 col-12 mx-auto">
                <iframe class="section_one_video"
                        src="{{ str_replace('watch?v=', 'embed/', $page_data['section_one_video']) }}"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>
        </div>
    </div>
@endif


<div class="order-click-button">
    <div class="custom-container">
        <a href="#order">অর্ডার করতে ক্লিক করুন
            <svg aria-hidden="true" class="e-font-icon-svg e-fas-angle-double-right" viewBox="0 0 448 512"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34zm192-34l-136-136c-9.4-9.4-24.6-9.4-33.9 0l-22.6 22.6c-9.4 9.4-9.4 24.6 0 33.9l96.4 96.4-96.4 96.4c-9.4 9.4-9.4 24.6 0 33.9l22.6 22.6c9.4 9.4 24.6 9.4 33.9 0l136-136c9.4-9.2 9.4-24.4 0-33.8z">
                </path>
            </svg>
        </a>
    </div>
</div>

<section class="section-two">
    <div class="custom-container">
        <div class="two-content">
            @if ($page_data['section_two_image'])
                @foreach ($page_data['section_two_image'] as $image)
                    <div class="image-item">
                        <img src="{{ asset($image) }}" alt="">
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</section>

<div class="order-click-button">
    <div class="custom-container">
        <a href="#order">অর্ডার করতে ক্লিক করুন
            <svg aria-hidden="true" class="e-font-icon-svg e-fas-angle-double-right" viewBox="0 0 448 512"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34zm192-34l-136-136c-9.4-9.4-24.6-9.4-33.9 0l-22.6 22.6c-9.4 9.4-9.4 24.6 0 33.9l96.4 96.4-96.4 96.4c-9.4 9.4-9.4 24.6 0 33.9l22.6 22.6c9.4 9.4 24.6 9.4 33.9 0l136-136c9.4-9.2 9.4-24.4 0-33.8z">
                </path>
            </svg>
        </a>
    </div>
</div>

<section class="section-three">
    <div class="custom-container">
        <div class="three-content">
            <div class="slider-content">
                <div class="title">
                    <h2>{{ $page_data['section_three_heading'] }}</h2>
                </div>
                <div class="images swiper" id="mySwiper">
                    <div class="swiper-wrapper">
                        @if ($page_data['section_three_image'])
                            @foreach ($page_data['section_three_image'] as $image)
                                <div class="image-item swiper-slide">
                                    <img src="{{ asset($image) }}" alt="">
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="benefit-content">
                <div class="title">
                    <h2>{{ $page_data['section_four_heading'] }}</h2>
                </div>

                <ul class="benefit-items">
                    @if ($page_data['section_four_sub_text'])
                        @foreach ($page_data['section_four_sub_text'] as $text)
                            <li class="item">
                                    <span class="icon">
                                        <svg aria-hidden="true" class="e-font-icon-svg e-far-hand-point-right"
                                             viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M428.8 137.6h-86.177a115.52 115.52 0 0 0 2.176-22.4c0-47.914-35.072-83.2-92-83.2-45.314 0-57.002 48.537-75.707 78.784-7.735 12.413-16.994 23.317-25.851 33.253l-.131.146-.129.148C135.662 161.807 127.764 168 120.8 168h-2.679c-5.747-4.952-13.536-8-22.12-8H32c-17.673 0-32 12.894-32 28.8v230.4C0 435.106 14.327 448 32 448h64c8.584 0 16.373-3.048 22.12-8h2.679c28.688 0 67.137 40 127.2 40h21.299c62.542 0 98.8-38.658 99.94-91.145 12.482-17.813 18.491-40.785 15.985-62.791A93.148 93.148 0 0 0 393.152 304H428.8c45.435 0 83.2-37.584 83.2-83.2 0-45.099-38.101-83.2-83.2-83.2zm0 118.4h-91.026c12.837 14.669 14.415 42.825-4.95 61.05 11.227 19.646 1.687 45.624-12.925 53.625 6.524 39.128-10.076 61.325-50.6 61.325H248c-45.491 0-77.21-35.913-120-39.676V215.571c25.239-2.964 42.966-21.222 59.075-39.596 11.275-12.65 21.725-25.3 30.799-39.875C232.355 112.712 244.006 80 252.8 80c23.375 0 44 8.8 44 35.2 0 35.2-26.4 53.075-26.4 70.4h158.4c18.425 0 35.2 16.5 35.2 35.2 0 18.975-16.225 35.2-35.2 35.2zM88 384c0 13.255-10.745 24-24 24s-24-10.745-24-24 10.745-24 24-24 24 10.745 24 24z">
                                            </path>
                                        </svg> </span>
                                <span class="text">{{ $text }}</span>
                            </li>
                        @endforeach
                    @endif

                </ul>

            </div>
        </div>
    </div>
</section>

<div class="order-click-button">
    <div class="custom-container">
        <a href="#order">অর্ডার করতে ক্লিক করুন
            <svg aria-hidden="true" class="e-font-icon-svg e-fas-angle-double-right" viewBox="0 0 448 512"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34zm192-34l-136-136c-9.4-9.4-24.6-9.4-33.9 0l-22.6 22.6c-9.4 9.4-9.4 24.6 0 33.9l96.4 96.4-96.4 96.4c-9.4 9.4-9.4 24.6 0 33.9l22.6 22.6c9.4 9.4 24.6 9.4 33.9 0l136-136c9.4-9.2 9.4-24.4 0-33.8z">
                </path>
            </svg>
        </a>
    </div>
</div>

<section class="section-four">
    <div class="custom-container">
        <div class="four-content">
            <div class="slider-two">
                <div class="images swiper" id="mySwipertwo">
                    <div class="swiper-wrapper">
                        @if ($page_data['section_five_image'])
                            @foreach ($page_data['section_five_image'] as $image)
                                <div class="image-item swiper-slide">
                                    <img src="{{ asset($image) }}" alt="">
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
                <div class="swiper-button-next" id="next-btn2"></div>
                <div class="swiper-button-prev" id="prev-btn2"></div>
                <div id="swiper-page2"></div>
            </div>
        </div>
    </div>
</section>

<div class="order-click-button">
    <div class="custom-container">
        <a href="#order">অর্ডার করতে ক্লিক করুন
            <svg aria-hidden="true" class="e-font-icon-svg e-fas-angle-double-right" viewBox="0 0 448 512"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34zm192-34l-136-136c-9.4-9.4-24.6-9.4-33.9 0l-22.6 22.6c-9.4 9.4-9.4 24.6 0 33.9l96.4 96.4-96.4 96.4c-9.4 9.4-9.4 24.6 0 33.9l22.6 22.6c9.4 9.4 24.6 9.4 33.9 0l136-136c9.4-9.2 9.4-24.4 0-33.8z">
                </path>
            </svg>
        </a>
    </div>
</div>

<section class="section-five">
    <div class="custom-container">
        <div class="five-content">
            <div class="title">
                <h2>{{ $page_data['section_six_heading'] }}</h2>
            </div>
            <ul>
                @if ($page_data['section_six_sub_heading'])
                    @foreach ($page_data['section_six_sub_heading'] as $text)
                        <li>✅ {{ $text }}</li>
                    @endforeach
                @endif

            </ul>
        </div>
    </div>
</section>

<section class="section-six" id="order">
    <form action="{{ route('landing.page.order.place') }}" method="POST">
        @csrf
        {{-- <input type="hidden" name="landing_page_id" value="{{ $data->landing_page->id }}"> --}}
        <input type="hidden" name="ids" class="h_product_id">
        <div class="custom-container">
            <div class="six-content">
                <div class="title">
                    <h2>অর্ডার করতে আপনার নাম, ঠিকানা এবং মোবাইল নাম্বার দিয়ে নীচে Place Order এ ক্লিক করুন</h2>
                </div>
                <div class="products">
                    <h4>Select product</h4>
                    <div class="items">
                        @if ($page_products)
                            @foreach ($page_products as $key => $item)
                                {{-- @dd($item) --}}
                                <div class="product-item">
                                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                                    <div class="product-selector">
                                        <input type="checkbox" id="order-checkbox"
                                               {{ $key == 0 ? 'checked' : '' }}
                                               class="form-check-input product-attr">

                                        {{-- <input type="radio" class="form-check-input product-attr" value=""
                                        checked disabled id="order-checkbox"> --}}
                                    </div>
                                    <div class="product-image">
                                        <img src="{{ asset($item->get_thumb ? $item->get_thumb->file_url : '') }}"
                                             alt="">
                                    </div>

                                    <div class="product-item-content">
                                        <div class="product-name">
                                            {{ $item->name }}
                                            <span class="product-quantity">x 1</span>
                                        </div>
                                        <div class="product-quantity-price">
                                            <div class="qty">
                                                <span class="minus  quantity-minus">-</span>
                                                <input type="text" value="1" min="1"
                                                       max="10" readonly class="quantity-input">
                                                <span class="plus  quantity-plus">+</span>
                                            </div>
                                            <div class="price">৳
                                                {{ $item->sale_price ?? $item->price }}
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="order-content">

                    <div class="billing-details">
                        <h4>Billing Details</h4>
                        <div class="billing-form">
                            <div class="input">
                                <div class="mb-4">
                                    <label for="customer_name" class="form-label">নাম লিখুন <span
                                            class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="customer_name"
                                           name="customer_name" placeholder="Name" required>
                                </div>

                                <div class="mb-4">
                                    <label for="customer_phone" class="form-label">
                                        মোবাইল নাম্বার <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="customer_phone"
                                           name="customer_phone" placeholder="Phone Number" required>
                                </div>

                                <div class="mb-4">
                                    <label for="customer_address" class="form-label">
                                        সম্পূর্ন ঠিকানা লিখুন <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="customer_address"
                                           name="customer_address" placeholder="Address" required>
                                </div>
                            </div>

                            @if($data->is_free_delivery == 1)
                                {{--<div class="mb-4 shipping">
                                    <div class="item">
                                        <input type="radio" class="shipping_radio"
                                               id="shipping_radio" name="area" checked required>
                                        <input type="hidden" class="shipping_amount" name="shipping_amount">
                                        <label style="font-weight: 500"
                                               for="shipping_radio">
                                            <div class="text">
                                                <div>সারা বাংলাদেশে ডেলিভারি চার্জ ফ্রী!:&emsp;৳ 0</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>--}}
                            @else
                                <div class="mb-4 shipping">
                                    <label>
                                        Shipping
                                        <span class="text-danger">*</span>
                                    </label>
                                    @if ($shipping_methods)
                                        @foreach ($shipping_methods as $key => $area)
                                            <div class="item">
                                                <input type="radio" class="shipping_radio"
                                                       id="shipping_radio_{{ $key }}" name="area"
                                                       {{ $key == 0 ? 'checked' : '' }} value="{{ $area->id }}"
                                                       required>
                                                <input type="hidden" class="shipping_amount" name="shipping_amount">
                                                <label style="font-weight: 500"
                                                       for="shipping_radio_{{ $key }}">
                                                    <div class="text">
                                                        <div>{{ $area->text }}:&emsp;৳ {{ $area->amount }}</div>
                                                    </div>
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="order-details">
                        <h4>
                            Your Order
                        </h4>

                        <div class="order-details-content">
                            <div class="order-header">
                                <div class="product-header">Product</div>
                                <div class="product-price">Subtotal</div>
                            </div>
                            <div class="order-products">
                                {{-- <div class="order-item">
                                <div class="order-left">
                                    <div class="product-image">
                                        <img src="{{ asset($item->product->get_thumb ? $item->product->get_thumb->file_url : '') }}"
                                            alt="">
                                    </div>
                                    <div class="left-content">
                                        <div class="product-name">
                                            {{ $item->product->name }}


                                        </div>
                                        <div class="product-quantity">x 1</div>
                                        <input type="hidden" name="quantity" class="hidden_qty"
                                            value="">
                                    </div>
                                </div>
                                <div class="order-right">
                                    <div class="product-price">৳ 500</div>
                                </div>
                            </div>
                            <div class="order-item">
                                <div class="order-left">
                                    <div class="product-image">
                                        <img src="{{ asset($item->product->get_thumb ? $item->product->get_thumb->file_url : '') }}"
                                            alt="">
                                    </div>
                                    <div class="left-content">
                                        <div class="product-name">
                                            {{ $item->product->name }}


                                        </div>
                                        <div class="product-quantity">x 1</div>
                                        <input type="hidden" name="quantity" class="hidden_qty"
                                            value="">
                                    </div>
                                </div>
                                <div class="order-right">
                                    <div class="product-price">৳ 500</div>
                                </div>
                            </div> --}}
                            </div>
                            <div class="subtotal">
                                <div class="subtotal-left">Subtotal</div>
                                <div class="subtotal-right"></div>
                                <input type="hidden" name="sub_total" class="hidden_subtotal" value="">
                            </div>
                            <div class="shipping-charge">
                                <div class="shipping-left">Delivery Charge</div>
                                <div class="shipping-right"></div>
                                <input type="hidden" name="shipping_charge" class="hidden_shipping"
                                       value="">
                            </div>
                            <div class="total">
                                <div class="total-left">Total</div>
                                <div class="total-right"></div>
                                <input type="hidden" name="total" class="hidden_total" value="">
                            </div>
                        </div>

                        <div class="payment">
                            <div class="payment-content">
                                <div class="payment-title">
                                    Cash on delivery
                                </div>
                                <div class="description">
                                    Pay with cash upon delivery.
                                </div>
                            </div>

                        </div>
                        <div class="term-condition">
                            Your personal data will be used to process your order, support your experience
                            throughout
                            this website, and for other purposes described in our privacy policy.
                        </div>
                        <div class="order-button">
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="currentColor"
                                     class="icon icon-tabler icons-tabler-filled icon-tabler-lock">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path
                                        d="M12 2a5 5 0 0 1 5 5v3a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-10a3 3 0 0 1 -3 -3v-6a3 3 0 0 1 3 -3v-3a5 5 0 0 1 5 -5m0 12a2 2 0 0 0 -1.995 1.85l-.005 .15a2 2 0 1 0 2 -2m0 -10a3 3 0 0 0 -3 3v3h6v-3a3 3 0 0 0 -3 -3"/>
                                </svg>
                                Place Order <span class="order-price" style="font-size: 16px"></span> ৳
                            </button>
                        </div>
                    </div>

                    <div class="test"></div>
                </div>
            </div>
        </div>
    </form>
</section>

<footer class="footer">
    <div class="custom-container">
        <div class="footer-content">
            <ul>
                <li><a href="#">Refund policy </a></li>
                <li><a href="#">Privacy policy</a></li>
                <li><a href="#">Privacy policy</a></li>
            </ul>
            <div class="footer-text">
                &copy; 2025 All rights reserved by {{ env('APP_NAME') }} - Developed By <a href="https://prodevsltd.com" target="_blank" style="font-family: 'Inter', Sans-serif;
                    font-size: 14px;
                    line-height: 1em;
                    color: #1f1f1f;text-decoration: none">Pro Devs Ltd.</a>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('frontEnd/landing') }}/assets/js/jquery.js"></script>
<script src="{{ asset('frontEnd/landing') }}/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('frontEnd/landing') }}/assets/js/swiper-bundle.min.js"></script>
<script>
    function productCheckbox() {
        var product_info = [];
        var product_id = [];
        $('.product-attr').each(function () {
            if ($(this).is(':checked')) {
                var that = $(this).closest('.product-item');
                product_id.push(that.find('input[name="product_id"]').val());
                product_info.push({
                    id: that.find('input[name="product_id"]').val(),
                    qty: that.find('.quantity-input').val(),
                    price: that.find('.price').text().replace('৳', ''),
                });

            }
        });
        $('.h_product_id').val(product_id);
        return product_info;
    }


    $(document).ready(function () {
        {{--$('#customer_phone').on('blur', function () {--}}
        {{--    var phone = $(this).val();--}}
        {{--    var name = $('#customer_name').val();--}}
        {{--    var address = $('#customer_address').val();--}}
        {{--    var shipping_method = $('input[name="area"]:checked').val();--}}

        {{--    var shipping_cost = $('.hidden_shipping').val();--}}
        {{--    var data = {--}}
        {{--        phone: phone,--}}
        {{--        name: name,--}}
        {{--        address: address,--}}
        {{--        shipping_method: shipping_method,--}}
        {{--        shipping_cost: shipping_cost,--}}
        {{--        ids: $('.h_product_id').val()--}}
        {{--    };--}}

        {{--    if (phone.length == 11) {--}}
        {{--        $.ajax({--}}
        {{--            url: '{{ route('landing.page.abandoned.cart') }}',--}}
        {{--            type: 'POST',--}}
        {{--            data: {--}}
        {{--                _token: '{{ csrf_token() }}',--}}
        {{--                data: data--}}
        {{--            },--}}
        {{--            success: function (data) {--}}
        {{--                // console.log(data)--}}
        {{--            }--}}
        {{--        });--}}
        {{--    }--}}
        {{--});--}}

        $('.product-attr').each(function () {
            var that = $(this).closest('.product-item');
            var product_info = productCheckbox();
            var shipping_id = $('.shipping_radio:checked').val();
            $.ajax({
                url: '{{ route('ajax.get.attribute') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_info: product_info,
                    shipping_id: shipping_id
                },
                success: function (data) {
                    $('.order-price').text(data.total_price);
                    $('.total-right').text(data.total_price);
                    $('.hidden_total').val(data.total_price);
                    $('.hidden_subtotal').val(data.sub_total);
                    $('.hidden_shipping').val(data.shipping_cost);
                    $('.subtotal-right').text(data.sub_total);
                    $('.shipping-right').text(data.shipping_cost);
                    $('.order-products').html(data.html);
                }
            });


        });
        $(document).on('click', '.product-attr', function () {
            var product_info = productCheckbox();
            var shipping_id = $('.shipping_radio:checked').val();
            $.ajax({
                url: '{{ route('ajax.get.attribute') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_info: product_info,
                    shipping_id: shipping_id
                },
                success: function (data) {
                    console.log(data);
                    $('.order-price').text(data.total_price);
                    $('.total-right').text(data.total_price);
                    $('.hidden_total').val(data.total_price);
                    $('.hidden_subtotal').val(data.sub_total);
                    $('.hidden_shipping').val(data.shipping_cost);
                    $('.subtotal-right').text(data.sub_total);
                    $('.shipping-right').text(data.shipping_cost);
                    $('.order-products').html(data.html);
                }
            });

        });

        $(document).on('click', '.shipping_radio', function () {
            var product_info = productCheckbox();
            var shipping_id = $('.shipping_radio:checked').val();
            $.ajax({
                url: '{{ route('ajax.get.attribute') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_info: product_info,
                    shipping_id: shipping_id
                },
                success: function (data) {
                    console.log(data);
                    $('.order-price').text(data.total_price);
                    $('.total-right').text(data.total_price);
                    $('.hidden_total').val(data.total_price);
                    $('.hidden_subtotal').val(data.sub_total);
                    $('.hidden_shipping').val(data.shipping_cost);
                    $('.subtotal-right').text(data.sub_total);
                    $('.shipping-right').text(data.shipping_cost);
                    $('.order-products').html(data.html);
                }
            });

        });

        $(document).on('click', '.quantity-plus', function () {
            var qty = $(this).closest('.qty').find('.quantity-input').val();
            var new_qty = parseInt(qty) + 1;
            $(this).closest('.qty').find('.quantity-input').val(new_qty);
            var product_info = productCheckbox();
            var shipping_id = $('.shipping_radio:checked').val();
            $.ajax({
                url: '{{ route('ajax.get.attribute') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_info: product_info,
                    shipping_id: shipping_id
                },
                success: function (data) {
                    console.log(data);
                    $('.order-price').text(data.total_price);
                    $('.total-right').text(data.total_price);
                    $('.hidden_total').val(data.total_price);
                    $('.hidden_subtotal').val(data.sub_total);
                    $('.hidden_shipping').val(data.shipping_cost);
                    $('.subtotal-right').text(data.sub_total);
                    $('.shipping-right').text(data.shipping_cost);
                    $('.order-products').html(data.html);
                }
            });

        });
        $(document).on('click', '.quantity-minus', function () {
            var qty = $(this).closest('.qty').find('.quantity-input').val();
            if (qty > 1) {
                var new_qty = parseInt(qty) - 1;
                $(this).closest('.qty').find('.quantity-input').val(new_qty);
                var product_info = productCheckbox();
                var shipping_id = $('.shipping_radio:checked').val();
                $.ajax({
                    url: '{{ route('ajax.get.attribute') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_info: product_info,
                        shipping_id: shipping_id
                    },
                    success: function (data) {
                        console.log(data);
                        $('.order-price').text(data.total_price);
                        $('.total-right').text(data.total_price);
                        $('.hidden_total').val(data.total_price);
                        $('.hidden_subtotal').val(data.sub_total);
                        $('.hidden_shipping').val(data.shipping_cost);
                        $('.subtotal-right').text(data.sub_total);
                        $('.shipping-right').text(data.shipping_cost);
                        $('.order-products').html(data.html);
                    }
                });
            }
        });


    });
</script>
<script>
    var swiper = new Swiper("#mySwiper", {
        slidesPerView: 5,
        spaceBetween: 10,
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 10,
            },

            768: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 10,
            },
            1200: {
                slidesPerView: 5,
                spaceBetween: 10,
            }


        },
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    var swiper2 = new Swiper("#mySwipertwo", {
        slidesPerView: 3,
        spaceBetween: 10,
        loop: true,
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 10,
            },

            768: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 10,
            }


        },
        pagination: {
            el: "#swiper-page2",
            clickable: true,
        },
        navigation: {
            nextEl: "#next-btn2",
            prevEl: "#prev-btn2",
        },
    });
</script>
</body>

</html>
