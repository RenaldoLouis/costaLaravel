<div class="row">
    <div class="order-summary col-md-6">
        <h3>Order Summary</h3>
        <p><strong>Order Status:</strong> {{ $order->status }}</p>
        <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
        <p><strong>Payment Status:</strong> {{ $order->payment_status }}</p>
        <p><strong>Total Payment:</strong> Rp{{ number_format($order->total, 2) }}</p>
    </div>

    <div class="shipping-info col-md-6">
        <h3>Shipping Information</h3>
        <p><strong>Name:</strong> {{ $order->shipping_name }}</p>
        <p><strong>Phone:</strong> {{ $order->shipping_phone }}</p>
        <p><strong>Address:</strong> {{ $order->shipping_address }}, {{ $order->shipping_postcode }}</p>
        <p><strong>Email:</strong> {{ $order->shipping_email }}</p>
    </div>
</div>

<div class="product-details mt-5">
    <h3>Product Details</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->details as $detail)
                <tr>
                    <td>{{ $detail->product->name }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>${{ number_format($detail->price, 2) }}</td>
                    <td>${{ number_format($detail->total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
