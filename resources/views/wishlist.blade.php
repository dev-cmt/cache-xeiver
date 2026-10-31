@extends('frontEnd.layouts.master')

@section('title')
    Wishlist
@endsection
@section('style')
    <style>
        .custom-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            margin-top: 50px;
        }


        /* thead th {
                color: #555;
                font-weight: bold;
                padding: 10px;
                text-align: left;
                border-bottom: 1px solid #000;
            }



            tbody td {
                padding: 10px;
                border-bottom: 1px solid #eee;
            }

            tbody tr:last-child td {
                border-bottom: none;
            }

            tbody td:nth-child(2) {
                width: 80px;
            }



           */
        tbody td img {
            max-width: 100%;
            height: auto;
            display: block;
            border-radius: 4px;
        }

        tbody td:nth-child(2) {
            width: 80px;
        }
         thead th:nth-child(4),
            thead th:nth-child(5),
            thead th:nth-child(6) {
                text-align: center;
            }

        tbody td:nth-child(4),
        tbody td:nth-child(5),
        tbody td:nth-child(6) {
            text-align: center;
        }

        .add-to-cart {
            background-color: #333;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9em;
            transition: background-color 0.3s ease;
            width: 150px;
        }

        .add-to-cart:hover {
            background-color: #555;
        }

        .remove-item {
            background: none;
            border: none;
            color: #cc0000;
            cursor: pointer;
            font-size: 1.2em;
            padding: 5px;
            transition: color 0.3s ease;
        }

        .remove-item:hover {
            color: #ff3333;
        }

        /* Add a subtle hover effect to table rows */
        tbody tr:hover {
            background-color: #f9f9f9;
        }
    </style>
@endsection


@section('body')
    <div class="custom-container mb-5">
        @if ($products && count($products) > 0)
            <h2>WISHLIST</h2>
            <div class="table-responsive">
                <table id="wishlist-table" class="table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><img src="{{ $item->get_thumb ? $item->get_thumb->file_url : '' }}"
                                        alt="{{ $item->name }}">
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    <a href="{{ route('single.product', $item->slug) }}">
                                        <button class="add-to-cart">Add To Cart</button>
                                    </a>
                                </td>
                                <td>

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        onclick="removeFromWishlist({{ $item->id }})" fill="currentColor"
                                        class="icon icon-tabler icons-tabler-filled icon-tabler-trash">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z" />
                                        <path
                                            d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" />
                                    </svg>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h2>Empty Wishlist</h2>
        @endif
    </div>
@endsection
