@extends('layouts.master')

@section('title')
    {{ $data->name }}
@endsection
@php
    $page_settings = $web_settings ?? (object) [];
@endphp
@section('style')

    <style>
        :root {
            --primary: #ffffff;
            --secondary: #000000;
            --radius: 14px;
            --transition: 250ms cubic-bezier(.2, .9, .3, 1);
            font-family: "Poppins", "Inter", sans-serif;
        }

        .thumbs-wrapper {
            scroll-behavior: smooth;
        }

        .size-chart button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--secondary);
            color: var(--primary);
            border: none;
            border-radius: var(--radius);
            padding: 10px 20px;
            font-weight: 600;
            cursor: pointer;
            transition: all var(--transition);
        }

        .size-chart button:hover {
            background: #222;
            transform: translateY(-2px);
        }

        /* Modal Base */
        .modal {
            position: fixed;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.6);
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity var(--transition), visibility var(--transition);
            z-index: 6465454564;
        }

        /* When modal is open */
        .modal.open {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        .modal-content {
            position: relative;
            background: var(--secondary);
            color: var(--primary);
            border-radius: var(--radius);
            padding: 20px;
            max-width: 90%;
            max-height: 80vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
            animation: slideUp .3s ease;
        }

        @keyframes slideUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-content img {
            max-width: 100%;
            max-height: 70vh;
            border-radius: 8px;
            object-fit: contain;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            background: transparent;
            border: none;
            color: var(--primary);
            font-size: 24px;
            cursor: pointer;
        }

        .close-btn:hover {
            color: #ccc;
        }

        .small-row {
            display: none;
        }
    </style>


    <style>
        @media (width: 1440px) {
            #main_product_image img.block__pic {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .gallery-wrapper {
                display: flex;
                gap: 10px;
                height: auto;
            }

            #main_product_image {
                flex: 1;
                position: relative;
                width: 100%;
                height: 500px;
                display: flex;
                justify-content: center;
                align-items: center;
                aspect-ratio: 1 / 1;
            }

            #main_product_image img.block__pic {
                width: 100%;
                height: 100%;
                object-fit: cover !important;
            }

            .right-desc {
                padding-left: 100px
            }

        }

        @media (max-width: 768px) {
            .right-desc {
                padding-left: 0px
            }

            .desktop-row {
                display: none
            }

            .small-row {
                display: block
            }
        }

        @media (min-width: 768px) {
            .gallery-wrapper {
                display: flex;
                gap: 10px;
                height: auto;
            }

            .thumbs-container {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .thumbs-wrapper {
                overflow: hidden;
                /* max-height: 600px; */
            }

            .thumbs {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            .thumb-img {
                width: 80px;
                height: auto;
                object-fit: cover;
                cursor: pointer;
                border: 2px solid transparent;
                border-radius: 8px;
                transition: all 0.3s;
            }

            .thumb-img:hover,
            .thumb-border {
                border-color: #007bff;
                /* transform: scale(1.05); */
            }

            .modern-btn {
                background-color: #007bff;
                color: #fff;
                border: none;
                width: 35px;
                height: 35px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                margin: 5px 0;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
                transition: all 0.3s;
            }

            .modern-btn:hover {
                background-color: #0056b3;
                transform: scale(1.1);
            }

            #main_product_image {
                flex: 1;
                position: relative;
                width: 100%;
                aspect-ratio: 1/1;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            #main_product_image img.block__pic {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .main-nav {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                font-size: 2rem;
                color: rgba(255, 255, 255, 0.8);
                background-color: rgba(0, 0, 0, 0.3);
                padding: 5px 10px;
                cursor: pointer;
                border-radius: 5px;
                user-select: none;
                transition: all 0.3s;
                z-index: 10;
            }

            .main-prev {
                left: 10px;
            }

            .main-next {
                right: 10px;
            }

            .main-nav:hover {
                background-color: rgba(0, 0, 0, 0.6);
                color: #fff;
            }
        }


        @media (width: 1024px) {
            .gallery-wrapper {
                display: flex;
                gap: 10px;
                height: auto;
            }

            #main_product_image {
                flex: 1;
                position: relative;
                width: 100%;
                height: 400px;
                display: flex;
                justify-content: center;
                align-items: center;
                aspect-ratio: 1 / 1;
            }

            #main_product_image img.block__pic {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .right-desc {
                padding-left: 100px
            }

        }

        /* Modern thumbnail scroll buttons */
        .thumbs-container .modern-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            margin: 5px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s;
            z-index: 5;
            padding: 3px;
        }

        .thumbs-container .modern-btn:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        .thumbs-container .modern-btn svg {
            width: 20px;
            height: 20px;
            stroke-width: 2.5;
            transition: all 0.3s;
        }

        .thumbs-container .modern-btn:hover svg {
            stroke: #fff;
        }
    </style>
    <style>
        /* === Base === */
        .gallery-section {
            display: flex;
            gap: 20px;
        }

        .product-thumb {
            display: flex;
            flex-direction: column;
            gap: 8px;
            max-height: 600px;
            overflow-y: auto;
        }

        .product-thumb img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 6px;
            transition: 0.3s;
        }

        /* .thumb-border {
                                                                                                                    border: 2px solid #0d6efd;
                                                                                                                } */

        .main-image-container {
            position: relative;
            flex: 1;
        }

        .main-image-container img {
            width: 100%;
            max-height: 600px;
            object-fit: contain;
            border-radius: 10px;
        }

        .button span {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            padding: 6px;
            cursor: pointer;
            z-index: 2;
        }

        .button .prev {
            left: 10px;
        }

        .button .next {
            right: 10px;
        }

        /* === Tablet Layout (768px - 1024px) === */
        @media (max-width: 1024px) {
            .gallery-section {
                flex-direction: column-reverse;
                align-items: center;
            }

            .product-thumb {
                flex-direction: row;
                overflow-x: auto;
                overflow-y: hidden;
                max-height: none;
                /* justify-content: center; */
                width: 100%;
            }

            .product-thumb img {
                width: 70px;
                height: 70px;
            }

            .main-image-container img {
                max-height: 500px;
                width: 100%;
            }
        }

        @media (max-width: 425px) {
            .thumb-img.thumb-border {
                /* transform: scale(1.05); */
                border: 2px solid #007bff;
            }
        }
    </style>
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

        @media (max-width: 425px) {
            .fixed-contact-buttons {
                bottom: 120px;
                gap: 8px;
            }
        }
    </style>
