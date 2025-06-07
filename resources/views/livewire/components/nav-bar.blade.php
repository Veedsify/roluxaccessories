<div id="header" class="relative w-full">
    <div class="header-menu style-one relative bg-white w-full md:h-[74px] h-[56px]">
        <div class="container mx-auto h-full">
            <div class="header-main flex items-center justify-between h-full">
                <div class="menu-mobile-icon lg:hidden flex items-center">
                    <i class="icon-category text-2xl"></i>
                </div>
                <a href="/" class="flex items-center lg:hidden">
                    <div class="heading4">Anvogue</div>
                </a>
                <div class="form-search relative max-lg:hidden z-[1]">
                    <i class="ph ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 cursor-pointer"></i>
                    <input type="text" placeholder="What are you looking for?" class="h-10 rounded-lg border border-line caption2 w-full pl-9 pr-4" />
                </div>
                <div class="menu-main h-full w-screen xl:absolute xl:left-1/2 xl:-translate-x-1/2 max-lg:hidden">
                    <ul class="flex items-center justify-center gap-8 h-full">
                        <li class="h-full relative">
                            <a href="{{route('home')}}" class="text-button-uppercase duration-300 h-full flex items-center justify-center gap-1 {{ request()->routeIs('home') ? 'active' : '' }}" wire:navigate>
                                Home </a>
                        </li>
                        <li class="h-full">
                            <a href="{{route('about')}}" class="text-button-uppercase duration-300 h-full flex items-center justify-center {{ request()->routeIs('about') ? 'active' : '' }}" wire:navigate>
                                About </a>
                        </li>
                        <li class="h-full">
                            <a href="{{route('shop')}}" class="text-button-uppercase duration-300 h-full flex items-center justify-center {{ request()->routeIs('shop') ? 'active' : '' }}" wire:navigate>
                                Shop
                            </a>
                        </li>
                        <li class="h-full flex items-center justify-center logo" style="color: {{ request()->routeIs('home') ? 'red' : 'black' }}">

                            <a href="{{route('home')}}" class="heading4" wire:navigate> Rolux </a>
                        </li>
                        <li class="h-full">
                            <a href="#!" class="text-button-uppercase duration-300 h-full flex items-center justify-center">
                                Product </a>
                            <div class="mega-menu absolute top-[74px] left-0 bg-white w-screen">
                                <div class="container">
                                    <div class="nav-link w-full flex justify-between py-8">
                                        <div class="nav-item">
                                            <div class="text-button-uppercase pb-2">Products Features</div>
                                            <ul>
                                                <li>
                                                    <a href="/product-default.html" class="link text-secondary duration-300"> Products
                                                        Defaults
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/product-sale.html" class="link text-secondary duration-300"> Products Sale
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/product-countdown-timer.html" class="link text-secondary duration-300"> Products
                                                        Countdown
                                                        Timer </a>
                                                </li>
                                                <li>
                                                    <a href="/product-grouped.html" class="link text-secondary duration-300"> Products
                                                        Grouped
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/product-bought-together.html" class="link text-secondary duration-300"> Frequently
                                                        Bought
                                                        Together </a>
                                                </li>
                                                <li>
                                                    <a href="/product-out-of-stock.html" class="link text-secondary duration-300"> Products Out
                                                        Of
                                                        Stock
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/product-variable.html" class="link text-secondary duration-300"> Products
                                                        Variable
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="nav-item">
                                            <div class="text-button-uppercase pb-2">Products Features</div>
                                            <ul>
                                                <li>
                                                    <a href="/product-external.html" class="link text-secondary duration-300"> Products
                                                        External
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/product-on-sale.html" class="link text-secondary duration-300"> Products On
                                                        Sale
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/product-discount.html" class="link text-secondary duration-300"> Products With
                                                        Discount
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/product-sidebar.html" class="link text-secondary duration-300"> Products With
                                                        Sidebar
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/product-fixed-price.html" class="link text-secondary duration-300"> Products Fixed
                                                        Price
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="nav-item">
                                            <div class="text-button-uppercase pb-2">Products Layout</div>
                                            <ul>
                                                <li>
                                                    <a href="/product-thumbnail-left.html" class="link text-secondary duration-300 cursor-pointer">
                                                        Products Thumbnails Left </a>
                                                </li>
                                                <li>
                                                    <a href="/product-thumbnail-bottom.html" class="link text-secondary duration-300 cursor-pointer">
                                                        Products Thumbnails Bottom </a>
                                                </li>
                                                <li>
                                                    <a href="/product-one-scrolling.html" class="link text-secondary duration-300 cursor-pointer">
                                                        Products Grid 1 Scrolling </a>
                                                </li>
                                                <li>
                                                    <a href="/product-two-scrolling.html" class="link text-secondary duration-300 cursor-pointer">
                                                        Products Grid 2 Scrolling </a>
                                                </li>
                                                <li>
                                                    <a href="/product-combined-one.html" class="link text-secondary duration-300 cursor-pointer">
                                                        Products Combined 1 </a>
                                                </li>
                                                <li>
                                                    <a href="/product-combined-two.html" class="link text-secondary duration-300 cursor-pointer">
                                                        Products Combined 2 </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="nav-item">
                                            <div class="text-button-uppercase pb-2">Products Styles</div>
                                            <ul>
                                                <li>
                                                    <a href="/product-style1.html" class="link text-secondary duration-300 cursor-pointer">
                                                        Products Style 01 </a>
                                                </li>
                                                <li>
                                                    <a href="/product-style2.html" class="link text-secondary duration-300 cursor-pointer">
                                                        Products Style 02 </a>
                                                </li>
                                                <li>
                                                    <a href="/product-style3.html" class="link text-secondary duration-300 cursor-pointer">
                                                        Products Style 03 </a>
                                                </li>
                                                <li>
                                                    <a href="/product-style4.html" class="link text-secondary duration-300 cursor-pointer">
                                                        Products Style 04 </a>
                                                </li>
                                                <li>
                                                    <a href="/product-style5.html" class="link text-secondary duration-300 cursor-pointer">
                                                        Products Style 05 </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="h-full relative">
                            <a href="#!" class="text-button-uppercase duration-300 h-full flex items-center justify-center">
                                Blog
                            </a>
                            <div class="sub-menu py-3 px-5 -left-10 absolute bg-white rounded-b-xl">
                                <ul class="w-full">
                                    <li>
                                        <a href="blog-default.html" class="link text-secondary duration-300">
                                            Blog
                                            Default </a>
                                    </li>
                                    <li>
                                        <a href="blog-list.html" class="link text-secondary duration-300"> Blog
                                            List
                                        </a>
                                    </li>
                                    <li>
                                        <a href="blog-grid.html" class="link text-secondary duration-300"> Blog
                                            Grid
                                        </a>
                                    </li>
                                    <li>
                                        <a href="blog-detail1.html" class="link text-secondary duration-300">
                                            Blog
                                            Detail 1 </a>
                                    </li>
                                    <li>
                                        <a href="blog-detail2.html" class="link text-secondary duration-300">
                                            Blog
                                            Detail 2 </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="h-full relative">
                            <a href="#!" class="text-button-uppercase duration-300 h-full flex items-center justify-center">
                                Pages </a>
                            <div class="sub-menu py-3 px-5 -left-10 absolute bg-white rounded-b-xl">
                                <ul class="w-full">
                                    <li>
                                        <a href="about.html" class="link text-secondary duration-300"> About Us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="contact.html" class="link text-secondary duration-300"> Contact
                                            Us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="store-list.html" class="link text-secondary duration-300">
                                            Store
                                            List
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page-not-found.html" class="link text-secondary duration-300">
                                            404
                                        </a>
                                    </li>
                                    <li>
                                        <a href="faqs.html" class="link text-secondary duration-300"> FAQs </a>
                                    </li>
                                    <li>
                                        <a href="coming-soon.html" class="link text-secondary duration-300">
                                            Coming
                                            Soon
                                        </a>
                                    </li>
                                    <li>
                                        <a href="customer-feedbacks.html" class="link text-secondary duration-300">
                                            Customer Feedbacks </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="right flex gap-12 z-[1]">
                    <div class="list-action flex items-center gap-4">
                        <div class="user-icon flex items-center justify-center cursor-pointer">
                            <i class="ph-bold ph-user text-2xl"></i>
                            <div class="login-popup absolute top-[74px] w-[320px] p-7 rounded-xl bg-white box-shadow-sm">
                                <a href="login.html" class="button-main w-full text-center">Login</a>
                                <div class="text-secondary text-center mt-3 pb-4">
                                    Don’t have an account?
                                    <a href="register.html" class="text-black pl-1 hover:underline">Register
                                    </a>
                                </div>
                                <a href="my-account.html" class="button-main bg-white text-black border border-black w-full text-center">Dashboard</a>
                                <div class="bottom mt-4 pt-4 border-t border-line"></div>
                                <a href="#!" class="body1 hover:underline">Support</a>
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
                        <a href="/" class="logo text-3xl font-semibold text-center">Anvogue</a>
                    </div>
                    <div class="form-search relative mt-2">
                        <i class="ph ph-magnifying-glass text-xl absolute left-3 top-1/2 -translate-y-1/2 cursor-pointer"></i>
                        <input type="text" placeholder="What are you looking for?" class="h-12 rounded-lg border border-line text-sm w-full pl-10 pr-4" />
                    </div>
                    <div class="list-nav mt-6">
                        <ul>
                            <li>
                                <a href="#!" class="text-xl font-semibold flex items-center justify-between">Demo
                                    <span class="text-right">
                                        <i class="ph ph-caret-right text-xl"></i>
                                    </span>
                                </a>
                                <div class="sub-nav-mobile">
                                    <div class="back-btn flex items-center gap-3">
                                        <i class="ph ph-caret-left text-xl"></i>
                                        Back
                                    </div>
                                    <div class="list-nav-item w-full grid grid-cols-2 pt-2 pb-6">
                                        <ul>
                                            <li>
                                                <a href="index.html" class="nav-item-mobile link text-secondary duration-300">
                                                    Home
                                                    Fashion 1 </a>
                                            </li>
                                            <li>
                                                <a href="fashion2.html" class="nav-item-mobile link text-secondary duration-300">
                                                    Home
                                                    Fashion 2 </a>
                                            </li>
                                            <li>
                                                <a href="fashion3.html" class="nav-item-mobile link text-secondary duration-300">
                                                    Home
                                                    Fashion 3 </a>
                                            </li>
                                            <li>
                                                <a href="fashion4.html" class="nav-item-mobile link text-secondary">
                                                    Home Fashion 4 </a>
                                            </li>
                                            <li>
                                                <a href="fashion5.html" class="nav-item-mobile link text-secondary duration-300">
                                                    Home
                                                    Fashion 5 </a>
                                            </li>
                                            <li>
                                                <a href="fashion6.html" class="nav-item-mobile link text-secondary duration-300">
                                                    Home
                                                    Fashion 6 </a>
                                            </li>
                                            <li>
                                                <a href="fashion7.html" class="nav-item-mobile link text-secondary duration-300">
                                                    Home
                                                    Fashion 7 </a>
                                            </li>
                                            <li>
                                                <a href="fashion8.html" class="nav-item-mobile link text-secondary duration-300">
                                                    Home
                                                    Fashion 8 </a>
                                            </li>
                                            <li>
                                                <a href="fashion9.html" class="nav-item-mobile link text-secondary duration-300">
                                                    Home
                                                    Fashion 9 </a>
                                            </li>
                                            <li>
                                                <a href="fashion10.html" class="nav-item-mobile link text-secondary duration-300">
                                                    Home
                                                    Fashion 10 </a>
                                            </li>
                                            <li>
                                                <a href="fashion11.html" class="nav-item-mobile link text-secondary duration-300">
                                                    Home
                                                    Fashion 11 </a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <a href="underwear.html" class="nav-item-mobile link text-secondary duration-300">
                                                    Home
                                                    Underwear </a>
                                            </li>
                                            <li>
                                                <a href="cosmetic1.html" class="nav-item-mobile link text-secondary duration-300">
                                                    Home
                                                    Cosmetic 1 </a>
                                            </li>
                                            <li>
                                                <a href="cosmetic2.html" class="nav-item-mobile link text-secondary duration-300">
                                                    Home
                                                    Cosmetic 2 </a>
                                            </li>
                                            <li>
                                                <a href="cosmetic3.html" class="nav-item-mobile link text-secondary duration-300">
                                                    Home
                                                    Cosmetic 3 </a>
                                            </li>
                                            <li>
                                                <a href="pet.html" class="nav-item-mobile link text-secondary duration-300">
                                                    Home
                                                    Pet
                                                    Store </a>
                                            </li>
                                            <li>
                                                <a href="jewelry.html" class="nav-item-mobile link text-secondary duration-300 active">
                                                    Home Jewelry </a>
                                            </li>
                                            <li>
                                                <a href="furniture.html" class="nav-item-mobile link text-secondary duration-300">
                                                    Home
                                                    Furniture </a>
                                            </li>
                                            <li>
                                                <a href="watch.html" class="nav-item-mobile link text-secondary duration-300">
                                                    Home
                                                    Watch
                                                </a>
                                            </li>
                                            <li>
                                                <a href="toys.html" class="nav-item-mobile link text-secondary duration-300">
                                                    Home
                                                    Toys
                                                    Kid </a>
                                            </li>
                                            <li>
                                                <a href="yoga.html" class="nav-item-mobile link text-secondary duration-300">
                                                    Home
                                                    Yoga
                                                </a>
                                            </li>
                                            <li>
                                                <a href="organic.html" class="nav-item-mobile link text-secondary duration-300">
                                                    Home
                                                    Organic </a>
                                            </li>
                                            <li>
                                                <a href="marketplace.html" class="nav-item-mobile link text-secondary duration-300">
                                                    Home
                                                    Marketplace </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" class="text-xl font-semibold flex items-center justify-between mt-5">Features
                                    <span class="text-right">
                                        <i class="ph ph-caret-right text-xl"></i>
                                    </span>
                                </a>
                                <div class="sub-nav-mobile">
                                    <div class="back-btn flex items-center gap-3">
                                        <i class="ph ph-caret-left text-xl"></i>
                                        Back
                                    </div>
                                    <div class="list-nav-item w-full pt-2 pb-6">
                                        <div class="nav-link grid grid-cols-2 gap-5 gap-y-6">
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">Sale & Offer</div>
                                                <ul>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Starting From 50% Off </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Chain Bracelet </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Necklace Charms </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Engagement Ring </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html" class="link text-secondary duration-300 cursor-pointer view-all-btn">
                                                            View All </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">Necklace</div>
                                                <ul>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Zodiac Necklace </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Pendant Necklace </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Chain Necklace </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Necklace Charms </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html" class="link text-secondary duration-300 view-all-btn">
                                                            View
                                                            All </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">Bracelet</div>
                                                <ul>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Chain Bracelet </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Cuffs Bracelet </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Lip
                                                            Bracelet </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Bracelet Charms </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html" class="link text-secondary duration-300 view-all-btn">
                                                            View
                                                            All </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">Ring</div>
                                                <ul>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Wedding Ring </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Signet Ring </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Engagement Ring </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Pinky Ring </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-breadcrumb1.html" class="link text-secondary duration-300 view-all-btn">
                                                            View
                                                            All </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" class="text-xl font-semibold flex items-center justify-between mt-5">Shop
                                    <span class="text-right">
                                        <i class="ph ph-caret-right text-xl"></i>
                                    </span>
                                </a>
                                <div class="sub-nav-mobile">
                                    <div class="back-btn flex items-center gap-3">
                                        <i class="ph ph-caret-left text-xl"></i>
                                        Back
                                    </div>
                                    <div class="list-nav-item w-full pt-2 pb-6">
                                        <div class="nav-link grid grid-cols-2 gap-5 gap-y-6 justify-between">
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">Shop Features</div>
                                                <ul>
                                                    <li>
                                                        <a href="/shop-breadcrumb-img.html" class="link text-secondary duration-300"> Shop
                                                            Breadcrumb
                                                            IMG </a>
                                                    </li>
                                                    <li>
                                                        <a href="/shop-breadcrumb1.html" class="link text-secondary duration-300"> Shop
                                                            Breadcrumb 1
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/shop-breadcrumb2.html" class="link text-secondary duration-300"> Shop
                                                            Breadcrumb 2
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/shop-collection.html" class="link text-secondary duration-300"> Shop
                                                            Collection
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">Shop Features</div>
                                                <ul>
                                                    <li>
                                                        <a href="/shop-filter-canvas.html" class="link text-secondary duration-300"> Shop
                                                            Filter
                                                            Canvas
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/shop-filter-options.html" class="link text-secondary duration-300"> Shop
                                                            Filter
                                                            Options </a>
                                                    </li>
                                                    <li>
                                                        <a href="/shop-filter-dropdown.html" class="link text-secondary duration-300"> Shop
                                                            Filter
                                                            Dropdown </a>
                                                    </li>
                                                    <li>
                                                        <a href="/shop-sidebar-list.html" class="link text-secondary duration-300"> Shop
                                                            Sidebar
                                                            List
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">Shop Layout</div>
                                                <ul>
                                                    <li>
                                                        <a href="/shop-default.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Shop Default </a>
                                                    </li>
                                                    <li>
                                                        <a href="/shop-default-grid.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Shop Default Grid </a>
                                                    </li>
                                                    <li>
                                                        <a href="/shop-default-list.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Shop Default List </a>
                                                    </li>
                                                    <li>
                                                        <a href="/shop-fullwidth.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Shop Full Width </a>
                                                    </li>
                                                    <li>
                                                        <a href="/shop-square.html" class="link text-secondary duration-300"> Shop
                                                            Square
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">Products Pages</div>
                                                <ul>
                                                    <li>
                                                        <a href="/wishlist.html" class="link text-secondary duration-300"> Wish List
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/search-result.html" class="link text-secondary duration-300"> Search
                                                            Result
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/cart.html" class="link text-secondary duration-300">
                                                            Shopping Cart </a>
                                                    </li>
                                                    <li>
                                                        <a href="/login.html" class="link text-secondary duration-300">
                                                            Login/Register </a>
                                                    </li>
                                                    <li>
                                                        <a href="/forgot-password.html" class="link text-secondary duration-300"> Forgot
                                                            Password
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/order-tracking.html" class="link text-secondary duration-300"> Order
                                                            Tracking
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/my-account.html" class="link text-secondary duration-300"> My Account
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" class="text-xl font-semibold flex items-center justify-between mt-5">Product
                                    <span class="text-right">
                                        <i class="ph ph-caret-right text-xl"></i>
                                    </span>
                                </a>
                                <div class="sub-nav-mobile">
                                    <div class="back-btn flex items-center gap-3">
                                        <i class="ph ph-caret-left text-xl"></i>
                                        Back
                                    </div>
                                    <div class="list-nav-item w-full pt-2 pb-6">
                                        <div class="nav-link grid grid-cols-2 gap-5 gap-y-6 justify-between">
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">Products Features</div>
                                                <ul>
                                                    <li>
                                                        <a href="/product-default.html" class="link text-secondary duration-300"> Products
                                                            Defaults
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/product-sale.html" class="link text-secondary duration-300"> Products
                                                            Sale
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/product-countdown-timer.html" class="link text-secondary duration-300"> Products
                                                            Countdown
                                                            Timer </a>
                                                    </li>
                                                    <li>
                                                        <a href="/product-grouped.html" class="link text-secondary duration-300"> Products
                                                            Grouped
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/product-bought-together.html" class="link text-secondary duration-300"> Frequently
                                                            Bought
                                                            Together </a>
                                                    </li>
                                                    <li>
                                                        <a href="/product-out-of-stock.html" class="link text-secondary duration-300"> Products
                                                            Out
                                                            Of
                                                            Stock </a>
                                                    </li>
                                                    <li>
                                                        <a href="/product-variable.html" class="link text-secondary duration-300"> Products
                                                            Variable
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">Products Features</div>
                                                <ul>
                                                    <li>
                                                        <a href="/product-external.html" class="link text-secondary duration-300"> Products
                                                            External
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/product-on-sale.html" class="link text-secondary duration-300"> Products
                                                            On
                                                            Sale
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/product-discount.html" class="link text-secondary duration-300"> Products
                                                            With
                                                            Discount </a>
                                                    </li>
                                                    <li>
                                                        <a href="/product-sidebar.html" class="link text-secondary duration-300"> Products
                                                            With
                                                            Sidebar </a>
                                                    </li>
                                                    <li>
                                                        <a href="/product-fixed-price.html" class="link text-secondary duration-300"> Products
                                                            Fixed
                                                            Price </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">Products Layout</div>
                                                <ul>
                                                    <li>
                                                        <a href="/product-thumbnail-left.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Products Thumbnails Left </a>
                                                    </li>
                                                    <li>
                                                        <a href="/product-thumbnail-bottom.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Products Thumbnails Bottom </a>
                                                    </li>
                                                    <li>
                                                        <a href="/product-one-scrolling.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Products Grid 1 Scrolling </a>
                                                    </li>
                                                    <li>
                                                        <a href="/product-two-scrolling.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Products Grid 2 Scrolling </a>
                                                    </li>
                                                    <li>
                                                        <a href="/product-combined-one.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Products Combined 1 </a>
                                                    </li>
                                                    <li>
                                                        <a href="/product-combined-two.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Products Combined 2 </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nav-item">
                                                <div class="text-button-uppercase pb-1">Products Styles</div>
                                                <ul>
                                                    <li>
                                                        <a href="/product-style1.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Products Style 01 </a>
                                                    </li>
                                                    <li>
                                                        <a href="/product-style2.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Products Style 02 </a>
                                                    </li>
                                                    <li>
                                                        <a href="/product-style3.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Products Style 03 </a>
                                                    </li>
                                                    <li>
                                                        <a href="/product-style4.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Products Style 04 </a>
                                                    </li>
                                                    <li>
                                                        <a href="/product-style5.html" class="link text-secondary duration-300 cursor-pointer">
                                                            Products Style 05 </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" class="text-xl font-semibold flex items-center justify-between mt-5">Blog
                                    <span class="text-right">
                                        <i class="ph ph-caret-right text-xl"></i>
                                    </span>
                                </a>
                                <div class="sub-nav-mobile">
                                    <div class="back-btn flex items-center gap-3">
                                        <i class="ph ph-caret-left text-xl"></i>
                                        Back
                                    </div>
                                    <div class="list-nav-item w-full pt-2 pb-6">
                                        <ul class="w-full">
                                            <li>
                                                <a href="blog-default.html" class="link text-secondary duration-300">
                                                    Blog Default </a>
                                            </li>
                                            <li>
                                                <a href="blog-list.html" class="link text-secondary duration-300">
                                                    Blog
                                                    List </a>
                                            </li>
                                            <li>
                                                <a href="blog-grid.html" class="link text-secondary duration-300">
                                                    Blog
                                                    Grid </a>
                                            </li>
                                            <li>
                                                <a href="blog-detail1.html" class="link text-secondary duration-300">
                                                    Blog Detail 1 </a>
                                            </li>
                                            <li>
                                                <a href="blog-detail2.html" class="link text-secondary duration-300">
                                                    Blog Detail 2 </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" class="text-xl font-semibold flex items-center justify-between mt-5">Pages
                                    <span class="text-right">
                                        <i class="ph ph-caret-right text-xl"></i>
                                    </span>
                                </a>
                                <div class="sub-nav-mobile">
                                    <div class="back-btn flex items-center gap-3">
                                        <i class="ph ph-caret-left text-xl"></i>
                                        Back
                                    </div>
                                    <div class="list-nav-item w-full pt-2 pb-6">
                                        <ul class="w-full">
                                            <li>
                                                <a href="about.html" class="link text-secondary duration-300">
                                                    About
                                                    Us
                                                </a>
                                            </li>
                                            <li>
                                                <a href="contact.html" class="link text-secondary duration-300">
                                                    Contact
                                                    Us </a>
                                            </li>
                                            <li>
                                                <a href="store-list.html" class="link text-secondary duration-300">
                                                    Store List </a>
                                            </li>
                                            <li>
                                                <a href="page-not-found.html" class="link text-secondary duration-300">
                                                    404 </a>
                                            </li>
                                            <li>
                                                <a href="faqs.html" class="link text-secondary duration-300">
                                                    FAQs
                                                </a>
                                            </li>
                                            <li>
                                                <a href="coming-soon.html" class="link text-secondary duration-300">
                                                    Coming Soon </a>
                                            </li>
                                            <li>
                                                <a href="customer-feedbacks.html" class="link text-secondary duration-300"> Customer Feedbacks
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
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
            <a href="index.html" class="menu_bar-link flex flex-col items-center gap-1">
                <span class="ph-bold ph-house text-2xl block"></span>
                <span class="menu_bar-title caption2 font-semibold">Home</span>
            </a>
            <a href="shop-filter-canvas.html" class="menu_bar-link flex flex-col items-center gap-1">
                <span class="ph-bold ph-list text-2xl block"></span>
                <span class="menu_bar-title caption2 font-semibold">Category</span>
            </a>
            <a href="search-result.html" class="menu_bar-link flex flex-col items-center gap-1">
                <span class="ph-bold ph-magnifying-glass text-2xl block"></span>
                <span class="menu_bar-title caption2 font-semibold">Search</span>
            </a>
            <a href="cart.html" class="menu_bar-link flex flex-col items-center gap-1">
                <div class="cart-icon relative">
                    <span class="ph-bold ph-handbag text-2xl block"></span>
                    <span class="quantity cart-quantity absolute -right-1.5 -top-1.5 text-xs text-white bg-black w-4 h-4 flex items-center justify-center rounded-full">0</span>
                </div>
                <span class="menu_bar-title caption2 font-semibold">Cart</span>
            </a>
        </div>
    </div>
</div>
