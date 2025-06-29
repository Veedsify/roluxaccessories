<div class="modal-cart-block">
    <div class="modal-cart-main flex">
        <div class="right cart-block w-full py-6 relative overflow-hidden">
            <div class="list-product px-6">

            </div>
            <div class="footer-modal bg-white absolute bottom-0 left-0 w-full">
                <div class="flex items-center justify-between pt-6 px-6">
                    <div class="heading5">Subtotal</div>
                    <div class="heading5 total-cart"></div>
                </div>
                <div class="block-button text-center p-6">
                    <div class="flex items-center gap-4">
                        <a href="{{route('cart')}}" class="button-main basis-1/2 bg-white border border-black text-black text-center uppercase">
                            View cart </a>
                        <button class="proceed-to-checkout button-main basis-1/2 text-center uppercase"> Check Out
                        </button>
                    </div>
                    <div class="text-button-uppercase continue mt-4 text-center has-line-before cursor-pointer inline-block">
                        Or continue shopping</div>
                </div>
            </div>
        </div>
    </div>
</div>
