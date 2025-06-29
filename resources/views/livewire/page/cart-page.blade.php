<x-layouts.main :title="$this->title ?? config('app.name')">
    <main>
        @livewire("components.top-nav")
        @livewire("components.nav-bar")
        <div class="cart-block md:py-20 py-10">
            <div class="container">
                <div class="content-main flex justify-between max-xl:flex-col gap-y-8">
                    <div class="xl:w-2/3 xl:pr-3 w-full">
                        <div class="heading banner mt-5">
                            <div class="text">
                                Buy
                                <span class="text-button"> ₦<span class="more-price">50,000</span>.00 </span>
                                <span>more to get </span>
                                <span class="text-button">
                                    Free Shipping
                                </span>
                            </div>
                            <div class="tow-bar-block mt-4">
                                <div class="progress-line" style="width: 50%;"></div>
                            </div>
                        </div>
                        <div class="list-product w-full sm:mt-7 mt-5">
                            <div class="w-full">
                                <div class="heading bg-surface bora-4 pt-4 pb-4">
                                    <div class="flex">
                                        <div class="w-1/2">
                                            <div class="text-button text-center">Products</div>
                                        </div>
                                        <div class="w-1/12">
                                            <div class="text-button text-center">Price</div>
                                        </div>
                                        <div class="w-1/6">
                                            <div class="text-button text-center">Quantity</div>
                                        </div>
                                        <div class="w-1/6">
                                            <div class="text-button text-center">Total Price</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-product-main w-full mt-3">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="xl:w-1/3 xl:pl-12 w-full">
                        <div class="checkout-block bg-surface p-6 rounded-2xl">
                            <div class="heading5">Order Summary</div>
                            <div class="total-block py-5 flex justify-between border-b border-line">
                                <div class="text-title">Subtotal</div>
                                <div class="text-title">₦<span class="total-product">0</span><span></span></div>
                            </div>
                            <div class="ship-block py-5 flex justify-between border-b border-line">
                                <div class="text-title">Free Shipping</div>
                                    <div class="right">
                                        <div class="free-shipping-applied text-on-surface-variant1 mt-1">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="total-cart-block pt-4 pb-4 flex justify-between">
                                <div class="heading5">Total</div>
                                <div class=""><span class="heading5">₦</span><span class="total-cart heading5"></span><span class="heading5"></span></div>

                            </div>
                            <div class="block-button flex flex-col items-center gap-y-4 mt-5">
                                <a href="{{route('checkout')}}" class="checkout-btn button-main text-center w-full"> Proceed To Checkout</a>
                                <a class="text-button hover-underline" href="{{route("shop")}}">Continue shopping </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.footer')
    </main>
</x-layouts.main>
