<!DOCTYPE html>
<html>

<head>
    <title>Order Status Updated</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333333;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
        }

        .header,
        .footer {
            background-color: #000000;
            color: #ffffff;
            padding: 10px;
            text-align: center;
            border-radius: 10px;
        }

        .header {
            border-radius: 10px 10px 0 0;
        }

        .footer {
            border-radius: 0 0 10px 10px;
        }

        .item,
        .row {
            padding: 10px 0;
        }

        .col {
            padding: 0 4px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        .bold {
            font-weight: bold;
        }

        .heading {
            font-size: 1.2em;
            border-bottom: 1px solid #ddd;
            background-color: #f0f0f0;
            margin-bottom: 10px;
            margin-top: 20px;
            padding-left: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Order #{{ $order->invoice_number }}</h1>
        </div>

        <!-- Order Summary -->
        <div class="item bold heading">Order Summary</div>

        <div style="cler: both;">
            <div class="row" style="float: left; width: 50%;">
                <div class="col">Placed on: <span class="bold">{{ $order->created_at }}</span></div>
                <div class="col">Total: <span class="bold">{{ $order->total }}</span></div>
            </div>
            <div class="row" style="float: left; width: 50%;">
                <div class="col">Payment: {{ $order->payment_method }}</div>
                <div class="col">Order Status: <span class="bold">{{ $order->status }}</span></div>
            </div>
        </div>

        <!-- Shipping Information -->
        <div class="item bold heading" style="clear: both; margin-top: 20px;">Shipping Information</div>
        <div class="item">To: <strong>{{ $order->shipping_name }} ({{ $order->shipping_phone }})</strong></div>
        <div class="item">Address: {{ $order->shipping_address }}</div>
        <div class="item">Shipping: {{ $order->shipping_method }}</div>
        <!-- Product Table -->
        <table style="margin-bottom: 20px;">
            <thead>
                <tr>
                    <th>Product Name</th>
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
                        <td>{{ $detail->price }}</td>
                        <td>{{ $detail->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            <p>Thank you for shopping with us!</p>
        </div>
    </div>
</body>

</html>
