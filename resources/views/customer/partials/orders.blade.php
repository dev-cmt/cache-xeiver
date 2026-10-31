@if ($orders->count() > 0)
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Invoice</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Discount</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key => $order)
                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <td>{{ $order->invoice_id }}</td>
                        <td>{{ $order->created_at->format('Y-m-d') }}</td>
                        <td>
                            <span
                                class="badge {{ $order->status == 0 ? 'bg-yellow' : '' }} {{ $order->status == 1 ? 'bg-lime' : '' }}{{ $order->status == 2 ? 'bg-success' : '' }}{{ $order->status == 3 ? 'bg-primary' : '' }}{{ $order->status == 4 ? 'bg-dark' : '' }}{{ $order->status == 5 ? 'bg-red' : '' }}{{ $order->status == 6 ? 'bg-warning' : '' }}{{ $order->status == 7 ? 'bg-azure' : '' }}{{ $order->status == 8 ? 'bg-cyan' : '' }}{{ $order->status == 9 ? 'bg-green' : '' }} {{ $order->status == 10 ? 'bg-danger' : '' }} btn-sm ">

                                @if ($order->status == 6 || $order->status == 2 || $order->status == 7 ||$order->status == 3  ||$order->status == 10)
                                    Processing
                                @endif
                                @if ($order->status == 0)
                                    Hold
                                @endif
                                @if ($order->status == 8 || $order->status == 9)
                                    On Delivery
                                @endif
                                @if ($order->status == 1)
                                    Delivered
                                @endif
                                @if ($order->status == 4)
                                    Cancelled
                                @endif
                                @if ($order->status == 5)
                                    Returned
                                @endif
                            </span>
                        </td>
                        <td>{{ $order->discount }}%</td>
                        <td>${{ $order->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p>No orders found.</p>
@endif
