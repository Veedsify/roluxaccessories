<x-layouts.main>
    <main>
        @livewire("components.top-nav")

        @livewire("components.nav-bar")

        <div class="breadcrumb-block style-shared">
            <div class="breadcrumb-main bg-linear overflow-hidden">
                <div class="container lg:pt-[134px] pt-24 pb-10 relative">
                    <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                        <div class="text-content">
                            <div class="heading2 text-center">Blog Page
                                {{request('page') ? ' - Page ' . request('page') : ''}}
                            </div>
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
                        @if($posts->isEmpty())
                        <div class="text-center text-secondary">No posts available at the moment.</div>
                        @endif
                        @foreach($posts as $post)
                        <div class="list-blog flex flex-col md:gap-10 gap-8" data-item="3">
                            <div>
                                <div class="blog-item style-default h-full cursor-pointer" data-item="1">
                                    <div class="blog-main h-full block pb-8 border-b border-line">
                                        <div class="blog-thumb rounded-[20px] overflow-hidden">
                                            <a href="{{route('blog.detail', ['slug' => $post->slug])}}" class="block">
                                                <img src="{{asset('storage/' . $post->coverImg)}}" alt="blog-img" class="w-full duration-500">

                                            </a>
                                        </div>
                                        <div class="blog-infor mt-7">
                                            <div class="blog-tag bg-green py-1 px-2.5 rounded-full text-button-uppercase inline-block">
                                                {{ $post->blogCategory->name }}

                                            </div>
                                            <a href="{{route('blog.detail', ['slug' => $post->slug])}}" class="block">
                                                <div class="heading6 blog-title mt-3 duration-300">
                                                    {{ $post->title }}
                                                </div>
                                            </a>
                                            <div class="flex items-center gap-2 mt-2">
                                                <div class="blog-author caption1 text-secondary">by
                                                    {{ $post->user->name }}
                                                </div>
                                                <span class="w-[20px] h-[1px] bg-black"></span>
                                                <div class="blog-date caption1 text-secondary">
                                                    {{ $post->created_at->format('F j, Y') }}
                                                </div>
                                            </div>
                                            <div class="body1 text-secondary mt-4">
                                                {{ Str::limit($post->description, 300, '...') }}
                                            </div>
                                            <a href="{{route('blog.detail', ['slug' => $post->slug])}}" class="text-button underline mt-4">Read More</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @if ($posts->hasPages())
                        <div class="list-pagination w-full flex items-center justify-center gap-4 md:mt-10 mt-6">
                            {{-- Previous Page Link --}}
                            @if ($posts->onFirstPage())
                            <button class="px-3 py-1 rounded bg-gray-200 text-gray-500 cursor-not-allowed" disabled>
                                Prev
                            </button>
                            @else
                            <a href="{{ $posts->previousPageUrl() }}" class="px-3 py-1 rounded bg-white border border-line hover:bg-black hover:text-white duration-300">
                                Prev
                            </a>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($posts->links()->elements[0] as $page => $url)
                            @if ($page == $posts->currentPage())
                            <button class="px-3 py-1 rounded bg-black text-white font-bold">
                                {{ $page }}
                            </button>
                            @else
                            <a href="{{ $url }}" class="px-3 py-1 rounded bg-white border border-line hover:bg-black hover:text-white duration-300" >
                                {{ $page }}
                            </a>
                            @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($posts->hasMorePages())
                            <a href="{{ $posts->nextPageUrl() }}" class="px-3 py-1 rounded bg-white border border-line hover:bg-black hover:text-white duration-300" >
                                Next
                            </a>
                            @else
                            <button class="px-3 py-1 rounded bg-gray-200 text-gray-500 cursor-not-allowed" disabled>
                                Next
                            </button>
                            @endif
                        </div>
                        @endif
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
                                @foreach($recentPosts as $post)
                                <div class="blog-item flex gap-4 mt-5 cursor-pointer" data-item="13">
                                    <img src="{{ asset('storage/' . $post->coverImg)}}" alt="img" class="w-20 h-20 object-cover rounded-lg flex-shrink-0" />
                                    <div>
                                        <div class="blog-tag whitespace-nowrap bg-green py-0.5 px-2 rounded-full text-button-uppercase text-xs inline-block">
                                            {{ $post->blogCategory->name }}
                                        </div>
                                        <div class="text-title mt-1">
                                            <a href="{{route('blog.detail', ['slug' => $post->slug])}}" class="text-secondary hover:text-black duration-300">
                                                {{ $post->title }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="filter-category md:mt-10 mt-6 pb-8 border-b border-line">
                            <div class="heading6">Categories</div>
                            <div class="list-cate pt-1">
                                @foreach($categories as $category)
                                <div class="cate-item flex items-center justify-between cursor-pointer mt-3" data-item="Fashion">
                                    <div class="capitalize has-line-before hover:text-black text-secondary">
                                        <a href="" class="text-secondary hover:text-black duration-300">
                                            {{ $category->name }}
                                        </a>
                                    </div>
                                    <div class="text-secondary2">
                                        <span class="text-secondary2">{{ $category->blog_count() }}</span>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.footer')
    </main>
</x-layouts.main>
