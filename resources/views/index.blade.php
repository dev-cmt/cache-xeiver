@extends('layouts.master')
@section('title', 'Home')

@section('body')
    <div class="slider">
        <div class="images owl-carousel">
            @foreach ($sliders as $key => $item)
                <div class="image">
                    <a href="{{ $item->slider_url ?? $item->button_url ?? 'javascript:void(0)' }}">
                        <img src="{{ !empty($item->get_img) ? asset($item->get_img->file_url) : (!empty($item->image_url) ? asset($item->image_url) : asset('frontEnd/images/no_image.png')) }}"
                            alt="{{ $item->title ?? '' }}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    {{-- New Arrival Section --}}
    @if (isset($new_arrivals) && count($new_arrivals) > 0)
        <div class="products">
            <div class="custom-container">
                <h2 class="section-title text-center">New Arrival Products
                    @if (count($new_arrivals) > 10)
                        <a href="{{ route('products', ['filter' => 'new_arrival']) }}">
                            View All
                        </a>
                    @endif
                </h2>
                <div class="product-list">
                    @foreach ($new_arrivals->take(10) as $item)
                        <div class="product-item">
                            <a href="{{ route('product.details', $item->slug ?: $item->id) }}">
                                <div class="image">
                                    <img src="{{ !empty($item->get_thumb) ? asset($item->get_thumb->file_url) : (!empty($item->image_url) ? asset($item->image_url) : asset('frontEnd/images/no_image.png')) }}"
                                        class="thumb-img" alt="{{ $item->name ?? '' }}">
                                    @if (!empty($item->get_hover) && !empty($item->get_hover->file_url))
                                        <img src="{{ asset($item->get_hover->file_url) }}" alt="{{ $item->name ?? '' }}" class="hover-img">
                                    @elseif (!empty($item->hover_image))
                                        <img src="{{ asset($item->hover_image) }}" alt="{{ $item->name ?? '' }}" class="hover-img">
                                    @endif
                                </div>
                                <span class="product-name">{{ $item->name ?? '' }}</span>
                            </a>
                            <div class="absolute-product">
                                @if ((float)($item->sale_price ?? 0) > 0 && (float)($item->price ?? 0) > (float)($item->sale_price ?? 0))
                                    <div class="discount">
                                        {{ round(((($item->price - $item->sale_price) / $item->price) * 100)) }} %
                                    </div>
                                @endif
                                <div class="wishlist-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        onclick="addToWishlist({{ $item->id }})" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    </svg>
                                </div>
                            </div>
                            <div class="prices">
                                @if ((float)($item->sale_price ?? 0) > 0 && (float)($item->price ?? 0) > (float)($item->sale_price ?? 0))
                                    <span class="price">TK {{ number_format((float)$item->sale_price, 2) }}</span>
                                    <span class="old-price">TK {{ number_format((float)$item->price, 2) }}</span>
                                @else
                                    <span class="price">TK {{ number_format((float)((float)($item->sale_price ?? 0) > 0 ? $item->sale_price : ($item->price ?? 0)), 2) }}</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    {{-- Hot Sale Section --}}
    @if (isset($hot_sale) && count($hot_sale) > 0)
        <div class="products">
            <div class="custom-container">
                <h2 class="section-title text-center">Hot Sale
                    @if (count($hot_sale) > 10)
                        <a href="{{ route('products', ['filter' => 'hot_sale']) }}">
                            View All
                        </a>
                    @endif
                </h2>
                <div class="product-list">
                    @foreach ($hot_sale->take(10) as $item)
                        <div class="product-item">
                            <a href="{{ route('product.details', $item->slug ?: $item->id) }}">
                                <div class="image">
                                    <img src="{{ !empty($item->get_thumb) ? asset($item->get_thumb->file_url) : (!empty($item->image_url) ? asset($item->image_url) : asset('frontEnd/images/no_image.png')) }}"
                                        class="thumb-img" alt="{{ $item->name ?? '' }}">
                                    @if (!empty($item->get_hover) && !empty($item->get_hover->file_url))
                                        <img src="{{ asset($item->get_hover->file_url) }}" alt="{{ $item->name ?? '' }}"
                                            class="hover-img">
                                    @elseif (!empty($item->hover_image))
                                        <img src="{{ asset($item->hover_image) }}" alt="{{ $item->name ?? '' }}"
                                            class="hover-img">
                                    @endif
                                </div>
                                <span class="product-name">{{ $item->name ?? '' }}</span>
                            </a>
                            <div class="absolute-product">
                                @if ((float)($item->sale_price ?? 0) > 0 && (float)($item->price ?? 0) > (float)($item->sale_price ?? 0))
                                    <div class="discount">
                                        {{ round(((($item->price - $item->sale_price) / $item->price) * 100)) }} %
                                    </div>
                                @endif
                                <div class="wishlist-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        onclick="addToWishlist({{ $item->id }})" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    </svg>
                                </div>
                            </div>
                            <div class="prices">
                                @if ((float)($item->sale_price ?? 0) > 0 && (float)($item->price ?? 0) > (float)($item->sale_price ?? 0))
                                    <span class="price">TK {{ number_format((float)$item->sale_price, 2) }}</span>
                                    <span class="old-price">TK {{ number_format((float)$item->price, 2) }}</span>
                                @else
                                    <span class="price">TK {{ number_format((float)((float)($item->sale_price ?? 0) > 0 ? $item->sale_price : ($item->price ?? 0)), 2) }}</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    {{-- Trending Products Section --}}
    @if (isset($trending) && count($trending) > 0)
        <div class="products">
            <div class="custom-container">
                <h2 class="section-title text-center">Trending Products
                    @if (count($trending) > 10)
                        <a href="{{ route('products', ['filter' => 'trending']) }}">
                            View All
                        </a>
                    @endif
                </h2>
                <div class="product-list">
                    @foreach ($trending->take(10) as $item)
                        <div class="product-item">
                            <a href="{{ route('product.details', $item->slug ?: $item->id) }}">
                                <div class="image">
                                    <img src="{{ !empty($item->get_thumb) ? asset($item->get_thumb->file_url) : (!empty($item->image_url) ? asset($item->image_url) : asset('frontEnd/images/no_image.png')) }}"
                                        class="thumb-img" alt="{{ $item->name ?? '' }}">
                                    @if (!empty($item->get_hover) && !empty($item->get_hover->file_url))
                                        <img src="{{ asset($item->get_hover->file_url) }}" alt="{{ $item->name ?? '' }}"
                                            class="hover-img">
                                    @elseif (!empty($item->hover_image))
                                        <img src="{{ asset($item->hover_image) }}" alt="{{ $item->name ?? '' }}"
                                            class="hover-img">
                                    @endif
                                </div>
                                <span class="product-name">{{ $item->name ?? '' }}</span>
                            </a>
                            <div class="absolute-product">
                                @if ((float)($item->sale_price ?? 0) > 0 && (float)($item->price ?? 0) > (float)($item->sale_price ?? 0))
                                    <div class="discount">
                                        {{ round(((($item->price - $item->sale_price) / $item->price) * 100)) }} %
                                    </div>
                                @endif
                                <div class="wishlist-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        onclick="addToWishlist({{ $item->id }})" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    </svg>
                                </div>
                            </div>
                            <div class="prices">
                                @if ((float)($item->sale_price ?? 0) > 0 && (float)($item->price ?? 0) > (float)($item->sale_price ?? 0))
                                    <span class="price">TK {{ number_format((float)$item->sale_price, 2) }}</span>
                                    <span class="old-price">TK {{ number_format((float)$item->price, 2) }}</span>
                                @else
                                    <span class="price">TK {{ number_format((float)((float)($item->sale_price ?? 0) > 0 ? $item->sale_price : ($item->price ?? 0)), 2) }}</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    {{-- Featured Products Section --}}
    @if (isset($featured) && count($featured) > 0)
        <div class="products">
            <div class="custom-container">
                <h2 class="section-title text-center">Featured Products
                    @if (count($featured) > 10)
                        <a href="{{ route('products', ['filter' => 'featured']) }}">
                            View All
                        </a>
                    @endif
                </h2>
                <div class="product-list">
                    @foreach ($featured->take(10) as $item)
                        <div class="product-item">
                            <a href="{{ route('product.details', $item->slug ?: $item->id) }}">
                                <div class="image">
                                    <img src="{{ !empty($item->get_thumb) ? asset($item->get_thumb->file_url) : (!empty($item->image_url) ? asset($item->image_url) : asset('frontEnd/images/no_image.png')) }}"
                                        class="thumb-img" alt="{{ $item->name ?? '' }}">
                                    @if (!empty($item->get_hover) && !empty($item->get_hover->file_url))
                                        <img src="{{ asset($item->get_hover->file_url) }}" alt="{{ $item->name ?? '' }}"
                                            class="hover-img">
                                    @elseif (!empty($item->hover_image))
                                        <img src="{{ asset($item->hover_image) }}" alt="{{ $item->name ?? '' }}"
                                            class="hover-img">
                                    @endif
                                </div>
                                <span class="product-name">{{ $item->name ?? '' }}</span>
                            </a>
                            <div class="absolute-product">
                                @if ((float)($item->sale_price ?? 0) > 0 && (float)($item->price ?? 0) > (float)($item->sale_price ?? 0))
                                    <div class="discount">
                                        {{ round(((($item->price - $item->sale_price) / $item->price) * 100)) }} %
                                    </div>
                                @endif
                                <div class="wishlist-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        onclick="addToWishlist({{ $item->id }})" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    </svg>
                                </div>
                            </div>
                            <div class="prices">
                                @if ((float)($item->sale_price ?? 0) > 0 && (float)($item->price ?? 0) > (float)($item->sale_price ?? 0))
                                    <span class="price">TK {{ number_format((float)$item->sale_price, 2) }}</span>
                                    <span class="old-price">TK {{ number_format((float)$item->price, 2) }}</span>
                                @else
                                    <span class="price">TK {{ number_format((float)((float)($item->sale_price ?? 0) > 0 ? $item->sale_price : ($item->price ?? 0)), 2) }}</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                margin: 20,
                loop: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 1,
                        nav: false
                    },
                    1000: {
                        items: 1,
                        nav: true,
                        loop: false
                    }
                }
            });

            $('.owl-nav').remove();
        });
    </script>
@endsection
