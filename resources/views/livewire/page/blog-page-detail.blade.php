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
                                    {{ $post->previousPost ? $post->previousPost->title : 'No Previous Post' }}
                                </div>
                            </div>
                            <div class="right text-right cursor-pointer">
                                <div class="text-button-uppercase text-secondary2">Next</div>
                                <div class="text-title next mt-2">
                                    {{ $post->nextPost ? $post->nextPost->title : 'No Next Post' }}
                                </div>
                            </div>
                        </div>
                        <div class="list-comment md:mt-[60px] mt-8">
                            <div class="heading flex items-center justify-between flex-wrap gap-4">
                                <div class="heading4">03 Comments</div>
                                <div class="right flex items-center gap-3">
                                    <label for="select-filter" class="uppercase">Sort by:</label>
                                    <div class="select-block relative">
                                        <select id="select-filter" name="select-filter" class="text-button py-2 pl-3 md:pr-14 pr-10 rounded-lg bg-white border border-line">
                                            <option value="Sorting" disabled>Sorting</option>
                                            <option value="newest">Newest</option>
                                            <option value="5star">5 Star</option>
                                            <option value="4star">4 Star</option>
                                            <option value="3star">3 Star</option>
                                            <option value="2star">2 Star</option>
                                            <option value="1star">1 Star</option>
                                        </select>
                                        <i class="ph ph-caret-down text-xs absolute top-1/2 -translate-y-1/2 md:right-4 right-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="list-review mt-6">
                                <div class="item">
                                    <div class="heading flex items-center justify-between">
                                        <div class="user-infor flex gap-4">
                                            <div class="avatar-cmt">
                                                <img src="{{asset('/frontend/images/avatar/1.png')}}" alt="img" class="w-[52px] aspect-square rounded-full" />
                                            </div>
                                            <div class="user">
                                                <div class="flex items-center gap-2">
                                                    <div class="text-title">Tony Nguyen</div>
                                                    <div class="span text-line">-</div>
                                                    <div class="rate flex">
                                                        <i class="ph-fill ph-star text-xs text-yellow"></i>
                                                        <i class="ph-fill ph-star text-xs text-yellow"></i>
                                                        <i class="ph-fill ph-star text-xs text-yellow"></i>
                                                        <i class="ph-fill ph-star text-xs text-yellow"></i><i class="ph-fill ph-star text-xs text-yellow"></i>
                                                    </div>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <div class="text-secondary2">1 days ago</div>
                                                    <div class="text-secondary2">-</div>
                                                    <div class="text-secondary2"><span>Yellow</span> / <span>XL</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="more-action cursor-pointer">
                                            <i class="ph-bold ph-dots-three text-2xl"></i>
                                        </div>
                                    </div>
                                    <div class="mt-3">I can't get enough of the fashion pieces from this brand. They have a great selection for every occasion and the prices are reasonable. The shipping is fast and the items always arrive in perfect condition.</div>
                                    <div class="action flex justify-between mt-3">
                                        <div class="left flex items-center gap-4">
                                            <div class="like-btn flex items-center gap-1 cursor-pointer">
                                                <i class="ph ph-hands-clapping text-lg"></i>
                                                <div class="text-button">20</div>
                                            </div>
                                            <div class="hide-rep-btn flex items-center gap-1 cursor-pointer">
                                                <i class="ph ph-chat text-lg"></i>
                                                <div class="text-button">Hide Replies</div>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="reply-btn text-button text-secondary">Reply</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item md:mt-8 mt-5">
                                    <div class="heading flex items-center justify-between">
                                        <div class="user-infor flex gap-4">
                                            <div class="avatar-cmt">
                                                <img src="{{asset('/frontend/images/avatar/2.png')}}" alt="img" class="w-[52px] aspect-square rounded-full" />
                                            </div>
                                            <div class="user">
                                                <div class="flex items-center gap-2">
                                                    <div class="text-title">Guy Hawkins</div>
                                                    <div class="span text-line">-</div>
                                                    <div class="rate flex">
                                                        <i class="ph-fill ph-star text-xs text-yellow"></i>
                                                        <i class="ph-fill ph-star text-xs text-yellow"></i>
                                                        <i class="ph-fill ph-star text-xs text-yellow"></i>
                                                        <i class="ph-fill ph-star text-xs text-yellow"></i>
                                                        <i class="ph-fill ph-star text-xs text-secondary"></i>
                                                    </div>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <div class="text-secondary2">1 days ago</div>
                                                    <div class="text-secondary2">-</div>
                                                    <div class="text-secondary2"><span>Yellow</span> / <span>XL</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="more-action cursor-pointer">
                                            <i class="ph-bold ph-dots-three text-2xl"></i>
                                        </div>
                                    </div>
                                    <div class="mt-3">I can't get enough of the fashion pieces from this brand. They have a great selection for every occasion and the prices are reasonable. The shipping is fast and the items always arrive in perfect condition.</div>
                                    <div class="action flex justify-between mt-3">
                                        <div class="left flex items-center gap-4">
                                            <div class="like-btn flex items-center gap-1 cursor-pointer">
                                                <i class="ph ph-hands-clapping text-lg"></i>
                                                <div class="text-button">20</div>
                                            </div>
                                            <div class="hide-rep-btn flex items-center gap-1 cursor-pointer">
                                                <i class="ph ph-chat text-lg"></i>
                                                <div class="text-button">Hide Replies</div>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="reply-btn text-button text-secondary">Reply</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item md:mt-8 mt-5">
                                    <div class="heading flex items-center justify-between">
                                        <div class="user-infor flex gap-4">
                                            <div class="avatar-cmt">
                                                <img src="{{asset('/frontend/images/avatar/3.png')}}" alt="img" class="w-[52px] aspect-square rounded-full" />
                                            </div>
                                            <div class="user">
                                                <div class="flex items-center gap-2">
                                                    <div class="text-title">John Smith</div>
                                                    <div class="span text-line">-</div>
                                                    <div class="rate flex">
                                                        <i class="ph-fill ph-star text-xs text-yellow"></i>
                                                        <i class="ph-fill ph-star text-xs text-yellow"></i>
                                                        <i class="ph-fill ph-star text-xs text-yellow"></i>
                                                        <i class="ph-fill ph-star text-xs text-yellow"></i><i class="ph-fill ph-star text-xs text-yellow"></i>
                                                    </div>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <div class="text-secondary2">1 days ago</div>
                                                    <div class="text-secondary2">-</div>
                                                    <div class="text-secondary2"><span>Yellow</span> / <span>XL</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="more-action cursor-pointer">
                                            <i class="ph-bold ph-dots-three text-2xl"></i>
                                        </div>
                                    </div>
                                    <div class="mt-3">I can't get enough of the fashion pieces from this brand. They have a great selection for every occasion and the prices are reasonable. The shipping is fast and the items always arrive in perfect condition.</div>
                                    <div class="action flex justify-between mt-3">
                                        <div class="left flex items-center gap-4">
                                            <div class="like-btn flex items-center gap-1 cursor-pointer">
                                                <i class="ph ph-hands-clapping text-lg"></i>
                                                <div class="text-button">20</div>
                                            </div>
                                            <div class="hide-rep-btn flex items-center gap-1 cursor-pointer">
                                                <i class="ph ph-chat text-lg"></i>
                                                <div class="text-button">Hide Replies</div>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="reply-btn text-button text-secondary">Reply</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="form-review" class="form-review md:p-10 p-6 bg-surface rounded-xl md:mt-10 mt-6">
                                <div class="heading4">Leave A comment</div>
                                <form class="grid sm:grid-cols-2 gap-4 gap-y-5 md:mt-6 mt-3">
                                    <div class="name">
                                        <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="username" type="text" placeholder="Your Name *" required />
                                    </div>
                                    <div class="mail">
                                        <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="email" type="email" placeholder="Your Email *" required />
                                    </div>
                                    <div class="col-span-full message">
                                        <textarea class="border border-line px-4 py-3 w-full rounded-lg" id="message" name="message" placeholder="Your message *" rows="4" required></textarea>
                                    </div>
                                    <div class="col-span-full flex items-start -mt-2 gap-2">
                                        <input type="checkbox" id="saveAccount" name="saveAccount" class="mt-1.5" />
                                        <label class="" for="saveAccount">Save my name, email, and website in this browser for the next time I comment.</label>
                                    </div>
                                    <div class="col-span-full sm:pt-3">
                                        <button class="button-main bg-white text-black border border-black">Submit Reviews</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="right xl:w-1/4 lg:w-1/3 lg:pl-[45px]">
                        <div class="about-author">
                            <div class="heading flex gap-5">
                                <div class="avatar w-[100px] h-[100px] rounded-full overflow-hidden flex-shrink-0">
                                    <img src="{{asset('/frontend/images/avatar/1.png')}}" alt="avatar" class="w-full h-full object-cover" />
                                </div>
                                <div>
                                    <div class="heading6 blog-author">{blogMain.author}</div>
                                    <div class="caption1 text-secondary mt-1">200 Follower</div>
                                    <div class="button-main bg-white text-black px-5 py-1 border border-line text-button rounded-full capitalize mt-2">Follow</div>
                                </div>
                            </div>
                            <div class="text-secondary mt-5"><span class="blog-author">{blogMain.author}</span> is a writer who draws. He’s the Bestselling author of “Number of The Year”. Donec vitae tortor efficitur, convallis lelobortis elit.</div>
                            <div class="list-social mt-4 flex items-center gap-6 flex-wrap">
                                <a href="https://www.facebook.com/" target="_blank" class="">
                                    <div class="icon-facebook md:text-xl duration-100"></div>
                                </a>
                                <a href="https://www.instagram.com/" target="_blank" class="">
                                    <div class="icon-instagram md:text-xl duration-100"></div>
                                </a>
                                <a href="https://www.twitter.com/" target="_blank" class="">
                                    <div class="icon-twitter md:text-xl duration-100"></div>
                                </a>
                                <a href="https://www.youtube.com/" target="_blank" class="">
                                    <div class="icon-youtube md:text-xl duration-100"></div>
                                </a>
                                <a href="https://www.pinterest.com/" target="_blank" class="">
                                    <div class="icon-pinterest md:text-xl duration-100"></div>
                                </a>
                            </div>
                        </div>
                        <div class="recent md:mt-10 mt-6">
                            <div class="heading6">Recent Posts</div>
                            <div class="list-recent pt-1">
                                <div class="blog-item flex gap-4 mt-5 cursor-pointer" data-item="13">
                                    <img src="{{asset('/frontend/images/blog/yoga1.png')}}" alt="img" class="w-20 h-20 object-cover rounded-lg flex-shrink-0" />
                                    <div>
                                        <div class="blog-tag whitespace-nowrap bg-green py-0.5 px-2 rounded-full text-button-uppercase text-xs inline-block">Jean</div>
                                        <div class="text-title mt-1">Fashion Trends in Summer 2024</div>
                                    </div>
                                </div>
                                <div class="blog-item flex gap-4 mt-5 cursor-pointer" data-item="16">
                                    <img src="{{asset('/frontend/images/blog/organic1.png')}}" alt="img" class="w-20 h-20 object-cover rounded-lg flex-shrink-0" />
                                    <div>
                                        <div class="blog-tag whitespace-nowrap bg-green py-0.5 px-2 rounded-full text-button-uppercase text-xs inline-block">fruits</div>
                                        <div class="text-title mt-1">Organic Good for Health trending in winter 2024</div>
                                    </div>
                                </div>
                                <div class="blog-item flex gap-4 mt-5 cursor-pointer" data-item="15">
                                    <img src="{{asset('/frontend/images/blog/yoga3.png')}}" alt="img" class="w-20 h-20 object-cover rounded-lg flex-shrink-0" />
                                    <div>
                                        <div class="blog-tag whitespace-nowrap bg-green py-0.5 px-2 rounded-full text-button-uppercase text-xs inline-block">Yoga</div>
                                        <div class="text-title mt-1">Trending Excercise in Summer 2024</div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                <div class="news-block md:pt-20 pt-10">
                    <div class="container">
                        <div class="heading3 text-center">News insight</div>
                        <div class="list grid lg:grid-cols-3 sm:grid-cols-2 md:gap-[30px] gap-4 md:mt-10 mt-6">
                            <div class="blog-item style-one h-full cursor-pointer" data-item="16">
                                <div class="blog-main h-full block">
                                    <div class="blog-thumb rounded-[20px] overflow-hidden">
                                        <img src="{{asset('/frontend/images/blog/organic1.png')}}" alt="blog-img" class="w-full duration-500" />
                                    </div>
                                    <div class="blog-infor mt-7">
                                        <div class="blog-tag bg-green py-1 px-2.5 rounded-full text-button-uppercase inline-block">Jean, glasses</div>
                                        <div class="heading6 blog-title mt-3 duration-300">Fashion Trends to Watch Out for in Summer 2024</div>
                                        <div class="flex items-center gap-2 mt-2">
                                            <div class="blog-author caption1 text-secondary">by Chris Evans</div>
                                            <span class="w-[20px] h-[1px] bg-black"></span>
                                            <div class="blog-date caption1 text-secondary">Dec 20, 2024</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-item style-one h-full cursor-pointer" data-item="8">
                                <div class="blog-main h-full block">
                                    <div class="blog-thumb rounded-[20px] overflow-hidden">
                                        <img src="{{asset('/frontend/images/blog/8.png')}}" alt="blog-img" class="w-full duration-500" />
                                    </div>
                                    <div class="blog-infor mt-7">
                                        <div class="blog-tag bg-green py-1 px-2.5 rounded-full text-button-uppercase inline-block">Jean, shoes</div>
                                        <div class="heading6 blog-title mt-3 duration-300">How to Build a Sustainable and Stylish Wardrobe 2024</div>
                                        <div class="flex items-center gap-2 mt-2">
                                            <div class="blog-author caption1 text-secondary">by Alex Balde</div>
                                            <span class="w-[20px] h-[1px] bg-black"></span>
                                            <div class="blog-date caption1 text-secondary">Dec 12, 2024</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-item style-one h-full cursor-pointer max-lg:hidden max-sm:block" data-item="14">
                                <div class="blog-main h-full block">
                                    <div class="blog-thumb rounded-[20px] overflow-hidden">
                                        <img src="{{asset('/frontend/images/blog/yoga2.png')}}" alt="blog-img" class="w-full duration-500" />
                                    </div>
                                    <div class="blog-infor mt-7">
                                        <div class="blog-tag bg-green py-1 px-2.5 rounded-full text-button-uppercase inline-block">Jean, skirt</div>
                                        <div class="heading6 blog-title mt-3 duration-300">Fashion and Beauty Tips for Busy Professionals 2024</div>
                                        <div class="flex items-center gap-2 mt-2">
                                            <div class="blog-author caption1 text-secondary">by Leona Pablo</div>
                                            <span class="w-[20px] h-[1px] bg-black"></span>
                                            <div class="blog-date caption1 text-secondary">Dec 10, 2024</div>
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
