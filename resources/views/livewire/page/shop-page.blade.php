<x-layouts.main :title="$this->title ?? config('app.name')">
    <main>
        @livewire("components.top-nav")
        @livewire("components.nav-bar")
        <div class="breadcrumb-block style-img">
            <div class="breadcrumb-main bg-linear overflow-hidden">
                <div class="container lg:pt-[134px] pt-24 pb-10 relative">
                    <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                        <div class="text-content">
                            <div class="heading2 text-center">Shop</div>
                            <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                                <a href="/">Homepage</a>
                                <i class="ph ph-caret-right text-sm text-secondary2"></i>
                                <div class="text-secondary2 capitalize">Shop</div>
                            </div>
                        </div>
                        <div class="filter-type menu-tab flex flex-wrap items-center justify-center gap-y-5 gap-8 lg:mt-[70px] mt-12 overflow-hidden">
                            @foreach($productTypes as $type)
                            <div class="item tab-item text-button-uppercase cursor-pointer has-line-before line-2px" data-item="{{ $type['name']}}">
                                {{ $type['name'] }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop-product breadcrumb1 lg:py-20 md:py-14 py-10">
            <div class="container">
                <div class="flex max-md:flex-wrap max-md:flex-col-reverse gap-y-8">
                    <div class="sidebar lg:w-1/4 md:w-1/3 w-full md:pr-12">
                        <div class="filter-type-block pb-8 border-b border-line">
                            <div class="heading6">Products Type</div>
                            <div class="list-type filter-type menu-tab mt-4">
                                @foreach($productTypes as $type)
                                <div wire:click.prevent="filterByType('{{ $type['name'] }}')" class=" item tab-item flex items-center justify-between cursor-pointer" data-item="t-shirt" type="button">

                                    <div class="type-name text-secondary has-line-before hover:text-black capitalize">
                                        {{ $type['name'] }}
                                    </div>
                                    <div class="text-secondary2 number">
                                        {{ $type['count'] }}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="filter-size pb-8 border-b border-line mt-8">
                            <div class="heading6">Size</div>
                            <div class="list-size flex items-center flex-wrap gap-3 gap-y-4 mt-4">
                                <div class="size-item text-button w-[44px] h-[44px] flex items-center justify-center rounded-full border border-line" data-item="XS">XS
                                </div>
                                <div class="size-item text-button w-[44px] h-[44px] flex items-center justify-center rounded-full border border-line" data-item="S">S
                                </div>
                                <div class="size-item text-button w-[44px] h-[44px] flex items-center justify-center rounded-full border border-line" data-item="M">M
                                </div>
                                <div class="size-item text-button w-[44px] h-[44px] flex items-center justify-center rounded-full border border-line" data-item="L">L
                                </div>
                                <div class="size-item text-button w-[44px] h-[44px] flex items-center justify-center rounded-full border border-line" data-item="XL">XL
                                </div>
                                <div class="size-item text-button w-[44px] h-[44px] flex items-center justify-center rounded-full border border-line" data-item="2XL">2XL
                                </div>
                                <div class="size-item text-button px-4 py-2 flex items-center justify-center rounded-full border border-line" data-item="freesize">Freesize
                                </div>
                            </div>
                        </div>
                        <div class="filter-price pb-8 border-b border-line mt-8">
                            <div class="heading6">Price Range</div>
                            <div class="tow-bar-block mt-5">
                                <div class="progress"></div>
                            </div>
                            <div class="range-input">
                                <input class="range-min" type="range" min="0" max="300" value="0" />
                                <input class="range-max" type="range" min="0" max="300" value="300" />
                            </div>
                            <div class="price-block flex items-center justify-between flex-wrap mt-4">
                                <div class="min flex items-center gap-1">
                                    <div>Min price:</div>
                                    <div class="min-price">$0</div>
                                </div>
                                <div class="min flex items-center gap-1">
                                    <div>Max price:</div>
                                    <div class="max-price">$300</div>
                                </div>
                            </div>
                        </div>
                        <div class="filter-color pb-8 border-b border-line mt-8">
                            <div class="heading6">colors</div>
                            <div class="list-color flex items-center flex-wrap gap-3 gap-y-4 mt-4">
                                <div class="color-item px-3 py-[5px] flex items-center justify-center gap-2 rounded-full border border-line" data-item="pink">
                                    <div class="color bg-[#F4C5BF] w-5 h-5 rounded-full"></div>
                                    <div class="caption1 capitalize">pink</div>
                                </div>
                                <div class="color-item px-3 py-[5px] flex items-center justify-center gap-2 rounded-full border border-line" data-item="red">
                                    <div class="color bg-red w-5 h-5 rounded-full"></div>
                                    <div class="caption1 capitalize">red</div>
                                </div>
                                <div class="color-item px-3 py-[5px] flex items-center justify-center gap-2 rounded-full border border-line" data-item="green">
                                    <div class="color bg-green w-5 h-5 rounded-full"></div>
                                    <div class="caption1 capitalize">green</div>
                                </div>
                                <div class="color-item px-3 py-[5px] flex items-center justify-center gap-2 rounded-full border border-line" data-item="yellow">
                                    <div class="color bg-yellow w-5 h-5 rounded-full"></div>
                                    <div class="caption1 capitalize">yellow</div>
                                </div>
                                <div class="color-item px-3 py-[5px] flex items-center justify-center gap-2 rounded-full border border-line" data-item="purple">
                                    <div class="color bg-purple w-5 h-5 rounded-full"></div>
                                    <div class="caption1 capitalize">purple</div>
                                </div>
                                <div class="color-item px-3 py-[5px] flex items-center justify-center gap-2 rounded-full border border-line" data-item="black">
                                    <div class="color bg-black w-5 h-5 rounded-full"></div>
                                    <div class="caption1 capitalize">black</div>
                                </div>
                                <div class="color-item px-3 py-[5px] flex items-center justify-center gap-2 rounded-full border border-line" data-item="white">
                                    <div class="color bg-[#F6EFDD] w-5 h-5 rounded-full"></div>
                                    <div class="caption1 capitalize">white</div>
                                </div>
                            </div>
                        </div>
                        <div class="filter-brand pb-8 mt-8">
                            <div class="heading6">Brands</div>
                            <div class="list-brand mt-4">
                                <div class="brand-item flex items-center justify-between" data-item="adidas">
                                    <div class="left flex items-center cursor-pointer">
                                        <div class="block-input">
                                            <input type="checkbox" name="adidas" id="adidas" />
                                            <i class="ph-fill ph-check-square icon-checkbox text-2xl"></i>
                                        </div>
                                        <label for="adidas" class="brand-name capitalize pl-2 cursor-pointer">adidas</label>
                                    </div>
                                    <div class="text-secondary2 number">12</div>
                                </div>
                                <div class="brand-item flex items-center justify-between" data-item="hermes">
                                    <div class="left flex items-center cursor-pointer">
                                        <div class="block-input">
                                            <input type="checkbox" name="hermes" id="hermes" />
                                            <i class="ph-fill ph-check-square icon-checkbox text-2xl"></i>
                                        </div>
                                        <label for="hermes" class="brand-name capitalize pl-2 cursor-pointer">hermes</label>
                                    </div>
                                    <div class="text-secondary2 number">12</div>
                                </div>
                                <div class="brand-item flex items-center justify-between" data-item="zara">
                                    <div class="left flex items-center cursor-pointer">
                                        <div class="block-input">
                                            <input type="checkbox" name="zara" id="zara" />
                                            <i class="ph-fill ph-check-square icon-checkbox text-2xl"></i>
                                        </div>
                                        <label for="zara" class="brand-name capitalize pl-2 cursor-pointer">zara</label>
                                    </div>
                                    <div class="text-secondary2 number">12</div>
                                </div>
                                <div class="brand-item flex items-center justify-between" data-item="nike">
                                    <div class="left flex items-center cursor-pointer">
                                        <div class="block-input">
                                            <input type="checkbox" name="nike" id="nike" />
                                            <i class="ph-fill ph-check-square icon-checkbox text-2xl"></i>
                                        </div>
                                        <label for="nike" class="brand-name capitalize pl-2 cursor-pointer">nike</label>
                                    </div>
                                    <div class="text-secondary2 number">12</div>
                                </div>
                                <div class="brand-item flex items-center justify-between" data-item="gucci">
                                    <div class="left flex items-center cursor-pointer">
                                        <div class="block-input">
                                            <input type="checkbox" name="gucci" id="gucci" />
                                            <i class="ph-fill ph-check-square icon-checkbox text-2xl"></i>
                                        </div>
                                        <label for="gucci" class="brand-name capitalize pl-2 cursor-pointer">gucci</label>
                                    </div>
                                    <div class="text-secondary2 number">12</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div x-data="{ display : 'grid' }" class="list-product-block style-grid lg:w-3/4 md:w-2/3 w-full md:pl-3">
                        <div class="filter-heading flex items-center justify-between gap-5 flex-wrap">
                            <div class="left flex has-line items-center flex-wrap gap-5">
                                <div class="choose-layout menu-tab flex items-center gap-2">
                                    <button @click="display = 'grid' " class="item tab-item three-col p-2 border border-line rounded flex items-center justify-center cursor-pointer" :class="display === 'grid' ? 'active' : ''">
                                        <div class="flex items-center gap-0.5">
                                            <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                            <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                            <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                        </div>
                                    </button>
                                    <button @click="display = 'list' " :class="display === 'list' ? 'active' : ''" class="item row w-8 h-8 border border-line rounded flex items-center justify-center cursor-pointer">
                                        <div class="flex flex-col items-center gap-0.5">
                                            <span class="w-4 h-[3px] bg-secondary2 rounded-sm"></span>
                                            <span class="w-4 h-[3px] bg-secondary2 rounded-sm"></span>
                                            <span class="w-4 h-[3px] bg-secondary2 rounded-sm"></span>
                                        </div>
                                    </button>
                                </div>
                                <div class="check-sale flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" name="filterSale" id="filter-sale" class="border-line" />
                                    <label for="filter-sale" class="cation1 cursor-pointer">Show only products on
                                        sale</label>
                                </div>
                            </div>
                            <div class="sort-product right flex items-center gap-3">
                                <label for="select-filter" class="caption1 capitalize">Sort by</label>
                                <div class="select-block relative">
                                    <select id="select-filter" name="select-filter" class="caption1 py-2 pl-3 md:pr-20 pr-10 rounded-lg border border-line">
                                        <option value="Sorting">Sorting</option>
                                        <option value="soldQuantityHighToLow">Best Selling</option>
                                        <option value="discountHighToLow">Best Discount</option>
                                        <option value="priceHighToLow">Price High To Low</option>
                                        <option value="priceLowToHigh">Price Low To High</option>
                                    </select>
                                    <i class="ph ph-caret-down absolute top-1/2 -translate-y-1/2 md:right-4 right-2"></i>
                                </div>
                            </div>
                        </div>
                        <div class="list-filtered flex items-center gap-3 flex-wrap"></div>
                        <div x-show="display === 'grid'" class="list-product hide-product-sold grid lg:grid-cols-3 grid-cols-2 sm:gap-[30px] gap-[20px] mt-7" data-item="9">
                            <div data-item="712" class="product-item grid-type">
                                <div class="product-main cursor-pointer block" data-item="712">
                                    <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                                        <div class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">
                                            New</div>
                                        <div class="list-action-right absolute top-3 right-3 max-lg:hidden">
                                            <div class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                                <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                                    Add To Wishlist</div>
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
                                            <img key="0" class="w-full h-full object-cover duration-700" src="{{asset('frontend/images/product/jewelry/3-2.png')}}" alt="img">
                                            <img key="1" class="w-full h-full object-cover duration-700" src="{{asset('frontend/images/product/jewelry/3-3.png')}}" alt="img">
                                        </div>
                                        <div class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                            <div class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">
                                                <span class="max-lg:hidden">Quick View</span>
                                                <i class="ph ph-eye lg:hidden text-xl"></i>
                                            </div>

                                            <div class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">
                                                <span class="max-lg:hidden">Add To Cart</span>
                                                <i class="ph ph-shopping-bag-open lg:hidden text-xl"></i>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="product-infor mt-4 lg:mb-7">
                                        <div class="product-sold sm:pb-4 pb-2">
                                            <div class="progress bg-line h-1.5 w-full rounded-full overflow-hidden relative">
                                                <div class="progress-sold bg-red absolute left-0 top-0 h-full" style="width: 12%">
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-between gap-3 gap-y-1 flex-wrap mt-2">
                                                <div class="text-button-uppercase">
                                                    <span class="text-secondary2 max-sm:text-xs">Sold:
                                                    </span>
                                                    <span class="max-sm:text-xs">8</span>
                                                </div>
                                                <div class="text-button-uppercase">
                                                    <span class="text-secondary2 max-sm:text-xs">Available:
                                                    </span>
                                                    <span class="max-sm:text-xs">56</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-name text-title duration-300">silver ring</div>

                                        <div class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                            <div key="0" class="color-item w-8 h-8 rounded-full duration-300 relative" style="background-color:#a1a2af;">
                                                <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                                    silver</div>
                                            </div>

                                        </div>
                                        <div class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                            <div class="product-price text-title">$89.00</div>

                                            <div class="product-origin-price caption1 text-secondary2">
                                                <del>$100.00</del>
                                            </div>
                                            <div class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">
                                                -11%
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div x-show="display === 'list'" class="list-product hide-product-sold gap-8 mt-7 lg:grid-cols-3 flex flex-col" data-item="4">
                            <div data-item="1" class="product-item list-type">
                                <div class="product-main cursor-pointer flex lg:items-center sm:justify-between gap-7 max-lg:gap-5">
                                    <div class="product-thumb bg-white relative overflow-hidden rounded-2xl block max-sm:w-1/2">
                                        <div class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">
                                            New</div>
                                        <div class="product-img w-full aspect-[3/4] rounded-2xl overflow-hidden">
                                            <img key="0" class="w-full h-full object-cover duration-700" src="{{asset('frontend/images/product/fashion/1-1.png')}}" alt="img" />
                                            <img key="1" class="w-full h-full object-cover duration-700" src="{{asset('frontend/images/product/fashion/1-2.png')}}" alt="img" />
                                        </div>
                                        <div class="list-action px-5 absolute w-full bottom-5 max-lg:hidden">
                                            <div class="quick-shop-block absolute left-5 right-5 bg-white p-5 rounded-[20px]">
                                                <div class="list-size flex items-center justify-center flex-wrap gap-2">

                                                    <div key="0" class="size-item w-10 h-10 rounded-full flex items-center justify-center text-button bg-white border border-line">
                                                        S</div>

                                                    <div key="1" class="size-item w-10 h-10 rounded-full flex items-center justify-center text-button bg-white border border-line">
                                                        M</div>

                                                    <div key="2" class="size-item w-10 h-10 rounded-full flex items-center justify-center text-button bg-white border border-line">
                                                        L</div>

                                                    <div key="3" class="size-item w-10 h-10 rounded-full flex items-center justify-center text-button bg-white border border-line">
                                                        XL</div>

                                                </div>
                                                <div class="add-cart-btn button-main w-full text-center rounded-full py-3 mt-4">
                                                    Add To cart</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex sm:items-center gap-7 max-lg:gap-4 max-lg:flex-wrap lg:w-2/3 lg:flex-shrink-0 max-lg:w-full max-sm:flex-col max-sm:w-1/2">
                                        <div class="product-infor max-sm:w-full">
                                            <div class="product-name heading6 inline-block duration-300">mesh shirt
                                            </div>
                                            <div class="product-price-block flex items-center gap-2 flex-wrap mt-2 duration-300 relative z-[1]">
                                                <div class="product-price text-title">$45.00</div>

                                                <div class="product-origin-price caption1 text-secondary2">
                                                    <del>$55.00</del>
                                                </div>
                                                <div class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">
                                                    -18%
                                                </div>

                                            </div>
                                            <div class="text-secondary desc mt-5 max-sm:hidden">Keep your home
                                                organized, yet elegant with storage cabinets by Onita Patio Furniture.
                                                Traditionally designed, they are perfect to be used in the any place
                                                where you need to store.</div>
                                        </div>
                                        <div class="action w-fit flex flex-col items-center justify-center">
                                            <div class="quick-shop-btn button-main whitespace-nowrap py-2 px-9 max-lg:px-5 rounded-full bg-white text-black border border-black hover:bg-black hover:text-white">
                                                Quick Shop
                                            </div>
                                            <div class="list-action-right flex items-center justify-center gap-3 mt-4">
                                                <div class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                                    <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                                        Add To Wishlist</div>
                                                    <i class="ph ph-heart text-lg"></i>
                                                </div>
                                                <div class="compare-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                                    <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                                        Compare Product</div>
                                                    <i class="ph ph-arrow-counter-clockwise text-lg compare-icon"></i>
                                                    <i class="ph ph-check-circle text-lg checked-icon"></i>
                                                </div>
                                                <div class="quick-view-btn quick-view-btn-list w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                                    <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                                        Quick View</div>
                                                    <i class="ph ph-eye text-lg"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-pagination w-full flex items-center gap-4 mt-10"></div>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.footer')

    </main>
</x-layouts.main>
