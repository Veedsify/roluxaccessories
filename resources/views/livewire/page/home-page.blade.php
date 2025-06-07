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

        <div class="banner-block md:pt-20 pt-10">
            <div class="container">
                <div class="list-banner grid lg:grid-cols-4 min-[480px]:grid-cols-2 gap-[30px]">
                    <div class="bg-black rounded-[20px] overflow-hidden h-full py-8 md:px-[30px] px-6 flex flex-col justify-center">
                        <div class="caption2 font-semibold text-green uppercase">2024 winter trends</div>
                        <div class="heading3 text-white mt-6">Faux-leather trousers</div>
                        <div class="body1 text-white mt-3">Check out our latest collection of chic and trendy outfits
                            that
                            will
                            keep you looking stylish all year round.</div>
                    </div>
                    <a href="shop-breadcrumb1.html" class="banner-item relative bg-surface block rounded-[20px] overflow-hidden duration-500 cursor-pointer">
                        <div class="banner-img w-full h-full">
                            <img src="{{ asset('frontend/images/collection/category-jewelry1.png')}}" alt="bg-img" class="w-full h-full object-cover duration-500" />
                        </div>
                        <div class="banner-content absolute left-[30px] bottom-[30px]">
                            <div class="caption1">15 Products</div>
                            <div class="heading4">Ring</div>
                        </div>
                    </a>
                    <a href="shop-breadcrumb1.html" class="banner-item relative bg-surface block rounded-[20px] overflow-hidden duration-500 cursor-pointer">
                        <div class="banner-img w-full h-full">
                            <img src="{{ asset('frontend/images/collection/category-jewelry2.png')}}" alt="bg-img" class="w-full h-full object-cover duration-500" />
                        </div>
                        <div class="banner-content absolute left-[30px] bottom-[30px]">
                            <div class="caption1">7 Products</div>
                            <div class="heading4">necklaces</div>
                        </div>
                    </a>
                    <a href="shop-breadcrumb1.html" class="banner-item relative bg-surface block rounded-[20px] overflow-hidden duration-500 cursor-pointer">
                        <div class="banner-img w-full h-full">
                            <img src="{{ asset('frontend/images/collection/category-jewelry3.png')}}" alt="bg-img" class="w-full h-full object-cover duration-500" />
                        </div>
                        <div class="banner-content absolute left-[30px] bottom-[30px]">
                            <div class="caption1">12 Products</div>
                            <div class="heading4">Earrings</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="look-book-block md:mt-20 mt-10 lg:py-20 md:py-14 py-10 bg-linear">
            <div class="container">
                <div class="main-content relative flex max-lg:flex-wrap gap-y-5 items-center lg:justify-end justify-center">
                    <div class="heading bg-white xl:py-20 py-10 xl:px-10 px-8 rounded-2xl lg:w-[30%] lg:absolute lg:top-1/2 lg:-translate-y-1/2 lg:left-0 z-[1] max-lg:text-center">
                        <div class="heading3">Discover the latest collection</div>
                        <a href="/shop-collection.html" class="button-main bg-green lg:w-full text-center lg:mt-8 mt-5 text-black hover:bg-black hover:text-white">Shop
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

        <div class="featured-product underwear filter-product-img md:mt-20 mt-10 md:py-20 py-10 bg-surface">
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
        </div>

        <div class="container">
            <div class="newsletter-block bg-transparent md:py-20 sm:py-14 py-10 sm:px-8 px-6 sm:rounded-[32px] rounded-3xl flex flex-col items-center">
                <div class="heading3 text-white text-center">Sign up and get 10% off</div>
                <div class="text-white text-center mt-3">Sign up for early sale access, new in, promotions and more
                </div>
                <div class="input-block lg:w-1/2 sm:w-3/5 w-full h-[52px] sm:mt-10 mt-7">
                    <form class="w-full h-full relative">
                        <input type="email" placeholder="Enter your e-mail" class="caption1 w-full h-full pl-4 pr-14 rounded-xl border border-line" required />
                        <button class="button-main bg-green text-black absolute top-1 bottom-1 right-1 flex items-center justify-center">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>

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

        <div class="brand-block md:py-[60px] py-[32px]">
            <div class="container">
                <div class="list-brand">
                    <div class="swiper swiper-list-brand">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="brand-item relative flex items-center justify-center h-[36px]">
                                    <img src="{{ asset('frontend/images/brand/1.png')}}" alt="1" class="h-full w-auto duration-500 relative object-cover" />
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-item relative flex items-center justify-center h-[36px]">
                                    <img src="{{ asset('frontend/images/brand/2.png')}}" alt="2" class="h-full w-auto duration-500 relative object-cover" />
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-item relative flex items-center justify-center h-[36px]">
                                    <img src="{{ asset('frontend/images/brand/3.png')}}" alt="3" class="h-full w-auto duration-500 relative object-cover" />
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-item relative flex items-center justify-center h-[36px]">
                                    <img src="{{ asset('frontend/images/brand/4.png')}}" alt="4" class="h-full w-auto duration-500 relative object-cover" />
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-item relative flex items-center justify-center h-[36px]">
                                    <img src="{{ asset('frontend/images/brand/5.png')}}" alt="5" class="h-full w-auto duration-500 relative object-cover" />
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-item relative flex items-center justify-center h-[36px]">
                                    <img src="{{ asset('frontend/images/brand/6.png')}}" alt="6" class="h-full w-auto duration-500 relative object-cover" />
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-item relative flex items-center justify-center h-[36px]">
                                    <img src="{{ asset('frontend/images/brand/7.png')}}" alt="7" class="h-full w-auto duration-500 relative object-cover" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="footer" class="footer">
            <div class="footer-main bg-surface">
                <div class="container">
                    <div class="content-footer md:py-[60px] py-10 flex justify-between flex-wrap gap-y-8">
                        <div class="company-infor basis-1/4 max-lg:basis-full pr-7">
                            <a href="/" class="logo inline-block">
                                <div class="heading3 w-fit">Anvogue</div>
                            </a>
                            <div class="flex gap-3 mt-3">
                                <div class="flex flex-col">
                                    <span class="text-button">Mail:</span>
                                    <span class="text-button mt-3">Phone:</span>
                                    <span class="text-button mt-3">Address:</span>
                                </div>
                                <div class="flex flex-col">
                                    <span class="">hi.avitex@gmail.com</span>
                                    <span class="mt-[14px]">1-333-345-6868</span>
                                    <span class="mt-3 pt-1">549 Oak St.Crystal Lake, IL 60014</span>
                                </div>
                            </div>
                        </div>
                        <div class="right-content flex flex-wrap gap-y-8 basis-3/4 max-lg:basis-full">
                            <div class="list-nav flex justify-between basis-2/3 max-md:basis-full gap-4">
                                <div class="item flex flex-col basis-1/3">
                                    <div class="text-button-uppercase pb-3">Infomation</div>
                                    <a class="caption1 has-line-before duration-300 w-fit" href="contact.html">Contact
                                        us
                                    </a>
                                    <a class="caption1 has-line-before duration-300 w-fit pt-2" href="#!"> Career </a>
                                    <a class="caption1 has-line-before duration-300 w-fit pt-2" href="/my-account.html">
                                        My
                                        Account</a>
                                    <a class="caption1 has-line-before duration-300 w-fit pt-2" href="/order-tracking.html">
                                        Order & Returns</a>
                                    <a class="caption1 has-line-before duration-300 w-fit pt-2" href="faqs.html">FAQs
                                    </a>
                                </div>
                                <div class="item flex flex-col basis-1/3">
                                    <div class="text-button-uppercase pb-3">Quick Shop</div>
                                    <a class="caption1 has-line-before duration-300 w-fit" href="/shop-breadcrumb1.html">Women</a>
                                    <a class="caption1 has-line-before duration-300 w-fit pt-2" href="/shop-breadcrumb1.html">Men </a>
                                    <a class="caption1 has-line-before duration-300 w-fit pt-2" href="/shop-breadcrumb1.html">Clothes </a>
                                    <a class="caption1 has-line-before duration-300 w-fit pt-2" href="/shop-breadcrumb1.html">
                                        Accessories </a>
                                    <a class="caption1 has-line-before duration-300 w-fit pt-2" href="blog-default.html">Blog
                                    </a>
                                </div>
                                <div class="item flex flex-col basis-1/3">
                                    <div class="text-button-uppercase pb-3">Customer Services</div>
                                    <a class="caption1 has-line-before duration-300 w-fit" href="faqs.html">FAQs </a>
                                    <a class="caption1 has-line-before duration-300 w-fit pt-2" href="faqs.html">Shipping
                                    </a>
                                    <a class="caption1 has-line-before duration-300 w-fit pt-2" href="faqs.html">Privacy
                                        Policy</a>
                                    <a class="caption1 has-line-before duration-300 w-fit pt-2" href="/order-tracking.html">Return & Refund</a>
                                </div>
                            </div>
                            <div class="newsletter basis-1/3 pl-7 max-md:basis-full max-md:pl-0">
                                <div class="text-button-uppercase">Newletter</div>
                                <div class="caption1 mt-3">Sign up for our newsletter and get 10% off your first
                                    purchase
                                </div>
                                <div class="input-block w-full h-[52px] mt-4">
                                    <form class="w-full h-full relative" action="post">
                                        <input type="email" placeholder="Enter your e-mail" class="caption1 w-full h-full pl-4 pr-14 rounded-xl border border-line" required />
                                        <button class="w-[44px] h-[44px] bg-black flex items-center justify-center rounded-xl absolute top-1 right-1">
                                            <i class="ph ph-arrow-right text-xl text-white"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="list-social flex items-center gap-6 mt-4">
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <div class="icon-facebook text-2xl text-black"></div>
                                    </a>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </a>
                                    <a href="https://www.twitter.com/" target="_blank">
                                        <div class="icon-twitter text-2xl text-black"></div>
                                    </a>
                                    <a href="https://www.youtube.com/" target="_blank">
                                        <div class="icon-youtube text-2xl text-black"></div>
                                    </a>
                                    <a href="https://www.pinterest.com/" target="_blank">
                                        <div class="icon-pinterest text-2xl text-black"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-bottom py-3 flex items-center justify-between gap-5 max-lg:justify-center max-lg:flex-col border-t border-line">
                        <div class="left flex items-center gap-8">
                            <div class="copyright caption1 text-secondary">©2024 Anvogue. All Rights Reserved.</div>
                            <div class="select-block flex items-center gap-5 max-md:hidden">
                                <div class="choose-language flex items-center gap-1.5">
                                    <select name="language" id="chooseLanguageFooter" class="caption2 bg-transparent">
                                        <option value="English">English</option>
                                        <option value="Espana">Espana</option>
                                        <option value="France">France</option>
                                    </select>
                                    <i class="ph ph-caret-down text-xs text-[#1F1F1F]"></i>
                                </div>
                                <div class="choose-currency flex items-center gap-1.5">
                                    <select name="currency" id="chooseCurrencyFooter" class="caption2 bg-transparent">
                                        <option value="USD">USD</option>
                                        <option value="EUR">EUR</option>
                                        <option value="GBP">GBP</option>
                                    </select>
                                    <i class="ph ph-caret-down text-xs text-[#1F1F1F]"></i>
                                </div>
                            </div>
                        </div>
                        <div class="right flex items-center gap-2">
                            <div class="caption1 text-secondary">Payment:</div>
                            <div class="payment-img">
                                <img src="{{ asset('frontend/images/payment/Frame-0.png')}}" alt="payment" class="w-9" />
                            </div>
                            <div class="payment-img">
                                <img src="{{ asset('frontend/images/payment/Frame-1.png')}}" alt="payment" class="w-9" />
                            </div>
                            <div class="payment-img">
                                <img src="{{ asset('frontend/images/payment/Frame-2.png')}}" alt="payment" class="w-9" />
                            </div>
                            <div class="payment-img">
                                <img src="{{ asset('frontend/images/payment/Frame-3.png')}}" alt="payment" class="w-9" />
                            </div>
                            <div class="payment-img">
                                <img src="{{ asset('frontend/images/payment/Frame-4.png')}}" alt="payment" class="w-9" />
                            </div>
                            <div class="payment-img">
                                <img src="{{ asset('frontend/images/payment/Frame-5.png')}}" alt="payment" class="w-9" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a class="scroll-to-top-btn" href="#top-nav"><i class="ph-bold ph-caret-up"></i></a>

        <!-- Modal -->

        <div class="modal-search-block">
            <div class="modal-search-main md:p-10 p-6 rounded-[32px]">
                <div class="form-search relative w-full">
                    <i class="ph ph-magnifying-glass absolute heading5 right-6 top-1/2 -translate-y-1/2 cursor-pointer"></i>
                    <input type="text" placeholder="Searching..." class="text-button-lg h-14 rounded-2xl border border-line w-full pl-6 pr-12" />
                </div>
                <div class="keyword mt-8">
                    <div class="heading5">Feature keywords Today</div>
                    <div class="list-keyword flex items-center flex-wrap gap-3 mt-4">
                        <button class="item px-4 py-1.5 border border-line rounded-full cursor-pointer duration-300 hover:bg-black hover:text-white">Dress</button>
                        <button class="item px-4 py-1.5 border border-line rounded-full cursor-pointer duration-300 hover:bg-black hover:text-white">T-shirt</button>
                        <button class="item px-4 py-1.5 border border-line rounded-full cursor-pointer duration-300 hover:bg-black hover:text-white">Underwear</button>
                        <button class="item px-4 py-1.5 border border-line rounded-full cursor-pointer duration-300 hover:bg-black hover:text-white">Top</button>
                    </div>
                </div>
                <div class="list-recent mt-8">
                    <div class="heading6">Recently viewed products</div>
                    <div class="list-product pb-5 hide-product-sold grid xl:grid-cols-4 sm:grid-cols-3 grid-cols-2 md:gap-[30px] gap-4 mt-4">
                        <div class="product-item grid-type" data-item="14">
                            <div class="product-main cursor-pointer block">
                                <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                                    <div class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">
                                        New</div>
                                    <div class="list-action-right absolute top-3 right-3 max-lg:hidden">
                                        <div class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                            <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                                Add To
                                                Wishlist</div>
                                            <i class="ph ph-heart text-lg"></i>
                                        </div>
                                        <div class="compare-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative mt-2">
                                            <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                                Compare Product</div>
                                            <i class="ph ph-arrow-counter-clockwise text-lg compare-icon"></i>
                                            <i class="ph ph-check-circle text-lg checked-icon"></i>
                                        </div>
                                    </div>
                                    <div class="product-img w-full h-full aspect-[3/4]">
                                        <img class="w-full h-full object-cover duration-700" src="{{ asset('frontend/images/product/fashion/14-1.png')}}" alt="img" />
                                        <img class="w-full h-full object-cover duration-700" src="{{ asset('frontend/images/product/fashion/14-2.png')}}" alt="img" />
                                    </div>
                                    <div class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                        <div class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">
                                            Quick View</div>
                                        <div class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-500 bg-white hover:bg-black hover:text-white">
                                            Add To Cart</div>
                                    </div>
                                </div>
                                <div class="product-infor mt-4 lg:mb-7">
                                    <div class="product-sold sm:pb-4 pb-2">
                                        <div class="progress bg-line h-1.5 w-full rounded-full overflow-hidden relative">
                                            <div class="progress-sold bg-red absolute left-0 top-0 h-full"></div>
                                        </div>
                                        <div class="flex items-center justify-between gap-3 gap-y-1 flex-wrap mt-2">
                                            <div class="text-button-uppercase">
                                                <span class="text-secondary2 max-sm:text-xs">Sold: </span>
                                                <span class="max-sm:text-xs">12</span>
                                            </div>
                                            <div class="text-button-uppercase">
                                                <span class="text-secondary2 max-sm:text-xs">Available: </span>
                                                <span class="max-sm:text-xs">88</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-name text-title duration-300">Faux-leather trousers</div>
                                    <div class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                        <div class="color-item bg-black w-8 h-8 rounded-full duration-300 relative">
                                            <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                                Black</div>
                                        </div>
                                        <div class="color-item bg-green w-8 h-8 rounded-full duration-300 relative">
                                            <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                                Green</div>
                                        </div>
                                        <div class="color-item bg-red w-8 h-8 rounded-full duration-300 relative">
                                            <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                                Red</div>
                                        </div>
                                    </div>

                                    <div class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                        <div class="product-price text-title">$40.00</div>
                                        <div class="product-origin-price caption1 text-secondary2">
                                            <del>$50.00</del>
                                        </div>
                                        <div class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">
                                            -20%</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="product-item grid-type" data-item="13">
                            <div class="product-main cursor-pointer block">
                                <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                                    <div class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">
                                        New</div>
                                    <div class="list-action-right absolute top-3 right-3 max-lg:hidden">
                                        <div class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                            <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                                Add To
                                                Wishlist</div>
                                            <i class="ph ph-heart text-lg"></i>
                                        </div>
                                        <div class="compare-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative mt-2">
                                            <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                                Compare Product</div>
                                            <i class="ph ph-arrow-counter-clockwise text-lg compare-icon"></i>
                                            <i class="ph ph-check-circle text-lg checked-icon"></i>
                                        </div>
                                    </div>
                                    <div class="product-img w-full h-full aspect-[3/4]">
                                        <img class="w-full h-full object-cover duration-700" src="{{ asset('frontend/images/product/fashion/13-1.png')}}" alt="img" />
                                        <img class="w-full h-full object-cover duration-700" src="{{ asset('frontend/images/product/fashion/13-2.png')}}" alt="img" />
                                    </div>
                                    <div class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                        <div class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">
                                            Quick View</div>
                                        <div class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-500 bg-white hover:bg-black hover:text-white">
                                            Add To Cart</div>
                                    </div>
                                </div>
                                <div class="product-infor mt-4 lg:mb-7">
                                    <div class="product-sold sm:pb-4 pb-2">
                                        <div class="progress bg-line h-1.5 w-full rounded-full overflow-hidden relative">
                                            <div class="progress-sold bg-red absolute left-0 top-0 h-full"></div>
                                        </div>
                                        <div class="flex items-center justify-between gap-3 gap-y-1 flex-wrap mt-2">
                                            <div class="text-button-uppercase">
                                                <span class="text-secondary2 max-sm:text-xs">Sold: </span>
                                                <span class="max-sm:text-xs">12</span>
                                            </div>
                                            <div class="text-button-uppercase">
                                                <span class="text-secondary2 max-sm:text-xs">Available: </span>
                                                <span class="max-sm:text-xs">88</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-name text-title duration-300">Faux-leather trousers</div>
                                    <div class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                        <div class="color-item bg-black w-8 h-8 rounded-full duration-300 relative">
                                            <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                                Black</div>
                                        </div>
                                        <div class="color-item bg-green w-8 h-8 rounded-full duration-300 relative">
                                            <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                                Green</div>
                                        </div>
                                        <div class="color-item bg-red w-8 h-8 rounded-full duration-300 relative">
                                            <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                                Red</div>
                                        </div>
                                    </div>

                                    <div class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                        <div class="product-price text-title">$40.00</div>
                                        <div class="product-origin-price caption1 text-secondary2">
                                            <del>$50.00</del>
                                        </div>
                                        <div class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">
                                            -20%</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="product-item grid-type" data-item="12">
                            <div class="product-main cursor-pointer block">
                                <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                                    <div class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">
                                        New</div>
                                    <div class="list-action-right absolute top-3 right-3 max-lg:hidden">
                                        <div class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                            <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                                Add To
                                                Wishlist</div>
                                            <i class="ph ph-heart text-lg"></i>
                                        </div>
                                        <div class="compare-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative mt-2">
                                            <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                                Compare Product</div>
                                            <i class="ph ph-arrow-counter-clockwise text-lg compare-icon"></i>
                                            <i class="ph ph-check-circle text-lg checked-icon"></i>
                                        </div>
                                    </div>
                                    <div class="product-img w-full h-full aspect-[3/4]">
                                        <img class="w-full h-full object-cover duration-700" src="{{ asset('frontend/images/product/fashion/12-1.png')}}" alt="img" />
                                        <img class="w-full h-full object-cover duration-700" src="{{ asset('frontend/images/product/fashion/12-2.png')}}" alt="img" />
                                    </div>
                                    <div class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                        <div class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">
                                            Quick View</div>
                                        <div class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-500 bg-white hover:bg-black hover:text-white">
                                            Add To Cart</div>
                                    </div>
                                </div>
                                <div class="product-infor mt-4 lg:mb-7">
                                    <div class="product-sold sm:pb-4 pb-2">
                                        <div class="progress bg-line h-1.5 w-full rounded-full overflow-hidden relative">
                                            <div class="progress-sold bg-red absolute left-0 top-0 h-full"></div>
                                        </div>
                                        <div class="flex items-center justify-between gap-3 gap-y-1 flex-wrap mt-2">
                                            <div class="text-button-uppercase">
                                                <span class="text-secondary2 max-sm:text-xs">Sold: </span>
                                                <span class="max-sm:text-xs">12</span>
                                            </div>
                                            <div class="text-button-uppercase">
                                                <span class="text-secondary2 max-sm:text-xs">Available: </span>
                                                <span class="max-sm:text-xs">88</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-name text-title duration-300">Off-the-Shoulder Blouse</div>
                                    <div class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                        <div class="color-item bg-red w-8 h-8 rounded-full duration-300 relative">
                                            <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                                Red</div>
                                        </div>
                                        <div class="color-item bg-yellow w-8 h-8 rounded-full duration-300 relative">
                                            <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                                yellow</div>
                                        </div>
                                        <div class="color-item bg-green w-8 h-8 rounded-full duration-300 relative">
                                            <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                                green</div>
                                        </div>
                                    </div>

                                    <div class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                        <div class="product-price text-title">$40.00</div>
                                        <div class="product-origin-price caption1 text-secondary2">
                                            <del>$50.00</del>
                                        </div>
                                        <div class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">
                                            -20%</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="product-item grid-type" data-item="11">
                            <div class="product-main cursor-pointer block">
                                <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                                    <div class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">
                                        New</div>
                                    <div class="list-action-right absolute top-3 right-3 max-lg:hidden">
                                        <div class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                            <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                                Add To
                                                Wishlist</div>
                                            <i class="ph ph-heart text-lg"></i>
                                        </div>
                                        <div class="compare-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative mt-2">
                                            <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                                Compare Product</div>
                                            <i class="ph ph-arrow-counter-clockwise text-lg compare-icon"></i>
                                            <i class="ph ph-check-circle text-lg checked-icon"></i>
                                        </div>
                                    </div>
                                    <div class="product-img w-full h-full aspect-[3/4]">
                                        <img class="w-full h-full object-cover duration-700" src="{{ asset('frontend/images/product/fashion/11-1.png')}}" alt="img" />
                                        <img class="w-full h-full object-cover duration-700" src="{{ asset('frontend/images/product/fashion/11-2.png')}}" alt="img" />
                                    </div>
                                    <div class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                        <div class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">
                                            Quick View</div>
                                        <div class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-500 bg-white hover:bg-black hover:text-white">
                                            Add To Cart</div>
                                    </div>
                                </div>
                                <div class="product-infor mt-4 lg:mb-7">
                                    <div class="product-sold sm:pb-4 pb-2">
                                        <div class="progress bg-line h-1.5 w-full rounded-full overflow-hidden relative">
                                            <div class="progress-sold bg-red absolute left-0 top-0 h-full"></div>
                                        </div>
                                        <div class="flex items-center justify-between gap-3 gap-y-1 flex-wrap mt-2">
                                            <div class="text-button-uppercase">
                                                <span class="text-secondary2 max-sm:text-xs">Sold: </span>
                                                <span class="max-sm:text-xs">12</span>
                                            </div>
                                            <div class="text-button-uppercase">
                                                <span class="text-secondary2 max-sm:text-xs">Available: </span>
                                                <span class="max-sm:text-xs">88</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-name text-title duration-300">Off-the-Shoulder Blouse</div>
                                    <div class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                        <div class="color-item bg-red w-8 h-8 rounded-full duration-300 relative">
                                            <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                                Red</div>
                                        </div>
                                        <div class="color-item bg-yellow w-8 h-8 rounded-full duration-300 relative">
                                            <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                                yellow</div>
                                        </div>
                                        <div class="color-item bg-green w-8 h-8 rounded-full duration-300 relative">
                                            <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                                green</div>
                                        </div>
                                    </div>

                                    <div class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                        <div class="product-price text-title">$40.00</div>
                                        <div class="product-origin-price caption1 text-secondary2">
                                            <del>$50.00</del>
                                        </div>
                                        <div class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">
                                            -20%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-wishlist-block">
            <div class="modal-wishlist-main py-6">
                <div class="heading px-6 pb-3 flex items-center justify-between relative">
                    <div class="heading5">Wishlist</div>
                    <div class="close-btn absolute right-6 top-0 w-6 h-6 rounded-full bg-surface flex items-center justify-center duration-300 cursor-pointer hover:bg-black hover:text-white">
                        <i class="ph ph-x text-sm"></i>
                    </div>
                </div>
                <div class="list-product px-6"></div>
                <div class="footer-modal p-6 border-t bg-white border-line absolute bottom-0 left-0 w-full text-center">
                    <a href="/wishlist.html" class="button-main w-full text-center uppercase"> View All Wish List</a>
                    <div class="text-button-uppercase continue mt-4 text-center has-line-before cursor-pointer inline-block">
                        Or
                        continue shopping</div>
                </div>
            </div>
        </div>

        <div class="modal-cart-block">
            <div class="modal-cart-main flex">
                <div class="left w-1/2 border-r border-line py-6 max-md:hidden">
                    <div class="heading5 px-6 pb-3">You May Also Like</div>
                    <div class="list px-6">
                        <div class="product-item item py-5 flex items-center justify-between gap-3 border-b border-line" data-item="1">
                            <div class="infor flex items-center gap-5">
                                <div class="bg-img">
                                    <img src="{{ asset('frontend/images/product/fashion/1-2.png')}}" alt="img" class="w-[100px] aspect-square flex-shrink-0 rounded-lg" />
                                </div>
                                <div class="">
                                    <div class="name text-button">Faux-leather trousers</div>
                                    <div class="flex items-center gap-2 mt-2">
                                        <div class="product-price text-title">$15.00</div>
                                        <div class="product-origin-price text-title text-secondary2">
                                            <del>$25.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="quick-view-btn button-main py-3 px-5 bg-black hover:bg-green text-white rounded-full whitespace-nowrap">
                                QUICK VIEW</div>
                        </div>
                        <div class="product-item item py-5 flex items-center justify-between gap-3 border-b border-line" data-item="2">
                            <div class="infor flex items-center gap-5">
                                <div class="bg-img">
                                    <img src="{{ asset('frontend/images/product/fashion/2-2.png')}}" alt="img" class="w-[100px] aspect-square flex-shrink-0 rounded-lg" />
                                </div>
                                <div class="">
                                    <div class="name text-button">Faux-leather trousers</div>
                                    <div class="flex items-center gap-2 mt-2">
                                        <div class="product-price text-title">$15.00</div>
                                        <div class="product-origin-price text-title text-secondary2">
                                            <del>$25.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="quick-view-btn button-main py-3 px-5 bg-black hover:bg-green text-white rounded-full whitespace-nowrap">
                                QUICK VIEW</div>
                        </div>
                        <div class="product-item item py-5 flex items-center justify-between gap-3 border-b border-line" data-item="3">
                            <div class="infor flex items-center gap-5">
                                <div class="bg-img">
                                    <img src="{{ asset('frontend/images/product/fashion/3-3.png')}}" alt="img" class="w-[100px] aspect-square flex-shrink-0 rounded-lg" />
                                </div>
                                <div class="">
                                    <div class="name text-button">Faux-leather trousers</div>
                                    <div class="flex items-center gap-2 mt-2">
                                        <div class="product-price text-title">$15.00</div>
                                        <div class="product-origin-price text-title text-secondary2">
                                            <del>$25.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="quick-view-btn button-main py-3 px-5 bg-black hover:bg-green text-white rounded-full whitespace-nowrap">
                                QUICK VIEW</div>
                        </div>
                        <div class="product-item item py-5 flex items-center justify-between gap-3" data-item="4">
                            <div class="infor flex items-center gap-5">
                                <div class="bg-img">
                                    <img src="{{ asset('frontend/images/product/fashion/4-2.png')}}" alt="img" class="w-[100px] aspect-square flex-shrink-0 rounded-lg" />
                                </div>
                                <div class="">
                                    <div class="name text-button">Faux-leather trousers</div>
                                    <div class="flex items-center gap-2 mt-2">
                                        <div class="product-price text-title">$15.00</div>
                                        <div class="product-origin-price text-title text-secondary2">
                                            <del>$25.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="quick-view-btn button-main py-3 px-5 bg-black hover:bg-green text-white rounded-full whitespace-nowrap">
                                QUICK VIEW</div>
                        </div>
                    </div>
                </div>
                <div class="right cart-block md:w-1/2 w-full py-6 relative overflow-hidden">
                    <div class="heading px-6 pb-3 flex items-center justify-between relative">
                        <div class="heading5">Shopping Cart</div>
                        <div class="close-btn absolute right-6 top-0 w-6 h-6 rounded-full bg-surface flex items-center justify-center duration-300 cursor-pointer hover:bg-black hover:text-white">
                            <i class="ph ph-x text-sm"></i>
                        </div>
                    </div>
                    <div class="time countdown-cart px-6">
                        <div class="flex items-center gap-3 px-5 py-3 bg-green rounded-lg">
                            <p class="text-3xl">🔥</p>
                            <div class="caption1">
                                Your cart will expire in <span class="text-red caption1 font-semibold"><span class="minute">04</span>:<span class="second">59</span></span> minutes!<br />
                                Please checkout now before your items sell out!
                            </div>
                        </div>
                    </div>
                    <div class="heading banner mt-3 px-6">
                        <div class="text">
                            Buy <span class="text-button"> $<span class="more-price">150</span>.00 </span>
                            <span>more to get </span>
                            <span class="text-button">freeship</span>
                        </div>
                        <div class="tow-bar-block mt-3">
                            <div class="progress-line"></div>
                        </div>
                    </div>
                    <div class="list-product px-6"></div>
                    <div class="footer-modal bg-white absolute bottom-0 left-0 w-full">
                        <div class="flex items-center justify-center lg:gap-14 gap-8 px-6 py-4 border-b border-line">
                            <div class="note-btn item flex items-center gap-3 cursor-pointer">
                                <i class="ph ph-note-pencil text-xl"></i>
                                <div class="caption1">Note</div>
                            </div>
                            <div class="shipping-btn item flex items-center gap-3 cursor-pointer">
                                <i class="ph ph-truck text-xl"></i>
                                <div class="caption1">Shipping</div>
                            </div>
                            <div class="coupon-btn item flex items-center gap-3 cursor-pointer">
                                <i class="ph ph-tag text-xl"></i>
                                <div class="caption1">Coupon</div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between pt-6 px-6">
                            <div class="heading5">Subtotal</div>
                            <div class="heading5 total-cart">$0.00</div>
                        </div>
                        <div class="block-button text-center p-6">
                            <div class="flex items-center gap-4">
                                <a href="/cart.html" class="button-main basis-1/2 bg-white border border-black text-black text-center uppercase">
                                    View cart </a>
                                <a href="/checkout.html" class="button-main basis-1/2 text-center uppercase"> Check Out
                                </a>
                            </div>
                            <div class="text-button-uppercase continue mt-4 text-center has-line-before cursor-pointer inline-block">
                                Or continue shopping</div>
                        </div>
                        <div class="tab-item note-block">
                            <div class="px-6 py-4 border-b border-line">
                                <div class="item flex items-center gap-3 cursor-pointer">
                                    <i class="ph ph-note-pencil text-xl"></i>
                                    <div class="caption1">Note</div>
                                </div>
                            </div>
                            <div class="form pt-4 px-6">
                                <textarea name="form-note" id="form-note" rows="4" placeholder="Add special instructions for your order..." class="caption1 py-3 px-4 bg-surface border-line rounded-md w-full"></textarea>
                            </div>
                            <div class="block-button text-center pt-4 px-6 pb-6">
                                <div class="button-main w-full text-center">Save</div>
                                <div class="cancel-btn text-button-uppercase mt-4 text-center has-line-before cursor-pointer inline-block">
                                    Cancel</div>
                            </div>
                        </div>
                        <div class="tab-item shipping-block">
                            <div class="px-6 py-4 border-b border-line">
                                <div class="item flex items-center gap-3 cursor-pointer">
                                    <i class="ph ph-truck text-xl"></i>
                                    <div class="caption1">Estimate shipping rates</div>
                                </div>
                            </div>
                            <div class="form pt-4 px-6">
                                <div class="">
                                    <label for="select-country" class="caption1 text-secondary">Country/region</label>
                                    <div class="select-block relative mt-2">
                                        <select id="select-country" name="select-country" class="w-full py-3 pl-5 rounded-xl bg-white border border-line">
                                            <option value="Country/region">Country/region</option>
                                            <option value="France">France</option>
                                            <option value="Spain">Spain</option>
                                            <option value="UK">UK</option>
                                            <option value="USA">USA</option>
                                        </select>
                                        <i class="ph ph-caret-down text-xs absolute top-1/2 -translate-y-1/2 md:right-5 right-2"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="select-state" class="caption1 text-secondary">State</label>
                                    <div class="select-block relative mt-2">
                                        <select id="select-state" name="select-state" class="w-full py-3 pl-5 rounded-xl bg-white border border-line">
                                            <option value="State">State</option>
                                            <option value="Paris">Paris</option>
                                            <option value="Madrid">Madrid</option>
                                            <option value="London">London</option>
                                            <option value="New York">New York</option>
                                        </select>
                                        <i class="ph ph-caret-down text-xs absolute top-1/2 -translate-y-1/2 md:right-5 right-2"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="select-code" class="caption1 text-secondary">Postal/Zip Code</label>
                                    <input class="border-line px-5 py-3 w-full rounded-xl mt-3" id="select-code" type="text" placeholder="Postal/Zip Code" />
                                </div>
                            </div>
                            <div class="block-button text-center pt-4 px-6 pb-6">
                                <div class="button-main w-full text-center">Calculator</div>
                                <div class="cancel-btn text-button-uppercase mt-4 text-center has-line-before cursor-pointer inline-block">
                                    Cancel</div>
                            </div>
                        </div>
                        <div class="tab-item coupon-block">
                            <div class="px-6 py-4 border-b border-line">
                                <div class="item flex items-center gap-3 cursor-pointer">
                                    <i class="ph ph-tag text-xl"></i>
                                    <div class="caption1">Add A Coupon Code</div>
                                </div>
                            </div>
                            <div class="form pt-4 px-6">
                                <div class="">
                                    <label for="select-discount" class="caption1 text-secondary">Enter Code</label>
                                    <input class="border-line px-5 py-3 w-full rounded-xl mt-3" id="select-discount" type="text" placeholder="Discount code" />
                                </div>
                            </div>
                            <div class="block-button text-center pt-4 px-6 pb-6">
                                <div class="button-main w-full text-center">Apply</div>
                                <div class="cancel-btn text-button-uppercase mt-4 text-center has-line-before cursor-pointer inline-block">
                                    Cancel</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-sizeguide-block">
            <div class="modal-sizeguide-main md:p-10 p-6 rounded-[32px]">
                <div class="close-btn absolute right-5 top-5 w-6 h-6 rounded-full bg-surface flex items-center justify-center duration-300 cursor-pointer hover:bg-black hover:text-white">
                    <i class="ph ph-x text-sm"></i>
                </div>
                <div class="heading3">Size guide</div>
                <div class="md:mt-8 mt-6 progress">
                    <div class="flex md:items-center gap-10 justify-between max-md:flex-col gap-y-5 max-md:pr-3">
                        <div class="flex items-center flex-shrink-0 gap-8">
                            <span class="flex-shrink-0 md:w-14">Height</span>
                            <div class="flex items-center justify-center w-20 gap-1 py-2 border border-line rounded-lg flex-shrink-0">
                                <span class="height">200</span>
                                <span class="caption1 text-secondary">Cm</span>
                            </div>
                        </div>
                        <div class="filter-price filter-height w-full">
                            <div class="tow-bar-block">
                                <div class="progress"></div>
                            </div>
                            <div class="range-input">
                                <input class="range-max" type="range" min="0" max="200" value="200" />
                            </div>
                        </div>
                    </div>
                    <div class="flex md:items-center gap-10 justify-between max-md:flex-col gap-y-5 max-md:pr-3 mt-5">
                        <div class="flex items-center gap-8 flex-shrink-0">
                            <span class="flex-shrink-0 md:w-14">Weight</span>
                            <div class="flex items-center justify-center w-20 gap-1 py-2 border border-line rounded-lg flex-shrink-0">
                                <span class="weight">90</span>
                                <span class="caption1 text-secondary">Kg</span>
                            </div>
                        </div>
                        <div class="filter-price filter-weight w-full">
                            <div class="tow-bar-block">
                                <div class="progress"></div>
                            </div>
                            <div class="range-input">
                                <input class="range-max" type="range" min="0" max="90" value="90" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="heading6 mt-8">suggests for you:</div>
                <div class="list-size-block flex items-center gap-2 flex-wrap mt-3">
                    <div class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                        XS</div>
                    <div class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                        S</div>
                    <div class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                        M</div>
                    <div class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                        L</div>
                    <div class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                        XL</div>
                    <div class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                        2XL</div>
                </div>
                <table>
                    <tr>
                        <th>Size</th>
                        <th>Bust</th>
                        <th>Waist</th>
                        <th>Low Hip</th>
                    </tr>
                    <tr>
                        <td>XS</td>
                        <td>32</td>
                        <td>24-25</td>
                        <td>33-34</td>
                    </tr>
                    <tr>
                        <td>S</td>
                        <td>34-35</td>
                        <td>26-27</td>
                        <td>35-36</td>
                    </tr>
                    <tr>
                        <td>M</td>
                        <td>36-37</td>
                        <td>28-29</td>
                        <td>38-40</td>
                    </tr>
                    <tr>
                        <td>L</td>
                        <td>38-39</td>
                        <td>30-31</td>
                        <td>42-44</td>
                    </tr>
                    <tr>
                        <td>XL</td>
                        <td>40-41</td>
                        <td>32-33</td>
                        <td>45-47</td>
                    </tr>
                    <tr>
                        <td>2XL</td>
                        <td>42-43</td>
                        <td>34-35</td>
                        <td>48-50</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="modal-compare-block">
            <div class="modal-compare-main py-6">
                <div class="close-btn absolute 2xl:right-6 right-4 2xl:top-6 md:-top-4 top-3 lg:w-10 w-6 lg:h-10 h-6 rounded-full bg-surface flex items-center justify-center duration-300 cursor-pointer hover:bg-black hover:text-white">
                    <i class="ph ph-x body1"></i>
                </div>
                <div class="container h-full flex items-center w-full">
                    <div class="content-main flex items-center justify-between xl:gap-10 gap-6 w-full max-md:flex-wrap">
                        <div class="heading5 flex-shrink-0 max-md:w-full">Compare <br class="max-md:hidden" />Products
                        </div>
                        <div class="list-product flex items-center w-full gap-4"></div>
                        <div class="block-button flex flex-col gap-4 flex-shrink-0">
                            <a href="/compare.html" class="button-main whitespace-nowrap"> Compare Products</a>
                            <div class="button-main clear whitespace-nowrap border border-black bg-white text-black">
                                Clear
                                All
                                Products</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-quickview-block">
            <div class="modal-quickview-main py-6">
                <div class="flex h-full max-md:flex-col-reverse gap-y-6">
                    <div class="left lg:w-[388px] md:w-[300px] flex-shrink-0 px-6">
                        <div class="list-img max-md:flex items-center gap-4">
                            <div class="bg-img w-full aspect-[3/4] max-md:w-[150px] max-md:flex-shrink-0 rounded-[20px] overflow-hidden md:mt-6">
                                <img src="{{ asset('frontend/images/product/fashion/3-1.png')}}" alt="item" class="w-full h-full object-cover" />
                            </div>
                            <div class="bg-img w-full aspect-[3/4] max-md:w-[150px] max-md:flex-shrink-0 rounded-[20px] overflow-hidden md:mt-6">
                                <img src="{{ asset('frontend/images/product/fashion/3-2.png')}}" alt="item" class="w-full h-full object-cover" />
                            </div>
                            <div class="bg-img w-full aspect-[3/4] max-md:w-[150px] max-md:flex-shrink-0 rounded-[20px] overflow-hidden md:mt-6">
                                <img src="{{ asset('frontend/images/product/fashion/3-3.png')}}" alt="item" class="w-full h-full object-cover" />
                            </div>
                            <div class="bg-img w-full aspect-[3/4] max-md:w-[150px] max-md:flex-shrink-0 rounded-[20px] overflow-hidden md:mt-6">
                                <img src="{{ asset('frontend/images/product/fashion/3-4.png')}}" alt="item" class="w-full h-full object-cover" />
                            </div>
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
                                    <div class="category caption2 text-secondary font-semibold uppercase">fashion</div>
                                    <div class="name heading4 mt-1">Off-the-Shoulder Blouse</div>
                                </div>
                                <div class="add-wishlist-btn w-10 h-10 flex items-center justify-center border border-line cursor-pointer rounded-lg duration-300 hover:bg-black hover:text-white">
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
                            <div class="flex items-center gap-1 gap-y-3 flex-wrap mt-3">
                                <div class="text-xs font-semibold bg-black text-white uppercase py-1 px-3 rounded-full">
                                    best
                                    seller</div>
                                <div class="flex items-center gap-1">
                                    <i class="ph-fill ph-lightning text-red text-xl"></i>
                                    <div class="caption1 text-secondary">Selling fast! 22 people have this in their
                                        carts.
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 flex-wrap mt-5 pb-6 border-b border-line">
                                <div class="product-price heading5">$20.00</div>
                                <div class="w-px h-4 bg-line"></div>
                                <div class="product-origin-price font-normal text-secondary2">
                                    <del>$32.00</del>
                                </div>
                                <div class="product-sale caption2 font-semibold bg-green px-3 py-0.5 inline-block rounded-full">
                                    -19%</div>
                                <div class="desc text-secondary mt-3">Keep your clothes organized, yet elegant with
                                    storage
                                    cabinets by Onita Patio Furniture. Traditionally designed, they are perfect to be
                                    used
                                    in
                                    the any place where you need to store.</div>
                            </div>
                            <div class="list-action mt-6">
                                <div class="choose-color">
                                    <div class="text-title">Colors: <span class="text-title color"></span></div>
                                    <div class="list-color flex items-center gap-2 flex-wrap mt-3">
                                        <div class="color-item w-12 h-12 rounded-xl duration-300 relative active">
                                            <img src="{{ asset('frontend/images/product/color/purple.png')}}" alt="color" class="rounded-xl" />
                                            <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                                blue</div>
                                        </div>
                                        <div class="color-item w-12 h-12 rounded-xl duration-300 relative">
                                            <img src="{{ asset('frontend/images/product/color/red.png')}}" alt="color" class="rounded-xl" />
                                            <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                                red</div>
                                        </div>
                                        <div class="color-item w-12 h-12 rounded-xl duration-300 relative">
                                            <img src="{{ asset('frontend/images/product/color/black.png')}}" alt="color" class="rounded-xl" />
                                            <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                                black</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose-size mt-5">
                                    <div class="heading flex items-center justify-between">
                                        <div class="text-title">Size: <span class="text-title size"></span></div>
                                        <div class="caption1 size-guide text-red underline">Size Guide</div>
                                    </div>
                                    <div class="list-size flex items-center gap-2 flex-wrap mt-3">
                                        <div class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                                            S</div>
                                        <div class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line active">
                                            M</div>
                                        <div class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                                            L</div>
                                        <div class="size-item w-12 h-12 flex items-center justify-center text-button rounded-full bg-white border border-line">
                                            XL</div>
                                    </div>
                                </div>
                                <div class="text-title mt-5">Quantity:</div>
                                <div class="choose-quantity flex items-center flex-wrap lg:justify-between gap-5 mt-3">
                                    <div class="quantity-block md:p-3 max-md:py-1.5 max-md:px-3 flex items-center justify-between rounded-lg border border-line sm:w-[180px] w-[120px] flex-shrink-0">
                                        <i class="ph-bold ph-minus cursor-pointer body1"></i>
                                        <div class="quantity body1 font-semibold">1</div>
                                        <i class="ph-bold ph-plus cursor-pointer body1"></i>
                                    </div>
                                    <div class="add-cart-btn button-main w-full text-center bg-white text-black border border-black">
                                        Add To Cart</div>
                                </div>
                                <div class="button-block mt-5">
                                    <a href="checkout.html" class="button-main w-full text-center">Buy It Now</a>
                                </div>
                            </div>
                            <div class="flex items-center flex-wrap lg:gap-20 gap-8 gap-y-4 mt-5">
                                <div class="compare flex items-center gap-3 cursor-pointer">
                                    <div class="compare-btn md:w-12 md:h-12 w-10 h-10 flex items-center justify-center border border-line cursor-pointer rounded-xl duration-300 hover:bg-black hover:text-white">
                                        <i class="ph-fill ph-arrows-counter-clockwise cursor-pointer heading6"></i>
                                    </div>
                                    <span>Compare</span>
                                </div>
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
                                <div class="flex items-center flex-wrap gap-1 mt-3">
                                    <i class="ph ph-timer cursor-pointer body1"></i>
                                    <span class="text-title">Estimated Delivery:</span>
                                    <span class="text-secondary">14 January - 18 January</span>
                                </div>
                                <div class="flex items-center flex-wrap gap-1 mt-3">
                                    <i class="ph ph-eye cursor-pointer body1"></i>
                                    <span class="text-title">38</span>
                                    <span class="text-secondary">people viewing this product right now!</span>
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
                            <div class="list-payment mt-7">
                                <div class="main-content lg:pt-8 pt-6 lg:pb-6 pb-4 sm:px-4 px-3 border border-line rounded-xl relative max-md:w-2/3 max-sm:w-full">
                                    <div class="heading6 px-5 bg-white absolute -top-[14px] left-1/2 -translate-x-1/2 whitespace-nowrap">
                                        Guranteed safe checkout</div>
                                    <div class="list grid grid-cols-6">
                                        <div class="item flex items-center justify-center lg:px-3 px-1">
                                            <img src="{{ asset('frontend/images/payment/Frame-0.png')}}" alt="payment" class="w-full" />
                                        </div>
                                        <div class="item flex items-center justify-center lg:px-3 px-1">
                                            <img src="{{ asset('frontend/images/payment/Frame-1.png')}}" alt="payment" class="w-full" />
                                        </div>
                                        <div class="item flex items-center justify-center lg:px-3 px-1">
                                            <img src="{{ asset('frontend/images/payment/Frame-2.png')}}" alt="payment" class="w-full" />
                                        </div>
                                        <div class="item flex items-center justify-center lg:px-3 px-1">
                                            <img src="{{ asset('frontend/images/payment/Frame-3.png')}}" alt="payment" class="w-full" />
                                        </div>
                                        <div class="item flex items-center justify-center lg:px-3 px-1">
                                            <img src="{{ asset('frontend/images/payment/Frame-4.png')}}" alt="payment" class="w-full" />
                                        </div>
                                        <div class="item flex items-center justify-center lg:px-3 px-1">
                                            <img src="{{ asset('frontend/images/payment/Frame-5.png')}}" alt="payment" class="w-full" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layouts.main>
