<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} - Confirmed Order</title>
    <link rel="stylesheet" href="{{ asset('frontEnd/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/style.css') }}">
    {!! $web_settings->fb_pixel ?? null !!}
</head>
<body>
<section class="py-md-5">
    <div class="cart-section order-confirm-section">
        <div class="container">
            <div class="row py-md-5">
                <div class="col-12 text-center order_confirm">
                    <a href="{{ route('home') }}" class="btn btn-primary">হোম পেজে যান</a>
                    <br><br>
                    <div class="success_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                             stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M5 12l5 5l10 -10"/>
                        </svg>
                    </div>
                    <h1 class="mb-md-4" style="color: green;font-weight: bold">Order Place Successfully</h1>
                    <p style="color: green">আপনার অর্ডারটি সফলভাবে সম্পন্ন হয়েছে আমাদের কল সেন্টার থেকে ফোন করে আপনার
                        অর্ডারটি কনফার্ম করা হবে</p>
                    <h5 class="order_confirm_total_price">অর্ডারের মোট মূল্য: {{ $order->total }} BDT</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('frontEnd/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
