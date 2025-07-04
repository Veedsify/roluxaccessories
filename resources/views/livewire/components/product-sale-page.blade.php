<div class="product-detail sale">
    <div class="featured-product underwear filter-product-img md:py-20 py-14">
        <div class="container flex justify-between gap-y-6 flex-wrap">
            <div class="list-img md:w-1/2 md:pr-[45px] w-full flex-shrink-0">
                <div class="sticky">
                    <div class="swiper mySwiper2 rounded-2xl overflow-hidden swiper-initialized swiper-horizontal swiper-backface-hidden">
                        <div class="swiper-wrapper" id="swiper-wrapper-f6523cc3b5936b65" aria-live="polite" wire:ignore>
                            <!--  -->
                            @foreach($product->images as $image)
                            <div class="swiper-slide popup-link{{ $loop->index === 0 ? ' swiper-slide-active' : '' }}{{ $loop->index === 1 ? ' swiper-slide-next' : '' }}" style="width: 333px;" role="group" aria-label="{{ $loop->index + 1 }} / {{ count($product->images) }}" data-index="{{ $loop->index }}">
                                <img src="{{ asset('storage/' . $image->url) }}" alt="img" class="w-full aspect-[3/4] object-cover">
                            </div>
                            @endforeach
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                    <div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-watch-progress swiper-backface-hidden swiper-thumbs" wire:ignore>

                        <div class="swiper-wrapper" id="swiper-wrapper-dc7536ef2486b651" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                            <!--  -->
                            @foreach($product->images as $image)
                            <div class="swiper-slide swiper-slide-visible{{ $loop->index === 0 ? ' swiper-slide-fully-visible swiper-slide-active swiper-slide-thumb-active' : '' }}{{ $loop->index === 1 ? ' swiper-slide-next' : '' }}" style="width: 333px;" role="group" aria-label="{{ $loop->index + 1 }} / {{ count($product->images) }}" data-index="{{ $loop->index }}">
                                <img src="{{ asset('storage/' . $image->url) }}" alt="img" class="w-full aspect-[3/4] object-cover">
                            </div>
                            @endforeach
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                </div>
                <div class="swiper popup-img">
                    <span class="close-popup-btn absolute top-4 right-4 z-[2]">
                        <i class="ph ph-x text-3xl text-white"></i>
                    </span>
                    <div class="swiper-wrapper">
                        <!--  -->
                        <div class="swiper-slide popup-link">
                            <img src="./assets/images/product/fashion/1-1.png" alt="img" class="w-full aspect-[3/4] object-cover">
                        </div>
                        <div class="swiper-slide popup-link">
                            <img src="./assets/images/product/fashion/1-2.png" alt="img" class="w-full aspect-[3/4] object-cover">
                        </div>
                        <div class="swiper-slide popup-link">
                            <img src="./assets/images/product/fashion/1-3.png" alt="img" class="w-full aspect-[3/4] object-cover">
                        </div>
                        <div class="swiper-slide popup-link">
                            <img src="./assets/images/product/fashion/1-4.png" alt="img" class="w-full aspect-[3/4] object-cover">
                        </div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <div class="product-infor md:w-1/2 w-full lg:pl-[15px] md:pl-2" data-item="1">
                <div class="flex justify-between">
                    <div>
                        <div class="product-category caption2 text-secondary font-semibold uppercase">
                            {{ $product->category->name }}
                        </div>
                        <div class="product-name heading4 mt-1">
                            {{ $product->name }}
                        </div>
                    </div>
                    <div class="add-wishlist-btn w-10 h-10 flex-shrink-0 flex items-center justify-center border border-line cursor-pointer rounded-lg duration-300 hover:bg-black hover:text-white">
                        <i class="ph ph-heart text-xl"></i>
                    </div>
                </div>
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
                    <div class="sold-block flex justify-between flex-wrap gap-4">
                        <div class="text-title">sold:</div>
                        <div class="right sm:w-3/4">
                            <div class="progress h-2 rounded-full overflow-hidden bg-line relative">
                                <div class="percent-sold absolute top-0 left-0 h-full bg-red" style="width: {{($product->sold / $product->quantity) * 100}}%;"></div>

                            </div>
                            <div class="flex items-center gap-1 mt-2">
                                <span class="percent-sold-number">{{($product->sold )}} Sold -</span>
                                <span class="text-secondary">Only <span class="remaining-number">{{$product->quantity}}</span> item(s) left in stock!</span>
                            </div>
                        </div>
                    </div>
                    <div class="choose-color mt-5">
                        <div class="text-title">Colors: <span class="text-title color"></span></div>
                        <div class="list-color flex items-center gap-2 flex-wrap mt-3">
                            @foreach($product->productColors as $variantColor => $pColor)
                            <div key="0" wire:click="selectThisColor('{{ $pColor['id'] }}', '{{$pColor['name']}}')" class="color-item w-8 h-8 rounded-full duration-300 relative" style="background-color:{{$pColor->image}}; {{$this->color && $this->color['id'] == $pColor['id'] ? "outline: 3px solid black;" : ""}} ">

                                <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                    {{ $pColor->name }}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="choose-size mt-5">
                        <div class="list-size flex items-center gap-2 flex-wrap mt-3">
                            <!-- size-item -->
                            @foreach($product->productSizes as $sizeVariant => $size)
                            <div wire:click="selectThisSize('{{ $size['id'] }}', '{{$size['name']}}')" class="size-item text-button w-[44px] h-[44px] flex items-center justify-center rounded-full border border-line {{$this->size && $this->size['id'] == $size['id'] ? 'active': ''}}" data-item="{{$size['name']}}">
                                {{$size['name']}}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-title mt-5">Quantity:</div>
                    <div class="choose-quantity flex items-center max-xl:flex-wrap lg:justify-between gap-5 mt-3">
                        <div class="quantity-block md:p-3 max-md:py-1.5 max-md:px-3 flex items-center justify-between rounded-lg border border-line sm:w-[140px] w-[120px] flex-shrink-0">
                            <span wire:click='decreaseAmount' class="cursor-pointer">
                                <i class="ph-bold ph-minus cursor-pointer body1"></i>
                            </span>
                            <div class="quantity body1 font-semibold">
                                <input type="number" wire:model="amount" class="w-full h-full text-center bg-transparent outline-none border-none">
                            </div>
                            <span wire:click='increaseAmount' class="cursor-pointer">
                                <i class="ph-bold ph-plus cursor-pointer body1"></i>
                            </span>
                        </div>
                        <div
                            wire:click="addToCart"
                        class="add-cart-btn button-main whitespace-nowrap w-full text-center bg-white text-black border border-black">Add To Cart</div>
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
                    <div class="button-block mt-5">
                        <a href="checkout.html" class="button-main w-full text-center">Buy It Now</a>
                    </div>
                    <div class="more-infor mt-6">
                        <div class="flex items-center gap-4 flex-wrap">
                            <div class="flex items-center gap-1">
                                <i class="ph ph-arrow-clockwise body1"></i>
                                <div class="text-title">Delivery &amp; Return</div>
                            </div>
                            <div class="flex items-center gap-1">
                                <i class="ph ph-question body1"></i>
                                <a href="{{route('contact')}}" class="text-title underline">Ask A Question</a>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 mt-3">
                            <div class="text-title">SKU:</div>
                            <div class="text-secondary">53453412</div>
                        </div>
                        <div class="flex items-center gap-1 mt-3">
                            <div class="text-title">Categories:</div>
                            <div class="list-category text-secondary">
                                <a href="shop-breadcrumb1.html" class="text-secondary">
                                    {{ $product->category->name }}
                                </a>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 mt-3">
                            <div class="text-title">Brand:</div>
                            <div class="list-tag text-secondary">
                                <a href="shop-breadcrumb1.html" class="text-secondary">
                                    {{ $product->brand->name }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="desc-tab md:pb-20 pb-10">
        <div class="container">
            <div class="flex items-center justify-center w-full">
                <div class="menu-tab flex items-center md:gap-[60px] gap-8">
                    <div class="tab-item heading5 has-line-before text-secondary2 hover:text-black duration-300 active">Description</div>
                </div>
            </div>
            <div class="desc-block mt-8">
                <div class="desc-item description open" data-item="Description">
                    <div class="grid md:grid-cols-2 gap-8 gap-y-5">
                        <div class="left">
                            <div class="heading6">Description</div>
                            <div class="text-secondary mt-2">
                                {!! $product->description ? $product->description : 'No description available.' !!}
                            </div>
                        </div>
                        <div class="right">
                            <div class="features-section">
                                <div class="heading6 mb-4">Product Features</div>
                                <div class="grid lg:grid-cols-2 grid-cols-1 gap-6 mt-3">
                                    @foreach($product->productFeatures as $feature)
                                    <div class="feature-item flex items-center gap-4 p-4 bg-surface rounded-lg">
                                        <div class="feature-icon w-12 h-12 flex items-center justify-center bg-black text-white rounded-full flex-shrink-0">
                                            <i class="ph ph-check-circle text-xl"></i>
                                        </div>
                                        <div class="feature-content">
                                            <div class="heading6">
                                                {{ $feature->name }}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="desc-item specifications flex items-center justify-center" data-item="Specifications">
                    <div class="lg:w-1/2 sm:w-3/4 w-full">
                        <div class="item bg-surface flex items-center gap-8 py-3 px-10">
                            <div class="text-title sm:w-1/4 w-1/3">Rating</div>
                            <div class="flex items-center gap-1">
                                <div class="rate flex">
                                    <i class="ph-fill ph-star text-xs text-yellow"></i>
                                    <i class="ph-fill ph-star text-xs text-yellow"></i>
                                    <i class="ph-fill ph-star text-xs text-yellow"></i>
                                    <i class="ph-fill ph-star text-xs text-yellow"></i>
                                    <i class="ph-fill ph-star text-xs text-yellow"></i>
                                </div>
                                <p>(1.234)</p>
                            </div>
                        </div>
                        <div class="item flex items-center gap-8 py-3 px-10">
                            <div class="text-title sm:w-1/4 w-1/3">Outer Shell</div>
                            <p>100% polyester</p>
                        </div>
                        <div class="item bg-surface flex items-center gap-8 py-3 px-10">
                            <div class="text-title sm:w-1/4 w-1/3">Lining</div>
                            <p>100% polyurethane</p>
                        </div>
                        <div class="item flex items-center gap-8 py-3 px-10">
                            <div class="text-title sm:w-1/4 w-1/3">Size</div>
                            <p>S, M, L, XL</p>
                        </div>
                        <div class="item bg-surface flex items-center gap-8 py-3 px-10">
                            <div class="text-title sm:w-1/4 w-1/3">Colors</div>
                            <p>Grey, Red, Blue, Black</p>
                        </div>
                        <div class="item flex items-center gap-8 py-3 px-10">
                            <div class="text-title sm:w-1/4 w-1/3">Care</div>
                            <div class="flex items-center gap-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <g clip-path="url(#clip0_5544_36682)">
                                        <path d="M8 0C3.58167 0 0 3.58167 0 8C0 12.4183 3.58167 16 8 16C12.4183 16 16 12.4183 16 8C16 3.58167 12.416 0.005 8 0ZM8 0.533333C9.88787 0.532223 11.7055 1.24913 13.0843 2.53867L12.7273 2.89567C12.6423 2.74067 12.5637 2.60067 12.4987 2.48567C12.4734 2.44723 12.439 2.41567 12.3985 2.39383C12.358 2.37199 12.3127 2.36056 12.2667 2.36056C12.2207 2.36056 12.1754 2.37199 12.1349 2.39383C12.0944 2.41567 12.0599 2.44723 12.0347 2.48567C11.7523 2.98567 11.2397 3.919 10.8613 4.76033L9.57333 6.04867C8.67742 4.37428 7.69142 2.74967 6.61967 1.182C6.5938 1.14833 6.56054 1.12105 6.52245 1.10228C6.48436 1.08351 6.44246 1.07375 6.4 1.07375C6.35754 1.07375 6.31564 1.08351 6.27755 1.10228C6.23947 1.12105 6.2062 1.14833 6.18033 1.182C6.00467 1.43667 1.86667 7.45467 1.86667 9.86667C1.86568 10.912 2.22762 11.9252 2.89067 12.7333L2.53867 13.0843C1.54675 12.021 0.887151 10.6911 0.64095 9.25796C0.394749 7.82483 0.572679 6.35099 1.15287 5.01763C1.73305 3.68427 2.69021 2.54949 3.90667 1.75282C5.12313 0.956136 6.54588 0.532273 8 0.533333ZM11.309 5.06833L12.5973 3.77967C13.1823 4.89667 13.5523 5.77033 13.6 6.16667C13.6 6.52029 13.4595 6.85943 13.2095 7.10948C12.9594 7.35952 12.6203 7.5 12.2667 7.5C11.913 7.5 11.5739 7.35952 11.3239 7.10948C11.0738 6.85943 10.9333 6.52029 10.9333 6.16667C11.0119 5.78564 11.1382 5.41605 11.3093 5.06667L11.309 5.06833ZM12.0403 3.58267C12.113 3.446 12.188 3.307 12.2667 3.16433C12.29 3.206 12.3117 3.247 12.3333 3.28867L12.0403 3.58267ZM3.27133 12.3517C2.70712 11.6463 2.39982 10.7699 2.4 9.86667C2.4 7.92 5.53333 3.104 6.4 1.809C7.40603 3.30442 8.33394 4.85093 9.18 6.44233L3.27133 12.3517ZM9.43133 6.945C9.993 8.092 10.4 9.16667 10.4 9.86667C10.4011 10.6512 10.1711 11.4187 9.73879 12.0735C9.30647 12.7282 8.69095 13.2411 7.96901 13.5482C7.24706 13.8554 6.45066 13.9432 5.67915 13.8006C4.90765 13.6581 4.19519 13.2915 3.63067 12.7467L9.43133 6.945ZM8 15.4667C6.11213 15.4678 4.29449 14.7509 2.91567 13.4613L3.25333 13.123C3.89235 13.7426 4.6998 14.1601 5.57477 14.3234C6.44975 14.4866 7.35344 14.3884 8.1729 14.041C8.99236 13.6935 9.69124 13.1122 10.1822 12.3698C10.6732 11.6274 10.9344 10.7567 10.9333 9.86667C10.9333 9.052 10.4607 7.82533 9.82833 6.54867L10.4333 5.94467C10.4197 6.00504 10.4094 6.06614 10.4027 6.12767C10.4027 6.13833 10.401 6.14933 10.401 6.161C10.401 6.65607 10.5977 7.13087 10.9477 7.48093C11.2978 7.831 11.7726 8.02767 12.2677 8.02767C12.7627 8.02767 13.2375 7.831 13.5876 7.48093C13.9377 7.13087 14.1343 6.65607 14.1343 6.161C14.1343 6.15067 14.1343 6.14033 14.1327 6.13C14.0713 5.527 13.4867 4.31967 12.9927 3.38767L13.4623 2.918C14.4535 3.98144 15.1125 5.31128 15.3582 6.74411C15.604 8.17694 15.4258 9.65035 14.8456 10.9833C14.2653 12.3162 13.3084 13.4506 12.0922 14.2471C10.8761 15.0436 9.45375 15.4675 8 15.4667Z" fill="#1F1F1F"></path>
                                        <path d="M13.3258 10.5101C13.3301 10.478 13.3288 10.4454 13.3218 10.4138C13.1848 9.94263 13.001 9.48635 12.7731 9.0518C12.7513 9.00671 12.7172 8.96869 12.6747 8.94208C12.6323 8.91548 12.5832 8.90137 12.5331 8.90137C12.483 8.90137 12.4339 8.91548 12.3915 8.94208C12.349 8.96869 12.3149 9.00671 12.2931 9.0518C12.0652 9.4863 11.8815 9.94259 11.7448 10.4138C11.7378 10.4454 11.7364 10.478 11.7408 10.5101C11.7672 10.7016 11.862 10.877 12.0076 11.0039C12.1533 11.1309 12.34 11.2008 12.5333 11.2008C12.7265 11.2008 12.9132 11.1309 13.0589 11.0039C13.2046 10.877 13.2994 10.7016 13.3258 10.5101ZM12.5331 10.6668C12.4763 10.6669 12.421 10.6488 12.3752 10.6152C12.3294 10.5816 12.2955 10.5343 12.2784 10.4801C12.3491 10.2506 12.4341 10.0257 12.5331 9.8068C12.6322 10.0254 12.7173 10.2501 12.7878 10.4795C12.7706 10.5336 12.7367 10.5809 12.6909 10.6146C12.6451 10.6482 12.5899 10.6665 12.5331 10.6668Z" fill="#1F1F1F"></path>
                                        <path d="M14.1329 11.4668H13.5996V12.0001H14.1329V11.4668Z" fill="#1F1F1F"></path>
                                        <path d="M13.3341 11.4668H12.8008V12.0001H13.3341V11.4668Z" fill="#1F1F1F"></path>
                                        <path d="M14.1329 10.666H13.5996V11.1993H14.1329V10.666Z" fill="#1F1F1F"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_5544_36682">
                                            <rect width="16" height="16" fill="white"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <g clip-path="url(#clip0_5544_36689)">
                                        <path d="M18.4739 3.94612C18.364 3.12175 17.6536 2.5 16.8219 2.5H7.08324C6.85293 2.5 6.66656 2.68636 6.66656 2.91667C6.66656 3.14698 6.85293 3.33335 7.08324 3.33335H16.8219C17.2378 3.33335 17.5934 3.64421 17.6479 4.05639L18.2184 8.33329H15.0445L17.3362 6.58077C17.5193 6.4412 17.5535 6.17957 17.4143 5.99687C17.2736 5.81336 17.0123 5.78 16.83 5.91914L13.6731 8.33325H7.08324C6.84371 8.33325 6.60707 8.34587 6.3736 8.36923L3.16969 5.91914C2.98657 5.77996 2.72618 5.81336 2.5854 5.99687C2.44626 6.17957 2.48044 6.4412 2.66352 6.58077L5.2733 8.57645C2.24326 9.37937 0 12.1372 0 15.4165C0 15.6468 0.186365 15.8332 0.416675 15.8332H3.86558L2.66356 16.7523C2.48048 16.8919 2.4463 17.1535 2.58544 17.3362C2.66763 17.4437 2.79133 17.4998 2.91665 17.4998C3.00536 17.4998 3.09407 17.4717 3.16973 17.414L5.23693 15.8332H14.7629L16.8301 17.414C16.9058 17.4717 16.9945 17.4998 17.0832 17.4998C17.2085 17.4998 17.3322 17.4437 17.4144 17.3362C17.5535 17.1535 17.5194 16.8919 17.3362 16.7523L16.1342 15.8332H19.5831C19.7036 15.8332 19.8175 15.7815 19.8964 15.6912C19.9754 15.6004 20.012 15.4804 19.9966 15.3616L18.4739 3.94612ZM12.5834 9.16656L9.99988 11.1422L7.4164 9.16656H12.5834ZM0.847178 14.9999C1.04128 12.0611 3.27824 9.67804 6.14626 9.24398L9.31427 11.6665L4.95533 14.9998H0.847178V14.9999ZM6.32665 14.9999L9.99988 12.1909L13.6731 14.9999H6.32665ZM15.0445 14.9999L10.6855 11.6666L13.9548 9.1666H18.3299L19.107 14.9999H15.0445Z" fill="#1F1F1F"></path>
                                        <path d="M18.4739 3.94612C18.364 3.12175 17.6536 2.5 16.8219 2.5H7.08324C6.85293 2.5 6.66656 2.68636 6.66656 2.91667C6.66656 3.14698 6.85293 3.33335 7.08324 3.33335H16.8219C17.2378 3.33335 17.5934 3.64421 17.6479 4.05639L18.2184 8.33329H15.0445L17.3362 6.58077C17.5193 6.4412 17.5535 6.17957 17.4143 5.99687C17.2736 5.81336 17.0123 5.78 16.83 5.91914L13.6731 8.33325H7.08324C6.84371 8.33325 6.60707 8.34587 6.3736 8.36923L3.16969 5.91914C2.98657 5.77996 2.72618 5.81336 2.5854 5.99687C2.44626 6.17957 2.48044 6.4412 2.66352 6.58077L5.2733 8.57645C2.24326 9.37937 0 12.1372 0 15.4165C0 15.6468 0.186365 15.8332 0.416675 15.8332H3.86558L2.66356 16.7523C2.48048 16.8919 2.4463 17.1535 2.58544 17.3362C2.66763 17.4437 2.79133 17.4998 2.91665 17.4998C3.00536 17.4998 3.09407 17.4717 3.16973 17.414L5.23693 15.8332H14.7629L16.8301 17.414C16.9058 17.4717 16.9945 17.4998 17.0832 17.4998C17.2085 17.4998 17.3322 17.4437 17.4144 17.3362C17.5535 17.1535 17.5194 16.8919 17.3362 16.7523L16.1342 15.8332H19.5831C19.7036 15.8332 19.8175 15.7815 19.8964 15.6912C19.9754 15.6004 20.012 15.4804 19.9966 15.3616L18.4739 3.94612ZM12.5834 9.16656L9.99988 11.1422L7.4164 9.16656H12.5834ZM0.847178 14.9999C1.04128 12.0611 3.27824 9.67804 6.14626 9.24398L9.31427 11.6665L4.95533 14.9998H0.847178V14.9999ZM6.32665 14.9999L9.99988 12.1909L13.6731 14.9999H6.32665ZM15.0445 14.9999L10.6855 11.6666L13.9548 9.1666H18.3299L19.107 14.9999H15.0445Z" fill="#1F1F1F"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_5544_36689">
                                            <rect width="20" height="20" fill="white"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" viewBox="0 0 18 16" fill="none">
                                    <g clip-path="url(#clip0_5544_36692)">
                                        <path d="M15.1309 14.3723H2.6163C2.55417 14.372 2.49399 14.3505 2.44573 14.3114C2.39747 14.2723 2.36404 14.2178 2.35096 14.1571L0.00581614 1.96527C-0.00150672 1.93088 -0.00191806 1.89536 0.00460146 1.86081C0.011121 1.82625 0.0244481 1.79335 0.0437997 1.76398C0.0631512 1.73462 0.0881419 1.7094 0.117326 1.68978C0.146511 1.67016 0.179306 1.65655 0.213801 1.64972C0.248701 1.64246 0.284706 1.64231 0.319664 1.64928C0.354622 1.65625 0.387814 1.67019 0.417266 1.69027C0.446718 1.71035 0.47182 1.73617 0.491077 1.76616C0.510335 1.79616 0.523358 1.82973 0.529356 1.86487L2.86732 13.8344H14.9372L17.2107 1.85052C17.2158 1.81568 17.228 1.78224 17.2465 1.75229C17.265 1.72233 17.2895 1.69647 17.3184 1.67632C17.3472 1.65617 17.38 1.64214 17.4145 1.6351C17.449 1.62805 17.4846 1.62815 17.519 1.63537C17.5542 1.64137 17.5877 1.65438 17.6177 1.67364C17.6477 1.6929 17.6735 1.71801 17.6936 1.74746C17.7137 1.77691 17.7276 1.8101 17.7346 1.84506C17.7416 1.88002 17.7415 1.91602 17.7342 1.95093L15.3891 14.1428C15.3774 14.2048 15.3446 14.2609 15.2962 14.3015C15.2478 14.342 15.1868 14.3645 15.1237 14.3651L15.1309 14.3723Z" fill="#1F1F1F"></path>
                                        <path d="M12.7509 5.15568C12.0105 5.17359 11.2807 4.97682 10.6496 4.58911C10.0944 4.25817 9.46004 4.08346 8.81367 4.08346C8.1673 4.08346 7.53295 4.25817 6.97772 4.58911C6.3409 4.96016 5.61705 5.15566 4.88001 5.15566C4.14297 5.15566 3.41913 4.96016 2.7823 4.58911C2.23372 4.24251 1.5951 4.0654 0.946355 4.07993C0.875303 4.07995 0.807049 4.05222 0.756142 4.00266C0.705235 3.95309 0.675698 3.88559 0.673828 3.81457C0.675644 3.74286 0.704941 3.6746 0.755661 3.62388C0.80638 3.57316 0.87465 3.54387 0.946355 3.54205C1.68751 3.52628 2.41735 3.72556 3.04765 4.11579C3.5948 4.4589 4.23079 4.63348 4.87643 4.6178C5.52666 4.63419 6.16744 4.45966 6.71954 4.11579C7.35353 3.74029 8.07682 3.54216 8.81367 3.54216C9.55052 3.54216 10.2738 3.74029 10.9078 4.11579C11.4639 4.4481 12.0995 4.62358 12.7473 4.62358C13.3951 4.62358 14.0308 4.4481 14.5869 4.11579C15.2139 3.72422 15.9419 3.52477 16.681 3.54205C16.7533 3.54205 16.8226 3.57076 16.8737 3.62187C16.9248 3.67298 16.9535 3.74229 16.9535 3.81457C16.9535 3.85002 16.9464 3.88513 16.9327 3.9178C16.9189 3.95047 16.8987 3.98005 16.8733 4.00479C16.8479 4.02953 16.8178 4.04892 16.7847 4.06183C16.7517 4.07473 16.7165 4.08088 16.681 4.07993C16.0323 4.0654 15.3936 4.24251 14.8451 4.58911C14.2162 4.97586 13.489 5.17261 12.7509 5.15568Z" fill="#1F1F1F"></path>
                                        <path d="M14.9251 16C14.8852 16 14.8457 15.991 14.8097 15.9736C14.7736 15.9562 14.742 15.9309 14.7172 15.8996L2.61139 0.430295C2.58973 0.402512 2.57375 0.370733 2.56437 0.336775C2.55499 0.302817 2.55239 0.26734 2.55672 0.232378C2.56105 0.197415 2.57223 0.163648 2.5896 0.133004C2.60698 0.102359 2.63023 0.0754368 2.65801 0.0537754C2.68579 0.0321141 2.71757 0.0161333 2.75153 0.00675291C2.78549 -0.00262746 2.82095 -0.005225 2.85592 -0.000896318C2.89088 0.00343237 2.92465 0.014609 2.95529 0.0319877C2.98593 0.0493664 3.01286 0.07261 3.03452 0.100393L15.1331 15.5697C15.1557 15.5966 15.1726 15.6278 15.1827 15.6615C15.1929 15.6951 15.196 15.7305 15.192 15.7654C15.188 15.8004 15.1769 15.8341 15.1593 15.8645C15.1418 15.895 15.1183 15.9216 15.0901 15.9426C15.0429 15.9793 14.9849 15.9995 14.9251 16Z" fill="#1F1F1F"></path>
                                        <path d="M2.82464 16.0001C2.76466 16.0008 2.70635 15.9805 2.6597 15.9428C2.63183 15.9216 2.60841 15.8952 2.5908 15.865C2.57319 15.8348 2.56173 15.8014 2.55706 15.7667C2.5524 15.7321 2.55462 15.6968 2.56362 15.663C2.57262 15.6293 2.58821 15.5976 2.60949 15.5698L14.7153 0.100544C14.7369 0.0732209 14.7637 0.0504354 14.7942 0.0334844C14.8247 0.0165334 14.8582 0.00574553 14.8928 0.00174941C14.9275 -0.00224671 14.9625 0.000618864 14.9961 0.0101865C15.0296 0.0197542 15.0609 0.0358419 15.0882 0.0575155C15.1164 0.0785597 15.1399 0.105126 15.1574 0.135595C15.175 0.166063 15.1861 0.199792 15.1901 0.234706C15.1941 0.269621 15.191 0.304986 15.1808 0.338644C15.1707 0.372301 15.1538 0.403543 15.1312 0.430445L3.03262 15.8997C3.00776 15.9311 2.97614 15.9564 2.94013 15.9737C2.90411 15.9911 2.86463 16.0002 2.82464 16.0001Z" fill="#1F1F1F"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_5544_36692">
                                            <rect width="17.7499" height="16" fill="white"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
