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

            @foreach($collections as  $collection)
            <div class="mb-4 flex items-center justify-between gap-5 flex-wrap pt-12 ">
                <h1 class="heading2 text-center max-lg:text-xl max-md:text-lg ">
                    {{ $collection->name }}
                </h1>
                <button class="button-main text-button-uppercase px-4 py-2 rounded-lg duration-300 max-lg:hidden">
                    view all
                </button>
            </div>
            <div class="list-product hide-product-sold grid sm:grid-cols-3 grid-cols-2 sm:gap-[30px] gap-[20px] mt-7" data-item="12">
                @foreach($collection->products as $product)
                <div data-item="{{$product->id}}" class="product-item grid-type">
                    <div class="product-main cursor-pointer block" data-item="712">
                        <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                            @if($product->isNew())
                            <div class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">
                                New</div>
                            @endif
                            @if($product->onSale())
                            <div class="product-tag text-button-uppercase text-white bg-red px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">
                                Sale</div>
                            @endif
                            <div class="list-action-right absolute top-3 right-3 max-lg:hidden">
                                <div class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                    <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">
                                        Add To Wishlist</div>
                                    <i class="ph ph-heart text-lg"></i>
                                </div>
                            </div>
                            <a href={{route('product.detail', ['slug'=> $product->slug])}} class="product-img block w-full h-full aspect-[3/4]">

                                <img key="0" class="w-full h-full object-cover duration-700" src="{{asset('storage/'. $product->images[0]['url'])}}" alt="img">

                                <img key="1" class="w-full h-full object-cover duration-700" src="{{asset('storage/'. $product->images[1]['url'])}}" alt="img">
                            </a>
                            <div class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                <div class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">
                                    <span class="max-lg:hidden">Quick View</span>
                                    <i class="ph ph-eye lg:hidden text-xl"></i>
                                </div>

                                <div wire:click="addToCart('{{$product->id}}')" class="w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">
                                    <span class="max-lg:hidden">Add To Cart</span>
                                    <i class="ph ph-shopping-bag-open lg:hidden text-xl"></i>
                                </div>
                            </div>
                        </div>
                        <div class="product-infor mt-4 lg:mb-7">
                            <div class="product-name text-title duration-300">
                                <a href="{{ route('product.detail', $product->slug) }}" class="hover:text-black">
                                    {{ $product->name }}
                                </a>
                            </div>

                            <div class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                @foreach($product->productColors as $variantColor => $color)
                                <div key="0" class="color-item w-8 h-8 rounded-full duration-300 relative" style="background-color:{{$color->image}}; outline: 1px solid #eee;">
                                    <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                        {{ $color->name }}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                <div class="product-price text-title">₦ {{number_format($product->price)}}</div>
                                @if($product->originPrice && $product->originPrice > $product->price)
                                <span class="product-origin-price font-normal text-secondary2"><del>₦{{ number_format($product->originPrice, 2) }}</del></span>
                                <div class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">
                                    {{
                                        $product->originPrice > $product->price ? '-'.round((($product->originPrice -
                                        $product->price) / $product->originPrice) * 100). '%' : ''
                                        }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
          
        </div>
    </div>
</div>

