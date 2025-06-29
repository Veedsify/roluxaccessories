<x-layouts.main :title="'Order Confirmation - ' . config('app.name')">
    <main>
        @livewire("components.top-nav")
        @livewire("components.nav-bar")

        <div class="order-confirmation-main">
            <div class="order-confirmation-content">
                <!-- Success Message -->
                <div class="order-success">
                    <div class="icon">
                        @if($order->status === 'cancelled')
                        <i class="ph ph-x-circle" style="font-size:3rem;color:#c00;"></i>
                        @elseif($order->status === 'delivered')
                        <i class="ph ph-star" style="font-size:3rem;"></i>
                        @elseif($order->status === 'shipped')
                        <i class="ph ph-truck" style="font-size:3rem;"></i>
                        @elseif($order->status === 'processing' || $order->status === 'pending')
                        <i class="ph ph-package" style="font-size:3rem;"></i>
                        @elseif($order->status === 'confirmed')
                        <i class="ph ph-check-circle" style="font-size:3rem;color:#10b981;"></i>
                        @elseif($order->status === 'payment_verified')
                        <i class="ph ph-check-circle" style="font-size:3rem;"></i>
                        @else
                        <i class="ph ph-check-circle" style="font-size:3rem;"></i>
                        @endif
                    </div>
                    <div class="heading2" style="margin-bottom:18px;">
                        @if($order->status === 'cancelled')
                        ❌ Order Cancelled
                        @elseif($order->status === 'delivered')
                        🎉 Order Delivered!
                        @elseif($order->status === 'shipped')
                        🚚 Order Shipped!
                        @elseif($order->status === 'processing' || $order->status === 'pending')
                        🛍️ Order Processing!
                        @elseif($order->status === 'confirmed')
                        ✅ Payment Confirmed!
                        @elseif($order->status === 'payment_verified')
                        ✅ Payment Verified!
                        @else
                        🎉 Order Placed Successfully!
                        @endif
                    </div>
                    <div class="subtitle">
                        @if($order->status === 'cancelled')
                        Your order was cancelled.
                        @if(!empty($order->notes))
                        <br><span style="color:#c00;font-weight:bold;">Reason: {{ $order->notes }}</span>
                        @endif
                        @elseif($order->status === 'delivered')
                        Your order has been delivered. Thank you for shopping with us!
                        @elseif($order->status === 'shipped')
                        Your order is on its way! You will receive it soon.
                        @elseif($order->status === 'processing' || $order->status === 'pending')
                        Your payment has been verified. We are now processing your order.
                        @elseif($order->status === 'confirmed')
                        Your payment has been confirmed and verified. We are now preparing your order for processing.
                        @elseif($order->status === 'payment_verified')
                        Your payment has been verified. We are now processing your order.
                        @else
                        Thank you for choosing us! We've received your payment receipt and our team will verify it within 24 hours.
                        @endif
                    </div>
                    <div class="order-number">Order #: {{ $order->order_number }}</div>
                    <div class="subtitle" style="font-size:1rem;margin-top:8px;">
                        Status: <span style="font-weight:bold;">{{ ucfirst(str_replace('_', ' ', $order->status)) }}</span>
                    </div>
                </div>

                <!-- Order Status Timeline -->
                <div class="status-timeline">
                    <div class="timeline-step">
                        <div class="step-icon active"><i class="ph ph-check"></i></div>
                        <div>
                            <div class="step-title">Order Placed</div>
                            <div class="step-desc">Your order has been successfully received</div>
                            <div class="step-status">✓ Completed</div>
                        </div>
                    </div>
                    <div class="timeline-step">
                        <div class="step-icon @if(in_array($order->status, ['confirmed','processing','shipped','delivered','pending'])) active @endif @if($order->status==='cancelled')" style="background:#c00;color:#fff;border:1px solid #c00;" @endif"><i class="ph ph-check-circle"></i></div>
                        <div>
                            <div class="step-title">Payment Confirmed</div>
                            <div class="step-desc">Your payment has been confirmed</div>
                            <div class="step-status @if(in_array($order->status,['confirmed','processing','shipped','delivered','pending']))" style="color:#10b981;" @elseif($order->status==='cancelled')" style="color:#c00;" @else in-progress @endif">
                                @if($order->status==='cancelled')
                                ✗ Cancelled
                                @elseif(in_array($order->status,['confirmed','processing','shipped','delivered']))
                                ✓ Completed
                                @else
                                🔄 In Progress
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="timeline-step">
                        <div class="step-icon @if(in_array($order->status, ['processing','shipped','delivered'])) active @endif @if($order->status==='cancelled')" style="background:#c00;color:#fff;border:1px solid #c00;" @endif"><i class="ph ph-package"></i></div>
                        <div>
                            <div class="step-title">Processing</div>
                            <div class="step-desc">Your order will be prepared</div>
                            <div class="step-status @if($order->status==='processing') in-progress @elseif(in_array($order->status,['shipped','delivered']))" style="color:#10b981;" @elseif($order->status==='cancelled')" style="color:#c00;" @else pending @endif">
                                @if($order->status==='cancelled')
                                ✗ Cancelled
                                @elseif($order->status==='processing')
                                🔄 In Progress
                                @elseif(in_array($order->status,['shipped','delivered']))
                                ✓ Completed
                                @else
                                ⏳ Pending
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="timeline-step">
                        <div class="step-icon @if(in_array($order->status, ['shipped','delivered'])) active @endif @if($order->status==='cancelled')" style="background:#c00;color:#fff;border:1px solid #c00;" @endif"><i class="ph ph-truck"></i></div>
                        <div>
                            <div class="step-title">Shipped</div>
                            <div class="step-desc">Your order will be on its way</div>
                            <div class="step-status @if($order->status==='shipped') in-progress @elseif($order->status==='delivered')" style="color:#10b981;" @elseif($order->status==='cancelled')" style="color:#c00;" @else pending @endif">
                                @if($order->status==='cancelled')
                                ✗ Cancelled
                                @elseif($order->status==='shipped')
                                🔄 In Progress
                                @elseif($order->status==='delivered')
                                ✓ Completed
                                @else
                                ⏳ Pending
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="timeline-step">
                        <div class="step-icon @if($order->status==='delivered') active @endif @if($order->status==='cancelled')" style="background:#c00;color:#fff;border:1px solid #c00;" @endif"><i class="ph ph-house"></i></div>
                        <div>
                            <div class="step-title">Delivered</div>
                            <div class="step-desc">Your order will be delivered</div>
                            <div class="step-status @if($order->status==='delivered')" style="color:#10b981;" @elseif($order->status==='cancelled')" style="color:#c00;" @else pending @endif">
                                @if($order->status==='cancelled')
                                ✗ Cancelled
                                @elseif($order->status==='delivered')
                                ✓ Completed
                                @else
                                ⏳ Pending
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Information -->
                @if($order->status === 'confirmed' || $order->status === 'processing')
                <div class="payment-info-box">
                    <div style="display:flex;align-items:flex-start;gap:24px;">
                        <div class="payment-icon"><i class="ph ph-check-circle"></i></div>
                        <div style="flex:1;">
                            <div class="step-title" style="color:#10b981;margin-bottom:8px;">Payment Confirmed</div>
                            <div class="step-desc" style="color:#10b981;margin-bottom:18px;">Your payment has been confirmed and verified. We are now processing your order.</div>
                        </div>
                    </div>
                </div>
                @elseif($order->status === 'pending')
                <div class="payment-info-box">
                    <div style="display:flex;align-items:flex-start;gap:24px;">
                        <div class="payment-icon" style="background:#f59e0b;"><i class="ph ph-clock"></i></div>
                        <div style="flex:1;">
                            <div class="step-title" style="color:#f59e0b;margin-bottom:8px;">Payment Under Review</div>
                            <div class="step-desc" style="color:#f59e0b;margin-bottom:18px;">Your payment receipt has been received and is being verified by our team.</div>
                        </div>
                    </div>
                </div>
                @elseif($order->status === 'payment_verified')
                <div class="payment-info-box">
                    <div style="display:flex;align-items:flex-start;gap:24px;">
                        <div class="payment-icon"><i class="ph ph-check-circle"></i></div>
                        <div style="flex:1;">
                            <div class="step-title" style="color:#10b981;margin-bottom:8px;">Payment Verified</div>
                            <div class="step-desc" style="color:#10b981;margin-bottom:18px;">Your payment has been verified. We are now processing your order.</div>
                        </div>
                    </div>
                </div>
                @elseif($order->status === 'cancelled')
                <div class="payment-info-box">
                    <div style="display:flex;align-items:flex-start;gap:24px;">
                        <div class="payment-icon" style="background:#c00;"><i class="ph ph-x-circle"></i></div>
                        <div style="flex:1;">
                            <div class="step-title" style="color:#c00;margin-bottom:8px;">Order Cancelled</div>
                            <div class="step-desc" style="color:#c00;margin-bottom:18px;">This order was cancelled and will not be processed. @if(!empty($order->notes))<br><span style="font-weight:bold;">Reason: {{ $order->notes }}</span>@endif</div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- What's Next -->
                <div class="whats-next-box">
                    <div class="step-title" style="color:#334155;margin-bottom:24px;display:flex;align-items:center;"><i class="ph ph-clock-clockwise" style="margin-right:12px;font-size:1.5rem;"></i>What happens next?</div>
                    @if($order->status === 'cancelled')
                    <div class="step">
                        <div class="step-number" style="background:#c00;">✗</div>
                        <div>
                            <div class="step-title">Order Cancelled</div>
                            <div class="step-desc">No further action will be taken. @if(!empty($order->notes))<br><span style="font-weight:bold;">Reason: {{ $order->notes }}</span>@endif</div>
                        </div>
                    </div>
                    @elseif($order->status === 'pending')
                    <div class="step">
                        <div class="step-number">1</div>
                        <div>
                            <div class="step-title">Payment Verification</div>
                            <div class="step-desc">Our team is verifying your payment receipt</div>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div>
                            <div class="step-title">Order Processing</div>
                            <div class="step-desc">Once verified, we'll start preparing your order</div>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <div>
                            <div class="step-title">Shipping & Delivery</div>
                            <div class="step-desc">Your order will be shipped and delivered to your address</div>
                        </div>
                    </div>
                    @elseif($order->status === 'confirmed' || $order->status === 'processing')
                    <div class="step">
                        <div class="step-number">1</div>
                        <div>
                            <div class="step-title">Order Processing</div>
                            <div class="step-desc">We're preparing your order for shipment</div>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div>
                            <div class="step-title">Shipping</div>
                            <div class="step-desc">You'll receive tracking information when your order ships</div>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <div>
                            <div class="step-title">Delivery</div>
                            <div class="step-desc">Your order will be delivered to your address</div>
                        </div>
                    </div>
                    @elseif($order->status === 'payment_verified')
                    <div class="step">
                        <div class="step-number">1</div>
                        <div>
                            <div class="step-title">Order Processing</div>
                            <div class="step-desc">We're preparing your order for shipment</div>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div>
                            <div class="step-title">Shipping</div>
                            <div class="step-desc">You'll receive tracking information when your order ships</div>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <div>
                            <div class="step-title">Delivery</div>
                            <div class="step-desc">Your order will be delivered to your address</div>
                        </div>
                    </div>
                    @elseif($order->status === 'processing')
                    <div class="step">
                        <div class="step-number">1</div>
                        <div>
                            <div class="step-title">Shipping</div>
                            <div class="step-desc">Your order will be shipped soon</div>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div>
                            <div class="step-title">Delivery</div>
                            <div class="step-desc">Your order will be delivered to your address</div>
                        </div>
                    </div>
                    @elseif($order->status === 'shipped')
                    <div class="step">
                        <div class="step-number">1</div>
                        <div>
                            <div class="step-title">Delivery</div>
                            <div class="step-desc">Your order is on its way and will be delivered soon</div>
                        </div>
                    </div>
                    @elseif($order->status === 'delivered')
                    <div class="step">
                        <div class="step-number">1</div>
                        <div>
                            <div class="step-title">Order Complete</div>
                            <div class="step-desc">Thank you for shopping with us! We hope you enjoy your purchase.</div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Contact Information -->
                <div class="contact-info-box">
                    <div class="step-title" style="color:#334155;margin-bottom:24px;display:flex;align-items:center;"><i class="ph ph-headset" style="margin-right:12px;font-size:1.5rem;"></i>Need Help?</div>
                    <div class="contact-methods">
                        <div class="contact-card">
                            <div class="contact-icon email"><i class="ph ph-envelope"></i></div>
                            <div class="contact-title">Email Support</div>
                            <div class="contact-detail">support@roluxeaccessories.com</div>
                            <div class="contact-note">Response within 2 hours</div>
                        </div>
                        <div class="contact-card">
                            <div class="contact-icon chat"><i class="ph ph-phone"></i></div>
                            <div class="contact-title">Phone Support</div>
                            <div class="contact-detail">+234 123 456 7890</div>
                            <div class="contact-note">9AM - 6PM (Mon-Fri)</div>
                        </div>
                        <div class="contact-card">
                            <div class="contact-icon phone"><i class="ph ph-chat-circle"></i></div>
                            <div class="contact-title">Whatsapp Chat</div>
                            <div class="contact-detail">Instant messaging</div>
                            <div class="contact-note">Available 9AM - 6PM</div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons">
                    <a href="/shop" class="action-btn"><i class="ph ph-shopping-bag" style="margin-right:10px;"></i>Continue Shopping</a>
                    <a href="/" class="action-btn home"><i class="ph ph-house" style="margin-right:10px;"></i>Back to Home</a>
                </div>
            </div>
        </div>

        @include('partials.footer')
    </main>
</x-layouts.main>
