<div class="modal-quickview-block">

    <div class="modal-quickview-main py-6 {{$this->isOpen ? 'open' : ''}}">
        <div class="flex h-full max-md:flex-col-reverse gap-y-6">
            @if($product)
            <div class="left lg:w-[388px] md:w-[300px] flex-shrink-0 px-6">
                <div class="list-img max-md:flex items-center gap-4">
                    @foreach($product->images as $image)
                    <div class="bg-img w-full aspect-[3/4] max-md:w-[150px] max-md:flex-shrink-0 rounded-[20px] overflow-hidden md:mt-6">
                        <img src="{{ asset('storage/'. $image->url)}}" alt="item" class="w-full h-full object-cover" />
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="right w-full px-6">
                <div class="heading pb-6 flex items-center justify-between relative">
                    <div class="heading5">Quick View</div>
                    <div class="close-btn absolute right-0 top-0 w-6 h-6 rounded-full bg-surface flex items-center justify-center duration-300 cursor-pointer hover:bg-black hover:text-white">
                        <i class="ph ph-x text-sm"></i>
                    </div>
                </div>
                <div class="product-infor">
                    <div class="flex justify-between">
                        <div>
                            <div class="category caption2 text-secondary font-semibold uppercase">
                                {{ $product->category->name }}
                            </div>
                            <div class="name heading4 mt-1">
                                {{ $product->name }}
                            </div>
                        </div>
                        <div class="add-wishlist-btn w-10 h-10 flex items-center justify-center border border-line cursor-pointer rounded-lg duration-300 hover:bg-black hover:text-white">
                            <i class="ph ph-heart text-xl"></i>
                        </div>
                    </div>
                    {{-- <div class="flex items-center gap-1 mt-3">
                        <div class="rate flex">
                            <i class="ph-fill ph-star text-sm text-yellow"></i>
                            <i class="ph-fill ph-star text-sm text-yellow"></i>
                            <i class="ph-fill ph-star text-sm text-yellow"></i>
                            <i class="ph-fill ph-star text-sm text-yellow"></i><i class="ph-fill ph-star text-sm text-yellow"></i>
                        </div>
                        <span class="caption1 text-secondary">(1.234 reviews)</span>
                    </div> --}}

                    <div class="flex items-center gap-3 flex-wrap mt-5 pb-6 border-b border-line">
                        <div class="product-price heading5"> ₦ {{number_format($product->price)}}</div>

                        <div class="w-px h-4 bg-line"></div>
                        <div class="product-origin-price font-normal text-secondary2">
                            <del>₦ {{number_format($product->originPrice)}}</del>
                        </div>
                        <div class="product-sale caption2 font-semibold bg-green px-3 py-0.5 inline-block rounded-full">
                            {{
                                $product->originPrice ? '-'.round((($product->originPrice -
                                $product->price) / $product->originPrice) * 100). '%' : ''
                                }}
                        </div>
                    </div>

                    <div class="desc text-secondary mt-3 block">
                        {!! $product->description ? $product->description : 'No
                        description available.' !!}

                    </div>

                    <div class="list-action mt-6">
                        @if($product->productColors->count() > 0)
                        <div class="-color">
                            <div class="text-title">Colors: <span class="text-title color"></span></div>
                            <div class="list-color p-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                @foreach($product->productColors as $variantColor => $pColor)
                                <div key="0" wire:click="selectThisColor('{{ $pColor['id'] }}', '{{$pColor['name']}}')" class="color-item w-8 h-8 rounded-full duration-300 relative" style="background-color:{{$pColor->image}}; {{$color && $color['id'] == $pColor['id'] ? 'outline: 3px solid black;' : ''}} ">

                                    <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                        {{ $pColor->name }}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <div class="choose-size mt-5">
                            <div class="list-size flex items-center flex-wrap gap-3 gap-y-4 mt-4">
                                @foreach($product->productSizes as $sizeVariant => $size)
                                <div wire:click="selectThisSize('{{ $size['id'] }}', '{{$size['name']}}')" class="size-item text-button w-[44px] h-[44px] flex items-center justify-center rounded-full border border-line {{$this->size && $this->size['id'] == $size['id'] ? 'active': ''}}" data-item="{{$size['name']}}">
                                    {{$size['name']}}
                                </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="text-title mt-5">Quantity:</div>
                        <div class="choose-quantity flex items-center flex-wrap lg:justify-between gap-5 mt-3">
                            <div class="quantity-block md:p-3 max-md:py-1.5 max-md:px-3 flex items-center justify-between rounded-lg border border-line sm:w-[180px] w-[120px] flex-shrink-0">
                                <span wire:click='decreaseAmount' class="cursor-pointer">
                                    <i class="ph-bold ph-minus cursor-pointer body1"></i>
                                </span>
                                <div class="quantity body1 font-semibold">
                                    <input type="number" wire:model="amount" class="w-full h-full text-center bg-transparent outline-none border-none" min="1" max="100">
                                </div>
                                <span wire:click='increaseAmount' class="cursor-pointer">
                                    <i class="ph-bold ph-plus cursor-pointer body1"></i>
                                </span>
                            </div>
                            <div class="flex flex-col">
                                <div>
                                    @session('error')
                                    <div class="text-red-500 text-sm mt-2" style="color: red;">
                                        {{ session('error') }}
                                    </div>
                                    @endsession
                                </div>
                            </div>
                            <div wire:click="addToCart" class="add-cart-btn button-main w-full text-center bg-white text-black border border-black">
                                Add To Cart</div>
                        </div>
                        <div class="button-block mt-5">
                            <a href="checkout.html" class="button-main w-full text-center">Buy It Now</a>
                        </div>
                    </div>
                    <div class="flex items-center flex-wrap lg:gap-20 gap-8 gap-y-4 mt-5">
                        <div class="share flex items-center gap-3 cursor-pointer">
                            <div class="share-btn md:w-12 md:h-12 w-10 h-10 flex items-center justify-center border border-line cursor-pointer rounded-xl duration-300 hover:bg-black hover:text-white">
                                <i class="ph-fill ph-share-network cursor-pointer heading6"></i>
                            </div>
                            <span>Share Products</span>
                        </div>
                    </div>
                    <div class="more-infor mt-6">
                        <div class="flex items-center gap-4 flex-wrap">
                            <div class="flex items-center gap-1">
                                <i class="ph ph-arrow-clockwise cursor-pointer body1"></i>
                                <div class="text-title">Delivery & Return</div>
                            </div>
                            <div class="flex items-center gap-1">
                                <i class="ph ph-question cursor-pointer body1"></i>
                                <div class="text-title">Ask A Question</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 mt-3">
                            <div class="text-title">SKU:</div>
                            <div class="text-secondary">53453412</div>
                        </div>
                        <div class="flex items-center gap-1 mt-3">
                            <div class="text-title">Categories:</div>
                            <div class="list-category text-secondary">fashion, women</div>
                        </div>
                        <div class="flex items-center gap-1 mt-3">
                            <div class="text-title">Tag:</div>
                            <div class="list-tag text-secondary">dress</div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
