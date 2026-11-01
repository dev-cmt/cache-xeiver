@extends('layouts.master')

@section('title')
    {{ $cat_name }}
@endsection

@section('body')
    <section>
        <div class="category_breadcrumb">
            <div class="container-fluid container-95">
                <div class="row">
                    <div class="col-12">
                        <p>
                            <a href="{{ route('home') }}">Home</a>
                            /
                            <a href="javascript:void(0);">{{ $cat_name }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="products">
            <div class="custom-container">
                <div class="product-list">
                    @foreach ($data as $item)
                        <div class="product-item">
                            <a href="{{ route('product.details', $item->slug ?: $item->id) }}">
                                <div class="image">
                                    <img src="{{ $item->get_thumb ? asset($item->get_thumb->file_url) : asset('frontEnd/images/no_image.png') }}"
                                        class="thumb-img" alt="">
                                    @if ($item->get_hover)
                                        <img src="{{ asset($item->get_hover->file_url) }}" alt="" class="hover-img">
                                    @endif
                                    <div class="absolute-product">
                                        @if ($item->sale_price > 0)
                                            <div class="discount">
                                                {{ round((($item->price - $item->sale_price) / $item->price) * 100) }} %
                                            </div>
                                        @endif
                                        <div class="wishlist-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <span class="product-name">{{ $item->name }}</span>
                            </a>

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
    </section>
@endsection



@section('script')
    <script>
        $(document).ready(function() {
            $('.order_now_btn').click(function(e) {
                e.preventDefault();
                // alert(4);
                var hasVariant = $(this).data('has_variant');
                var slug = $(this).data('slug');
                var id = $(this).data('id');
                if (hasVariant) {
                    window.location.href = "{{ url('/product') }}/" + slug + "/" + id;
                } else {
                    var form = $(this).closest('.order_form');
                    form.find('input[name="add_cart"]').removeAttr('name');
                    form.submit();
                }
            });
            $('.add_cart_btn').click(function(e) {
                e.preventDefault();
                // alert(4);
                var hasVariant = $(this).data('has_variant');
                var slug = $(this).data('slug');
                var id = $(this).data('id');
                if (hasVariant) {
                    window.location.href = "{{ url('/product') }}/" + slug + "/" + id;
                } else {
                    var form = $(this).closest('.order_form');
                    form.find('input[name="order_now"]').removeAttr('name');
                    form.submit();
                }
            });
        });
    </script>
@endsection
