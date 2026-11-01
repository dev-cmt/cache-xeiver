@extends('layouts.master')

@section('title')
    All Hot Deals
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
                            <a href="javascript:void(0);">All {{ str_replace('_', ' ', Str::ucfirst($filter)) }} </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="products">
            <div class="custom-container">
                @if ($data->count() > 0)
                    <div class="product-list">
                        @foreach ($data as $item)
                            <div class="product-item">
                                <a href="{{ route('product.details', $item->slug ?: $item->id) }}">
                                    <div class="image">
                                        <img src="{{ $item->get_thumb ? asset($item->get_thumb->file_url) : asset('frontEnd/images/no_image.png') }}"
                                            class="thumb-img" alt="">
                                        @if ($item->get_hover)
                                            <img src="{{ asset($item->get_hover->file_url) }}" alt=""
                                                class="hover-img">
                                        @endif
                                        @if ($item->sale_price > 0)
                                            <div class="discount">
                                                {{ round((($item->price - $item->sale_price) / $item->price) * 100) }} %
                                            </div>
                                        @endif
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
                @else
                    <div class="col-12 text-center py-md-5 my-md-5">
                        <h2 class="mb-md-4" style="color: red;font-weight: bold">দুঃখিত কোন পণ্য পাওয়া যায়নি</h2>
                        <a href="{{ route('home') }}" class="btn btn-success px-5" style="background-color: green">হোম</a>
                    </div>
                @endif

            </div>
        </div>
    </section>
@endsection



@section('script')
@endsection
