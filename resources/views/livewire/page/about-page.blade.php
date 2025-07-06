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
                            <div class="heading3 text-center">From Side Hustle to Growing Brand – My Journey
                            </div>
                            <div class="body1 text-center md:mt-7 mt-5">
                                <p class="mt-4">
                                    Hi, I’m the founder of Rolux Accessories — and this isn’t just a business, it’s my
                                    story.
                                </p>
                                <p class="mt-4">
                                    I started selling accessories the way many Nigerian women do — as a side hustle.
                                    Just me, some quality items, and my phone. No big capital, no team, just the belief
                                    that people deserve good accessories without overpriced hype or fake quality.
                                </p>
                                <p class="mt-4">
                                    At first, I sold to friends and people on WhatsApp. Then Instagram. I packed orders
                                    myself, handled deliveries, and kept reinvesting everything I made. Slowly, people
                                    started trusting me for one reason — I kept it real. No fake items, no bad vibes.
                                    Just stylish accessories that last, with proper customer service.
                                </p>
                                <p class="mt-4">
                                    But as my customer base grew, I realized something:
                                    If I want to build a real brand, I need to level up.
                                    That’s how Rolux Accessories was born.
                                </p>
                                <p class="mt-4">
                                    This platform is my way of going beyond social media DMs — to give my customers a
                                    clean, reliable experience while still keeping that personal touch I’m known for.
                                </p>
                                <p class="mt-4">
                                    With Rolux, you’re not just shopping from a random online store — you’re supporting
                                    a real woman building something from the ground up. Every piece you buy helps me
                                    grow this dream while delivering quality, affordable, and beautiful accessories
                                    straight to your door.
                                </p>
                                <p class="mt-4">
                                    This is just the beginning.
                                    Thanks for being part of the journey. 💛
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="list-img grid sm:grid-cols-3 gap-[30px] md:pt-20 pt-10">
                        <div class="bg-img">
                            <img src="{{ asset('frontend/images/commons/file23.jpeg')}}" alt="bg-img"
                                 class="w-full rounded-[30px]"/>
                        </div>
                        <div class="bg-img">
                            <img src="{{ asset('frontend/images/commons/file13.jpeg')}}" alt="bg-img"
                                 class="w-full rounded-[30px]"/>
                        </div>
                        <div class="bg-img">
                            <img src="{{ asset('frontend/images/commons/file15.jpeg')}}" alt="bg-img"
                                 class="w-full rounded-[30px]"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="benefit-block md:pt-20 pt-10">
            <div class="container">
                <div class="list-benefit grid items-start lg:grid-cols-3 grid-cols-2 gap-[30px]">
                    <div class="benefit-item flex flex-col items-center justify-center">
                        <i class="icon-phone-call lg:text-7xl text-5xl"></i>
                        <div class="heading6 text-center mt-5">24/7 Customer Service</div>
                        <div class="caption1 text-secondary text-center mt-3">We're here to help you with any questions
                            or
                            concerns you have, 24/7.
                        </div>
                    </div>
                    <div class="benefit-item flex flex-col items-center justify-center">
                        <i class="icon-guarantee lg:text-7xl text-5xl"></i>
                        <div class="heading6 text-center mt-5">Our Guarantee</div>
                        <div class="caption1 text-secondary text-center mt-3">We stand behind our products and services
                            and
                            guarantee your satisfaction.
                        </div>
                    </div>
                    <div class="benefit-item flex flex-col items-center justify-center">
                        <i class="icon-delivery-truck lg:text-7xl text-5xl"></i>
                        <div class="heading6 text-center mt-5">Shipping worldwide</div>
                        <div class="caption1 text-secondary text-center mt-3">We ship our products worldwide, making
                            them
                            accessible to customers everywhere.
                        </div>
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
                                <a href="{{config_get("instagram_url")}}" target="_blank"
                                   class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/commons/file23.jpeg')}}" alt="0"
                                         class="h-full w-full duration-500 relative" style="aspect-ratio: 1/1; object-fit: cover;"/>
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="{{config_get("instagram_url")}}" target="_blank"
                                   class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/commons/file1.jpeg')}}" alt="1"
                                         class="h-full w-full duration-500 relative" style="aspect-ratio: 1/1; object-fit: cover;"/>
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="{{config_get("instagram_url")}}" target="_blank"
                                   class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/commons/file2.jpeg')}}" alt="2"
                                         class="h-full w-full duration-500 relative" style="aspect-ratio: 1/1; object-fit: cover;"/>
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="{{config_get("instagram_url")}}" target="_blank"
                                   class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/commons/file3.jpeg')}}" alt="3"
                                         class="h-full w-full duration-500 relative" style="aspect-ratio: 1/1; object-fit: cover;"/>
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="{{config_get("instagram_url")}}" target="_blank"
                                   class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/commons/file4.jpeg')}}" alt="4"
                                         class="h-full w-full duration-500 relative" style="aspect-ratio: 1/1; object-fit: cover;"/>
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="{{config_get("instagram_url")}}" target="_blank"
                                   class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/commons/file5.jpeg')}}" alt="5"
                                         class="h-full w-full duration-500 relative" style="aspect-ratio: 1/1; object-fit: cover;"/>
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="{{config_get("instagram_url")}}" target="_blank"
                                   class="item relative block overflow-hidden">
                                    <img src="{{ asset('frontend/images/commons/file10.jpeg')}}" alt="10"
                                         class="h-full w-full duration-500 relative" style="aspect-ratio: 1/1; object-fit: cover;"/>
                                    <div class="icon w-12 h-12 bg-white hover:bg-black duration-500 flex items-center justify-center rounded-2xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1]">
                                        <div class="ph ph-instagram-logo text-2xl text-black"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="{{config_get("instagram_url")}}" target="_blank"
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
                                        <div class="brand-item relative flex flex-col items-center justify-center"
                                             style="width: 60px;">
                                            <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}"
                                                 class="h-full w-auto duration-500 relative object-cover"/>
                                            <p class="text-center text-secondary2 mt-2 font-semibold text-sm md:text-base lg:text-lg xl:text-xl 2xl:text-2xl"
                                               style="max-width: 200px; margin: 0 auto;">
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
