<x-layouts.main>
    <main>
        @livewire("components.top-nav")

        @livewire("components.nav-bar")

        <div class="breadcrumb-block style-shared">
            <div class="breadcrumb-main bg-linear overflow-hidden">
                <div class="container lg:pt-[134px] pt-24 pb-10 relative">
                    <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                        <div class="text-content">
                            <div class="heading2 text-center">Blog Default</div>
                            <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                                <a href="/">Homepage</a>
                                <i class="ph ph-caret-right text-sm text-secondary2"></i>
                                <div class="text-secondary2 capitalize">Blog Default</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="blog default md:py-20 py-10">
            <div class="container">
                <div class="flex justify-between max-md:flex-col gap-y-12">
                    <div class="left xl:w-3/4 md:w-2/3 pr-2">
                        <div class="list-blog flex flex-col md:gap-10 gap-8" data-item="3">
                            <div>
                                <div class="blog-item style-default h-full cursor-pointer" data-item="1">
                                    <div class="blog-main h-full block pb-8 border-b border-line">
                                        <div class="blog-thumb rounded-[20px] overflow-hidden">
                                            <a href="{{route('blog.detail', ['slug' => 'test'])}}" class="block">
                                                <img src="{{asset('/frontend/images/blog/1.png')}}" alt="blog-img" class="w-full duration-500">
                                            </a>
                                        </div>
                                        <div class="blog-infor mt-7">
                                            <div class="blog-tag bg-green py-1 px-2.5 rounded-full text-button-uppercase inline-block">Jean, glasses</div>
                                            <a href="{{route('blog.detail', ['slug' => 'test'])}}" class="block">
                                                <div class="heading6 blog-title mt-3 duration-300">Fashion Trends to Watch Out for in Summer 2023</div>
                                            </a>
                                            <div class="flex items-center gap-2 mt-2">
                                                <div class="blog-author caption1 text-secondary">by Chris Evans</div>
                                                <span class="w-[20px] h-[1px] bg-black"></span>
                                                <div class="blog-date caption1 text-secondary">Dec 20, 2023</div>
                                            </div>
                                            <div class="body1 text-secondary mt-4">Discover the latest fashion trends that will dominate the upcoming season. From vibrant colors to unique patterns and innovative styles.</div>
                                            <a href="{{route('blog.detail', ['slug' => 'test'])}}" class="text-button underline mt-4">Read More</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-pagination w-full flex items-center justify-center gap-4 md:mt-10 mt-6"></div>
                    </div>

                    <div class="right xl:w-1/4 md:w-1/3 xl:pl-[52px] md:pl-8">
                        <form class="form-search relative w-full h-12">
                            <input class="py-2 px-4 w-full h-full border border-line rounded-lg" type="text" placeholder="Search" />
                            <button>
                                <i class="ph ph-magnifying-glass heading6 text-secondary hover:text-black duration-300 absolute top-1/2 -translate-y-1/2 right-4 cursor-pointer"></i>
                            </button>
                        </form>
                        <div class="recent md:mt-10 mt-6 pb-8 border-b border-line">
                            <div class="heading6">Recent Posts</div>
                            <div class="list-recent pt-1">
                                <div class="blog-item flex gap-4 mt-5 cursor-pointer" data-item="13">
                                    <img src="{{ asset('frontend/images/blog/yoga1.png')}}" alt="img" class="w-20 h-20 object-cover rounded-lg flex-shrink-0" />
                                    <div>
                                        <div class="blog-tag whitespace-nowrap bg-green py-0.5 px-2 rounded-full text-button-uppercase text-xs inline-block">Jean</div>
                                        <div class="text-title mt-1">Fashion Trends in Summer 2024</div>
                                    </div>
                                </div>
                                <div class="blog-item flex gap-4 mt-5 cursor-pointer" data-item="16">
                                    <img src="{{ asset('frontend/images/blog/organic1.png')}}" alt="img" class="w-20 h-20 object-cover rounded-lg flex-shrink-0" />
                                    <div>
                                        <div class="blog-tag whitespace-nowrap bg-green py-0.5 px-2 rounded-full text-button-uppercase text-xs inline-block">fruits</div>
                                        <div class="text-title mt-1">Organic Good for Health trending in winter 2024</div>
                                    </div>
                                </div>
                                <div class="blog-item flex gap-4 mt-5 cursor-pointer" data-item="15">
                                    <img src="{{ asset('frontend/images/blog/yoga3.png')}}" alt="img" class="w-20 h-20 object-cover rounded-lg flex-shrink-0" />
                                    <div>
                                        <div class="blog-tag whitespace-nowrap bg-green py-0.5 px-2 rounded-full text-button-uppercase text-xs inline-block">Yoga</div>
                                        <div class="text-title mt-1">Trending Excercise in Summer 2024</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filter-category md:mt-10 mt-6 pb-8 border-b border-line">
                            <div class="heading6">Categories</div>
                            <div class="list-cate pt-1">
                                <div class="cate-item flex items-center justify-between cursor-pointer mt-3" data-item="Fashion">
                                    <div class="capitalize has-line-before hover:text-black text-secondary">Fashion</div>
                                    <div class="text-secondary2">3</div>
                                </div>
                                <div class="cate-item flex items-center justify-between cursor-pointer mt-3" data-item="cosmetic">
                                    <div class="capitalize has-line-before hover:text-black text-secondary">cosmetic</div>
                                    <div class="text-secondary2">3</div>
                                </div>
                                <div class="cate-item flex items-center justify-between cursor-pointer mt-3" data-item="toys-kid">
                                    <div class="capitalize has-line-before hover:text-black text-secondary">toys kid</div>
                                    <div class="text-secondary2">3</div>
                                </div>
                                <div class="cate-item flex items-center justify-between cursor-pointer mt-3" data-item="yoga">
                                    <div class="capitalize has-line-before hover:text-black text-secondary">yoga</div>
                                    <div class="text-secondary2">3</div>
                                </div>
                                <div class="cate-item flex items-center justify-between cursor-pointer mt-3" data-item="organic">
                                    <div class="capitalize has-line-before hover:text-black text-secondary">organic</div>
                                    <div class="text-secondary2">3</div>
                                </div>
                            </div>
                        </div>
                        <div class="filter-tags md:mt-10 mt-6">
                            <div class="heading6">Tags Cloud</div>
                            <div class="list-tags menu-tab flex items-center flex-wrap gap-3 mt-4">
                                <div class="tags tab-item bg-white border border-line py-1.5 px-4 rounded-full text-button-uppercase text-secondary cursor-pointer duration-300 hover:bg-black hover:text-white">Style</div>
                                <div class="tags tab-item bg-white border border-line py-1.5 px-4 rounded-full text-button-uppercase text-secondary cursor-pointer duration-300 hover:bg-black hover:text-white">Makeup</div>
                                <div class="tags tab-item bg-white border border-line py-1.5 px-4 rounded-full text-button-uppercase text-secondary cursor-pointer duration-300 hover:bg-black hover:text-white">wear</div>
                                <div class="tags tab-item bg-white border border-line py-1.5 px-4 rounded-full text-button-uppercase text-secondary cursor-pointer duration-300 hover:bg-black hover:text-white">Men</div>
                                <div class="tags tab-item bg-white border border-line py-1.5 px-4 rounded-full text-button-uppercase text-secondary cursor-pointer duration-300 hover:bg-black hover:text-white">Women</div>
                                <div class="tags tab-item bg-white border border-line py-1.5 px-4 rounded-full text-button-uppercase text-secondary cursor-pointer duration-300 hover:bg-black hover:text-white">Beauty</div>
                                <div class="tags tab-item bg-white border border-line py-1.5 px-4 rounded-full text-button-uppercase text-secondary cursor-pointer duration-300 hover:bg-black hover:text-white">Trends</div>
                                <div class="tags tab-item bg-white border border-line py-1.5 px-4 rounded-full text-button-uppercase text-secondary cursor-pointer duration-300 hover:bg-black hover:text-white">Beachwear</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.footer')
    </main>
</x-layouts.main>
