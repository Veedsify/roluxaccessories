<x-layouts.main :title="$this->title ?? config('app.name')">
    <main>
        @livewire("components.top-nav")

        @livewire("components.nav-bar")

        <div class="breadcrumb-block style-shared">
            <div class="breadcrumb-main bg-linear overflow-hidden">
                <div class="container lg:pt-[134px] pt-24 pb-10 relative">
                    <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                        <div class="text-content">
                            <div class="heading2 text-center">About Us</div>
                            <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                                <a href="/">Homepage</a>
                                <i class="ph ph-caret-right text-sm text-secondary2"></i>
                                <div class="text-secondary2 capitalize">About Us</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="about md:pt-20 pt-10">
            <div class="about-us-block">
                <div class="container">
                    <div class="text flex items-center justify-center">
                        <div class="content md:w-5/6 w-full">
                            <div class="heading3 text-center">I'm obsessed with the dress Pippa Middleton wore to her
                                brother's
                                wedding.</div>
                            <div class="body1 text-center md:mt-7 mt-5">
                                Kim Kardashian West needs no introduction. In the 14 years since she first graced our
                                screens in
                                Keeping Up With The Kardashians, she has built her KKW beauty empire, filmed her show,
                                wrapped
                                her show, become a billionaire, studied law, campaigned for the rights of death row
                                inmates,
                                travelled the world to attend events such as Paris Fashion Week, raised four children
                                and
                                launched her wildly successful shapewear brand SKIMS.
                            </div>
                        </div>
                    </div>
                    <div class="list-img grid sm:grid-cols-3 gap-[30px] md:pt-20 pt-10">
                        <div class="bg-img">
                            <img src="{{ asset('frontend/images/other/about-us1.png')}}" alt="bg-img" class="w-full rounded-[30px]" />
                        </div>
                        <div class="bg-img">
                            <img src="{{ asset('frontend/images/other/about-us2.png')}}" alt="bg-img" class="w-full rounded-[30px]" />
                        </div>
                        <div class="bg-img">
                            <img src="{{ asset('frontend/images/other/about-us3.png')}}" alt="bg-img" class="w-full rounded-[30px]" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="benefit-block md:pt-20 pt-10">
            <div class="container">
                <div class="list-benefit grid items-start lg:grid-cols-4 grid-cols-2 gap-[30px]">
                    <div class="benefit-item flex flex-col items-center justify-center">
                        <i class="icon-phone-call lg:text-7xl text-5xl"></i>
                        <div class="heading6 text-center mt-5">24/7 Customer Service</div>
                        <div class="caption1 text-secondary text-center mt-3">We're here to help you with any questions
                            or
                            concerns you have, 24/7.</div>
                    </div>
                    <div class="benefit-item flex flex-col items-center justify-center">
                        <i class="icon-return lg:text-7xl text-5xl"></i>
                        <div class="heading6 text-center mt-5">14-Day Money Back</div>
                        <div class="caption1 text-secondary text-center mt-3">If you're not satisfied with your
                            purchase, simply
                            return it within 14 days for a refund.</div>
                    </div>
                    <div class="benefit-item flex flex-col items-center justify-center">
                        <i class="icon-guarantee lg:text-7xl text-5xl"></i>
                        <div class="heading6 text-center mt-5">Our Guarantee</div>
                        <div class="caption1 text-secondary text-center mt-3">We stand behind our products and services
                            and
                            guarantee your satisfaction.</div>
                    </div>
                    <div class="benefit-item flex flex-col items-center justify-center">
                        <i class="icon-delivery-truck lg:text-7xl text-5xl"></i>
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
                    <div class="heading3 text-center">Anvogue On Instagram</div>
                    <div class="text-center mt-3">#Anvougetheme</div>
                </div>
                <div class="list-instagram overflow-hidden md:mt-10 mt-6">
                    <div class="swiper swiper-instagram-three">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/" target="_blank" class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/instagram/0.png')}}" alt="0" class="h-full w-full duration-500 relative" />
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/" target="_blank" class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/instagram/1.png')}}" alt="1" class="h-full w-full duration-500 relative" />
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/" target="_blank" class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/instagram/2.png')}}" alt="2" class="h-full w-full duration-500 relative" />
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/" target="_blank" class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/instagram/3.png')}}" alt="3" class="h-full w-full duration-500 relative" />
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/" target="_blank" class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/instagram/4.png')}}" alt="4" class="h-full w-full duration-500 relative" />
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/" target="_blank" class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/instagram/5.png')}}" alt="5" class="h-full w-full duration-500 relative" />
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/" target="_blank" class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/instagram/10.png')}}" alt="10" class="h-full w-full duration-500 relative" />
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/" target="_blank" class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/instagram/yoga5.png')}}" alt="yoga5" class="h-full w-full duration-500 relative" />
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
