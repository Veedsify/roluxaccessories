<div id="header" class="relative w-full">
    <div class="header-menu style-one relative bg-white w-full md:h-[74px] h-[56px]">
        <div class="container mx-auto h-full">
            <div class="header-main flex items-center justify-between h-full">
                <div class="menu-mobile-icon lg:hidden flex items-center">
                    <i class="ph ph-list text-2xl"></i>

                </div>
                <a href="{{route('home')}}" class="flex items-center lg:hidden">
                    <div class="heading4">
                        Rolux
                    </div>
                </a>
                <div class="form-search relative max-lg:hidden z-[1]">
                    <i class="ph ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 cursor-pointer"></i>
                    <input type="text" placeholder="What are you looking for?" class="h-10 rounded-lg border border-line caption2 w-full pl-9 pr-4" />
                </div>
                <div class="menu-main h-full w-screen xl:absolute xl:left-1/2 xl:-translate-x-1/2 max-lg:hidden">
                    <ul class="flex items-center justify-center gap-8 h-full">
                        <li class="h-full relative">
                            <a href="{{route('home')}}" class="text-button-uppercase duration-300 h-full flex items-center justify-center gap-1 {{ request()->routeIs('home') ? 'active' : '' }}" >
                                Home </a>
                        </li>
                        <li class="h-full">
                            <a href="{{route('about')}}" class="text-button-uppercase duration-300 h-full flex items-center justify-center {{ request()->routeIs('about') ? 'active' : '' }}" >
                                About </a>
                        </li>
                        <li class="h-full">
                            <a href="{{route('shop')}}" class="text-button-uppercase duration-300 h-full flex items-center justify-center {{ request()->routeIs('shop') ? 'active' : '' }}" >
                                Shop
                            </a>
                        </li>
                        <li class="h-full flex items-center justify-center logo" style="color: {{ request()->routeIs('home') ? 'red' : 'black' }}">

                            <a href="{{route('home')}}" class="heading4" > Roluxe </a>
                        </li>
                        <li class="h-full">
                            <a href="{{route('collection')}}" class="text-button-uppercase duration-300 h-full flex items-center justify-center {{ request()->routeIs('collection') ? 'active' : '' }}" >


                                Collections </a>
                        </li>
                        <li class="h-full relative">
                            <a href="{{route('blog')}}" class="text-button-uppercase duration-300 h-full flex items-center justify-center {{ request()->routeIs('blog') ? 'active' : '' }}" >

                                Blog
                            </a>
                        </li>
                        <li class="h-full relative">
                            <a href="{{route('contact')}}" class="text-button-uppercase duration-300 h-full flex items-center justify-center {{ request()->routeIs('contact') ? 'active' : '' }}" >
                                Contact </a>
                        </li>
                    </ul>
                </div>
                <div class="right flex gap-12 z-[1] relative">
                    <div class="list-action flex items-center gap-4">
                        <div x-data="{open: false}" class="flex items-center justify-center cursor-pointer" @click.away="open = false">
                            <button @click=" open=!open" type="button">
                                <i class="ph-bold ph-user text-2xl"></i>
                            </button>
                            <div x-show="open" class="absolute right-0  top-[74px] w-[320px] p-7 rounded-xl bg-white box-shadow-sm">
                                @guest
                                <a href="login.html" class="button-main w-full text-center">Login</a>
                                <div class="text-secondary text-center mt-3 pb-4">
                                    Don’t have an account?
                                    <a href="register.html" class="text-black pl-1 hover:underline">Register
                                    </a>
                                </div>
                                @endguest
                                @auth()
                                <a href="my-account.html" class="button-main bg-white text-black border border-black w-full text-center">Dashboard</a>
                                <div class="bottom mt-4 pt-4 border-t border-line"></div>
                                <a href="#!" class="body1 hover:underline">Support</a>
                                @endauth
                            </div>
                        </div>
                        <div class="max-md:hidden wishlist-icon flex items-center relative cursor-pointer">
                            <i class="ph-bold ph-heart text-2xl"></i>
                            <span class="quantity wishlist-quantity absolute -right-1.5 -top-1.5 text-xs text-white bg-black w-4 h-4 flex items-center justify-center rounded-full">0</span>
                        </div>
                        <div class="max-md:hidden cart-icon flex items-center relative cursor-pointer">
                            <i class="ph-bold ph-handbag text-2xl"></i>
                            <span class="quantity cart-quantity absolute -right-1.5 -top-1.5 text-xs text-white bg-black w-4 h-4 flex items-center justify-center rounded-full">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div id="menu-mobile" class="">
        <div class="menu-container bg-white h-full">
            <div class="container h-full">
                <div class="menu-main h-full overflow-hidden">
                    <div class="heading py-2 relative flex items-center justify-center">
                        <div class="close-menu-mobile-btn absolute left-0 top-1/2 -translate-y-1/2 w-6 h-6 rounded-full bg-surface flex items-center justify-center">
                            <i class="ph ph-x text-sm"></i>
                        </div>
                        <a href="{{route('home')}}" class="logo text-3xl font-semibold text-center">
                            Rolux
                        </a>
                    </div>
                    <div class="form-search relative mt-2">
                        <i class="ph ph-magnifying-glass text-xl absolute left-3 top-1/2 -translate-y-1/2 cursor-pointer"></i>
                        <input type="text" placeholder="What are you looking for?" class="h-12 rounded-lg border border-line text-sm w-full pl-10 pr-4" />
                    </div>
                    <div class="list-nav mt-6">
                        <ul>
                            <li>
                                <a href="{{route('home')}}" class="text-xl font-semibold flex items-center justify-between" >
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="{{route('about')}}" class="text-xl font-semibold flex items-center justify-between mt-5" >About
                                </a>
                            </li>
                            <li>
                                <a href="{{route('shop')}}" class="text-xl font-semibold flex items-center justify-between mt-5" >Shop
                                </a>
                            </li>
                            <li>
                                <a href="{{route('collection')}}" class="text-xl font-semibold flex items-center justify-between mt-5" >Collections
                                </a>
                            </li>
                            <li>
                                <a href="{{route('blog')}}" class="text-xl font-semibold flex items-center justify-between mt-5" >Blog
                                </a>
                            </li>
                            <li>
                                <a href="{{route('contact')}}" class="text-xl font-semibold flex items-center justify-between mt-5" >Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu bar -->
    <div class="menu_bar fixed bg-white bottom-0 left-0 w-full h-[70px] sm:hidden z-[101]">
        <div class="menu_bar-inner grid grid-cols-4 items-center h-full">
            <a href="{{route('home')}}" class="menu_bar-link flex flex-col items-center gap-1">
                <span class="ph-bold ph-house text-2xl block"></span>
                <span class="menu_bar-title caption2 font-semibold">Home</span>
            </a>
            <a href="{{route('collection')}}" class="menu_bar-link flex flex-col items-center gap-1">

                <span class="ph ph-shirt-folded text-2xl block"></span>
                <span class="menu_bar-title caption2 font-semibold">Collections</span>
            </a>
            <a href="{{route('home')}}" class="menu_bar-link flex flex-col items-center gap-1">

                <span class="ph-bold ph-magnifying-glass text-2xl block"></span>
                <span class="menu_bar-title caption2 font-semibold">Search</span>
            </a>
            <a href="{{route('cart')}}" class="menu_bar-link flex flex-col items-center gap-1">

                <div class="relative">
                    <span class="ph-bold ph-handbag text-2xl block"></span>
                    <span class="quantity cart-quantity absolute -right-1.5 -top-1.5 text-xs text-white bg-black w-4 h-4 flex items-center justify-center rounded-full">0</span>
                </div>
                <span class="menu_bar-title caption2 font-semibold">Cart</span>
            </a>
        </div>
    </div>
</div>
