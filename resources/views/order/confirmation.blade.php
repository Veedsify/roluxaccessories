<x-layouts.main :title="'Order Confirmation - ' . config('app.name')">
    <main>
        @livewire("components.top-nav")
        @livewire("components.nav-bar")

        <div class="breadcrumb-block style-shared">
            <div class="breadcrumb-main bg-linear overflow-hidden">
                <div class="container lg:pt-[134px] pt-24 pb-10 relative">
                    <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                        <div class="text-content">
                            <div class="heading2 text-center">Order Confirmation</div>
                            <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                                <a href="/">Homepage</a>
                                <i class="ph ph-caret-right text-sm text-secondary2"></i>
                                <div class="text-secondary2 capitalize">Order Confirmation</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="order-confirmation-block md:py-20 py-10">
            <div class="container">
                <div class="content-main max-w-4xl mx-auto">
                    <!-- Success Message -->
                    <div class="success-message text-center mb-12">
                        <div class="success-icon mb-6">
                            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto">
                                <i class="ph ph-check-circle text-4xl text-green-600"></i>
                            </div>
                        </div>
                        <div class="heading3 text-green-600 mb-4">Order Placed Successfully!</div>
                        <p class="text-secondary2 text-lg">
                            Thank you for your order. We have received your payment receipt and will verify it within 24 hours.
                        </p>
                        <div class="order-number mt-4">
                            <span class="text-title">Order Number: </span>
                            <span class="heading6 text-blue-600">{{ $orderNumber }}</span>
                        </div>
                    </div>

                    <!-- Order Status Timeline -->
                    <div class="status-timeline bg-surface rounded-lg p-8 mb-8">
                        <div class="heading5 mb-6">Order Status</div>
                        <div class="timeline-wrapper">
                            <div class="timeline-item active">
                                <div class="timeline-icon">
                                    <i class="ph ph-check text-white"></i>
                                </div>
                                <div class="timeline-content">
                                    <div class="timeline-title">Order Placed</div>
                                    <div class="timeline-desc">Your order has been received</div>
                                </div>
                            </div>
                            <div class="timeline-item pending">
                                <div class="timeline-icon">
                                    <i class="ph ph-clock text-gray-400"></i>
                                </div>
                                <div class="timeline-content">
                                    <div class="timeline-title">Payment Verification</div>
                                    <div class="timeline-desc">We're verifying your payment receipt</div>
                                </div>
                            </div>
                            <div class="timeline-item pending">
                                <div class="timeline-icon">
                                    <i class="ph ph-package text-gray-400"></i>
                                </div>
                                <div class="timeline-content">
                                    <div class="timeline-title">Processing</div>
                                    <div class="timeline-desc">Your order will be prepared</div>
                                </div>
                            </div>
                            <div class="timeline-item pending">
                                <div class="timeline-icon">
                                    <i class="ph ph-truck text-gray-400"></i>
                                </div>
                                <div class="timeline-content">
                                    <div class="timeline-title">Shipped</div>
                                    <div class="timeline-desc">Your order will be on its way</div>
                                </div>
                            </div>
                            <div class="timeline-item pending">
                                <div class="timeline-icon">
                                    <i class="ph ph-house text-gray-400"></i>
                                </div>
                                <div class="timeline-content">
                                    <div class="timeline-title">Delivered</div>
                                    <div class="timeline-desc">Your order will be delivered</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Information -->
                    <div class="payment-info bg-yellow-50 border border-yellow-200 rounded-lg p-6 mb-8">
                        <div class="flex items-start gap-4">
                            <div class="payment-icon">
                                <i class="ph ph-warning-circle text-2xl text-yellow-600"></i>
                            </div>
                            <div class="payment-content">
                                <div class="heading6 text-yellow-800 mb-2">Payment Verification Pending</div>
                                <p class="text-yellow-700 mb-4">
                                    We have received your payment receipt and our team will verify it within 24 hours.
                                    You will receive an email confirmation once your payment is verified.
                                </p>
                                <div class="bank-details bg-white p-4 rounded border">
                                    <div class="text-sm font-semibold mb-3 text-gray-800">Bank Account Details Used:</div>
                                    <div class="grid grid-cols-2 gap-4 text-sm">
                                        <div>
                                            <span class="text-gray-600">Bank Name:</span>
                                            <span class="font-medium ml-2">Wema Bank</span>
                                        </div>
                                        <div>
                                            <span class="text-gray-600">Account Name:</span>
                                            <span class="font-medium ml-2">Aseye Ronke Oluwagbemisola</span>
                                        </div>
                                        <div>
                                            <span class="text-gray-600">Account Number:</span>
                                            <span class="font-medium ml-2">0268105037</span>
                                        </div>
                                        <div>
                                            <span class="text-gray-600">Sort Code:</span>
                                            <span class="font-medium ml-2">035</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- What's Next -->
                    <div class="whats-next bg-blue-50 border border-blue-200 rounded-lg p-6 mb-8">
                        <div class="heading6 text-blue-800 mb-4">What happens next?</div>
                        <div class="steps-list">
                            <div class="step-item flex items-start gap-3 mb-3">
                                <div class="step-number bg-blue-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm font-semibold">1</div>
                                <div class="step-content">
                                    <span class="text-blue-700">We'll verify your payment receipt within 24 hours</span>
                                </div>
                            </div>
                            <div class="step-item flex items-start gap-3 mb-3">
                                <div class="step-number bg-blue-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm font-semibold">2</div>
                                <div class="step-content">
                                    <span class="text-blue-700">You'll receive an email confirmation once payment is verified</span>
                                </div>
                            </div>
                            <div class="step-item flex items-start gap-3 mb-3">
                                <div class="step-number bg-blue-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm font-semibold">3</div>
                                <div class="step-content">
                                    <span class="text-blue-700">We'll prepare and ship your items (2-5 business days)</span>
                                </div>
                            </div>
                            <div class="step-item flex items-start gap-3">
                                <div class="step-number bg-blue-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm font-semibold">4</div>
                                <div class="step-content">
                                    <span class="text-blue-700">You'll receive tracking information when your order ships</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="contact-info bg-gray-50 rounded-lg p-6 mb-8">
                        <div class="heading6 mb-4">Need Help?</div>
                        <p class="text-secondary2 mb-4">
                            If you have any questions about your order or need assistance, please don't hesitate to contact us.
                        </p>
                        <div class="contact-methods grid md:grid-cols-3 gap-4">
                            <div class="contact-item text-center p-4 bg-white rounded border">
                                <i class="ph ph-envelope text-2xl text-blue-600 mb-2"></i>
                                <div class="text-sm font-semibold">Email Support</div>
                                <div class="text-sm text-secondary2">support@roluxeaccessories.com</div>
                            </div>
                            <div class="contact-item text-center p-4 bg-white rounded border">
                                <i class="ph ph-phone text-2xl text-green-600 mb-2"></i>
                                <div class="text-sm font-semibold">Phone Support</div>
                                <div class="text-sm text-secondary2">+234 123 456 7890</div>
                            </div>
                            <div class="contact-item text-center p-4 bg-white rounded border">
                                <i class="ph ph-chat-circle text-2xl text-purple-600 mb-2"></i>
                                <div class="text-sm font-semibold">Live Chat</div>
                                <div class="text-sm text-secondary2">Available 9AM - 6PM</div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons text-center">
                        <a href="/shop" class="button-main mr-4">
                            Continue Shopping
                        </a>
                        <a href="/" class="button-main button-blue-hover">
                            Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @include('partials.footer')
    </main>

    <style>
        .timeline-wrapper {
            position: relative;
        }

        .timeline-item {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            position: relative;
        }

        .timeline-item:not(:last-child)::after {
            content: '';
            position: absolute;
            left: 1.25rem;
            top: 2.5rem;
            width: 2px;
            height: 2rem;
            background-color: #e5e7eb;
        }

        .timeline-item.active::after {
            background-color: #10b981;
        }

        .timeline-icon {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
        }

        .timeline-item.active .timeline-icon {
            background-color: #10b981;
        }

        .timeline-item.pending .timeline-icon {
            background-color: #f3f4f6;
            border: 2px solid #e5e7eb;
        }

        .timeline-content {
            flex: 1;
        }

        .timeline-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .timeline-item.active .timeline-title {
            color: #10b981;
        }

        .timeline-item.pending .timeline-title {
            color: #6b7280;
        }

        .timeline-desc {
            font-size: 0.875rem;
            color: #6b7280;
        }

        .success-icon {
            animation: bounce 1s ease-in-out;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }
    </style>
</x-layouts.main>
