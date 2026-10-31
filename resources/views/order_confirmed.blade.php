@extends('frontEnd.layouts.master')

@section('title')
    Order Confirmed
@endsection

@section('body')
    {{--<section class="py-5">
        <div class="cart-section">
            <div class="container-fluid container-95">
                <div class="row py-5">
                    <div class="col-12 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#008000" stroke-width="1.5"
                                 stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"/>
                                <path d="M9 12l2 2l4 -4"/>
                            </svg>
                        <h1 class="mb-md-4" style="color: green;font-weight: bold">Order Place Successfully</h1>
                        <p style="color: green">আপনার অর্ডারটি সফলভাবে সম্পন্ন হয়েছে আমাদের কল সেন্টার থেকে ফোন করে আপনার অর্ডারটি কনফার্ম করা হবে</p>
                        @if(session()->has('order_no'))<p style="color: red;font-weight: bold;font-size: 20px">আপনার অর্ডার নাম্বার:- <strong>{{session('order_no')??null}}</strong></p>@endif
                        <a href="{{route('home')}}" class="btn btn-success px-5" style="background-color: green">প্রোডাক্ট বাছাই করুন</a>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}

    <section class="py-md-5 pb-4">
        <div class="cart-section">
            <div class="container">
                <div class="row confirm-order">
                    <div class="col-12 text-center">
                        <h1><svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 24 24" fill="none" stroke="#008000" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"/>
                                <path d="M9 12l2 2l4 -4"/>
                            </svg> @if(session()->has('order_no'))<br> <span class="ord_no">আপনার অর্ডার নাম্বার ঃ- <strong>{{session('order_no')??null}}</strong></span>@endif <br>আপনার অর্ডারটি সফলভাবে সম্পন্ন হয়েছে</h1>
                        <p>আমাদের কল সেন্টার থেকে ফোন করে আপনার অর্ডারটি কনফার্ম করা হবে</p>
                        <a href="{{route('home')}}" class="btn btn-danger">অন্যান্য প্রোডাক্ট গুলো দেখুন</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    @if (isset($order))
        <!--Google Tag Manager -->
        <script>
            dataLayer.push({ ecommerce: null });
            dataLayer.push({
                'event': 'purchase',
                'action_source': 'website',
                'order_id': '{{ $order->invoice_id }}',
                'event_id': '{{ $order->id }}',
                'ecommerce': {
                    'transaction_id': '{{ $order->invoice_id }}',
                    'affiliation': '{{ $web_settings->site_name ?? 'Unisale Mart' }}',
                    'value': {{ $order->total }},
                    'tax': 0,
                    'shipping': {{ $order->shipping_cost ?? 0 }},
                    'currency': 'BDT',
                    'items': [
                        @foreach ($order->get_products as $item)
                        {
                            'item_id': '{{ $item->get_product->id ?? '' }}',
                            'item_name': '{{ $item->get_product->name ?? '' }}',
                            'item_category': '{{ $item->get_product->get_categories->first()->category_name ?? '' }}',
                            'price': {{ $item->price }},
                            'quantity': {{ $item->qty }}
                        },
                        @endforeach
                    ]
                },
                'customer_information': {
                    'first_name': '{{ $order->customer_name ?? '' }}',
                    'last_name': '{{ $order->customer_name ?? '' }}',
                    'phone': '{{ $order->customer_phone ?? '' }}',
                    'address_1': '{{ $order->customer_address ?? '' }}',
                    'city': '{{ $order->customer_address ?? '' }}',
                    'country': 'Bangladesh',
                    'country_code': 'BD'
                }
            });

            fbq('track', 'Purchase', {
                content_ids: [@foreach ($order->get_products as $item) '{{ $item->get_product->id ?? '' }}', @endforeach],
                content_type: 'product',
                value: {{ $order->total }},
                currency: 'BDT'
            });
        </script>
        <!--/Google Tag Manager -->
    @endif
@endsection
