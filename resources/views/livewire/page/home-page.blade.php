<x-layouts.main :title="$this->title ?? config('app.name')">
    <main>
        @livewire("components.top-nav")

        @livewire("components.nav-bar")

        <!-- Marquee -->
        <div class="banner-top bg-black py-3">
            <div class="marquee-block swiper-container flex items-center whitespace-nowrap">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="text-button-uppercase text-white px-8">Get 10% off on selected items</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="line w-8 h-px bg-white"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="text-button-uppercase text-white px-8">10% off swim suits</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="line w-8 h-px bg-white"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="text-button-uppercase text-white px-8">Free shipping on all orders over $50
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="line w-8 h-px bg-white"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="text-button-uppercase text-white px-8">10% off on all summer essentials!</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="line w-8 h-px bg-white"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="text-button-uppercase text-white px-8">Get summer-ready: 10% off swim suits
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="line w-8 h-px bg-white"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="text-button-uppercase text-white px-8">10% off on all product</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="line w-8 h-px bg-white"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider -->
        <div class="slider-block style-two bg-linear 2xl:h-[800px] xl:h-[740px] lg:h-[680px] md:h-[580px] sm:h-[500px] h-[420px] w-full">
            <div class="slider-main h-full w-full">
                <div class="swiper swiper-slider h-full relative">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="slider-item h-full w-full relative overflow-hidden">
                                <div class="container w-full h-full flex items-center">
                                    <div class="text-content sm:w-1/2 w-2/3">
                                        <div class="text-sub-display">Sale! Up To 50% Off!</div>
                                        <div class="text-display md:mt-5 mt-2">Experience the Beauty of Cosmetic
                                            Innovations
                                        </div>
                                        <a href="/shop-breadcrumb-img.html" class="button-main md:mt-8 mt-3"> Shop
                                            Now</a>
                                    </div>
                                    <div class="sub-img absolute left-0 top-0 w-full h-full z-[-1]">
                                        <img src="{{ asset('frontend/images/slider/bg-jewelry1-1.png')}}" alt="bg-jewelry1-1" class="w-full h-full object-cover" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slider-item h-full w-full relative overflow-hidden">
                                <div class="container w-full h-full flex items-center">
                                    <div class="text-content sm:w-1/2 w-2/3">
                                        <div class="text-sub-display">Sale! Up To 50% Off!</div>
                                        <div class="text-display md:mt-5 mt-2">Indulge in the Luxurious World of
                                            Cosmetics
                                        </div>
                                        <a href="/shop-breadcrumb-img.html" class="button-main md:mt-8 mt-3"> Shop
                                            Now</a>
                                    </div>
                                    <div class="sub-img absolute left-0 top-0 w-full h-full z-[-1]">
                                        <img src="{{ asset('frontend/images/slider/bg-jewelry1-2.png')}}" alt="bg-jewelry1-2" class="w-full h-full object-cover" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slider-item h-full w-full relative overflow-hidden">
                                <div class="container w-full h-full flex items-center">
                                    <div class="text-content sm:w-1/2 w-2/3">
                                        <div class="text-sub-display">Sale! Up To 50% Off!</div>
                                        <div class="text-display md:mt-5 mt-2">Embrace the Artistry of Cosmetic
                                            Products
                                        </div>
                                        <a href="/shop-breadcrumb-img.html" class="button-main md:mt-8 mt-3"> Shop
                                            Now</a>
                                    </div>
                                    <div class="sub-img absolute left-0 top-0 w-full h-full z-[-1]">
                                        <img src="{{ asset('frontend/images/slider/bg-jewelry1-3.png')}}" alt="bg-jewelry1-3" class="w-full h-full object-cover" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="swiper-pagination"></div> -->
                </div>
            </div>
        </div>


        <div class="quote-block bg-linear py-[60px]">
            <div class="container flex items-center justify-center">
                <div class="heading3 md:leading-[50px] font-medium lg:w-3/4 px-4 text-center">"I absolutely love this
                    shop!
                    The
                    products are high-quality and the customer service is excellent. I always leave with exactly what I
                    need
                    and
                    a smile on my face."</div>
            </div>
        </div>

        @if(count($collections) > 0)
        <div class="banner-block md:pt-20 pt-10">
            <div class="container">
                <div class="list-banner grid lg:grid-cols-4 min-[480px]:grid-cols-2 gap-[30px]">
                    <div class="bg-black rounded-[20px] overflow-hidden h-full py-8 md:px-[30px] px-6 flex flex-col justify-center">
                        <div class="caption2 font-semibold text-green uppercase">2025 trends</div>
                        <div class="heading3 text-white mt-6">
                            Find the Latest Trends
                        </div>
                        <div class="body1 text-white mt-3">
                            Explore our curated collection of trending jewelry and accessories for every style.
                        </div>
                    </div>
                    @foreach($collections as $collection)
                    <a href="shop-breadcrumb1.html" class="banner-item relative bg-surface block rounded-[20px] overflow-hidden duration-500 cursor-pointer" style="aspect-ratio:3/4;object-cover">
                        <div class="banner-img w-full h-full">
                            <img src="{{ asset('storage/' . $collection->image)}}" alt="bg-img" class="w-full h-full object-cover duration-500" style="aspect-ratio:3/4;object-cover" />
                        </div>
                        <div class="banner-content absolute left-[30px] bottom-[30px]">
                            <div class="caption1">{{$collection->products->count()}} Products</div>
                            <div class="heading4">
                                {{$collection->name}}
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        <div class="look-book-block md:mt-20 mt-10 lg:py-20 md:py-14 py-10 bg-linear">
            <div class="container">
                <div class="main-content relative flex max-lg:flex-wrap gap-y-5 items-center lg:justify-end justify-center">
                    <div class="heading bg-white xl:py-20 py-10 xl:px-10 px-8 rounded-2xl lg:w-[30%] lg:absolute lg:top-1/2 lg:-translate-y-1/2 lg:left-0 z-[1] max-lg:text-center">
                        <div class="heading3">Discover the latest collection</div>
                        <a href="{{route('collection')}}" class="button-main bg-green lg:w-full text-center lg:mt-8 mt-5 text-black hover:bg-black hover:text-white" >Shop
                            Collection </a>
                    </div>
                    <div class="list popular-product w-3/4 grid sm:grid-cols-2 gap-4 max-lg:w-full">
                        <div class="item relative rounded-xl overflow-hidden">
                            <img src="{{ asset('frontend/images/banner/lookbook-jewelry1.png')}}" alt="{{ asset('frontend/images/banner/lookbook-jewelry1.png')}}" class="w-full h-full object-cover" />
                            <div class="dots absolute top-[22%] left-[55%] cursor-pointer">
                                <div class="top-dot w-8 h-8 rounded-full bg-outline flex items-center justify-center">
                                    <span class="bg-white w-3 h-3 rounded-full duration-300"></span>
                                </div>
                                <a href="product-default.html" class="product-infor bg-white rounded-2xl p-4 cursor-pointer">
                                    <div class="text-title name">gold necklace</div>
                                    <div class="price text-center">$60.00</div>
                                    <div class="text-center underline mt-1 text-button-uppercase duration-300 text-secondary2 hover:text-black">
                                        View</div>
                                </a>
                            </div>
                            <div class="dots absolute top-[42%] left-[32%] cursor-pointer">
                                <div class="top-dot w-8 h-8 rounded-full bg-outline flex items-center justify-center">
                                    <span class="bg-white w-3 h-3 rounded-full duration-300"></span>
                                </div>
                                <a href="product-default.html" class="product-infor bg-white rounded-2xl p-4 cursor-pointer">
                                    <div class="text-title name">golden ring</div>
                                    <div class="price text-center">$50.00</div>
                                    <div class="text-center underline mt-1 text-button-uppercase duration-300 text-secondary2 hover:text-black">
                                        View</div>
                                </a>
                            </div>
                            <div class="dots bottom-dot absolute bottom-[20%] left-[58%] cursor-pointer">
                                <div class="bottom-dot w-8 h-8 rounded-full bg-outline flex items-center justify-center">
                                    <span class="bg-white w-3 h-3 rounded-full duration-300"></span>
                                </div>
                                <a href="product-default.html" class="product-infor bg-white rounded-2xl p-4 cursor-pointer">
                                    <div class="text-title name">Ruby Ring</div>
                                    <div class="price text-center">$40.00</div>
                                    <div class="text-center underline mt-1 text-button-uppercase duration-300 text-secondary2 hover:text-black">
                                        View</div>
                                </a>
                            </div>
                        </div>
                        <div class="item relative rounded-xl overflow-hidden">
                            <img src="{{ asset('frontend/images/banner/lookbook-jewelry2.png')}}" alt="{{ asset('frontend/images/banner/lookbook-jewelry2.png')}}" class="w-full h-full object-cover" />
                            <div class="dots absolute top-[26%] left-[54%] cursor-pointer">
                                <div class="top-dot w-8 h-8 rounded-full bg-outline flex items-center justify-center">
                                    <span class="bg-white w-3 h-3 rounded-full duration-300"></span>
                                </div>
                                <a href="product-default.html" class="product-infor bg-white rounded-2xl p-4 cursor-pointer">
                                    <div class="text-title name">Snake Ring</div>
                                    <div class="price text-center">$45.00</div>
                                    <div class="text-center underline mt-1 text-button-uppercase duration-300 text-secondary2 hover:text-black">
                                        View</div>
                                </a>
                            </div>
                            <div class="dots absolute top-[29%] left-[30%] cursor-pointer">
                                <div class="top-dot w-8 h-8 rounded-full bg-outline flex items-center justify-center">
                                    <span class="bg-white w-3 h-3 rounded-full duration-300"></span>
                                </div>
                                <a href="product-default.html" class="product-infor bg-white rounded-2xl p-4 cursor-pointer">
                                    <div class="text-title name">Golden Ring</div>
                                    <div class="price text-center">$48.00</div>
                                    <div class="text-center underline mt-1 text-button-uppercase duration-300 text-secondary2 hover:text-black">
                                        View</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-features-block filter-product-block md:pt-20 pt-10">
            <div class="container">
                <div class="heading flex flex-col items-center text-center">
                    <div class="menu-tab bg-surface rounded-2xl">
                        <div class="menu flex items-center gap-2 p-1">
                            <div class="indicator absolute top-1 bottom-1 bg-white rounded-full shadow-md duration-300">
                            </div>
                            <div class="tab-item relative text-secondary heading5 py-2 px-5 cursor-pointer duration-500 hover:text-black active" data-item="best sellers">best sellers</div>
                            <div class="tab-item relative text-secondary heading5 py-2 px-5 cursor-pointer duration-500 hover:text-black" data-item="on sale">on sale</div>
                            <div class="tab-item relative text-secondary heading5 py-2 px-5 cursor-pointer duration-500 hover:text-black" data-item="new arrivals">new arrivals</div>
                        </div>
                    </div>
                </div>
                <div class="list-product six-product hide-product-sold relative section-swiper-navigation style-outline style-small-border md:mt-10 mt-6">
                    <div class="swiper-button-prev2 sm:left-10 left-6">
                        <i class="ph-bold ph-caret-left text-xl"></i>
                    </div>
                    <div class="swiper swiper-list-product h-full relative">
                        <div class="swiper-wrapper" data-type="jewelry">
                            <!-- List six product -->
                        </div>
                    </div>
                    <div class="swiper-button-next2 sm:right-10 right-6">
                        <i class="ph-bold ph-caret-right text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="featured-product underwear filter-product-img md:mt-20 mt-10 md:py-20 py-10 bg-surface">
            <div class="container flex lg:items-center justify-between gap-y-6 flex-wrap">
                <div class="list-img md:w-1/2 md:pr-4 w-full flex-shrink-0">
                    <img src="{{ asset('frontend/images/product/jewelry/1-1.png')}}" class="w-full aspect-[3/4] object-cover rounded-2xl" alt="img" />
                </div>
                <div class="product-item product-infor md:w-1/2 w-full lg:pl-16 md:pl-6" data-item="66">
                    <div class="flex justify-between">
                        <div>
                            <div class="caption2 text-secondary font-semibold uppercase">Jewelry</div>
                            <div class="heading4 mt-1">Cassis & Grape</div>
                        </div>
                        <div class="add-wishlist-btn w-10 h-10 flex-shrink-0 flex items-center justify-center border border-line cursor-pointer rounded-lg duration-300 hover:bg-black hover:text-white">
                            <i class="ph ph-heart text-xl"></i>
                        </div>
                    </div>
                    <div class="flex items-center gap-1 mt-3">
                        <div class="rate flex">
                            <i class="ph-fill ph-star text-sm text-yellow"></i>
                            <i class="ph-fill ph-star text-sm text-yellow"></i>
                            <i class="ph-fill ph-star text-sm text-yellow"></i>
                            <i class="ph-fill ph-star text-sm text-yellow"></i><i class="ph-fill ph-star text-sm text-yellow"></i>
                        </div>
                        <span class="caption1 text-secondary">(1.234 reviews)</span>
                    </div>
                    <div class="flex items-center gap-3 flex-wrap mt-5 pb-6 border-b border-line">
                        <div class="product-price heading5">$20.00</div>
                        <div class="w-px h-4 bg-line"></div>
                        <div class="product-origin-price font-normal text-secondary2">
                            <del>$32.00</del>
                        </div>
                        <div class="product-sale caption2 font-semibold bg-green px-3 py-0.5 inline-block rounded-full">
                            -19%
                        </div>
                        <div class="desc text-secondary mt-3">Keep your clothes organized, yet elegant with storage
                            cabinets
                            by
                            Onita Patio Furniture. Traditionally designed, they are perfect to be used in the any place
                            where
                            you need to store.</div>
                    </div>
                    <div class="list-action mt-6">
                        <div class="choose-color">
                            <div class="text-title">Colors: <span class="text-title color">Yellow</span></div>
                            <div class="list-color flex items-center gap-2 flex-wrap mt-3">
                                <div class="color-item w-12 h-12 rounded-xl duration-300 relative">
                                    <img src="{{ asset('frontend/images/product/jewelry/2-1.png')}}" alt="color" class="rounded-xl" />
                                    <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                        silver</div>
                                </div>
                                <div class="color-item w-12 h-12 rounded-xl duration-300 relative active">
                                    <img src="{{ asset('frontend/images/product/jewelry/1-2.png')}}" alt="color" class="rounded-xl" />
                                    <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                        yellow</div>
                                </div>
                            </div>
                        </div>
                        <div class="text-title mt-5">Quantity:</div>
                        <div class="choose-quantity flex items-center max-xl:flex-wrap lg:justify-between gap-5 mt-3">
                            <div class="quantity-block md:p-3 max-md:py-1.5 max-md:px-3 flex items-center justify-between rounded-lg border border-line sm:w-[140px] w-[120px] flex-shrink-0">
                                <i class="ph-bold ph-minus cursor-pointer body1"></i>
                                <div class="quantity body1 font-semibold">1</div>
                                <i class="ph-bold ph-plus cursor-pointer body1"></i>
                            </div>
                            <div class="add-cart-btn button-main whitespace-nowrap w-full text-center bg-white text-black border border-black">
                                Add To Cart</div>
                        </div>
                        <div class="button-block mt-5">
                            <a href="checkout.html" class="button-main w-full text-center">Buy It Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="benefit-block py-[60px] bg-linear">
            <div class="container">
                <div class="list-benefit grid items-start lg:grid-cols-4 grid-cols-2 gap-[30px]">
                    <div class="benefit-item flex flex-col items-center justify-center">
                        <i class="ph ph-headset lg:text-7xl text-5xl"></i>
                        <div class="heading6 text-center mt-5">24/7 Customer Service</div>
                        <div class="caption1 text-secondary text-center mt-3">We&apos;re here to help you with any
                            questions
                            or
                            concerns you have, 24/7.</div>
                    </div>
                    <div class="benefit-item flex flex-col items-center justify-center">
                        <i class="ph ph-swap lg:text-7xl text-5xl"></i>
                        <div class="heading6 text-center mt-5">14-Day Money Back</div>
                        <div class="caption1 text-secondary text-center mt-3">If you&apos;re not satisfied with your
                            purchase,
                            simply return it within 14 days for a refund.</div>
                    </div>
                    <div class="benefit-item flex flex-col items-center justify-center">
                        <i class="ph ph-shield-check lg:text-7xl text-5xl"></i>
                        <div class="heading6 text-center mt-5">Our Guarantee</div>
                        <div class="caption1 text-secondary text-center mt-3">We stand behind our products and services
                            and
                            guarantee your satisfaction.</div>
                    </div>
                    <div class="benefit-item flex flex-col items-center justify-center">
                        <i class="ph ph-truck-trailer lg:text-7xl text-5xl"></i>
                        <div class="heading6 text-center mt-5">Shipping worldwide</div>
                        <div class="caption1 text-secondary text-center mt-3">We ship our products worldwide, making
                            them
                            accessible to customers everywhere.</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="instagram-block md:pt-20 pt-10">
            <div class="">
                <div class="container">
                    <div class="heading">
                        <div class="heading3 text-center">Anvogue On Instagram</div>
                        <div class="text-center mt-3">#Anvougetheme</div>
                    </div>
                </div>
                <div class="list-instagram overflow-hidden md:mt-10 mt-6">
                    <div class="swiper swiper-instagram-three">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/" target="_blank" class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/instagram/jewelry1.png')}}" alt="0" class="h-full w-full duration-500 relative" />
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/" target="_blank" class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/instagram/jewelry5.png')}}" alt="1" class="h-full w-full duration-500 relative" />
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/" target="_blank" class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/instagram/jewelry2.png')}}" alt="3" class="h-full w-full duration-500 relative" />
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/" target="_blank" class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/instagram/jewelry3.png')}}" alt="4" class="h-full w-full duration-500 relative" />
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/" target="_blank" class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/instagram/jewelry4.png')}}" alt="5" class="h-full w-full duration-500 relative" />
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/" target="_blank" class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/instagram/jewelry6.png')}}" alt="10" class="h-full w-full duration-500 relative" />
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/" target="_blank" class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/instagram/4.png')}}" alt="2" class="h-full w-full duration-500 relative" />
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(count($brands)>0)
        <div class="brand-block md:py-[60px] py-[32px]">
            <div class="container">
                <div class="list-brand">
                    <div class="swiper swiper-list-brand">
                        <div class="swiper-wrapper">
                            @foreach($brands as $brand)
                            <div class="swiper-slide">
                                <div class="brand-item relative flex flex-col items-center justify-center" style="width: 60px;">
                                    <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}" class="h-full w-auto duration-500 relative object-cover" />
                                    <p class="text-center text-secondary2 mt-2 font-semibold text-sm md:text-base lg:text-lg xl:text-xl 2xl:text-2xl" style="max-width: 200px; margin: 0 auto;">
                                        {{ $brand->name }}
                                    </p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @include('partials.footer')
    </main>
</x-layouts.main>
