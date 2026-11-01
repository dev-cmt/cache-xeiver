@extends('layouts.master')

@section('title')
    Checkout
@endsection
@section('style')
    <style>
        .table thead th {
            border-bottom-width: 0;
        }

        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-width: 1px;
        }

        tbody tr td:nth-child(2) {
            text-align: left
        }
    </style>
@endsection

@if(\Cart::getContent()->count() > 0)
@section('tracking')
    <script>
        dataLayer.push({ecommerce: null});  // Clear the previous ecommerce object.
        dataLayer.push({
            event: "begin_checkout",
            ecommerce: {
                currency: "BDT",
                value: {{ session('api_begin_checkout_data')['value'] ?? 0 }},
                coupon: "",
                items: {!! session('api_begin_checkout_data')['products'] ?? '[]' !!}
            }
        });
        if (typeof fbq === 'function') {
            var checkoutItems = {!! session('api_begin_checkout_data')['products'] ?? '[]' !!};
            fbq('track', 'InitiateCheckout', {
                content_ids: checkoutItems.map(function (item) { return item.item_id; }),
                content_type: 'product',
                num_items: checkoutItems.reduce(function (total, item) { return total + (Number(item.quantity) || 0); }, 0),
                value: {{ session('api_begin_checkout_data')['value'] ?? 0 }},
                currency: 'BDT'
            });
        }
    </script>
@endsection
@endif

