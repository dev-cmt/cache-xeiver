@extends('frontEnd.layouts.master')
@section('title', 'Home')

@section('body')
    <div class="slider">
        <div class="images owl-carousel">
            @foreach ($sliders as $key => $item)
                <div class="image">
                    <a href="">
                        <img src="{{ $item->get_img ? asset($item->get_img->file_url) : asset('frontEnd/images/no_image.png') }}"
                            alt="">
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    {{-- <div class="category">
        <div class="custom-container">
            <h2 class="section-title">Shop By Categories</h2>
            <div class="category-list">
                @foreach ($categories as $cat)
                    <div class="category-item">
                        <a href="{{ route('single.category', $cat->id) }}">
                            <img src="{{ $cat->file_url ? asset($cat->file_url) : asset('frontEnd/images/no_image.png') }}"
                                alt="">
                            <span class="category-name">{{ $cat->category_name }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}

    {{-- New Arrival Section --}}
    @if (count($new_arrivals) > 0)
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
                    @foreach ($new_arrivals as $item)
                        <div class="product-item">
                            <a href="{{ route('single.product', $item->slug) }}">
                                <div class="image">
                                    <img src="{{ $item->get_thumb ? asset($item->get_thumb->file_url) : asset('frontEnd/images/no_image.png') }}"
                                        class="thumb-img" alt="">
                                    @if ($item->get_hover)
                                        <img src="{{ asset($item->get_hover->file_url) }}" alt="" class="hover-img">
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
    @endif

    {{-- Hot Sale Section --}}
    @if (count($hot_sale) > 0)
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
                    @foreach ($hot_sale as $item)
                        <div class="product-item">
                            <a href="{{ route('single.product', $item->slug) }}">
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
    @endif

    {{-- Trending Products Section --}}
    @if (count($trending) > 0)
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

                    @foreach ($trending as $item)
                        <div class="product-item">
                            <a href="{{ route('single.product', $item->slug) }}">
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
    @endif

    {{-- Featured Products Section --}}
    @if (count($featured) > 0)
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
                    @foreach ($featured as $item)
                        <div class="product-item">
                            <a href="{{ route('single.product', $item->slug) }}">
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
    @endif
    {{-- <div class="showroom">
        <div class="custom-container">
            <h2 class="section-title text-center">Find Our Showrooms all over Bangladesh</h2>
            <span class="desc">
                We intend to open more and more outlets so that people from every where in the country
                can gain access to us and our products easily.
            </span>
            <div class="showroom-content">
                <div class="showroom-card">
                    <div class="image">
                        <img src="{{ asset('frontEnd') }}/assets/images/showroom.png" alt="">
                    </div>
                    <div class="name">Mirpur Outlet</div>
                    <div class="address">
                        Mirpur 10, Dhaka.
                    </div>
                    <div class="open-hours">
                        Business Hours Till 10:00Am – 9.00Pm **Holiday- Thursday
                    </div>
                    <div class="map">
                        <a href="">Find Map</a>
                    </div>
                </div>

            </div>
            <div class="more-showroom">
                <a href="">More Showroom</a>
            </div>
        </div>
    </div> --}}

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
    <script></script>

@endsection