@endsection

@section('tracking')
    @if(session()->has('api_add_to_cart'))
        <script>
            dataLayer.push({ecommerce: null});
            dataLayer.push({
                event: "add_to_cart",
                ecommerce: {
                    currency: "BDT",
                    value: {{ session('api_add_to_cart_data')['value'] ?? 0 }},
                    items: {!! session('api_add_to_cart_data')['products'] ?? '[]' !!}
                }
            });
            if (typeof fbq === 'function') {
                var addToCartItems = {!! session('api_add_to_cart_data')['products'] ?? '[]' !!};
                fbq('track', 'AddToCart', {
                    content_ids: addToCartItems.map(function (item) { return item.item_id; }),
                    content_name: addToCartItems.length ? addToCartItems[0].item_name : '',
                    content_type: 'product',
                    value: {{ session('api_add_to_cart_data')['value'] ?? 0 }},
                    currency: 'BDT'
                });
            }
        </script>
    @endif
    <script>
        var viewItemItems = {!! session('api_view_item_data')['products'] ?? '[]' !!};
        dataLayer.push({ecommerce: null});
        dataLayer.push({
            event: "view_item",
            ecommerce: {
                currency: "BDT",
                value: {{ session('api_view_item_data')['value'] ?? 0 }},
                items: {!! session('api_view_item_data')['products'] ?? '[]' !!}
            }
        });
        if (typeof fbq === 'function') {
            fbq('track', 'ViewContent', {
                content_ids: viewItemItems.map(function (item) { return item.item_id; }),
                content_name: viewItemItems.length ? viewItemItems[0].item_name : '',
                content_type: 'product',
                value: {{ session('api_view_item_data')['value'] ?? 0 }},
                currency: 'BDT'
            });
        }
    </script>
@endsection