@section('body')
    @if (\Cart::getContent()->count() > 0)
        <section>
            <div class="cart-section">
                <div class="container-fluid container-95">
                    <div class="row">
                        <div class="col-md-5 col-12 mb-md-0 mb-4">
                            <div class="card">
                                <h5 class="font-weight-bold card-header" style="background-color: #fff">Customer Information
                                </h5>
                                <div class="card-body p-2">
                                    {{-- <p class="text-center">অর্ডারটি কনফার্ম করতে আপনার নাম, ঠিকানা, মোবাইল নাম্বার, লিখে
                                        <span class="text-danger">অর্ডার কনফার্ম করুন</span> বাটনে ক্লিক করুন</p> --}}
                                    <form action="{{ route('place.order') }}" method="post" id="checkout_form"
                                        class="checkout_form">
                                        @csrf
                                        <input type="hidden" name="shipping_cost" id="shipping_cost">
                                        <div class="form-group mb-3">
                                            <label for="customer_name">আপনার নাম <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control  mt-2" id="customer_name"
                                                name="customer_name" placeholder="আপনার নাম লিখুন" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="customer_phone">ফোন নাম্বার <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control mt-2" id="customer_phone"
                                                name="customer_phone" placeholder="১১ সংখ্যার ফোন নাম্বার লিখুন"
                                                minlength="11" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="customer_address">ঠিকানা (গ্রাম+থানা+জেলা) <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control mt-2" id="customer_address"
                                                name="customer_address"
                                                placeholder="(গ্রাম+থানা+জেলা) সহ সম্পূর্ণ ঠিকানা লিখুন" required>
                                        </div>

                                        <div class="form-group mb-3" id="area_section">
                                            <label for="shipping_method">এরিয়া সিলেক্ট করুন <span
                                                    class="text-danger">*</span></label>
                                            <select name="shipping_method" id="shipping_method" class="form-control mt-2"
                                                required>
                                                @foreach ($shipping_methods as $item)
                                                    <option value="{{ $item->id }}">{{ $item->text }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-dark w-100 my-2" style="height: 50px"
                                            id="conf_order_btn">Place Order</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7 col-12">
                            <div class="card">
                                <h5 class="font-weight-bold card-header" style="background-color: #fff">Order Information
                                </h5>
                                <div class="card-body p-2 table-responsive">
                                    <table class="cart_table table table-bordered text-center mb-0">
                                        <thead>
                                            <tr style="border-width: 0;">
                                                <th></th>
                                                <th>Product Name & Image</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach (\Cart::getContent()->sort() as $item)
                                                @php
                                                    $product = $item->associatedModel;
                                                    $product = $product instanceof \__PHP_Incomplete_Class ? null : $product;
                                                    $cartImage = $item->attributes->get('image')
                                                        ?: ($product->get_thumb->file_url ?? asset('frontEnd/images/no_image.png'));
                                                    $cartSlug = ($product->slug ?? null) ?: ($product->id ?? $item->id);
                                                    $skipAttrKeys = ['sku', 'slug', 'image', 'variant_value'];
                                                    $variantLabel = $item->attributes->get('variant') ?: $item->attributes
                                                        ->except($skipAttrKeys)
                                                        ->filter()
                                                        ->map(fn($v, $k) => ucfirst(str_replace('_', ' ', $k)) . ': ' . str_replace('_', ' ', ucfirst($v)))
                                                        ->implode(', ');
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('cart.item.delete', $item->id) }}"><i
                                                                class="fa fa-trash text-danger"></i></a>
                                                    </td>
                                                    <td class="text-left">
                                                        <img width="50" height="50"
                                                             style="object-fit: cover; border-radius: 4px; margin-right: 8px; vertical-align: middle;"
                                                             src="{{ $cartImage }}"
                                                             alt="{{ $item->name }}"
                                                             onerror="this.src='{{ asset('frontEnd/images/no_image.png') }}'">
                                                        <a style="font-size: 14px; vertical-align: middle;"
                                                            href="{{ route('product.details', $cartSlug) }}">{{ $item->name }}</a>
                                                        @if ($variantLabel)
                                                            <span style="font-size: 14px" class="text-danger text-capitalize">
                                                                {{ $variantLabel }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->price }}</td>
                                                    <td width="15%" class="cart_qty">
                                                        <a href="{{ route('cart.item.minus', $item->id) }}"><i
                                                                class="fa fa-minus" id="qty_minus"></i></a>
                                                        <input type="text" name="qty" id="qty" min="1"
                                                            value="{{ $item->quantity }}" readonly>
                                                        <a href="{{ route('cart.item.plus', $item->id) }}"><i
                                                                class="fa fa-plus" id="qty_plus"></i></a>
                                                    </td>
                                                    <td>{{ $item->getPriceSum() }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4" class="text-right pr-2">Net Total</th>
                                                <td><span id="net_total">{{ \Cart::getTotal() }}</span></td>
                                            </tr>
                                            <tr>
                                                <th colspan="4" class="text-right pr-2">Shipping Cost</th>
                                                <td>
                                                    <span id="cart_shipping_cost">0</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan="4" class="text-right pr-2">Grand Total</th>
                                                <td>
                                                    <span id="grand_total"></span>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="card-footer" style="background-color: #fff">
                                    <a href="{{ route('home') }}" class="btn btn-info btn-sm ">
                                        <i class="fa fa-angle-left"></i> Back To Shopping
                                    </a>
                                    <a href="{{ route('cart.clear') }}" class="btn btn-danger btn-sm float-right">Cart
                                        Clear</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="py-md-5">
            <div class="cart-section">
                <div class="container-fluid container-95">
                    <div class="row py-md-5">
                        <div class="col-12 text-center">
                            <h1 class="mb-md-4">No Product Found!</h1>
                            <a href="{{ route('home') }}" class="btn btn-info px-5">Back To Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection



@section('script')
    <script>
        $(document).ready(function() {
            $('#customer_phone').on('blur', function() {
                var phone = $(this).val();
                var name = $('#customer_name').val();
                var address = $('#customer_address').val();
                var shipping_method = $('#shipping_method').val();
                var shipping_cost = $('#shipping_cost').val();
                var data = {
                    phone: phone,
                    name: name,
                    address: address,
                    shipping_method: shipping_method,
                    shipping_cost: shipping_cost
                };

                if (phone.length == 11) {
                    $.ajax({
                        url: '{{ route('abandoned.cart') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            data: data
                        },
                        success: function(data) {
                            // console.log(data)
                        }
                    });
                }
            });


            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '{{ route('ajax.get.shipp.meth') }}',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('#shipping_method').val()
                },
                success: function(data) {
                    $("#cart_shipping_cost").text(data);
                    $("#shipping_cost").val(data);
                    if (data == 0) {
                        $('#area_section').css('display', 'none')
                    } else {
                        $('#area_section').css('display', 'block')
                    }
                    calculate();
                }
            });

            $("#shipping_method").on('change', function() {
                if ($(this).val()) {
                    $.ajax({
                        url: '{{ route('ajax.get.shipp.meth') }}',
                        type: 'POST',
                        data: {
                            _token: CSRF_TOKEN,
                            id: $(this).val()
                        },
                        success: function(data) {
                            $("#cart_shipping_cost").text(data);
                            $("#shipping_cost").val(data);
                            calculate();
                        }
                    });
                } else {
                    $("#cart_shipping_cost").text(0);
                    $("#shipping_cost").val(0);
                    calculate();
                }

            });

            function calculate() {
                var net_total = parseFloat($('#net_total').text());
                var cart_shipping_cost = parseFloat($('#cart_shipping_cost').text());
                $('#grand_total').text(net_total + cart_shipping_cost);
            }


            $("#checkout_form").submit(function() {
                $("#conf_order_btn").attr("disabled", true).text('সাবমিট হচ্ছে...');
            });
        });
    </script>
@endsection
