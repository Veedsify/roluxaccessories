<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - {{ $order->order_number }}</title>
</head>
<body style="margin:0; padding:0; background:#f4f4f4;">
    <table width="100%" bgcolor="#f4f4f4" cellpadding="0" cellspacing="0" style="font-family:Arial,sans-serif;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="margin:40px 0; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.07); overflow:hidden;">
                    <!-- Header -->
                    <tr>
                        <td bgcolor="#007bff" style="padding:30px 0; text-align:center;">
                            <span style="font-size:28px; font-weight:bold; color:#fff; letter-spacing:1px;">
                                {{ config('app.name', 'RoluxeAccessories') }}
                            </span>
                            <div style="font-size:18px; color:#fff; margin-top:8px;">Order Confirmation</div>
                        </td>
                    </tr>
                    <!-- Greeting -->
                    <tr>
                        <td style="padding:32px 40px 0 40px; color:#333;">
                            <p style="margin:0 0 16px 0; font-size:16px;">Dear <strong>{{ $user->name }}</strong>,</p>
                            <p style="margin:0 0 16px 0; font-size:15px;">
                                Thank you for your order! We've received your order and payment receipt. Our team will review your payment and confirm your order shortly.
                            </p>
                        </td>
                    </tr>
                    <!-- Order Details -->
                    <tr>
                        <td style="padding:0 40px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="background:#f8f9fa; border-radius:6px; margin:24px 0 0 0;">
                                <tr>
                                    <td style="padding:20px;">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="font-size:16px; color:#007bff; font-weight:bold;" colspan="2">Order Details</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:8px 0; font-size:14px; color:#333;">Order Number:</td>
                                                <td style="padding:8px 0; font-size:14px; color:#333;">{{ $order->order_number }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:8px 0; font-size:14px; color:#333;">Order Date:</td>
                                                <td style="padding:8px 0; font-size:14px; color:#333;">{{ $order->created_at->format('F j, Y \a\t g:i A') }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:8px 0; font-size:14px; color:#333;">Status:</td>
                                                <td style="padding:8px 0;">
                                                    <span style="background:#ffc107; color:#000; padding:4px 14px; border-radius:20px; font-size:12px; font-weight:bold;">
                                                        {{ ucfirst($order->status) }}
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:8px 0; font-size:14px; color:#333;">Payment Method:</td>
                                                <td style="padding:8px 0; font-size:14px; color:#333;">Bank Transfer</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Items Ordered -->
                    <tr>
                        <td style="padding:32px 40px 0 40px;">
                            <div style="font-size:16px; color:#007bff; font-weight:bold; margin-bottom:8px;">Items Ordered</div>
                            <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                                <thead>
                                    <tr>
                                        <th align="left" style="padding:10px 6px; background:#f8f9fa; border-bottom:2px solid #e9ecef; font-size:14px;">Product</th>
                                        <th align="left" style="padding:10px 6px; background:#f8f9fa; border-bottom:2px solid #e9ecef; font-size:14px;">Details</th>
                                        <th align="center" style="padding:10px 6px; background:#f8f9fa; border-bottom:2px solid #e9ecef; font-size:14px;">Qty</th>
                                        <th align="right" style="padding:10px 6px; background:#f8f9fa; border-bottom:2px solid #e9ecef; font-size:14px;">Price</th>
                                        <th align="right" style="padding:10px 6px; background:#f8f9fa; border-bottom:2px solid #e9ecef; font-size:14px;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orderDetails as $item)
                                    <tr>
                                        <td style="padding:10px 6px; border-bottom:1px solid #e9ecef;">
                                            @if($item->product_image)
                                                <img src="{{ asset('storage/' . $item->product_image) }}" alt="{{ $item->product_name }}" width="48" height="48" style="border-radius:4px; object-fit:cover; display:block;">
                                            @endif
                                        </td>
                                        <td style="padding:10px 6px; border-bottom:1px solid #e9ecef; font-size:14px;">
                                            <strong>{{ $item->product_name }}</strong><br>
                                            @if($item->product_size)
                                                <span style="color:#888;">Size: {{ $item->product_size }}</span><br>
                                            @endif
                                            @if($item->product_color)
                                                <span style="color:#888;">Color: {{ $item->product_color }}</span>
                                            @endif
                                        </td>
                                        <td align="center" style="padding:10px 6px; border-bottom:1px solid #e9ecef; font-size:14px;">{{ $item->quantity }}</td>
                                        <td align="right" style="padding:10px 6px; border-bottom:1px solid #e9ecef; font-size:14px;">₦{{ number_format($item->product_price, 2) }}</td>
                                        <td align="right" style="padding:10px 6px; border-bottom:1px solid #e9ecef; font-size:14px;">₦{{ number_format($item->product_price * $item->quantity, 2) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <!-- Totals -->
                    <tr>
                        <td style="padding:0 40px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="margin:24px 0 0 0; background:#f8f9fa; border-radius:6px;">
                                <tr>
                                    <td style="padding:16px 20px;">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="font-size:14px; color:#333;">Subtotal:</td>
                                                <td align="right" style="font-size:14px; color:#333;">₦{{ number_format($order->total_amount, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:14px; color:#333;">Shipping ({{ $shippingAddress->state }}):</td>
                                                <td align="right" style="font-size:14px; color:#333;">₦{{ number_format($order->shipping_cost, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:16px; color:#007bff; font-weight:bold; padding-top:10px; border-top:2px solid #007bff;">Total:</td>
                                                <td align="right" style="font-size:16px; color:#007bff; font-weight:bold; padding-top:10px; border-top:2px solid #007bff;">
                                                    ₦{{ number_format($order->getTotalAmountWithShipping(), 2) }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Shipping Address -->
                    <tr>
                        <td style="padding:0 40px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="margin:24px 0 0 0; background:#f8f9fa; border-radius:6px;">
                                <tr>
                                    <td style="padding:16px 20px;">
                                        <div style="font-size:15px; color:#007bff; font-weight:bold; margin-bottom:6px;">Shipping Address</div>
                                        <div style="font-size:14px; color:#333;">
                                            {{ $shippingAddress->address_line1 }}<br>
                                            {{ $shippingAddress->city }}, {{ $shippingAddress->state }}<br>
                                            {{ $shippingAddress->postal_code }}<br>
                                            {{ $shippingAddress->country }}<br>
                                            @if($shippingAddress->phone_number)
                                                <span style="color:#888;">Phone: {{ $shippingAddress->phone_number }}</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Payment Info -->
                    <tr>
                        <td style="padding:0 40px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="margin:24px 0 0 0; background:#fffbe6; border:1px solid #ffeaa7; border-radius:6px;">
                                <tr>
                                    <td style="padding:16px 20px;">
                                        <div style="font-size:15px; color:#856404; font-weight:bold; margin-bottom:6px;">Payment Information</div>
                                        <div style="font-size:14px; color:#856404;">
                                            <strong>Status:</strong> Payment receipt uploaded - Pending verification<br>
                                            We have received your payment receipt and our team will verify the payment within 24 hours. You will receive a confirmation email once your payment is verified and your order is confirmed.
                                        </div>
                                        <div style="background:#e9ecef; border-radius:4px; padding:12px 14px; margin-top:14px;">
                                            <div style="font-size:14px; color:#333; font-weight:bold; margin-bottom:4px;">Bank Details Used:</div>
                                            <div style="font-size:13px; color:#333;">
                                                <strong>Bank Name:</strong> Wema Bank<br>
                                                <strong>Account Name:</strong> Aseye Ronke Oluwagbemisola<br>
                                                <strong>Account Number:</strong> 0268105037<br>
                                                <strong>Sort Code:</strong> 035
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Order Notes -->
                    @if($order->notes)
                    <tr>
                        <td style="padding:0 40px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="margin:24px 0 0 0; background:#f8f9fa; border-radius:6px;">
                                <tr>
                                    <td style="padding:16px 20px;">
                                        <div style="font-size:15px; color:#007bff; font-weight:bold; margin-bottom:6px;">Order Notes</div>
                                        <div style="font-size:14px; color:#333;">{{ $order->notes }}</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    @endif
                    <!-- Track Order -->
                    <tr>
                        <td style="padding:32px 40px 0 40px; text-align:center;">
                            <p style="font-size:15px; color:#333; margin:0;">
                                You can track your order status by contacting our customer service.
                            </p>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td style="padding:32px 40px 24px 40px; text-align:center; color:#888; font-size:13px; border-top:1px solid #e9ecef;">
                            <p style="margin:0 0 8px 0;">Thank you for shopping with <strong>{{ config('app.name', 'RoluxeAccessories') }}</strong>!</p>
                            <p style="margin:0 0 8px 0;">If you have any questions about your order, please contact us.</p>
                            <p style="margin:20px 0 0 0;">
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
