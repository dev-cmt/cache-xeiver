@extends('layouts.master')

@section('title')
    Contact Us
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
                            <a href="javascript:void(0);">Contact Us</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="cart-section my-4 my-md-5">
            <div class="custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="bg-white p-4 p-md-5 rounded shadow-sm">
                            <h4 class="font-weight-bold mb-4 border-bottom pb-2">Contact Us</h4>

                            @if (!empty($content))
                                <div class="page-content mb-4" style="line-height: 1.8; color: #333;">
                                    {!! $content !!}
                                </div>
                            @endif

                            <div class="row mt-4">
                                @if (!empty($web_settings->website_address))
                                    <div class="col-md-4 mb-4">
                                        <div class="p-3 border rounded h-100 text-center">
                                            <div class="mb-2 text-primary" style="font-size: 28px;">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <h6 class="font-weight-bold mb-2">Our Address</h6>
                                            <p class="text-muted mb-0">{{ $web_settings->website_address }}</p>
                                        </div>
                                    </div>
                                @endif

                                @if (!empty($web_settings->website_phone) || !empty($web_settings->website_phone2) || !empty($web_settings->website_phone3))
                                    <div class="col-md-4 mb-4">
                                        <div class="p-3 border rounded h-100 text-center">
                                            <div class="mb-2 text-success" style="font-size: 28px;">
                                                <i class="fas fa-phone-alt"></i>
                                            </div>
                                            <h6 class="font-weight-bold mb-2">Phone Number</h6>
                                            @if (!empty($web_settings->website_phone))
                                                <p class="mb-1"><a href="tel:{{ $web_settings->website_phone }}" class="text-dark">{{ $web_settings->website_phone }}</a></p>
                                            @endif
                                            @if (!empty($web_settings->website_phone2))
                                                <p class="mb-1"><a href="tel:{{ $web_settings->website_phone2 }}" class="text-dark">{{ $web_settings->website_phone2 }}</a></p>
                                            @endif
                                            @if (!empty($web_settings->website_phone3))
                                                <p class="mb-0"><a href="tel:{{ $web_settings->website_phone3 }}" class="text-dark">{{ $web_settings->website_phone3 }}</a></p>
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                @if (!empty($store['email']))
                                    <div class="col-md-4 mb-4">
                                        <div class="p-3 border rounded h-100 text-center">
                                            <div class="mb-2 text-danger" style="font-size: 28px;">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <h6 class="font-weight-bold mb-2">Email Us</h6>
                                            <p class="mb-0"><a href="mailto:{{ $store['email'] }}" class="text-dark">{{ $store['email'] }}</a></p>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            @if (!empty($web_settings->website_messenger) || !empty($web_settings->website_phone3) || !empty($store['facebook']))
                                <div class="mt-3 text-center border-top pt-3">
                                    <h6 class="font-weight-bold mb-3">Connect With Us</h6>
                                    <div class="d-flex justify-content-center gap-3" style="gap: 15px;">
                                        @if (!empty($web_settings->website_phone3))
                                            <a href="https://wa.me/88{{ $web_settings->website_phone3 }}" target="_blank" class="btn btn-outline-success btn-sm px-3">
                                                <i class="fab fa-whatsapp mr-1"></i> WhatsApp
                                            </a>
                                        @endif
                                        @if (!empty($web_settings->website_messenger))
                                            <a href="{{ $web_settings->website_messenger }}" target="_blank" class="btn btn-outline-primary btn-sm px-3">
                                                <i class="fab fa-facebook-messenger mr-1"></i> Messenger
                                            </a>
                                        @endif
                                        @if (!empty($store['facebook']))
                                            <a href="{{ $store['facebook'] }}" target="_blank" class="btn btn-outline-dark btn-sm px-3">
                                                <i class="fab fa-facebook mr-1"></i> Facebook
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
