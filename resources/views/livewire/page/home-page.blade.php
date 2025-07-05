<x-layouts.main :title="$this->title ?? config('app.name')">
    <main>
        @livewire("components.top-nav")

        @livewire("components.nav-bar")

        <!-- Marquee -->
        <div class="banner-top bg-black py-3">
            <div class="marquee-block swiper-container flex items-center whitespace-nowrap">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="text-button-uppercase text-white px-8"> Not Just Accessories — Statements.</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="line w-8 h-px bg-white"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="text-button-uppercase text-white px-8">Free Shipping on Order 50k and above</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="line w-8 h-px bg-white"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="text-button-uppercase text-white px-8">
                            Home Delivery Available
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="line w-8 h-px bg-white"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="text-button-uppercase text-white px-8">Discounts Offered</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="line w-8 h-px bg-white"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="text-button-uppercase text-white px-8">
                            Buy Premium Accessories at Affordable Prices
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="line w-8 h-px bg-white"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="text-button-uppercase text-white px-8">
                            Discover the Latest Trends in Accessories
                        </div>
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
                                        <div class="text-sub-display">Not Just Accessories — Statements.</div>
                                        <div class="text-display md:mt-5 mt-2">Wear It Like You Mean It
                                        </div>
                                        <a href="{{route('shop')}}" class="button-main md:mt-8 mt-3"> Shop
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
                                        <div class="text-sub-display">From Casual Slay to Full Glam.</div>
                                        <div class="text-display md:mt-5 mt-2">Your Outfit’s Missing Piece? Found.
                                        </div>
                                        <a href="{{route('shop')}}" class="button-main md:mt-8 mt-3"> Shop
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
                                        <div class="text-sub-display">Built on Hustle. Styled for Queens.</div>
                                        <div class="text-display md:mt-5 mt-2">The Accessory Plug You Can Trust
                                            100%
                                        </div>
                                        <a href="{{route('shop')}}" class="button-main md:mt-8 mt-3"> Shop
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
                    <a href="{{route('collection')}}" class="banner-item relative bg-surface block rounded-[20px] overflow-hidden duration-500 cursor-pointer" style="aspect-ratio:3/4;object-cover">
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
                            <img src="{{ asset('frontend/images/commons/file13.jpeg')}}" alt="{{ asset('frontend/images/commons/file13.jpeg')}}" class="w-full h-full object-cover" />
                        </div>
                        <div class="item relative rounded-xl overflow-hidden">
                            <img src="{{ asset('frontend/images/commons/file23.jpeg')}}" alt="{{ asset('frontend/images/commons/file23.jpeg')}}" class="w-full h-full object-cover" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="md:pt-20 pt-10">
            <div class="container">
                @livewire('components.related-products', ['slug' => '', 'title' => 'Trending Products'])
            </div>
        </div>



        <div class="benefit-block py-[60px] bg-linear">
            <div class="container">
                <div class="list-benefit grid items-start lg:grid-cols-3 grid-cols-2 gap-[30px]">
                    <div class="benefit-item flex flex-col items-center justify-center">
                        <i class="ph ph-headset lg:text-7xl text-5xl"></i>
                        <div class="heading6 text-center mt-5">24/7 Customer Service</div>
                        <div class="caption1 text-secondary text-center mt-3">We&apos;re here to help you with any
                            questions
                            or
                            concerns you have, 24/7.</div>
                    </div>
                    <div class="benefit-item flex flex-col items-center justify-center">
                        <i class="ph ph-shield-check lg:text-7xl text-5xl"></i>
                        <div class="heading6 text-center mt-5">Our Guarantee</div>
                        <div class="caption1 text-secondary text-center mt-3">We stand behind our products and services
                            and
                            guarantee your satisfaction.</div>
                    </div>
                    <div class="benefit-item flex flex-col items-center justify-center">
                        <i class="ph ph-truck lg:text-7xl text-5xl"></i>
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
                    <div class="heading3 text-center">{{site_name()}} On Instagram</div>
                    <div class="text-center mt-3">#roluxe_accessories</div>
                </div>
                <div class="list-instagram overflow-hidden md:mt-10 mt-6">
                    <div class="swiper swiper-instagram-three">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="{{config_get("Instagram_url")}}" target="_blank"
                                   class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/commons/file23.jpeg')}}" alt="0"
                                         class="h-full w-full duration-500 relative" style="aspect-ratio: 1/1; object-fit: cover;"/>
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="{{config_get("Instagram_url")}}" target="_blank"
                                   class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/commons/file1.jpeg')}}" alt="1"
                                         class="h-full w-full duration-500 relative" style="aspect-ratio: 1/1; object-fit: cover;"/>
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="{{config_get("Instagram_url")}}" target="_blank"
                                   class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/commons/file2.jpeg')}}" alt="2"
                                         class="h-full w-full duration-500 relative" style="aspect-ratio: 1/1; object-fit: cover;"/>
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="{{config_get("Instagram_url")}}" target="_blank"
                                   class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/commons/file3.jpeg')}}" alt="3"
                                         class="h-full w-full duration-500 relative" style="aspect-ratio: 1/1; object-fit: cover;"/>
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="{{config_get("Instagram_url")}}" target="_blank"
                                   class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/commons/file4.jpeg')}}" alt="4"
                                         class="h-full w-full duration-500 relative" style="aspect-ratio: 1/1; object-fit: cover;"/>
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="{{config_get("Instagram_url")}}" target="_blank"
                                   class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/commons/file5.jpeg')}}" alt="5"
                                         class="h-full w-full duration-500 relative" style="aspect-ratio: 1/1; object-fit: cover;"/>
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="{{config_get("Instagram_url")}}" target="_blank"
                                   class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/commons/file10.jpeg')}}" alt="10"
                                         class="h-full w-full duration-500 relative" style="aspect-ratio: 1/1; object-fit: cover;"/>
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="{{config_get("Instagram_url")}}" target="_blank"
                                   class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/commons/file5.jpeg')}}" alt="yoga5"
                                         class="h-full w-full duration-500 relative" style="aspect-ratio: 1/1; object-fit: cover;"/>
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