@section('body')
    <section>
        <div class="category_breadcrumb">
            <div class="custom-container">
                <div class="row">
                    <div class="col-12">
                        <p>
                            <a href="{{ route('home') }}">Home</a>
                            /
                            <a href="javascript:void(0);">{{ $data->name }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="products-details-section">
            <div class="custom-container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="row responsive_single_product">
                            <div class="col-md-12 desktop-row mb-2">
                                <div class="gallery-wrapper">

                                    <!-- Thumbnails -->
                                    <div class="thumbs-container">
                                        <button class="thumb-prev modern-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-up">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M12 5l0 14"/>
                                                <path d="M16 9l-4 -4"/>
                                                <path d="M8 9l4 -4"/>
                                            </svg>
                                        </button>
                                        <div class="thumbs-wrapper">
                                            <div class="thumbs">
                                                <img src="{{ $data->get_thumb ? asset($data->get_thumb->file_url) : asset('frontEnd/images/no_image.png') }}"
                                                     class="thumb-img thumb-border"
                                                     data-image="{{ $data->get_thumb ? asset($data->get_thumb->file_url) : asset('frontEnd/images/no_image.png') }}">
                                                @if ($data->gallery_images)
                                                    @foreach ($data->images as $photo)
                                                        <img src="{{ $photo ? asset($photo) : asset('frontEnd/images/no_image.png') }}"
                                                             class="thumb-img"
                                                             data-image="{{ $photo ? asset($photo) : asset('frontEnd/images/no_image.png') }}">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <button class="thumb-next modern-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-down">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M12 5l0 14"/>
                                                <path d="M16 15l-4 4"/>
                                                <path d="M8 15l4 4"/>
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Main Image -->
                                    <div id="main_product_image">
                                        <img src="{{ $data->get_thumb ? asset($data->get_thumb->file_url) : asset('frontEnd/images/no_image.png') }}"
                                             class="block__pic"
                                             data-magnify-src="{{ $data->get_thumb ? asset($data->get_thumb->file_url) : asset('frontEnd/images/no_image.png') }}">
                                        <span class="main-prev main-nav">&lt;</span>
                                        <span class="main-next main-nav">&gt;</span>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-12 small-row">
                                <div class="gallery-section">
                                    <!-- Product Thumbnails -->
                                    <div class="product-thumb">
                                        <img src="{{ $data->get_thumb ? asset($data->get_thumb->file_url) : asset('frontEnd/images/no_image.png') }}"
                                             class="d-block mb-2 thumb-img thumb-border" alt=""
                                             data-image="{{ $data->get_thumb ? asset($data->get_thumb->file_url) : asset('frontEnd/images/no_image.png') }}"
                                             style="cursor: pointer;">

                                        @if ($data->gallery_images)
                                            @foreach ($data->images as $key => $photo)
                                                <img src="{{ $photo ? asset($photo) : asset('frontEnd/images/no_image.png') }}"
                                                     class="d-block mb-2 thumb-img" alt=""
                                                     data-image="{{ $photo ? asset($photo) : asset('frontEnd/images/no_image.png') }}"
                                                     style="cursor: pointer;">
                                            @endforeach
                                        @endif
                                    </div>

                                    <!-- Main Product Image -->
                                    <div id="main_product_image" class="main-image-container">
                                        <div class="xzoom-container panzoom-style" id="panzoom">
                                            <img src="{{ $data->get_thumb ? asset($data->get_thumb->file_url) : asset('frontEnd/images/no_image.png') }}"
                                                 alt="{{ $data->name }}">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 mb-3">
                        <div class="right-desc">
                            <h2 class="text-capitalize single_prod_title font-weight-bold">{{ $data->name }}</h2>
                            <h3 class="font-weight-bold single_prod_prices">
                                @if ($data->sale_price != 0)
                                    <span class="text-dark text-muted-line-through">{{ $web_settings->currency_sign }}
                                        {{ $data->price }}</span>
                                    <span class="text-red price-value">{{ $web_settings->currency_sign }}
                                        {{ $data->sale_price }}</span>
                                @else
                                    <span class="regular price-value">{{ $web_settings->currency_sign }}
                                        {{ $data->price }}</span>
                                @endif
                            </h3>
                            <p class="sku_text"><span>SKU: </span> <span
                                    class="p-0 pr-1 choice_attribute_sku">{{ $data->sku }}</span>
                            </p>

                            <form action="{{ route('add.cart', $data->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                                <div class="d-flex">
                                    <div class="qty-text-div">
                                        <span>Quantity : </span>
                                    </div>
                                    <div class="qty_div">
                                        <div class="minus-qty-div">
                                            <i class="fa fa-minus" id="qty_minus"></i>
                                        </div>
                                        <div class="qty-div">
                                            <input type="text" name="qty" id="qty" min="1"
                                                   value="{{ $qty ?? 1 }}" readonly>
                                        </div>
                                        <div class="plus-qty-div">
                                            <i class="fa fa-plus" id="qty_plus"></i>
                                        </div>
                                    </div>
                                </div>

                                @if ($data->has_variant == 1)
                                    <input type="hidden" name="choice_attributes" id="choice_attributes"
                                           class="choice_attributes">
                                    <input type="hidden" name="variant_value" id="variant_value"
                                           class="variant_value">
                                    <div class="attributes mt-3">
                                        <div class="item">
                                            @foreach ($data->get_choice_attributes as $key => $attribute)
                                                <div class="row mb-2">
                                                    <div class="col-md-12 col-12 item-val">
                                                        <label class="mb-1"><b>{{ Str::ucfirst($attribute->get_attribute->title) }}
                                                                :
                                                                <strong class="item_name">
                                                                    @foreach ($attribute->get_choice_attribute_items as $item)
                                                                        @if ($loop->first)
                                                                            {{ $item->attribute_item_name }}
                                                                        @endif
                                                                    @endforeach
                                                                </strong></b></label><br>
                                                        <input type="hidden" name="attribute_id[]"
                                                               value="{{ $attribute->get_attribute->id }}">

                                                        @foreach ($attribute->get_choice_attribute_items as $key2 => $item)
                                                            @if (isset($item->image))
                                                                <input type="radio"
                                                                       id="val_{{ $key }}{{ $key2 }}"
                                                                       name="attribute_item_id[{{ $attribute->get_attribute->id }}][]"
                                                                       value="{{ $item->attribute_item_name }}"
                                                                       data-id="{{ $item->id }}"
                                                                       class="attr_checkbox d-row s-row"
                                                                       @if ($loop->first) checked @endif
                                                                       data-image="{{ asset($item->image) }}">
                                                                <label class="mb-0"
                                                                       for="val_{{ $key }}{{ $key2 }}">
                                                                    <span class="image-span">
                                                                        <img class="attr_img"
                                                                             src="{{ asset($item->image) ?? asset('frontEnd/images/no_image.png') }}"
                                                                             height="50" width="50"
                                                                             alt="{{ $item->attribute_item_name }}">
                                                                    </span>
                                                                </label>
                                                            @else
                                                                <input type="radio"
                                                                       id="val_{{ $key }}{{ $key2 }}"
                                                                       name="attribute_item_id[{{ $attribute->get_attribute->id }}][]"
                                                                       value="{{ $item->attribute_item_name }}"
                                                                       data-id="{{ $item->id }}"
                                                                       class="attr_checkbox d-row s-row"
                                                                       @if ($loop->first) checked @endif>
                                                                <label class="mb-0"
                                                                       for="val_{{ $key }}{{ $key2 }}">
                                                                    <span>{{ $item->attribute_item_name }}</span>
                                                                </label>
                                                            @endif
                                                        @endforeach

                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                {{-- @if ($data->get_size_chart)
                                <div class="size-chart">
                                    <img src="{{ asset($data->get_size_chart->file_url) }}" alt="">
                                </div>
                            @endif --}}

                                <div class="mt-md-4 mt-2">
                                    <input type="submit" class="btn px-4 order_now_btn order_now_btn_m mt-0"
                                           name="order_now" value="Order Now">

                                    <input type="submit" class="btn px-4 add_cart_btn" name="add_cart"
                                           value="Add To Cart">

                                </div>
                            </form>
                            @if (!empty($data->get_size_chart) && !empty($data->get_size_chart->file_url))
                                <div class="size-chart mt-3">
                                    <button id="openModal" data-image="{{ asset($data->get_size_chart->file_url) }}">Size
                                        Chart
                                    </button>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12 ">
                        <ul class="nav nav-tabs nav-tabs-mod">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Description</a>
                            </li>
                        </ul>
                        <div class="tab-content tab-content-mod">
                            <div class="tab-pane active">
                                <div class="product-description-content">
                                    @if (!empty($data->description))
                                        {!! $data->description !!}
                                    @else
                                        <div class="text-center py-4">
                                            <div class="spinner-border text-primary" role="status">
                                                <span class="sr-only">লোড হচ্ছে...</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="products mt-5">
                    <h2 class="section-title text-left mb-4"> Related Products
                        <a href="">
                            View All
                        </a>
                    </h2>
                    <div class="product-list">
                        @foreach ($related_prod as $item)
                            <div class="product-item">
                                <a href="{{ route('product.details', $item->slug ?: $item->id) }}">
                                    <div class="image">
                                        <img src="{{ $item->get_thumb ? asset($item->get_thumb->file_url) : asset('frontEnd/images/no_image.png') }}"
                                             class="thumb-img" alt="">
                                        @if ($item->get_hover)
                                            <img src="{{ asset($item->get_hover->file_url) }}" alt=""
                                                 class="hover-img">
                                        @endif


                                    </div>
                                    <span class="product-name">{{ $item->name }}</span>
                                </a>
                                <div class="absolute-product">
                                    @if ($item->sale_price > 0)
                                        <div class="discount">
                                            {{ round((($item->price - $item->sale_price) / $item->price) * 100) }} %
                                        </div>
                                    @endif
                                    <div class="wishlist-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             onclick="addToWishlist({{ $item->id }})" viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path
                                                d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="prices">
                                    @if ($item->sale_price > 0)
                                        <span class="price">TK {{ number_format($item->sale_price, 2) }}</span>
                                        <span class="old-price">TK {{ number_format($item->price, 2) }}</span>
                                    @else
                                        <span class="price">TK {{ number_format($item->price, 2) }}</span>
                                    @endif
                                </div>

                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <button class="close-btn" id="closeModal">&times;</button>
            <img id="modalImage" src="" alt="Size Chart">
        </div>
    </div>




@endsection



@section('script')
    <script src="{{ asset('frontEnd') }}/plugins/small-zoom/panzoom.min.js"></script>
    <script src="{{ asset('frontEnd') }}/plugins/desktop-zoom/zoomsl.js"></script>
    <script src="{{ asset('frontEnd') }}/plugins/desktop-zoom/script.js"></script>

    <!-- Google Tag Manager -->
    <script>
        dataLayer.push({ ecommerce: null });
        dataLayer.push({
            'event': 'view_item',
            'ecommerce': {
                'currency': 'BDT',
                'value': {{ $data->sale_price != 0 ? $data->sale_price : $data->price }},
                'items': [{
                    'item_id': '{{ $data->id }}',
                    'item_name': '{{ $data->name }}',
                    'item_category': '{{ optional(optional($data->get_categories)->first())->category_name ?? '' }}',
                    'price': {{ $data->sale_price != 0 ? $data->sale_price : $data->price }},
                    'quantity': 1
                }]
            }
        });

        fbq('track', 'ViewContent', {
            content_name: '{{ $data->name }}',
            content_category: '{{ optional(optional($data->get_categories)->first())->category_name ?? '' }}',
            content_ids: ['{{ $data->id }}'],
            content_type: 'product',
            value: {{ $data->sale_price != 0 ? $data->sale_price : $data->price }},
            currency: 'BDT'
        });
    </script>

    @if (session()->has('add_to_cart_event'))
        <script>
            (function() {
                var eventData = @json(session('add_to_cart_event'));
                dataLayer.push({ ecommerce: null });
                dataLayer.push({
                    'event': 'add_to_cart',
                    'ecommerce': {
                        'currency': 'BDT',
                        'value': eventData.price * eventData.quantity,
                        'items': [{
                            'item_id': String(eventData.id),
                            'item_name': eventData.name,
                            'item_category': eventData.category,
                            'price': eventData.price,
                            'quantity': eventData.quantity
                        }]
                    }
                });

                fbq('track', 'AddToCart', {
                    content_name: eventData.name,
                    content_category: eventData.category,
                    content_ids: [String(eventData.id)],
                    content_type: 'product',
                    value: eventData.price * eventData.quantity,
                    currency: 'BDT'
                });
            })();
        </script>
    @endif
    <!--/Google Tag Manager -->

    <script>
        var productVariants = {!! json_encode($data->get_product_attributes ?? $data->get_attributes ?? []) !!};
        var baseProductSku = @json($data->sku ?? '');
        var productDescriptionUrl = @json(rtrim(env('IMS_APP_BASE_URL'), '/') . '/api/v1/app/product-description/' . $data->id);

        function loadProductDescription() {
            var descriptionContent = $('.product-description-content');

            fetch(productDescriptionUrl, {
                headers: {
                    Accept: 'application/json'
                }
            })
                .then(function (response) {
                    if (!response.ok) {
                        throw new Error('Product description request failed with status ' + response.status);
                    }
                    return response.json();
                })
                .then(function (data) {
                    var description = data && data.success && data.description
                        ? data.description.description
                        : null;

                    if (typeof description !== 'string') {
                        throw new Error('Product description was not included in the API response');
                    }

                    descriptionContent.html(description);
                })
                .catch(function (error) {
                    console.error('Unable to load product description:', error);
                    descriptionContent.html(
                        '<div class="alert alert-danger mb-0">পন্যের বিবরণ লোড করা যায়নি। অনুগ্রহ করে আবার চেষ্টা করুন।</div>'
                    );
                });
        }

        $('#qty_plus').on('click', function () {
            var qty = $('#qty').val();
            qty++;
            $('#qty').val(qty);
            get_variant();
        });

        $('#qty_minus').on('click', function () {
            var qty = $('#qty').val();
            qty--;
            if (qty < 1) {
                $('#qty').val(1);
            } else {
                $('#qty').val(qty);
            }
            get_variant();
        });

        function update_selected_variants() {
            var choice_attributes = [];
            var variant_values = [];
            $(".attr_checkbox:checked").each(function () {
                choice_attributes.push($(this).val());
                var itemId = $(this).attr('data-id') || $(this).data('id');
                if (itemId) {
                    variant_values.push(itemId);
                }
            });
            $('#choice_attributes').val(choice_attributes.join(','));
            $('#variant_value').val(variant_values.join(','));
            return {
                choice_attributes: choice_attributes,
                variant_values: variant_values
            };
        }

        $(document).ready(function () {
            loadProductDescription();
            update_selected_variants();
            get_variant();
        });

        //variant
        function get_variant() {
            $('#ajax-loader').show();
            var selections = update_selected_variants();
            var choice_attributes = selections.choice_attributes;
            var variant_value = selections.variant_values.join(',');
            var product_id = $('#id').val();
            var quantity = $('#qty').val();

            var CSRF = `{{ csrf_token() }}`;
            $.ajax({
                type: "POST",
                url: `{{ route('ajax.get.variant') }}`,
                data: {
                    _token: CSRF,
                    choice_attributes: choice_attributes,
                    variant_value: variant_value,
                    id: product_id,
                    quantity: quantity
                },
                success: function (res) {
                    // console.log(res.item_name);
                    $('.sku-value').text(res.sku);
                    $('.choice_attribute_sku').text(res.sku);
                    $('.price-value').text(res.price);
                    $('.sub-total-value').text(res.subtotal);
                    $('.choice_attribute_sku').val(res.choice_attributes);
                    $('#choice_attributes').val(res.choice_attributes);

                    $.each(res.item_name, function (index, val) {
                        var cleaned = val.replace(/_/g, ' ');
                        var parts = cleaned.split('-');
                        var formattedParts = parts.map(function (part) {
                            return part
                                .split(' ')
                                .map(function (word) {
                                    return word.charAt(0).toUpperCase() + word.slice(1);
                                })
                                .join(' ');
                        });
                        var formatted = formattedParts.join('-');
                        $('.item-val').eq(index).find('.item_name').text(formatted);
                    });


                    $('#ajax-loader').hide();
                }
            });
        }

        $(document).on('click', '.attr_checkbox', function () {
            update_selected_variants();
            get_variant();
        });

        // $(document).on('click', '.attr_img', function() {
        //     $('#main_product_image .xzoom-container img').css('display', 'none');
        //     $('#main_product_image .xzoom-container').append("<img class='float-thumb' src=" + $(this).prop('src') + ">");
        // });

        // $(document).on('click', '.thumb-img.thumb-border', function() {
        //     $('#main_product_image .xzoom-container img').css('display', 'block');
        //     $('.float-thumb').css('display', 'none');
        // });
    </script>

    {{-- <script>
        // Responsive image section toggle
        function checkWidth() {
            var $container = $(".responsive_single_product");
            if ($(window).width() <= 768) {
                $container.find('.small-row').show();
                $container.find('.desktop-row').hide();
            } else {
                $container.find('.small-row').hide();
                $container.find('.desktop-row').show();
            }
        }

        // Panzoom setup for image
        function setupPanzoom(imgSelector, containerSelector) {
            const elem = document.querySelector(containerSelector);
            const image = elem.querySelector(imgSelector);
            if (image.panzoomInstance) {
                image.panzoomInstance.destroy();
            }
            image.panzoomInstance = Panzoom(image, {
                maxScale: 5,
                minScale: 1,
                contain: 'outside'
            });
            // elem.addEventListener('wheel', image.panzoomInstance.zoomWithWheel);
            elem.addEventListener('click', function(e) {
                e.preventDefault();
                if (image.panzoomInstance.getScale() > 1) {
                    image.panzoomInstance.reset({
                        animate: true
                    });
                } else {
                    image.panzoomInstance.zoomToPoint(2, e, {
                        animate: true
                    });
                }
            });
        }

        $(document).ready(function() {
            checkWidth();
            // Initial panzoom setup for mobile
            setupPanzoom('img', '#panzoom');

            // Thumbnail click
            $(document).on('click', '.thumb-img', function() {
                var newImageUrl = $(this).data('image');
                $('.thumb-img').removeClass('thumb-border');
                $(this).addClass('thumb-border');
                $('#main_product_image .xzoom-container img').attr('src', newImageUrl);
                setupPanzoom('img', '#panzoom');
            });

            // Prev/Next buttons
            $(document).on('click', '.prev', function() {
                var currentThumb = $('.thumb-img.thumb-border');
                var prevThumb = currentThumb.prev('.thumb-img');
                if (prevThumb.length) prevThumb.trigger('click');
            });
            $(document).on('click', '.next', function() {
                var currentThumb = $('.thumb-img.thumb-border');
                var nextThumb = currentThumb.next('.thumb-img');
                if (nextThumb.length) nextThumb.trigger('click');
            });

            // Attribute image click: show image and enable zoom
            $(document).on('click', '.attr_img', function() {
                var imgSrc = $(this).prop('src');
                $('#main_product_image .xzoom-container img').attr('src', imgSrc);
                setupPanzoom('.float-thumb', '#panzoom');
            });

        });

        $(window).resize(function() {
            checkWidth();
        });
    </script> --}}

    <script>
        $(document).ready(function () {

            var smallSection = $('.small-row');
            if (!smallSection.length) return;

            function initPanzoom(imgSrc) {
                var mainImgContainer = smallSection.find('#main_product_image');
                mainImgContainer.html(`<div class="xzoom-container panzoom-style" id="panzoom">
                                   <img src="${imgSrc}" alt="">
                               </div>`);

                const elem = mainImgContainer.find('#panzoom')[0];
                if (elem) {
                    const panzoomInstance = Panzoom(elem, {
                        maxScale: 3,
                        contain: 'outside',
                        startScale: 1
                    });

                    // Enable click to zoom
                    elem.addEventListener('click', () => {
                        const currentScale = panzoomInstance.getScale();
                        const targetScale = currentScale === 1 ? 3 : 1;
                        panzoomInstance.zoom(targetScale, {
                            animate: true
                        });
                    });
                }
            }

            // ===== Load Main Image on Page Load =====
            var initialImg = smallSection.find('.thumb-img').first().data('image');
            if (initialImg) {
                initPanzoom(initialImg);
                smallSection.find('.thumb-img').first().addClass('thumb-border');
            }

            function updateMainImage(imgElem) {
                if (!imgElem.length) return;
                var imgSrc = imgElem.data('image');
                smallSection.find('.thumb-img').removeClass('thumb-border');
                imgElem.addClass('thumb-border');
                initPanzoom(imgSrc);
            }

            // ===== Thumbnail Click =====
            smallSection.on('click', '.thumb-img', function () {
                //alert(3);
                updateMainImage($(this));
            });

            // ===== Attribute Image Change =====
            smallSection.on('change', 's-row.attr_checkbox', function () {
                var imgSrc = $(this).data('image');
                if (!imgSrc) return;

                var wrapper = smallSection.find('.product-thumb');
                var existingThumb = wrapper.find('.thumb-img').filter(function () {
                    return $(this).data('image') === imgSrc;
                });

                wrapper.find('.thumb-img').removeClass('thumb-border');

                if (existingThumb.length) {
                    existingThumb.addClass('thumb-border');
                    wrapper.prepend(existingThumb);
                } else {
                    var thumbHtml = `<img src="${imgSrc}" class="d-block mb-2 thumb-img thumb-border"
                             alt="" data-image="${imgSrc}" style="cursor:pointer;">`;
                    wrapper.prepend(thumbHtml);
                }

                initPanzoom(imgSrc);
                wrapper.animate({
                    scrollTop: 0
                }, 400);
            });

        });
    </script>


    <script>
        $(document).ready(function () {

            // ===== Initialize Zoom =====
            function initZoom() {
                $(".block__pic").each(function () {
                    if ($(this).data('zoomsl')) $(this).zoomsl('destroy');
                    var w = $(this).width();
                    var h = $(this).height();
                    $(this).imagezoomsl({
                        zoomrange: [3, 3],
                        magnifiersize: [w, h],
                        magnifierborder: "1px solid #ccc",
                        position: "right",
                        cursorshade: true
                    });
                });
            }

            // ===== Update Main Image =====
            function updateMainImage(imgElem) {
                if (!imgElem.length) return;
                var newImg = imgElem.data('image');
                var mainImg = $('#main_product_image img');

                mainImg.attr('src', newImg);
                mainImg.attr('data-magnify-src', newImg);

                $('.thumb-img').removeClass('thumb-border');
                imgElem.addClass('thumb-border');

                initZoom();
                scrollThumbIntoView(imgElem);
                checkMainNavButtons();
            }

            // ===== Scroll Active Thumbnail Into View =====
            function scrollThumbIntoView(elem) {
                var wrapper = $('.thumbs-wrapper');
                if (!elem.length) return;

                var elemTop = elem.position().top + wrapper.scrollTop();
                var elemBottom = elemTop + elem.outerHeight(true);
                var wrapperTop = wrapper.scrollTop();
                var wrapperBottom = wrapperTop + wrapper.height();

                if (elemTop < wrapperTop) {
                    wrapper.animate({
                        scrollTop: elemTop
                    }, 300);
                } else if (elemBottom > wrapperBottom) {
                    wrapper.animate({
                        scrollTop: elemBottom - wrapper.height()
                    }, 300);
                }
            }

            // ===== Update Prev/Next Visibility =====
            function checkMainNavButtons() {
                var current = $('.thumb-img.thumb-border');
                $('.main-prev').toggle(current.prev('.thumb-img').length > 0);
                $('.main-next').toggle(current.next('.thumb-img').length > 0);
            }

            // ===== Thumbnail Click =====
            $(document).on('click', '.thumb-img', function () {
                updateMainImage($(this));
            });

            // ===== Main Prev / Next Click =====
            $(document).on('click', '.main-prev', function () {
                var current = $('.thumb-img.thumb-border');
                var prev = current.prev('.thumb-img');
                if (prev.length) {
                    updateMainImage(prev);
                    scrollThumbIntoView(prev);
                }
            });

            $(document).on('click', '.main-next', function () {
                var current = $('.thumb-img.thumb-border');
                var next = current.next('.thumb-img');
                if (next.length) {
                    updateMainImage(next);
                    scrollThumbIntoView(next);
                }
            });

            // ===== Attribute Image Pre-selected on Page Load =====
            var preSelectedAttr = $('.d-row.attr_checkbox:checked[data-image]');
            if (preSelectedAttr.length) {
                var imgSrc = preSelectedAttr.data('image');

                // check if this image already exists in gallery
                var existingThumb = $('.thumbs .thumb-img').filter(function () {
                    return $(this).data('image') === imgSrc;
                });

                if (!existingThumb.length) {
                    // prepend attribute image if not present
                    var thumbHtml = `<img src="${imgSrc}" class="thumb-img" data-image="${imgSrc}">`;
                    $('.thumbs').prepend(thumbHtml);
                    existingThumb = $('.thumbs .thumb-img').first();
                }

                updateMainImage(existingThumb);
                preSelectedAttr.siblings('label').find('.attr_img').addClass('thumb-border');
            } else {
                // No attribute image → default first thumbnail
                updateMainImage($('.thumbs .thumb-img').first());
            }

            // ===== Attribute Image Change (user clicks color/image) =====
            // ===== Attribute Image Change (user clicks color/image) =====
            $(document).on('change', '.d-row.attr_checkbox', function () {
                var imgSrc = $(this).data('image');
                if (!imgSrc) return;

                var wrapper = $('.thumbs-wrapper');
                var scrollBottom = wrapper[0].scrollHeight - wrapper.scrollTop() - wrapper.innerHeight();

                // check if scroll ekdom niche
                var isAtBottom = scrollBottom < 5;

                // if image not in gallery, prepend it
                var existingThumb = $('.thumbs .thumb-img').filter(function () {
                    return $(this).data('image') === imgSrc;
                });

                if (!existingThumb.length) {
                    var thumbHtml = `<img src="${imgSrc}" class="thumb-img" data-image="${imgSrc}">`;
                    $('.thumbs').prepend(thumbHtml);
                    existingThumb = $('.thumbs .thumb-img').first();
                }

                // 🔼 scroll up if was at bottom
                if (isAtBottom) {
                    wrapper.animate({
                        scrollTop: 0
                    }, 400);
                }

                // update main image
                updateMainImage(existingThumb);
                $('.attr_img').removeClass('thumb-border');
                $(this).siblings('label').find('.attr_img').addClass('thumb-border');
            });

            // ===== Thumbnail Scroll Arrows =====
            $(document).on('click', '.thumb-prev', function () {
                var wrapper = $('.thumbs-wrapper');
                var scrollAmount = wrapper.height() * 0.8; // scroll 80% of visible area
                wrapper.animate({
                    scrollTop: wrapper.scrollTop() - scrollAmount
                }, 300);
            });

            $(document).on('click', '.thumb-next', function () {
                var wrapper = $('.thumbs-wrapper');
                var scrollAmount = wrapper.height() * 0.8;
                wrapper.animate({
                    scrollTop: wrapper.scrollTop() + scrollAmount
                }, 300);
            });

            // ===== Show/Hide Thumbnail Scroll Arrows Based on Height =====
            function checkThumbScrollButtons() {
                var wrapper = $('.thumbs-wrapper');
                var thumbsHeight = $('.thumbs').outerHeight();
                var wrapperHeight = wrapper.height();

                if (thumbsHeight > wrapperHeight) {
                    $('.thumb-prev, .thumb-next').show();
                } else {
                    $('.thumb-prev, .thumb-next').hide();
                }
            }

            // Call initially and after adding attribute images
            checkThumbScrollButtons();

            // After prepending new attribute image, update visibility
            $(document).on('change', '.d-row.attr_checkbox', function () {
                // ...existing code for prepending image...
                checkThumbScrollButtons();
            });

            // Also call after document ready to make sure initial gallery state is correct
            $(document).ready(function () {
                checkThumbScrollButtons();
            });


            initZoom();
            checkMainNavButtons();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const openBtn = document.getElementById('openModal');
            const modal = document.getElementById('modal');
            const closeBtn = document.getElementById('closeModal');
            const modalImage = document.getElementById('modalImage');

            if (openBtn) {
                openBtn.addEventListener('click', function () {
                    const imageUrl = this.getAttribute('data-image');
                    modalImage.src = imageUrl;
                    console.log(imageUrl);
                    modal.classList.add('open');
                });
            }

            closeBtn.addEventListener('click', function () {
                modal.classList.remove('open');
            });

            window.addEventListener('click', function (e) {
                if (e.target === modal) {
                    modal.classList.remove('open');
                }
            });
        });
    </script>
@endsection
