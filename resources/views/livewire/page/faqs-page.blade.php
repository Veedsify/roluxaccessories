<x-layouts.main :title="$this->title ?? config('app.name')">
    <main>
        @livewire("components.top-nav")
        @livewire("components.nav-bar")

        <!-- Page Content -->
        <div class="breadcrumb-block style-shared">
            <div class="breadcrumb-main bg-linear overflow-hidden">
                <div class="container lg:pt-[134px] pt-24 pb-10 relative">
                    <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                        <div class="text-content">
                            <div class="heading2 text-center">FAQs</div>
                            <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                                <a href="/">Homepage</a>
                                <i class="ph ph-caret-right text-sm text-secondary2"></i>
                                <div class="text-secondary2 capitalize">FAQs</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="faqs-block md:py-20 py-10">
            <div class="container">
                <div class="flex max-md:flex-wrap justify-between gap-y-8">
                    <div class="left md:w-1/4">
                        <div class="menu-tab flex flex-col gap-5">
                            <div class="tab-item inline-block w-fit heading6 has-line-before text-secondary2 hover:text-black duration-300 active" data-item="orders">orders</div>
                            <div class="tab-item inline-block w-fit heading6 has-line-before text-secondary2 hover:text-black duration-300" data-item="payment methods">payment methods</div>
                            <div class="tab-item inline-block w-fit heading6 has-line-before text-secondary2 hover:text-black duration-300" data-item="shipping">shipping</div>
                            <div class="tab-item inline-block w-fit heading6 has-line-before text-secondary2 hover:text-black duration-300" data-item="returns">returns</div>
                            <div class="tab-item inline-block w-fit heading6 has-line-before text-secondary2 hover:text-black duration-300" data-item="account">account</div>
                            <div class="tab-item inline-block w-fit heading6 has-line-before text-secondary2 hover:text-black duration-300" data-item="contacts">contacts</div>
                        </div>
                    </div>

                    <div class="right list-question md:w-2/3">
                        <div class="tab-question flex flex-col gap-5" data-item="orders">
                            <div class="question-item open px-7 py-5 rounded-[20px] overflow-hidden border border-line cursor-pointer">
                                <div class="heading flex items-center justify-between gap-6">
                                    <div class="heading6">How do I place an order?</div>
                                    <i class="ph ph-caret-right text-2xl"></i>
                                </div>
                                <div class="content body1 text-secondary">
                                    Browse our products, add your desired items to the cart, and proceed to checkout. Fill in your shipping details and complete your order by following the instructions.
                                </div>
                            </div>
                            <div class="question-item open px-7 py-5 rounded-[20px] overflow-hidden border border-line cursor-pointer">
                                <div class="heading flex items-center justify-between gap-6">
                                    <div class="heading6">Can I modify or cancel my order after placing it?</div>
                                    <i class="ph ph-caret-right text-2xl"></i>
                                </div>
                                <div class="content body1 text-secondary">
                                    Orders can only be modified or cancelled before they are shipped. Please contact our support team as soon as possible if you need to make changes.
                                </div>
                            </div>
                        </div>
                        <div class="tab-question flex flex-col gap-5" data-item="payment methods">
                            <div class="question-item open px-7 py-5 rounded-[20px] overflow-hidden border border-line cursor-pointer">
                                <div class="heading flex items-center justify-between gap-6">
                                    <div class="heading6">What payment methods do you accept?</div>
                                    <i class="ph ph-caret-right text-2xl"></i>
                                </div>
                                <div class="content body1 text-secondary">
                                    We only accept bank transfers for all orders. Other payment methods are not supported at this time.
                                </div>
                            </div>
                            <div class="question-item open px-7 py-5 rounded-[20px] overflow-hidden border border-line cursor-pointer">
                                <div class="heading flex items-center justify-between gap-6">
                                    <div class="heading6">How do I pay via bank transfer?</div>
                                    <i class="ph ph-caret-right text-2xl"></i>
                                </div>
                                <div class="content body1 text-secondary">
                                    After placing your order, you will receive our bank account details. Please make the transfer and send us the payment confirmation to process your order.
                                </div>
                            </div>
                        </div>
                        <div class="tab-question flex flex-col gap-5" data-item="shipping">
                            <div class="question-item open px-7 py-5 rounded-[20px] overflow-hidden border border-line cursor-pointer">
                                <div class="heading flex items-center justify-between gap-6">
                                    <div class="heading6">Who handles shipping?</div>
                                    <i class="ph ph-caret-right text-2xl"></i>
                                </div>
                                <div class="content body1 text-secondary">
                                    For orders below ₦50,000, you handle the shipping cost directly. For orders above ₦50,000, our logistics partner will handle the shipping and delivery for free.
                                </div>
                            </div>
                            <div class="question-item open px-7 py-5 rounded-[20px] overflow-hidden border border-line cursor-pointer">
                                <div class="heading flex items-center justify-between gap-6">
                                    <div class="heading6">How long does delivery take?</div>
                                    <i class="ph ph-caret-right text-2xl"></i>
                                </div>
                                <div class="content body1 text-secondary">
                                    Delivery within Lagos typically takes 1-3 business days. For other locations, delivery may take 3-7 business days.
                                </div>
                            </div>
                        </div>
                        <div class="tab-question flex flex-col gap-5" data-item="returns">
                            <div class="question-item open px-7 py-5 rounded-[20px] overflow-hidden border border-line cursor-pointer">
                                <div class="heading flex items-center justify-between gap-6">
                                    <div class="heading6">What is your return policy?</div>
                                    <i class="ph ph-caret-right text-2xl"></i>
                                </div>
                                <div class="content body1 text-secondary">
                                    Items can be returned within 7 days of delivery if they are unused and in original packaging. Please contact support to initiate a return.
                                </div>
                            </div>
                            <div class="question-item open px-7 py-5 rounded-[20px] overflow-hidden border border-line cursor-pointer">
                                <div class="heading flex items-center justify-between gap-6">
                                    <div class="heading6">How do I get a refund?</div>
                                    <i class="ph ph-caret-right text-2xl"></i>
                                </div>
                                <div class="content body1 text-secondary">
                                    Once your return is received and inspected, your refund will be processed to your bank account within 3-5 business days.
                                </div>
                            </div>
                        </div>
                        <div class="tab-question flex flex-col gap-5" data-item="account">
                            <div class="question-item open px-7 py-5 rounded-[20px] overflow-hidden border border-line cursor-pointer">
                                <div class="heading flex items-center justify-between gap-6">
                                    <div class="heading6">Do I need an account to order?</div>
                                    <i class="ph ph-caret-right text-2xl"></i>
                                </div>
                                <div class="content body1 text-secondary">
                                    You can place an order as a guest.
                                </div>
                            </div>
                        </div>
                        <div class="tab-question flex flex-col gap-5" data-item="contacts">
                            <div class="question-item open px-7 py-5 rounded-[20px] overflow-hidden border border-line cursor-pointer">
                                <div class="heading flex items-center justify-between gap-6">
                                    <div class="heading6">How can I contact customer support?</div>
                                    <i class="ph ph-caret-right text-2xl"></i>
                                </div>
                                <div class="content body1 text-secondary">
                                    You can reach us via email at aseyeronke25@gmail.com or call our hotline at +234 909 318 9011 during business hours.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('partials.footer')
    </main>
</x-layouts.main>
