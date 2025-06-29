<div class="checkout-block" wire:key="order-summary-{{ $state }}">
    <div class="heading5 pb-3">Your Order</div>
    <div class="list-product-checkout">
        @if(count($cartItems) > 0)
            @foreach($cartItems as $item)
                <div class="item flex items-center justify-between py-3 border-b border-line">
                    <div class="infor flex items-center gap-3">
                        @if(isset($item['image']))
                            <div class="bg-img w-16 h-16 flex-shrink-0">
                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover rounded">
                            </div>
                        @endif
                        <div class="">
                            <div class="name text-button">{{ $item['name'] ?? 'Product' }}</div>
                            @if(isset($item['color']['name']) || isset($item['size']['name']))
                                <div class="variant text-secondary2 mt-1">
                                    @if(isset($item['color']['name']))
                                        <span>{{ $item['color']['name'] }}</span>
                                    @endif
                                    @if(isset($item['color']['name']) && isset($item['size']['name']))
                                        <span> / </span>
                                    @endif
                                    @if(isset($item['size']['name']))
                                        <span>{{ $item['size']['name'] }}</span>
                                    @endif
                                </div>
                            @endif
                            <div class="quantity text-secondary2 mt-1">Qty: {{ $item['quantity'] ?? 1 }}</div>
                        </div>
                    </div>
                    <div class="price text-button">₦{{ number_format($item['price'] * ($item['quantity'] ?? 1), 2) }}</div>
                </div>
            @endforeach
        @else
            <div class="empty-cart text-center py-8">
                <div class="text-secondary2">Your cart is empty</div>
            </div>
        @endif
    </div>
    <div class="ship-block py-5 flex justify-between border-b border-line">
        <div class="text-title">Shipping @if($state)({{ $state }})@endif</div>
        <div class="text-title">
            @if($shippingCost > 0)
                ₦{{ number_format($shippingCost, 2) }}
            @else
                <span class="text-gray-500">Select state</span>
            @endif
        </div>
    </div>
    <div class="total-cart-block pt-5 flex justify-between">
        <div class="heading5">Subtotal</div>
        <div class="heading5">₦<span class="total-cart">{{ number_format($subtotal, 2) }}</span></div>
    </div>
    <div class="total-cart-block pt-2 flex justify-between border-t border-line mt-3">
        <div class="heading4">Total</div>
        <div class="heading4">₦{{ number_format($total, 2) }}</div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize cart data for order summary
        function initOrderSummary() {
            try {
                if (window.cartManager) {
                    const cartData = window.cartManager.getCartData();
                    if (cartData && cartData.length > 0) {
                        @this.call('receiveCartData', cartData);
                    }
                } else {
                    // Fallback to localStorage
                    const cartData = JSON.parse(localStorage.getItem('cart') || '[]');
                    if (cartData.length > 0) {
                        @this.call('receiveCartData', cartData);
                    }
                }
            } catch (e) {
                console.error('OrderSummary initialization error:', e);
            }
        }

        // Listen for shipping cost updates
        document.addEventListener('shippingCostUpdated', function(e) {
            if (e.detail && e.detail.cost !== undefined) {
                @this.call('updateShippingCost', e.detail.cost);
            }
        });

        // Listen for cart updates
        document.addEventListener('cartUpdated', function() {
            initOrderSummary();
        });

        // Initialize when Livewire is ready
        document.addEventListener('livewire:init', function() {
            setTimeout(initOrderSummary, 200);
        });

        // Initialize immediately if cart manager exists
        if (window.cartManager) {
            initOrderSummary();
        }
    });
</script>
