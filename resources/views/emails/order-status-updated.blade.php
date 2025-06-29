<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status Update - {{ $order->order_number }}</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f4f6fa;
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #222;
        }

        table {
            border-spacing: 0;
            border-collapse: collapse;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.07);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(90deg, #007bff 60%, #28a745 100%);
            color: #fff;
            text-align: center;
            padding: 36px 20px 24px 20px;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .main-title {
            font-size: 22px;
            margin: 0 0 8px 0;
            font-weight: 600;
        }

        .content {
            padding: 32px 24px 24px 24px;
        }

        .status-box {
            border-radius: 8px;
            padding: 24px 18px;
            text-align: center;
            margin-bottom: 24px;
            font-size: 18px;
            font-weight: 500;
        }

        .status-badge {
            display: inline-block;
            padding: 7px 18px;
            border-radius: 20px;
            font-size: 15px;
            font-weight: bold;
            margin: 12px 0 0 0;
            letter-spacing: 1px;
        }

        .status-confirmed {
            background: #e8f5e8;
            border: 1.5px solid #28a745;
            color: #28a745;
        }

        .status-processing {
            background: #fffbe6;
            border: 1.5px solid #ffc107;
            color: #b8860b;
        }

        .status-shipped {
            background: #e3f7fa;
            border: 1.5px solid #17a2b8;
            color: #138496;
        }

        .status-delivered {
            background: #e6f7ff;
            border: 1.5px solid #007bff;
            color: #007bff;
        }

        .status-completed {
            background: #f0f0f0;
            border: 1.5px solid #6c757d;
            color: #6c757d;
        }

        .status-cancelled {
            background: #fdeaea;
            border: 1.5px solid #dc3545;
            color: #dc3545;
        }

        .order-info-table {
            width: 100%;
            margin: 0 0 24px 0;
            background: #f8f9fa;
            border-radius: 6px;
            overflow: hidden;
        }

        .order-info-table td {
            padding: 10px 16px;
            font-size: 15px;
        }

        .order-info-table tr:not(:last-child) td {
            border-bottom: 1px solid #e3e3e3;
        }

        .timeline-table {
            width: 100%;
            margin: 0 0 24px 0;
        }

        .timeline-step {
            vertical-align: top;
            padding: 0 0 16px 0;
        }

        .timeline-circle {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: inline-block;
            text-align: center;
            line-height: 28px;
            font-weight: bold;
            font-size: 15px;
            margin-right: 10px;
        }

        .circle-active {
            background: #007bff;
            color: #fff;
        }

        .circle-completed {
            background: #28a745;
            color: #fff;
        }

        .circle-pending {
            background: #e3e3e3;
            color: #aaa;
        }

        .timeline-label {
            font-size: 15px;
            font-weight: 500;
        }

        .timeline-desc {
            font-size: 13px;
            color: #666;
        }

        .product-table {
            width: 100%;
            background: #f8f9fa;
            border-radius: 6px;
            margin-bottom: 24px;
        }

        .product-table th,
        .product-table td {
            padding: 10px 8px;
            font-size: 15px;
        }

        .product-table th {
            background: #f1f3f6;
            font-weight: 600;
            color: #007bff;
            border-bottom: 1px solid #e3e3e3;
        }

        .product-table tr:not(:last-child) td {
            border-bottom: 1px solid #e3e3e3;
        }

        .summary-table {
            width: 100%;
            margin-top: 10px;
        }

        .summary-table td {
            padding: 6px 0;
            font-size: 15px;
        }

        .summary-table .total {
            font-weight: bold;
            font-size: 17px;
            color: #007bff;
        }

        .tracking-box {
            background: #e3f7fa;
            border: 1px solid #bee5eb;
            border-radius: 6px;
            padding: 18px 16px;
            margin-bottom: 24px;
            font-size: 15px;
        }

        .next-steps-box {
            background: #f1f8e9;
            border: 1px solid #c8e6c9;
            border-radius: 6px;
            padding: 18px 16px;
            margin-bottom: 24px;
            font-size: 15px;
        }

        .footer {
            background: #f8f9fa;
            color: #888;
            text-align: center;
            font-size: 13px;
            padding: 24px 16px 16px 16px;
        }

        .button {
            display: inline-block;
            background: #007bff;
            color: #fff !important;
            padding: 12px 28px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            margin: 0 6px 10px 6px;
            font-size: 15px;
        }

        .button-green {
            background: #28a745 !important;
        }

        @media only screen and (max-width: 600px) {

            .container,
            .content,
            .header,
            .footer {
                padding-left: 8px !important;
                padding-right: 8px !important;
            }

            .content {
                padding: 18px 8px 12px 8px !important;
            }
        }

    </style>
</head>
<body>
    <table width="100%" bgcolor="#f4f6fa" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <table class="container" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="header">
                            <div class="logo">{{ config('app.name', 'RoluxeAccessories') }}</div>
                            <div class="main-title">Order Status Update</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="content">
                            <p style="font-size:16px; margin-bottom: 24px;">Dear <strong>{{ $user->name }}</strong>,</p>

                            <div class="status-box status-{{ $status }}">
                                <span style="font-size:20px;">Your Order
                                    @if(in_array($status, ['confirmed', 'shipped', 'delivered']))
                                    <span>
                                        Has Been
                                    </span>
                                    @else
                                    <span>
                                        Is Currently
                                    </span>
                                    @endif
                                    <strong>{{ ucfirst($status) }}</strong>!</span><br>
                                <span class="status-badge status-{{ $status }}">{{ ucfirst($status) }}</span>
                                <div style="margin-top: 12px; font-size:15px;">
                                    @if($status === 'confirmed')
                                    Great news! Your payment has been verified and your order is now confirmed. We're preparing your items for shipment.
                                    @elseif($status === 'processing')
                                    Your order is currently being processed. Our team is carefully preparing your items.
                                    @elseif($status === 'shipped')
                                    Excellent! Your order has been shipped and is on its way to you.
                                    @elseif($status === 'delivered')
                                    Your order has been delivered! We hope you love your new items.
                                    @elseif($status === 'completed')
                                    Your order is now complete. Thank you for choosing {{ config('app.name') }}!
                                    @elseif($status === 'cancelled')
                                    Your order has been cancelled. If you have any questions, please contact our customer service.
                                    @endif
                                </div>
                            </div>

                            <table class="order-info-table">
                                <tr>
                                    <td><strong>Order Number:</strong></td>
                                    <td>{{ $order->order_number }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Order Date:</strong></td>
                                    <td>{{ $order->created_at->format('F j, Y \a\t g:i A') }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Current Status:</strong></td>
                                    <td>
                                        <span class="status-badge status-{{ $status }}">{{ ucfirst($status) }}</span>
                                    </td>
                                </tr>
                                @if($order->tracking_number && in_array($status, ['shipped', 'delivered']))
                                <tr>
                                    <td><strong>Tracking Number:</strong></td>
                                    <td>{{ $order->tracking_number }}</td>
                                </tr>
                                @endif
                            </table>

                            <table class="timeline-table">
                                <tr>
                                    <td class="timeline-step">
                                        <span class="timeline-circle {{ $status === 'pending' ? 'circle-active' : 'circle-completed' }}">1</span>
                                    </td>
                                    <td>
                                        <span class="timeline-label">Order Placed</span><br>
                                        <span class="timeline-desc">{{ $order->created_at->format('M j, Y \a\t g:i A') }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="timeline-step">
                                        <span class="timeline-circle {{ $status === 'confirmed' ? 'circle-active' : ($status === 'pending' ? 'circle-pending' : 'circle-completed') }}">2</span>
                                    </td>
                                    <td>
                                        <span class="timeline-label">Order Confirmed</span><br>
                                        <span class="timeline-desc">Payment verified</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="timeline-step">
                                        <span class="timeline-circle {{ $status === 'processing' ? 'circle-active' : (in_array($status, ['pending', 'confirmed']) ? 'circle-pending' : 'circle-completed') }}">3</span>
                                    </td>
                                    <td>
                                        <span class="timeline-label">Processing</span><br>
                                        <span class="timeline-desc">Preparing your items</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="timeline-step">
                                        <span class="timeline-circle {{ $status === 'shipped' ? 'circle-active' : (in_array($status, ['pending', 'confirmed', 'processing']) ? 'circle-pending' : 'circle-completed') }}">4</span>
                                    </td>
                                    <td>
                                        <span class="timeline-label">Shipped</span><br>
                                        <span class="timeline-desc">On the way to you</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="timeline-step">
                                        <span class="timeline-circle {{ $status === 'delivered' ? 'circle-active' : (in_array($status, ['completed']) ? 'circle-completed' : 'circle-pending') }}">5</span>
                                    </td>
                                    <td>
                                        <span class="timeline-label">Delivered</span><br>
                                        <span class="timeline-desc">Package received</span>
                                    </td>
                                </tr>
                            </table>

                            @if($order->tracking_number && in_array($status, ['shipped', 'delivered']))
                            <div class="tracking-box">
                                <strong>Tracking Number:</strong> {{ $order->tracking_number }}<br>
                                You can track your package using the tracking number above with our delivery partner.
                            </div>
                            @endif

                            <table class="product-table">
                                <tr>
                                    <th align="left">Product</th>
                                    <th align="center">Qty</th>
                                    <th align="right">Total</th>
                                </tr>
                                @foreach($orderDetails as $item)
                                <tr>
                                    <td>
                                        <strong>{{ $item->product_name }}</strong>
                                        @if($item->product_size || $item->product_color)
                                        <br>
                                        <span style="font-size:13px; color:#666;">
                                            @if($item->product_size) Size: {{ $item->product_size }} @endif
                                            @if($item->product_size && $item->product_color) | @endif
                                            @if($item->product_color) Color: {{ $item->product_color }} @endif
                                        </span>
                                        @endif
                                    </td>
                                    <td align="center">{{ $item->quantity }}</td>
                                    <td align="right">₦{{ number_format($item->price * $item->quantity, 2) }}</td>
                                </tr>
                                @endforeach
                            </table>
                            <table class="summary-table">
                                <tr>
                                    <td align="left">Subtotal:</td>
                                    <td align="right">₦{{ number_format($order->total_amount, 2) }}</td>
                                </tr>
                                <tr>
                                    <td align="left">Shipping:</td>
                                    <td align="right">₦{{ number_format($order->shipping_cost, 2) }}</td>
                                </tr>
                                <tr>
                                    <td align="left" class="total">Total:</td>
                                    <td align="right" class="total">₦{{ number_format($order->getTotalAmountWithShipping(), 2) }}</td>
                                </tr>
                            </table>

                            @if($status === 'confirmed')
                            <div class="next-steps-box">
                                <strong>What's Next?</strong>
                                <ul style="margin: 10px 0 0 18px; padding: 0; font-size:15px;">
                                    <li>Your payment has been verified</li>
                                    <li>We're now preparing your items for shipment</li>
                                    <li>You'll receive another email when your order ships with tracking information</li>
                                    <li><strong>Estimated shipping time:</strong> 2-5 business days</li>
                                </ul>
                            </div>
                            @elseif($status === 'shipped')
                            <div class="next-steps-box">
                                <strong>Your Order Is On The Way!</strong>
                                <ul style="margin: 10px 0 0 18px; padding: 0; font-size:15px;">
                                    <li><strong>Shipping to:</strong> {{ $shippingAddress->city }}, {{ $shippingAddress->state }}</li>
                                    <li><strong>Estimated delivery:</strong> 2-5 business days</li>
                                    <li>Use the tracking number above to monitor your package</li>
                                    <li>Someone should be available to receive the package</li>
                                </ul>
                            </div>
                            @elseif($status === 'delivered')
                            <div class="next-steps-box">
                                <strong>Enjoy Your Purchase!</strong>
                                <ul style="margin: 10px 0 0 18px; padding: 0; font-size:15px;">
                                    <li>Your order has been successfully delivered</li>
                                    <li>We hope you love your new items from {{ config('app.name') }}</li>
                                    <li>Consider leaving a review to help other customers</li>
                                    <li>Check out our latest collections for more amazing products</li>
                                </ul>
                            </div>
                            @elseif($status === 'cancelled')
                            <div class="next-steps-box" style="background:#fdeaea; border-color:#f5c6cb;">
                                <strong>Order Cancelled</strong>
                                <ul style="margin: 10px 0 0 18px; padding: 0; font-size:15px;">
                                    <li>Your order has been cancelled as requested.</li>
                                    <li>If you paid for this order, your refund will be processed within 5-7 business days.</li>
                                    <li>If you have any questions, please contact our customer service team.</li>
                                </ul>
                            </div>
                            @endif

                            <div style="text-align: center; margin: 30px 0 0 0;">
                                @if($status === 'delivered')
                                <a href="{{config('app.name') . '/shop'}}" class="button">Shop Again</a>
                                @elseif(in_array($status, ['confirmed', 'processing', 'shipped']))
                                <a href="#" class="button">Contact Support</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="footer">
                            <p>Thank you for choosing {{ config('app.name', 'RoluxeAccessories') }}!</p>
                            <p>If you have any questions about your order, please don't hesitate to contact us.</p>
                            <p style="margin-top: 18px;">
                                <small>This is an automated email. Please do not reply to this email address.</small>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
