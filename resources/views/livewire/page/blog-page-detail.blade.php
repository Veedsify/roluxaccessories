<x-layouts.main>
    <main>
        @livewire("components.top-nav")

        @livewire("components.nav-bar")

        <div class="blog blog-detail detail2 md:mt-[74px] mt-[56px] border-t border-line">
            <div class="container lg:pt-20 md:pt-14 pt-10">
                <div class="blog-content flex justify-between max-lg:flex-col gap-y-10">
                    <div class="main xl:w-3/4 lg:w-2/3 lg:pr-[15px]">
                        <div class="blog-tag bg-green py-1 px-2.5 rounded-full text-button-uppercase inline-block">
                            {{$post->blogCategory->name}}
                        </div>
                        <div class="heading3 blog-title mt-3">
                            {{$post->title}}
                        </div>
                        <div class="author flex items-center gap-4 mt-4">
                            <div class="avatar w-10 h-10 rounded-full overflow-hidden flex-shrink-0">
                                <img src="{{asset('storage/' . $post->user->profile_picture)}}" alt="avatar" class="w-full h-full object-cover" />

                            </div>
                            <div class="flex items-center gap-2">
                                <div class="blog-author caption1 text-secondary">by
                                    {{$post->user->name}}
                                </div>
                                <div class="line w-5 h-px bg-secondary"></div>
                                <div class="blog-date caption1 text-secondary">
                                    {{\Carbon\Carbon::parse($post->created_at)->format('M d, Y')}}
                                </div>
                            </div>
                        </div>
                        <div class="bg-img md:py-10 py-6">
                            <img src="{{asset('storage/' . $post->coverImg)}}" alt="img" class="blog-img w-full object-cover rounded-3xl" />
                        </div>
                        <div class="content md:mt-8 mt-5 blog-content" style="font-size: 16px; line-height: 1.75; color: #333;">

                            {!! $post->content !!}
                        </div>
                        <div class="action flex items-center justify-between flex-wrap gap-5 md:mt-8 mt-5">
                            {{-- <div class="left flex items-center gap-3 flex-wrap">
                                <p>Tag:</p>
                                <div class="list flex items-center gap-3 flex-wrap">
                                    <a href="blog-default.html" class="tags bg-surface py-1.5 px-4 rounded-full text-button-uppercase cursor-pointer duration-300 hover:bg-black hover:text-white"> fashion </a>
                                    <a href="blog-default.html" class="tags bg-surface py-1.5 px-4 rounded-full text-button-uppercase cursor-pointer duration-300 hover:bg-black hover:text-white"> yoga </a>
                                    <a href="blog-default.html" class="tags bg-surface py-1.5 px-4 rounded-full text-button-uppercase cursor-pointer duration-300 hover:bg-black hover:text-white"> organic </a>
                                </div>
                            </div> --}}
                            <div class="right flex items-center gap-3 flex-wrap">
                                <p>Share:</p>
                                <div class="list flex items-center gap-3 flex-wrap">
                                    <a href="https://www.facebook.com/" target="_blank" class="bg-surface w-10 h-10 flex items-center justify-center rounded-full duration-300 hover:bg-black hover:text-white">
                                        <div class="ph ph-facebook duration-100"></div>
                                    </a>
                                    <a href="https://www.instagram.com/" target="_blank" class="bg-surface w-10 h-10 flex items-center justify-center rounded-full duration-300 hover:bg-black hover:text-white">
                                        <div class="ph ph-instagram duration-100"></div>
                                    </a>
                                    <a href="https://www.twitter.com/" target="_blank" class="bg-surface w-10 h-10 flex items-center justify-center rounded-full duration-300 hover:bg-black hover:text-white">
                                        <div class="ph ph-twitter duration-100"></div>
                                    </a>
                                    <a href="https://www.youtube.com/" target="_blank" class="bg-surface w-10 h-10 flex items-center justify-center rounded-full duration-300 hover:bg-black hover:text-white">
                                        <div class="ph ph-youtube duration-100"></div>
                                    </a>
                                    <a href="https://www.pinterest.com/" target="_blank" class="bg-surface w-10 h-10 flex items-center justify-center rounded-full duration-300 hover:bg-black hover:text-white">
                                        <div class="ph ph-pinterest duration-100"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="next-pre flex items-center justify-between md:mt-8 mt-5 py-6 border-y border-line">
                            <div class="left cursor-pointer">
                                <div class="text-button-uppercase text-secondary2">Previous</div>
                                <div class="text-title prev mt-2">
                                    <a href="{{ $previousPost ? route('blog.detail', [$previousPost->slug]) : 'javascript:void()' }}">

                                        {{ $previousPost ? $previousPost->title : 'No Previous Post' }}
                                    </a>
                                </div>
                            </div>
                            <div class="right text-right cursor-pointer">
                                <div class="text-button-uppercase text-secondary2">Next</div>
                                <div class="text-title next mt-2">
                                    <a href="{{ $nextPost ? route('blog.detail', [$nextPost->slug]) : 'javascript:void()' }}">
                                        {{ $nextPost ? $nextPost->title : 'No Next Post' }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="list-comment md:mt-[60px] mt-8">
                            <div class="heading flex items-center justify-between flex-wrap gap-4">
                                <div class="heading4">{{$commentsCount}} Comments</div>
                            </div>
                            <div class="list-review mt-6">
                                @foreach($comments as $comment)
                                <div class="item mt-3 border p-4 border-gray-50 rounded-xl">
                                    <div class="flex items-center justify-between">
                                        <div class="user-infor flex gap-4 items-center">
                                            <div class="avatar-cmt">
                                                <img src="{{ asset(($comment->user ? $comment->user->profile_picture : 'storage/site/avatar.jpg')) }}" alt="img" class="w-[52px] aspect-square rounded-full" />
                                            </div>
                                            <div>
                                                <div class="flex items-center">
                                                    <div class="mb-2">
                                                        {{ $comment->user ? $comment->user->name : $comment->commenter_name }}
                                                    </div>
                                                    <div class="span text-line">-</div>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <div class="text-secondary2">
                                                        {{ $comment->created_at->diffForHumans() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        {{ $comment->comment }}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div id="form-review" class="form-review md:p-10 p-6 bg-surface rounded-xl md:mt-10 mt-6">
                                <div class="heading4">Leave A comment</div>
                                <form wire:submit.prevent="submitComment" class="grid sm:grid-cols-2 gap-4 gap-y-5 md:mt-6 mt-3">
                                    @csrf
                                    <div class="name">
                                        <input wire:model="commenter_name" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="username" type="text" placeholder="Your Name *" required />
                                    </div>
                                    <div class="mail">
                                        <input wire:model="commenter_email" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="email" type="email" placeholder="Your Email *" required />
                                    </div>
                                    <div class="col-span-full message">
                                        <textarea class="border border-line px-4 py-3 w-full rounded-lg" id="message" name="message" placeholder="Your message *" rows="4" required wire:model="comment_content"></textarea>

                                    </div>
                                    <div class="col-span-full sm:pt-3">
                                        <button class="button-main bg-white text-black border border-black">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="right xl:w-1/4 lg:w-1/3 lg:pl-[45px]">
                        @if(count($relatedPosts) > 0)
                        <div class="recent md:mt-10 mt-6">
                            <div class="heading6">Recent Posts</div>
                            <div class="list-recent pt-1">
                                @foreach($relatedPosts as $post)
                                <div class="blog-item flex gap-4 mt-5 cursor-pointer" data-item="13">
                                    <a href="{{route('blog.detail', [$post->slug])}}">
                                        <img src="{{asset('storage/' . $post->coverImg)}}" alt="img" class="w-20 h-20 object-cover rounded-lg flex-shrink-0" />
                                    </a>
                                    <div>
                                        <div class="blog-tag whitespace-nowrap bg-green py-0.5 px-2 rounded-full text-button-uppercase text-xs inline-block">
                                            {{$post->blogCategory->name}}
                                        </div>
                                        <div class="text-title mt-1">
                                            <a href="{{route('blog.detail', [$post->slug])}}">
                                                {{$post->title}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <div class="subcribe md:mt-10 mt-6 bg-surface p-6 rounded-[20px]">
                            <div class="text-center heading5">Subscribe For Daily Newsletter</div>
                            <form class="mt-5">
                                <input class="text-center md:h-[50px] h-[44px] w-full px-4 rounded-xl" type="email" placeholder="Your email address" required />
                                <button class="button-main text-center w-full mt-4">Sign Up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:pb-20 pb-10">

            </div>
        </div>
        @include('partials.footer')
    </main>
</x-layouts.main>
