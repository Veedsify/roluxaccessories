<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - {{ $order->order_number }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .email-container {
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #007bff;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 10px;
        }
        .order-info {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 6px;
            margin: 20px 0;
        }
        .order-info h3 {
            margin-top: 0;
            color: #007bff;
        }
        .product-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .product-table th,
        .product-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .product-table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        .product-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
        }
        .total-section {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
        }
        .total-row {
            display: flex;
            justify-content: space-between;
            margin: 5px 0;
        }
        .total-row.final {
            font-weight: bold;
            font-size: 18px;
            border-top: 2px solid #007bff;
            padding-top: 10px;
            margin-top: 10px;
        }
        .address-section {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
        }
        .payment-info {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
        }
        .bank-details {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 4px;
            margin: 10px 0;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            color: #666;
            font-size: 14px;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 4px;
            margin: 10px 0;
        }
        .status-badge {
            background-color: #ffc107;
            color: #000;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="logo">{{ config('app.name', 'RoluxeAccessories') }}</div>
            <h2>Order Confirmation</h2>
        </div>

        <p>Dear {{ $user->name }},</p>

        <p>Thank you for your order! We've received your order and payment receipt. Our team will review your payment and confirm your order shortly.</p>

        <div class="order-info">
            <h3>Order Details</h3>
            <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
            <p><strong>Order Date:</strong> {{ $order->created_at->format('F j, Y \a\t g:i A') }}</p>
            <p><strong>Status:</strong> <span class="status-badge">{{ ucfirst($order->status) }}</span></p>
            <p><strong>Payment Method:</strong> Bank Transfer</p>
        </div>

        <h3>Items Ordered</h3>
        <table class="product-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Details</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderDetails as $item)
                <tr>
                    <td>
                        @if($item->product_image)
                            <img src="{{ asset('storage/' . $item->product_image) }}" alt="{{ $item->product_name }}" class="product-image">
                        @endif
                    </td>
                    <td>
                        <strong>{{ $item->product_name }}</strong><br>
                        @if($item->product_size)
                            <small>Size: {{ $item->product_size }}</small><br>
                        @endif
                        @if($item->product_color)
                            <small>Color: {{ $item->product_color }}</small>
                        @endif
                    </td>
                    <td>{{ $item->quantity }}</td>
                    <td>₦{{ number_format($item->product_price, 2) }}</td>
                    <td>₦{{ number_format($item->product_price * $item->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total-section">
            <div class="total-row">
                <span>Subtotal:</span>
                <span>₦{{ number_format($order->total_amount, 2) }}</span>
            </div>
            <div class="total-row">
                <span>Shipping ({{ $shippingAddress->state }}):</span>
                <span>₦{{ number_format($order->shipping_cost, 2) }}</span>
            </div>
            <div class="total-row final">
                <span>Total:</span>
                <span>₦{{ number_format($order->getTotalAmountWithShipping(), 2) }}</span>
            </div>
        </div>

        <div class="address-section">
            <h3>Shipping Address</h3>
            <p>
                {{ $shippingAddress->address_line1 }}<br>
                {{ $shippingAddress->city }}, {{ $shippingAddress->state }}<br>
                {{ $shippingAddress->postal_code }}<br>
                {{ $shippingAddress->country }}<br>
                @if($shippingAddress->phone_number)
                    Phone: {{ $shippingAddress->phone_number }}
                @endif
            </p>
        </div>

        <div class="payment-info">
            <h3>Payment Information</h3>
            <p><strong>Status:</strong> Payment receipt uploaded - Pending verification</p>
            <p>We have received your payment receipt and our team will verify the payment within 24 hours. You will receive a confirmation email once your payment is verified and your order is confirmed.</p>

            <div class="bank-details">
                <h4>Bank Details Used:</h4>
                <p>
                    <strong>Bank Name:</strong> Wema Bank<br>
                    <strong>Account Name:</strong> Aseye Ronke Oluwagbemisola<br>
                    <strong>Account Number:</strong> 0268105037<br>
                    <strong>Sort Code:</strong> 035
                </p>
            </div>
        </div>

        @if($order->notes)
        <div class="order-info">
            <h3>Order Notes</h3>
            <p>{{ $order->notes }}</p>
        </div>
        @endif

        <div style="text-align: center; margin: 30px 0;">
            <p>You can track your order status by contacting our customer service.</p>
        </div>

        <div class="footer">
            <p>Thank you for shopping with {{ config('app.name', 'RoluxeAccessories') }}!</p>
            <p>If you have any questions about your order, please contact us.</p>
            <p style="margin-top: 20px;">
                <small>This is an automated email. Please do not reply to this email address.</small>
            </p>
        </div>
    </div>
</body>
</html>
