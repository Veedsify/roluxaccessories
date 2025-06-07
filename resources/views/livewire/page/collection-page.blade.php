<x-layouts.main :title="$this->title ?? config('app.name')">
    <main>
        @livewire("components.top-nav")

        @livewire("components.nav-bar")

        <div class="breadcrumb-block style-img">
            <div class="breadcrumb-main bg-linear overflow-hidden">
                <div class="container lg:pt-[134px] pt-24 pb-10 relative">
                    <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                        <div class="text-content">
                            <div class="heading2 text-center">Collections</div>
                            <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                                <a href="/">Homepage</a>
                                <i class="ph ph-caret-right text-sm text-secondary2"></i>
                                <div class="text-secondary2 capitalize">Collections</div>

                            </div>
                        </div>
                        <div class="filter-type menu-tab flex flex-wrap items-center justify-center gap-y-5 gap-8 lg:mt-[70px] mt-12 overflow-hidden">
                            <div class="item tab-item text-button-uppercase cursor-pointer has-line-before line-2px" data-item="t-shirt">t-shirt</div>
                            <div class="item tab-item text-button-uppercase cursor-pointer has-line-before line-2px" data-item="dress">dress</div>
                            <div class="item tab-item text-button-uppercase cursor-pointer has-line-before line-2px" data-item="top">top</div>
                            <div class="item tab-item text-button-uppercase cursor-pointer has-line-before line-2px" data-item="swimwear">swimwear</div>
                            <div class="item tab-item text-button-uppercase cursor-pointer has-line-before line-2px" data-item="shirt">shirt</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="shop-product lg:py-20 md:py-14 py-10">
            <div class="container">
                <div class="list-product-block style-grid relative">
                    <div class="filter-heading flex items-center justify-between gap-5 flex-wrap">
                        <div class="left flex has-line items-center flex-wrap gap-5">
                            <div class="choose-layout menu-tab flex items-center gap-2">
                                <div class="item tab-item three-col p-2 border border-line rounded flex items-center justify-center cursor-pointer">
                                    <div class="flex items-center gap-0.5">
                                        <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                        <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                        <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                    </div>
                                </div>
                                <div class="item tab-item four-col p-2 border border-line rounded flex items-center justify-center cursor-pointer active">
                                    <div class="flex items-center gap-0.5">
                                        <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                        <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                        <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                        <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                    </div>
                                </div>
                                <div class="item tab-item five-col p-2 border border-line rounded flex items-center justify-center cursor-pointer">
                                    <div class="flex items-center gap-0.5">
                                        <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                        <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                        <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                        <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                        <span class="w-[3px] h-4 bg-secondary2 rounded-sm"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="check-sale flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="filterSale" id="filter-sale" class="border-line" />
                                <label for="filter-sale" class="cation1 cursor-pointer">Show only products on sale</label>
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

                    <div class="mb-4 flex items-center justify-between gap-5 flex-wrap pt-12 ">
                        <h1 class="heading2 text-center max-lg:text-xl max-md:text-lg ">
                            {{ $this->title ?? 'Clothes' }}
                        </h1>
                        <button class="button-main text-button-uppercase px-4 py-2 rounded-lg duration-300 max-lg:hidden">
                            view all
                        </button>
                    </div>
                    <div class="list-product hide-product-sold grid sm:grid-cols-3 grid-cols-2 sm:gap-[30px] gap-[20px] mt-7" data-item="12">
                        <div data-item="1" class="product-item grid-type">
                            <div class="product-main cursor-pointer block" data-item="1">
                                <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                                    <div class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">New</div>
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
                                        <img key="0" class="w-full h-full object-cover duration-700" src="{{asset('frontend/images/product/fashion/1-1.png')}}" alt="img">
                                        <img key="1" class="w-full h-full object-cover duration-700" src="{{asset('frontend/images/product/fashion/1-2.png')}}" alt="img">

                                    </div>
                                    <div class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                        <div class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">
                                            <span class="max-lg:hidden">Quick View</span>
                                            <i class="ph ph-eye lg:hidden text-xl"></i>
                                        </div>

                                        <div class="quick-shop-btn text-button-uppercase py-2 text-center rounded-full duration-500 bg-white hover:bg-black hover:text-white max-lg:hidden">
                                            Quick Shop</div>
                                        <div class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white lg:hidden">
                                            <span class="max-lg:hidden">Add To Cart</span>
                                            <i class="ph ph-shopping-bag-open lg:hidden text-xl"></i>
                                        </div>
                                        <div class="quick-shop-block absolute left-5 right-5 bg-white p-5 rounded-[20px]">
                                            <div class="list-size flex items-center justify-center flex-wrap gap-2">
                                                <div key="0" class="size-item w-10 h-10 rounded-full flex items-center justify-center text-button bg-white border border-line">S</div>
                                                <div key="1" class="size-item w-10 h-10 rounded-full flex items-center justify-center text-button bg-white border border-line">M</div>
                                                <div key="2" class="size-item w-10 h-10 rounded-full flex items-center justify-center text-button bg-white border border-line">L</div>
                                                <div key="3" class="size-item w-10 h-10 rounded-full flex items-center justify-center text-button bg-white border border-line">XL</div>
                                            </div>
                                            <div class="add-cart-btn button-main w-full text-center rounded-full py-3 mt-4">Add
                                                To cart</div>
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
                                                <span class="max-sm:text-xs">12</span>
                                            </div>
                                            <div class="text-button-uppercase">
                                                <span class="text-secondary2 max-sm:text-xs">Available:
                                                </span>
                                                <span class="max-sm:text-xs">88</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-name text-title duration-300">mesh shirt</div>

                                    <div class="list-color list-color-image max-md:hidden flex items-center gap-3 flex-wrap duration-500">

                                        <div class="color-item w-12 h-12 rounded-xl duration-300 relative" key="0">
                                            <img src="./assets/images/product/color/red.png" alt="color" class="rounded-xl w-full h-full object-cover">
                                            <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">red</div>
                                        </div>

                                        <div class="color-item w-12 h-12 rounded-xl duration-300 relative" key="1">
                                            <img src="./assets/images/product/color/yellow.png" alt="color" class="rounded-xl w-full h-full object-cover">
                                            <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">yellow</div>
                                        </div>

                                    </div>

                                    <div class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                        <div class="product-price text-title">$45.00</div>

                                        <div class="product-origin-price caption1 text-secondary2">
                                            <del>$55.00</del>
                                        </div>
                                        <div class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">
                                            -18%
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div data-item="1" class="product-item grid-type">
                            <div class="product-main cursor-pointer block" data-item="1">
                                <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                                    <div class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">New</div>
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
                                        <img key="0" class="w-full h-full object-cover duration-700" src="{{asset('frontend/images/product/fashion/1-1.png')}}" alt="img">
                                        <img key="1" class="w-full h-full object-cover duration-700" src="{{asset('frontend/images/product/fashion/1-2.png')}}" alt="img">

                                    </div>
                                    <div class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                        <div class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">
                                            <span class="max-lg:hidden">Quick View</span>
                                            <i class="ph ph-eye lg:hidden text-xl"></i>
                                        </div>

                                        <div class="quick-shop-btn text-button-uppercase py-2 text-center rounded-full duration-500 bg-white hover:bg-black hover:text-white max-lg:hidden">
                                            Quick Shop</div>
                                        <div class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white lg:hidden">
                                            <span class="max-lg:hidden">Add To Cart</span>
                                            <i class="ph ph-shopping-bag-open lg:hidden text-xl"></i>
                                        </div>
                                        <div class="quick-shop-block absolute left-5 right-5 bg-white p-5 rounded-[20px]">
                                            <div class="list-size flex items-center justify-center flex-wrap gap-2">
                                                <div key="0" class="size-item w-10 h-10 rounded-full flex items-center justify-center text-button bg-white border border-line">S</div>
                                                <div key="1" class="size-item w-10 h-10 rounded-full flex items-center justify-center text-button bg-white border border-line">M</div>
                                                <div key="2" class="size-item w-10 h-10 rounded-full flex items-center justify-center text-button bg-white border border-line">L</div>
                                                <div key="3" class="size-item w-10 h-10 rounded-full flex items-center justify-center text-button bg-white border border-line">XL</div>
                                            </div>
                                            <div class="add-cart-btn button-main w-full text-center rounded-full py-3 mt-4">Add
                                                To cart</div>
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
                                                <span class="max-sm:text-xs">12</span>
                                            </div>
                                            <div class="text-button-uppercase">
                                                <span class="text-secondary2 max-sm:text-xs">Available:
                                                </span>
                                                <span class="max-sm:text-xs">88</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-name text-title duration-300">mesh shirt</div>

                                    <div class="list-color list-color-image max-md:hidden flex items-center gap-3 flex-wrap duration-500">

                                        <div class="color-item w-12 h-12 rounded-xl duration-300 relative" key="0">
                                            <img src="./assets/images/product/color/red.png" alt="color" class="rounded-xl w-full h-full object-cover">
                                            <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">red</div>
                                        </div>

                                        <div class="color-item w-12 h-12 rounded-xl duration-300 relative" key="1">
                                            <img src="./assets/images/product/color/yellow.png" alt="color" class="rounded-xl w-full h-full object-cover">
                                            <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">yellow</div>
                                        </div>

                                    </div>

                                    <div class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                        <div class="product-price text-title">$45.00</div>

                                        <div class="product-origin-price caption1 text-secondary2">
                                            <del>$55.00</del>
                                        </div>
                                        <div class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">
                                            -18%
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mb-4 flex items-center justify-between gap-5 flex-wrap pt-12 ">
                        <h1 class="heading2 text-center max-lg:text-xl max-md:text-lg ">
                            {{ $this->title ?? 'Shoes' }}
                        </h1>
                        <button class="button-main text-button-uppercase px-4 py-2 rounded-lg duration-300 max-lg:hidden">
                            view all
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.footer')

    </main>
</x-layouts.main>
