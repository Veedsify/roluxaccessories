<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Notification - {{ $order->order_number }}</title>
</head>
<body style="margin:0;padding:0;background:#f4f4f4;">
    <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#f4f4f4" style="font-family:Arial,sans-serif;">
        <tr>
            <td align="center">
                <table width="650" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="margin:30px 0;border-radius:8px;box-shadow:0 2px 10px rgba(0,0,0,0.07);overflow:hidden;">
                    <!-- Header -->
                    <tr>
                        <td bgcolor="#dc3545" style="padding:30px 0;text-align:center;">
                            <span style="font-size:28px;font-weight:bold;color:#fff;letter-spacing:2px;">
                                {{ config('app.name', 'RoluxeAccessories') }} Admin
                            </span>
                            <br>
                            <span style="font-size:20px;color:#fff;">
                                @if($type === 'new_order')
                                    🚨 New Order Alert
                                @elseif($type === 'payment_uploaded')
                                    💳 Payment Receipt Uploaded
                                @else
                                    📋 Order Update
                                @endif
                            </span>
                        </td>
                    </tr>
                    <!-- Alert Box -->
                    <tr>
                        <td align="center" style="padding:30px 20px 10px 20px;">
                            <table cellpadding="0" cellspacing="0" width="100%" style="max-width:500px;">
                                <tr>
                                    <td align="center" bgcolor="@if($type === 'new_order')#eafaf1 @elseif($type === 'payment_uploaded')#fffbe6 @else #eaf4fb @endif" style="border-radius:8px;padding:20px 10px;border:2px solid @if($type === 'new_order')#28a745 @elseif($type === 'payment_uploaded')#ffc107 @else #17a2b8 @endif;">
                                        <div style="font-size:44px;line-height:1.2;">
                                            @if($type === 'new_order')
                                                🛍️
                                            @elseif($type === 'payment_uploaded')
                                                💳
                                            @else
                                                📋
                                            @endif
                                        </div>
                                        <div style="font-size:20px;font-weight:bold;margin:10px 0;">
                                            @if($type === 'new_order')
                                                New Order Received!
                                            @elseif($type === 'payment_uploaded')
                                                Payment Receipt Uploaded!
                                            @else
                                                Order Status Updated!
                                            @endif
                                        </div>
                                        <div style="color:#555;font-size:15px;">
                                            @if($type === 'new_order')
                                                A new order has been placed and requires your attention.
                                            @elseif($type === 'payment_uploaded')
                                                Customer has uploaded a payment receipt for verification.
                                            @else
                                                An order status has been changed and customer has been notified.
                                            @endif
                                        </div>
                                        <div style="margin-top:12px;">
                                            <span style="display:inline-block;background:#dc3545;color:#fff;padding:4px 16px;border-radius:20px;font-size:12px;font-weight:bold;letter-spacing:1px;">
                                                Action Required
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Quick Stats -->
                    <tr>
                        <td align="center" style="padding:10px 20px 0 20px;">
                            <table cellpadding="0" cellspacing="0" width="100%" style="max-width:500px;">
                                <tr>
                                    <td align="center" style="padding:10px;">
                                        <table cellpadding="0" cellspacing="0" width="100%" style="background:#f8f9fa;border-radius:6px;">
                                            <tr>
                                                <td align="center" style="padding:18px 0;">
                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td align="center" style="width:33%;">
                                                                <div style="font-size:22px;font-weight:bold;color:#dc3545;">₦{{ number_format($order->getTotalAmountWithShipping(), 2) }}</div>
                                                                <div style="font-size:12px;color:#6c757d;text-transform:uppercase;">Order Total</div>
                                                            </td>
                                                            <td align="center" style="width:33%;">
                                                                <div style="font-size:22px;font-weight:bold;color:#28a745;">{{ $orderDetails->sum('quantity') }}</div>
                                                                <div style="font-size:12px;color:#6c757d;text-transform:uppercase;">Items</div>
                                                            </td>
                                                            <td align="center" style="width:33%;">
                                                                <div style="font-size:22px;font-weight:bold;color:#17a2b8;">{{ $order->created_at->diffForHumans() }}</div>
                                                                <div style="font-size:12px;color:#6c757d;text-transform:uppercase;">Time Ago</div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Order Details -->
                    <tr>
                        <td align="center" style="padding:20px;">
                            <table cellpadding="0" cellspacing="0" width="100%" style="max-width:500px;background:#f8f9fa;border-radius:6px;">
                                <tr>
                                    <td style="padding:18px;">
                                        <table width="100%">
                                            <tr>
                                                <td style="vertical-align:top;width:50%;">
                                                    <div style="font-size:15px;">
                                                        <strong>Order Number:</strong> {{ $order->order_number }}<br>
                                                        <strong>Status:</strong>
                                                        <span style="display:inline-block;background:#ffc107;color:#000;padding:3px 12px;border-radius:20px;font-size:12px;font-weight:bold;">
                                                            {{ ucfirst($order->status) }}
                                                        </span><br>
                                                        <strong>Payment Method:</strong> {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}<br>
                                                        <strong>Order Date:</strong> {{ $order->created_at->format('M j, Y \a\t g:i A') }}
                                                    </div>
                                                </td>
                                                <td style="vertical-align:top;width:50%;">
                                                    <div style="font-size:15px;">
                                                        <strong>Subtotal:</strong> ₦{{ number_format($order->total_amount, 2) }}<br>
                                                        <strong>Shipping:</strong> ₦{{ number_format($order->shipping_cost, 2) }}<br>
                                                        <strong>Total:</strong> ₦{{ number_format($order->getTotalAmountWithShipping(), 2) }}<br>
                                                        @if($order->tracking_number)
                                                            <strong>Tracking:</strong> {{ $order->tracking_number }}
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Customer Info -->
                    <tr>
                        <td align="center" style="padding:0 20px 20px 20px;">
                            <table cellpadding="0" cellspacing="0" width="100%" style="max-width:500px;background:#e3f2fd;border-left:4px solid #2196f3;border-radius:6px;">
                                <tr>
                                    <td style="padding:18px;">
                                        <table width="100%">
                                            <tr>
                                                <td style="vertical-align:top;width:50%;">
                                                    <div style="font-size:15px;">
                                                        <strong>Name:</strong> {{ $user->name }}
                                                        @if($user->is_guest ?? false)
                                                            <span style="background:#e74c3c;color:#fff;padding:2px 8px;border-radius:12px;font-size:10px;font-weight:bold;margin-left:4px;">GUEST</span>
                                                        @endif
                                                        <br>
                                                        <strong>Email:</strong> {{ $user->email }}<br>
                                                        @if($shippingAddress->phone_number)
                                                            <strong>Phone:</strong> {{ $shippingAddress->phone_number }}<br>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td style="vertical-align:top;width:50%;">
                                                    <div style="font-size:15px;">
                                                        <strong>Shipping Address:</strong><br>
                                                        {{ $shippingAddress->address_line1 }}<br>
                                                        {{ $shippingAddress->city }}, {{ $shippingAddress->state }}<br>
                                                        {{ $shippingAddress->postal_code }}<br>
                                                        {{ $shippingAddress->country }}
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Payment Receipt -->
                    @if($order->payment_receipt)
                    <tr>
                        <td align="center" style="padding:0 20px 20px 20px;">
                            <table cellpadding="0" cellspacing="0" width="100%" style="max-width:500px;background:#f0f8ff;border:1px solid #b3d9ff;border-radius:6px;">
                                <tr>
                                    <td style="padding:18px;">
                                        <div style="font-size:17px;font-weight:bold;margin-bottom:8px;">💳 Payment Receipt</div>
                                        <div style="font-size:14px;margin-bottom:6px;"><strong>Status:</strong> Uploaded - Awaiting Verification</div>
                                        <div style="font-size:14px;margin-bottom:6px;">
                                            <strong>File:</strong>
                                            <a href="{{ asset('storage/' . $order->payment_receipt) }}" target="_blank" style="color:#2196f3;text-decoration:underline;">View Receipt</a>
                                        </div>
                                        <div style="font-size:14px;margin-bottom:4px;"><strong>Bank Details Used:</strong></div>
                                        <div style="background:#fff;padding:10px;border-radius:4px;margin-top:6px;font-size:14px;">
                                            <strong>Wema Bank</strong><br>
                                            Account: Aseye Ronke Oluwagbemisola<br>
                                            Number: 0268105037<br>
                                            Sort Code: 035
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    @endif
                    <!-- Order Items -->
                    <tr>
                        <td align="center" style="padding:0 20px 20px 20px;">
                            <table cellpadding="0" cellspacing="0" width="100%" style="max-width:500px;">
                                <tr>
                                    <td>
                                        <div style="font-size:17px;font-weight:bold;margin-bottom:8px;">Order Items</div>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;">
                                            <thead>
                                                <tr style="background:#f8f9fa;">
                                                    <th align="left" style="padding:10px 6px;font-size:14px;border-bottom:1px solid #ddd;">Product</th>
                                                    <th align="left" style="padding:10px 6px;font-size:14px;border-bottom:1px solid #ddd;">Details</th>
                                                    <th align="center" style="padding:10px 6px;font-size:14px;border-bottom:1px solid #ddd;">Qty</th>
                                                    <th align="right" style="padding:10px 6px;font-size:14px;border-bottom:1px solid #ddd;">Price</th>
                                                    <th align="right" style="padding:10px 6px;font-size:14px;border-bottom:1px solid #ddd;">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orderDetails as $item)
                                                <tr>
                                                    <td style="padding:8px 6px;font-size:14px;"><strong>{{ $item->product_name }}</strong></td>
                                                    <td style="padding:8px 6px;font-size:14px;">
                                                        @if($item->product_size)
                                                            Size: {{ $item->product_size }}<br>
                                                        @endif
                                                        @if($item->product_color)
                                                            Color: {{ $item->product_color }}
                                                        @endif
                                                    </td>
                                                    <td align="center" style="padding:8px 6px;font-size:14px;">{{ $item->quantity }}</td>
                                                    <td align="right" style="padding:8px 6px;font-size:14px;">₦{{ number_format($item->price, 2) }}</td>
                                                    <td align="right" style="padding:8px 6px;font-size:14px;">₦{{ number_format($item->price * $item->quantity, 2) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Customer Notes -->
                    @if($order->notes)
                    <tr>
                        <td align="center" style="padding:0 20px 20px 20px;">
                            <table cellpadding="0" cellspacing="0" width="100%" style="max-width:500px;background:#f8f9fa;border-radius:6px;">
                                <tr>
                                    <td style="padding:18px;">
                                        <div style="font-size:16px;font-weight:bold;margin-bottom:6px;">Customer Notes</div>
                                        <div style="font-size:14px;color:#555;"><em>"{{ $order->notes }}"</em></div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    @endif
                    <!-- Action Buttons -->
                    <tr>
                        <td align="center" style="padding:0 20px 20px 20px;">
                            <table cellpadding="0" cellspacing="0" width="100%" style="max-width:500px;">
                                <tr>
                                    <td align="center" style="padding:18px 0;">
                                        <div style="font-size:16px;font-weight:bold;margin-bottom:10px;">🎯 Required Actions</div>
                                        @if($type === 'new_order' || $type === 'payment_uploaded')
                                            @if($order->payment_receipt)
                                                <a href="{{ asset('storage/' . $order->payment_receipt) }}" target="_blank" style="display:inline-block;background:#17a2b8;color:#fff;text-decoration:none;padding:10px 22px;border-radius:4px;font-weight:bold;margin:4px 6px;font-size:14px;">
                                                    📄 View Payment Receipt
                                                </a>
                                            @endif
                                            <a href="{{url('admin/orders/'.$order->id.'/edit')}}" style="display:inline-block;background:#28a745;color:#fff;text-decoration:none;padding:10px 22px;border-radius:4px;font-weight:bold;margin:4px 6px;font-size:14px;">
                                                ✅ Confirm Order
                                            </a>
                                            <a href="{{url('admin/orders')}}" style="display:inline-block;background:#dc3545;color:#fff;text-decoration:none;padding:10px 22px;border-radius:4px;font-weight:bold;margin:4px 6px;font-size:14px;">
                                                📋 Manage All Orders
                                            </a>
                                        @else
                                            <a href="{{url('admin/orders/'.$order->id)}}" style="display:inline-block;background:#17a2b8;color:#fff;text-decoration:none;padding:10px 22px;border-radius:4px;font-weight:bold;margin:4px 6px;font-size:14px;">
                                                👁️ View Order
                                            </a>
                                            <a href="/admin/orders" style="display:inline-block;background:#dc3545;color:#fff;text-decoration:none;padding:10px 22px;border-radius:4px;font-weight:bold;margin:4px 6px;font-size:14px;">
                                                📋 All Orders
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Next Steps -->
                    @if($type === 'new_order' || $type === 'payment_uploaded')
                    <tr>
                        <td align="center" style="padding:0 20px 20px 20px;">
                            <table cellpadding="0" cellspacing="0" width="100%" style="max-width:500px;background:#fffbe6;border:1px solid #ffeaa7;border-radius:6px;">
                                <tr>
                                    <td style="padding:18px;">
                                        <div style="font-size:16px;font-weight:bold;margin-bottom:8px;">⚡ Next Steps</div>
                                        <div style="font-size:14px;color:#555;">
                                            @if($order->payment_receipt)
                                                <div>1. ✅ <strong>Verify Payment:</strong> Check the uploaded receipt against bank records</div>
                                                <div>2. 📧 <strong>Confirm Order:</strong> Update status to "confirmed" to notify customer</div>
                                                <div>3. 📦 <strong>Process Items:</strong> Begin preparing items for shipment</div>
                                                <div>4. 🚚 <strong>Ship Order:</strong> Add tracking number when shipped</div>
                                            @else
                                                <div>1. 💳 <strong>Awaiting Payment:</strong> Customer needs to upload payment receipt</div>
                                                <div>2. 📞 <strong>Follow Up:</strong> Contact customer if payment is delayed</div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    @endif
                    <!-- Footer -->
                    <tr>
                        <td align="center" style="padding:30px 0 20px 0;">
                            <div style="font-size:14px;color:#666;">
                                <strong>{{ config('app.name', 'RoluxeAccessories') }} Admin Panel</strong><br>
                                This notification was sent to all admin users.<br>
                                <span style="margin-top:10px;display:inline-block;">
                                    <small>Login to the admin panel to take action on this order.</small>
                                </span>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
