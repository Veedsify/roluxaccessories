<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status Update - {{ $order->order_number }}</title>
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
        .status-update {
            background-color: #e8f5e8;
            border: 2px solid #28a745;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            margin: 30px 0;
        }
        .status-update.confirmed {
            background-color: #e8f5e8;
            border-color: #28a745;
        }
        .status-update.processing {
            background-color: #fff3cd;
            border-color: #ffc107;
        }
        .status-update.shipped {
            background-color: #d4edda;
            border-color: #17a2b8;
        }
        .status-update.delivered {
            background-color: #d1ecf1;
            border-color: #138496;
        }
        .status-update.completed {
            background-color: #e2e3e5;
            border-color: #6c757d;
        }
        .status-update.cancelled {
            background-color: #f8d7da;
            border-color: #dc3545;
        }
        .status-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 14px;
            margin: 10px 0;
        }
        .status-badge.pending {
            background-color: #ffc107;
            color: #000;
        }
        .status-badge.confirmed {
            background-color: #28a745;
            color: white;
        }
        .status-badge.processing {
            background-color: #fd7e14;
            color: white;
        }
        .status-badge.shipped {
            background-color: #17a2b8;
            color: white;
        }
        .status-badge.delivered {
            background-color: #138496;
            color: white;
        }
        .status-badge.completed {
            background-color: #6c757d;
            color: white;
        }
        .status-badge.cancelled {
            background-color: #dc3545;
            color: white;
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
        .timeline {
            margin: 30px 0;
        }
        .timeline-item {
            display: flex;
            align-items: center;
            margin: 15px 0;
            padding: 10px;
            border-radius: 4px;
        }
        .timeline-item.active {
            background-color: #e8f5e8;
            border-left: 4px solid #28a745;
        }
        .timeline-item.completed {
            background-color: #f8f9fa;
            border-left: 4px solid #6c757d;
        }
        .timeline-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-weight: bold;
            font-size: 12px;
        }
        .timeline-icon.completed {
            background-color: #28a745;
            color: white;
        }
        .timeline-icon.active {
            background-color: #007bff;
            color: white;
        }
        .timeline-icon.pending {
            background-color: #e9ecef;
            color: #6c757d;
        }
        .product-summary {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
        }
        .tracking-info {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            color: #666;
            font-size: 14px;
        }
        .next-steps {
            background-color: #d1ecf1;
            border: 1px solid #bee5eb;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 4px;
            margin: 10px 5px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="logo">{{ config('app.name', 'RoluxeAccessories') }}</div>
            <h2>Order Status Update</h2>
        </div>

        <p>Dear {{ $user->name }},</p>

        <div class="status-update {{ $status }}">
            <h2>Your Order Has Been {{ ucfirst($status) }}!</h2>
            <div class="status-badge {{ $status }}">{{ ucfirst($status) }}</div>

            @if($status === 'confirmed')
                <p>Great news! Your payment has been verified and your order is now confirmed. We're preparing your items for shipment.</p>
            @elseif($status === 'processing')
                <p>Your order is currently being processed. Our team is carefully preparing your items.</p>
            @elseif($status === 'shipped')
                <p>Excellent! Your order has been shipped and is on its way to you.</p>
            @elseif($status === 'delivered')
                <p>Your order has been delivered! We hope you love your new items.</p>
            @elseif($status === 'completed')
                <p>Your order is now complete. Thank you for choosing {{ config('app.name') }}!</p>
            @elseif($status === 'cancelled')
                <p>Your order has been cancelled. If you have any questions, please contact our customer service.</p>
            @endif
        </div>

        <div class="order-info">
            <h3>Order Details</h3>
            <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
            <p><strong>Order Date:</strong> {{ $order->created_at->format('F j, Y \a\t g:i A') }}</p>
            <p><strong>Current Status:</strong> <span class="status-badge {{ $status }}">{{ ucfirst($status) }}</span></p>
            @if($order->tracking_number && in_array($status, ['shipped', 'delivered']))
                <p><strong>Tracking Number:</strong> {{ $order->tracking_number }}</p>
            @endif
        </div>

        <div class="timeline">
            <h3>Order Timeline</h3>

            <div class="timeline-item {{ $status === 'pending' ? 'active' : 'completed' }}">
                <div class="timeline-icon {{ $status === 'pending' ? 'active' : 'completed' }}">1</div>
                <div>
                    <strong>Order Placed</strong><br>
                    <small>{{ $order->created_at->format('M j, Y \a\t g:i A') }}</small>
                </div>
            </div>

            <div class="timeline-item {{ $status === 'confirmed' ? 'active' : ($status === 'pending' ? 'pending' : 'completed') }}">
                <div class="timeline-icon {{ $status === 'confirmed' ? 'active' : ($status === 'pending' ? 'pending' : 'completed') }}">2</div>
                <div>
                    <strong>Order Confirmed</strong><br>
                    <small>Payment verified</small>
                </div>
            </div>

            <div class="timeline-item {{ $status === 'processing' ? 'active' : (in_array($status, ['pending', 'confirmed']) ? 'pending' : 'completed') }}">
                <div class="timeline-icon {{ $status === 'processing' ? 'active' : (in_array($status, ['pending', 'confirmed']) ? 'pending' : 'completed') }}">3</div>
                <div>
                    <strong>Processing</strong><br>
                    <small>Preparing your items</small>
                </div>
            </div>

            <div class="timeline-item {{ $status === 'shipped' ? 'active' : (in_array($status, ['pending', 'confirmed', 'processing']) ? 'pending' : 'completed') }}">
                <div class="timeline-icon {{ $status === 'shipped' ? 'active' : (in_array($status, ['pending', 'confirmed', 'processing']) ? 'pending' : 'completed') }}">4</div>
                <div>
                    <strong>Shipped</strong><br>
                    <small>On the way to you</small>
                </div>
            </div>

            <div class="timeline-item {{ $status === 'delivered' ? 'active' : (in_array($status, ['completed']) ? 'completed' : 'pending') }}">
                <div class="timeline-icon {{ $status === 'delivered' ? 'active' : (in_array($status, ['completed']) ? 'completed' : 'pending') }}">5</div>
                <div>
                    <strong>Delivered</strong><br>
                    <small>Package received</small>
                </div>
            </div>
        </div>

        @if($order->tracking_number && in_array($status, ['shipped', 'delivered']))
        <div class="tracking-info">
            <h3>Tracking Information</h3>
            <p><strong>Tracking Number:</strong> {{ $order->tracking_number }}</p>
            <p>You can track your package using the tracking number above with our delivery partner.</p>
        </div>
        @endif

        <div class="product-summary">
            <h3>Items in This Order ({{ $orderDetails->count() }} item{{ $orderDetails->count() > 1 ? 's' : '' }})</h3>
            @foreach($orderDetails as $item)
                <div style="border-bottom: 1px solid #dee2e6; padding: 10px 0; display: flex; justify-content: space-between;">
                    <div>
                        <strong>{{ $item->product_name }}</strong>
                        @if($item->product_size || $item->product_color)
                            <br><small>
                                @if($item->product_size) Size: {{ $item->product_size }} @endif
                                @if($item->product_size && $item->product_color) | @endif
                                @if($item->product_color) Color: {{ $item->product_color }} @endif
                            </small>
                        @endif
                    </div>
                    <div style="text-align: right;">
                        <div>Qty: {{ $item->quantity }}</div>
                        <div>₦{{ number_format($item->product_price * $item->quantity, 2) }}</div>
                    </div>
                </div>
            @endforeach

            <div style="margin-top: 15px; padding-top: 15px; border-top: 2px solid #007bff;">
                <div style="display: flex; justify-content: space-between; margin: 5px 0;">
                    <span>Subtotal:</span>
                    <span>₦{{ number_format($order->total_amount, 2) }}</span>
                </div>
                <div style="display: flex; justify-content: space-between; margin: 5px 0;">
                    <span>Shipping:</span>
                    <span>₦{{ number_format($order->shipping_cost, 2) }}</span>
                </div>
                <div style="display: flex; justify-content: space-between; margin: 10px 0; font-weight: bold; font-size: 18px;">
                    <span>Total:</span>
                    <span>₦{{ number_format($order->getTotalAmountWithShipping(), 2) }}</span>
                </div>
            </div>
        </div>

        @if($status === 'confirmed')
        <div class="next-steps">
            <h3>What's Next?</h3>
            <p>✅ Your payment has been verified</p>
            <p>📦 We're now preparing your items for shipment</p>
            <p>🚚 You'll receive another email when your order ships with tracking information</p>
            <p><strong>Estimated shipping time:</strong> 2-5 business days</p>
        </div>
        @elseif($status === 'shipped')
        <div class="next-steps">
            <h3>Your Order Is On The Way!</h3>
            <p>📍 <strong>Shipping to:</strong> {{ $shippingAddress->city }}, {{ $shippingAddress->state }}</p>
            <p>⏰ <strong>Estimated delivery:</strong> 2-5 business days</p>
            <p>📱 Use the tracking number above to monitor your package</p>
            <p>💡 Someone should be available to receive the package</p>
        </div>
        @elseif($status === 'delivered')
        <div class="next-steps">
            <h3>Enjoy Your Purchase!</h3>
            <p>🎉 Your order has been successfully delivered</p>
            <p>❤️ We hope you love your new items from {{ config('app.name') }}</p>
            <p>⭐ Consider leaving a review to help other customers</p>
            <p>🛍️ Check out our latest collections for more amazing products</p>
        </div>
        @elseif($status === 'cancelled')
        <div class="next-steps">
            <h3>Order Cancelled</h3>
            <p>Your order has been cancelled as requested.</p>
            <p>If you paid for this order, your refund will be processed within 5-7 business days.</p>
            <p>If you have any questions, please contact our customer service team.</p>
        </div>
        @endif

        <div style="text-align: center; margin: 30px 0;">
            @if($status === 'delivered')
                <a href="#" class="button">Shop Again</a>
                <a href="#" class="button" style="background-color: #28a745;">Leave a Review</a>
            @elseif(in_array($status, ['confirmed', 'processing', 'shipped']))
                <a href="#" class="button">Contact Support</a>
            @endif
        </div>

        <div class="footer">
            <p>Thank you for choosing {{ config('app.name', 'RoluxeAccessories') }}!</p>
            <p>If you have any questions about your order, please don't hesitate to contact us.</p>
            <p style="margin-top: 20px;">
                <small>This is an automated email. Please do not reply to this email address.</small>
            </p>
        </div>
    </div>
</body>
</html>
