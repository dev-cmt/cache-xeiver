@extends('layouts.master')

@section('title')
    Return Policy
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
                            <a href="javascript:void(0);">Return Policy</a>
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
                            <h4 class="font-weight-bold mb-4 border-bottom pb-2">রিটার্ন পলিসি</h4>
                            <div class="page-content" style="line-height: 1.8; color: #333;">
                                @if (!empty($content))
                                    {!! $content !!}
                                @elseif (!empty($data->return_policy))
                                    {!! $data->return_policy !!}
                                @else
                                    <p class="text-muted">কোনো তথ্য পাওয়া যায়নি।</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
