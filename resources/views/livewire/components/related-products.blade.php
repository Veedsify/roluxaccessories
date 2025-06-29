<div class="tab-features-block filter-product-block md:py-20 py-10">
    @if(!$relatedProducts->isEmpty())
    <div class="container">
        <div class="heading3 text-center">Related Products</div>
        <div class="list-product six-product hide-product-sold relative section-swiper-navigation style-outline style-small-border md:mt-10 mt-6">
            <div class="swiper-button-prev2 sm:left-10 left-6" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-d4efcb5895b1e2a8">
                <i class="ph-bold ph-caret-left text-xl"></i>
            </div>
            <div class="swiper swiper-list-product h-full relative swiper-initialized swiper-horizontal swiper-backface-hidden">
                <div class="swiper-wrapper" id="swiper-wrapper-d4efcb5895b1e2a8" aria-live="polite">
                    <!-- List six product -->
                    @foreach($relatedProducts as $product)
                    <div class="swiper-slide swiper-slide-active" style="width: 158.5px; margin-right: 16px;" role="group" data-swiper-slide-index="{{$loop->index}}">
                        <div data-item="{{$product->id}}" class="product-item grid-type">
                            <div class="product-main cursor-pointer block" data-item="712">
                                <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                                    @if($product->isNew())
                                    <div class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">
                                        New</div>
                                    @endif
                                    @if($product->onSale())
                                    <div class="product-tag text-button-uppercase text-white bg-red px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">
                                        Sale</div>
                                    @endif
                                    <div class="list-action-right absolute top-3 right-3 max-lg:hidden">
                                        <div class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                            <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                                Add To Wishlist</div>
                                            <i class="ph ph-heart text-lg"></i>
                                        </div>
                                    </div>
                                    <a href={{route('product.detail', ['slug'=> $product->slug])}} class="product-img block w-full h-full aspect-[3/4]">

                                        <img key="0" class="w-full h-full object-cover duration-700" src="{{asset('storage/'. $product->images[0]['url'])}}" alt="img">

                                        <img key="1" class="w-full h-full object-cover duration-700" src="{{asset('storage/'. $product->images[1]['url'])}}" alt="img">
                                    </a>
                                    <div class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                        <div class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">
                                            <span class="max-lg:hidden">Quick View</span>
                                            <i class="ph ph-eye lg:hidden text-xl"></i>
                                        </div>

                                        <div class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">
                                            <span wire:click='addToCart("{{$product->id}}")' class="max-lg:hidden">Add To Cart</span>

                                            <i class="ph ph-shopping-bag-open lg:hidden text-xl"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-infor mt-4 lg:mb-7">
                                    <div class="product-name text-title duration-300">
                                        <a href="{{ route('product.detail', $product->slug) }}" class="hover:text-black">
                                            {{ $product->name }}
                                        </a>
                                    </div>

                                    <div class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                        @foreach($product->productColors as $variantColor => $color)
                                        <div key="0" class="color-item w-8 h-8 rounded-full duration-300 relative" style="background-color:{{$color->image}}; outline: 1px solid #eee;">
                                            <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                                {{ $color->name }}
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                        <div class="product-price text-title">₦ {{number_format($product->price)}}</div>
                                        @if($product->originPrice > 0)
                                        <div class="product-origin-price caption1 text-secondary2">
                                            <del>₦ {{number_format($product->originPrice)}}</del>
                                        </div>
                                        @endif
                                        @if($product->originPrice > 0)
                                        <div class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">
                                            {{
                                            $product->originPrice ? '-'.round((($product->originPrice - $product->price)
                                            / $product->originPrice) * 100). '%' : ''
                                            }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
            <div class="swiper-button-next2 sm:right-10 right-6" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-d4efcb5895b1e2a8">
                <i class="ph-bold ph-caret-right text-xl"></i>
            </div>
        </div>
    </div>
    @endif
</div>
