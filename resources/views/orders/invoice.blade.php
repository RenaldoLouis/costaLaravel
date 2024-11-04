<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice #{{ $order->invoice_number }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
            position: relative;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .invoice-header {
            background-color: #f8f8f8;
            padding: 10px 0;
            text-align: center;
        }

        .invoice-body {
            padding: 15px;
        }

        .invoice-footer {
            text-align: center;
            padding: 10px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #eee;
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-20deg);
            opacity: 0.2;
            font-size: 80px;
            color: #000;
            border: 2px dashed #000;
            padding: 20px;
            white-space: nowrap;
            z-index: -1;
        }

        .paid {
            color: green;
        }
    </style>
</head>

<body>
    <div class="watermark {{ $order->payment_status === 'paid' ? 'paid' : '' }}">
        {{ strtoupper($order->payment_status) }}
    </div>
    <div class="container">
        <div class="invoice-header">
            <h1>Invoice</h1>
            <strong>Order #{{ $order->invoice_number }}</strong>
        </div>

        <div class="invoice-body">
            <h3>Order Details</h3>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th style="text-align:right">Price</th>
                        <th style="text-align:right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->details as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td style="text-align:right">Rp {{ number_format($item->price, 0) }}</td>
                            <td style="text-align:right">Rp {{ number_format($item->price * $item->quantity, 0) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="3">Subtotal</th>
                        <td style="text-align:right">Rp {{ number_format($order->total, 0) }}</td>
                    </tr>
                    <tr class="shipping">
                        <td colspan="3">Shipping Cost - {{ $order->shipping_method }}</td>
                        <td style="text-align:right">Rp {{ number_format($order->shipping_cost) }}</td>
                    </tr>
                    <tr>
                        <th colspan="3">Total to be Paid (Including Unique Code)</th>
                        <td style="text-align:right">Rp
                            {{ number_format($order->total + $order->shipping_cost + (int) substr($order->invoice_number, -3), 0) }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <hr />

            <h3>Billing Information</h3>
            <p>Name: {{ $order->shipping_name }}</p>
            <p>Address: {{ $order->shipping_address }}</p>
            <p>Email: {{ $order->shipping_email }}</p>
            <p>Phone: {{ $order->shipping_phone }}</p>

            @if ($order->payment_status === 'unpaid')
                <hr />
                <h3>Payment Information</h3>
                <p>Please make your payment to the following bank account:</p>
                <ul>
                    <li>Bank Mandiri: 130-00-1234567-8 (Fandi)</li>
                    <li>Bank Central Asia (BCA): 880-123-4567 (Fandi)</li>
                    <!-- Add other bank information if needed -->
                </ul>
                <p>
                    The total amount you need to transfer is
                    <strong>Rp
                        {{ number_format($order->total + (int) substr($order->invoice_number, -3), 2) }}</strong>.
                    This includes the unique code
                    <strong>{{ substr($order->invoice_number, -3) }}</strong>
                    for easy identification of your payment.
                </p>
            @endif
            <p>Please check your email regularly for further notifications regarding your order status,
                like shipping information and tracking number.</p>

        </div>

        <div class="invoice-footer">
            <p>Thank you for your business!</p>
        </div>
    </div>
</body>

</html>
