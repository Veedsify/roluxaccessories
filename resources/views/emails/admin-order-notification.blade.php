<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Notification - {{ $order->order_number }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 650px;
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
            border-bottom: 2px solid #dc3545;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #dc3545;
            margin-bottom: 10px;
        }
        .alert-box {
            background-color: #f8d7da;
            border: 2px solid #dc3545;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            margin: 20px 0;
        }
        .alert-box.new-order {
            background-color: #d4edda;
            border-color: #28a745;
        }
        .alert-box.payment-uploaded {
            background-color: #fff3cd;
            border-color: #ffc107;
        }
        .alert-icon {
            font-size: 48px;
            margin-bottom: 10px;
        }
        .new-order .alert-icon {
            color: #28a745;
        }
        .payment-uploaded .alert-icon {
            color: #ffc107;
        }
        .order-updated .alert-icon {
            color: #17a2b8;
        }
        .order-info {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 6px;
            margin: 20px 0;
        }
        .order-info h3 {
            margin-top: 0;
            color: #dc3545;
        }
        .quick-stats {
            display: flex;
            justify-content: space-around;
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 6px;
            margin: 20px 0;
            flex-wrap: wrap;
        }
        .stat-item {
            text-align: center;
            margin: 10px;
        }
        .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: #dc3545;
        }
        .stat-label {
            font-size: 12px;
            color: #6c757d;
            text-transform: uppercase;
        }
        .customer-info {
            background-color: #e3f2fd;
            border-left: 4px solid #2196f3;
            padding: 15px;
            margin: 20px 0;
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
        .payment-section {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
        }
        .action-buttons {
            text-align: center;
            margin: 30px 0;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            margin: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            font-size: 14px;
        }
        .button.primary {
            background-color: #dc3545;
            color: white;
        }
        .button.success {
            background-color: #28a745;
            color: white;
        }
        .button.info {
            background-color: #17a2b8;
            color: white;
        }
        .priority-indicator {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
        .priority-high {
            background-color: #dc3545;
            color: white;
        }
        .priority-medium {
            background-color: #ffc107;
            color: #000;
        }
        .priority-low {
            background-color: #28a745;
            color: white;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            color: #666;
            font-size: 14px;
        }
        .receipt-info {
            background-color: #f0f8ff;
            border: 1px solid #b3d9ff;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            background-color: #ffc107;
            color: #000;
        }
        .guest-indicator {
            background-color: #e74c3c;
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="logo">{{ config('app.name', 'RoluxeAccessories') }} Admin</div>
            <h2>
                @if($type === 'new_order')
                    🚨 New Order Alert
                @elseif($type === 'payment_uploaded')
                    💳 Payment Receipt Uploaded
                @else
                    📋 Order Update
                @endif
            </h2>
        </div>

        <div class="alert-box {{ $type }}">
            <div class="alert-icon">
                @if($type === 'new_order')
                    🛍️
                @elseif($type === 'payment_uploaded')
                    💳
                @else
                    📋
                @endif
            </div>

            @if($type === 'new_order')
                <h3>New Order Received!</h3>
                <p>A new order has been placed and requires your attention.</p>
            @elseif($type === 'payment_uploaded')
                <h3>Payment Receipt Uploaded!</h3>
                <p>Customer has uploaded a payment receipt for verification.</p>
            @else
                <h3>Order Status Updated!</h3>
                <p>An order status has been changed and customer has been notified.</p>
            @endif

            <div class="priority-indicator priority-high">Action Required</div>
        </div>

        <div class="quick-stats">
            <div class="stat-item">
                <div class="stat-value">₦{{ number_format($order->getTotalAmountWithShipping(), 2) }}</div>
                <div class="stat-label">Order Total</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">{{ $orderDetails->sum('quantity') }}</div>
                <div class="stat-label">Items</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">{{ $order->created_at->diffForHumans() }}</div>
                <div class="stat-label">Time Ago</div>
            </div>
        </div>

        <div class="order-info">
            <h3>Order Details</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                    <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
                    <p><strong>Status:</strong> <span class="status-badge">{{ ucfirst($order->status) }}</span></p>
                    <p><strong>Payment Method:</strong> {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</p>
                    <p><strong>Order Date:</strong> {{ $order->created_at->format('M j, Y \a\t g:i A') }}</p>
                </div>
                <div>
                    <p><strong>Subtotal:</strong> ₦{{ number_format($order->total_amount, 2) }}</p>
                    <p><strong>Shipping:</strong> ₦{{ number_format($order->shipping_cost, 2) }}</p>
                    <p><strong>Total:</strong> ₦{{ number_format($order->getTotalAmountWithShipping(), 2) }}</p>
                    @if($order->tracking_number)
                        <p><strong>Tracking:</strong> {{ $order->tracking_number }}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="customer-info">
            <h3>Customer Information</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                    <p><strong>Name:</strong> {{ $user->name }}
                        @if($user->is_guest ?? false)
                            <span class="guest-indicator">GUEST</span>
                        @endif
                    </p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    @if($shippingAddress->phone_number)
                        <p><strong>Phone:</strong> {{ $shippingAddress->phone_number }}</p>
                    @endif
                </div>
                <div>
                    <p><strong>Shipping Address:</strong></p>
                    <p style="margin: 0; line-height: 1.4;">
                        {{ $shippingAddress->address_line1 }}<br>
                        {{ $shippingAddress->city }}, {{ $shippingAddress->state }}<br>
                        {{ $shippingAddress->postal_code }}<br>
                        {{ $shippingAddress->country }}
                    </p>
                </div>
            </div>
        </div>

        @if($order->payment_receipt)
        <div class="receipt-info">
            <h3>💳 Payment Receipt</h3>
            <p><strong>Status:</strong> Uploaded - Awaiting Verification</p>
            <p><strong>File:</strong> <a href="{{ asset('storage/' . $order->payment_receipt) }}" target="_blank">View Receipt</a></p>
            <p><strong>Bank Details Used:</strong></p>
            <div style="background-color: white; padding: 10px; border-radius: 4px; margin-top: 10px;">
                <strong>Wema Bank</strong><br>
                Account: Aseye Ronke Oluwagbemisola<br>
                Number: 0268105037<br>
                Sort Code: 035
            </div>
        </div>
        @endif

        <h3>Order Items</h3>
        <table class="product-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Details</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderDetails as $item)
                <tr>
                    <td><strong>{{ $item->product_name }}</strong></td>
                    <td>
                        @if($item->product_size)
                            Size: {{ $item->product_size }}<br>
                        @endif
                        @if($item->product_color)
                            Color: {{ $item->product_color }}
                        @endif
                    </td>
                    <td>{{ $item->quantity }}</td>
                    <td>₦{{ number_format($item->product_price, 2) }}</td>
                    <td>₦{{ number_format($item->product_price * $item->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if($order->notes)
        <div class="order-info">
            <h3>Customer Notes</h3>
            <p><em>"{{ $order->notes }}"</em></p>
        </div>
        @endif

        <div class="action-buttons">
            <h3>🎯 Required Actions</h3>

            @if($type === 'new_order' || $type === 'payment_uploaded')
                @if($order->payment_receipt)
                    <a href="{{ asset('storage/' . $order->payment_receipt) }}" class="button info" target="_blank">
                        📄 View Payment Receipt
                    </a>
                @endif

                <a href="/admin/orders/{{ $order->id }}/edit" class="button success">
                    ✅ Confirm Order
                </a>

                <a href="/admin/orders" class="button primary">
                    📋 Manage All Orders
                </a>
            @else
                <a href="/admin/orders/{{ $order->id }}" class="button info">
                    👁️ View Order
                </a>

                <a href="/admin/orders" class="button primary">
                    📋 All Orders
                </a>
            @endif
        </div>

        @if($type === 'new_order' || $type === 'payment_uploaded')
        <div class="payment-section">
            <h3>⚡ Next Steps</h3>
            @if($order->payment_receipt)
                <p>1. ✅ <strong>Verify Payment:</strong> Check the uploaded receipt against bank records</p>
                <p>2. 📧 <strong>Confirm Order:</strong> Update status to "confirmed" to notify customer</p>
                <p>3. 📦 <strong>Process Items:</strong> Begin preparing items for shipment</p>
                <p>4. 🚚 <strong>Ship Order:</strong> Add tracking number when shipped</p>
            @else
                <p>1. 💳 <strong>Awaiting Payment:</strong> Customer needs to upload payment receipt</p>
                <p>2. 📞 <strong>Follow Up:</strong> Contact customer if payment is delayed</p>
            @endif
        </div>
        @endif

        <div class="footer">
            <p><strong>{{ config('app.name', 'RoluxeAccessories') }} Admin Panel</strong></p>
            <p>This notification was sent to all admin users.</p>
            <p style="margin-top: 20px;">
                <small>Login to the admin panel to take action on this order.</small>
            </p>
        </div>
    </div>
</body>
</html>
