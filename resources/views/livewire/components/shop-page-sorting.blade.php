<div>
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
                            <div wire:click.prevent="filterByType('')" class=" item tab-item flex items-center justify-between cursor-pointer" data-item="t-shirt" type="button">
                                <div class="type-name text-secondary has-line-before hover:text-black capitalize">
                                    Reset
                                </div>
                            </div>
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
                            @foreach($productSizes as $size)
                            <div wire:click="filterBySize('{{ $size['name'] }}')" class="size-item text-button w-[44px] h-[44px] flex items-center justify-center rounded-full border border-line {{ in_array($size['name'], (array) $productSize) ? 'active' : '' }}
" data-item="{{$size['name']}}">
                                {{$size['name']}}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="filter-color pb-8 border-b border-line mt-8">
                        <div class="heading6">colors</div>
                        <div class="list-color flex items-center flex-wrap gap-3 gap-y-4 mt-4">
                            @foreach($productColors as $color)
                            <div wire:click.prevent="filterByColor('{{ $color['name'] }}')" class="color-item px-3 py-[5px] flex items-center justify-center gap-2 rounded-full border border-line" data-item="pink">
                                <div class="color w-5 h-5 rounded-full" style="background-color:{{$color['image']}}; outline: 1px solid #eee;" data-color="{{$color['name']}}" data-item="{{$color['name']}}"></div>
                                <div class="caption1 capitalize">{{$color['name']}}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="filter-brand pb-8 mt-8">
                        <div class="heading6">Brands</div>
                        <div class="list-brand mt-4">
                            @foreach($brands as $brand)
                            <div class="brand-item flex items-center justify-between" data-item="{{$brand['name']}}">
                                <div class="left flex items-center cursor-pointer">
                                    <div class="block-input">
                                        <input wire:model="productBrand" type="checkbox" name="{{$brand['name']}}" id="{{$brand['name']}}" />
                                        <i class="ph-fill ph-check-square icon-checkbox text-2xl"></i>
                                    </div>
                                    <label for="{{$brand['name']}}" class="brand-name capitalize pl-2 cursor-pointer">
                                        {{ $brand['name'] }}
                                    </label>
                                </div>
                                <div class="text-secondary2 number">
                                    {{$brand['count']}}
                                </div>
                            </div>
                            @endforeach
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
                        </div>
                        <div class="sort-product right flex items-center gap-3">
                            <label for="select-filter" class="caption1 capitalize">Sort by</label>
                            <div class="select-block relative">
                                <select wire:model.live="sorting" id="select-filter" name="select-filter" class="caption1 py-2 pl-3 md:pr-20 pr-10 rounded-lg border border-line">
                                    <option value="default">Sorting</option>
                                    <option value="best_selling">Best Selling</option>
                                    <option value="price_desc">Price High To Low</option>
                                    <option value="price_asc">Price Low To High</option>
                                    <option value="newest">Newest</option>
                                    <option value="oldest">Oldest</option>
                                    <option value="a_z">A-Z</option>
                                </select>
                                <i class="ph ph-caret-down absolute top-1/2 -translate-y-1/2 md:right-4 right-2"></i>
                            </div>
                        </div>
                    </div>
                        @if($this->productType || $this->productColor)
                        <div class="list-filtered flex items-center gap-3 flex-wrap">
                            <div class="total-product">
                                {{count($products)}}
                                <span class="text-secondary pl-1">Products Found</span>
                            </div>
                            @if($this->productType)
                            <div class="list flex items-center gap-3">
                                <div class="w-px h-4 bg-line"></div>
                                <div wire:click.prevent="filterByType('')" class="item flex items-center px-2 py-1 gap-1 bg-linear rounded-full capitalize" data-type="type">
                                    <i class="ph ph-x cursor-pointer"></i>
                                    <span>
                                        {{$this->productType}}
                                    </span>
                                </div>
                            </div>
                            @endif
                            @if($this->productColor)
                            <div class="list flex items-center gap-3">
                                <div class="w-px h-4 bg-line"></div>
                                <div wire:click.prevent="filterByColor('')" class="item flex items-center px-2 py-1 gap-1 bg-linear rounded-full capitalize" data-type="type">
                                    <i class="ph ph-x cursor-pointer"></i>
                                    <span>
                                        {{$this->productColor}}
                                    </span>
                                </div>
                            </div>
                            @endif
                            <div wire:click.prevent="resetFilters()" class="clear-btn flex items-center px-2 py-1 gap-1 rounded-full w-fit border border-red cursor-pointer">
                                <i class="ph ph-x cursor-pointer text-red"></i>
                                <span class="text-button-uppercase text-red">Clear All</span>
                            </div>
                        </div>
                        @endif

                    <div x-show="display === 'grid'" class="list-product hide-product-sold grid lg:grid-cols-3 grid-cols-2 sm:gap-[30px] gap-[20px] mt-7" data-item="9">
                        @foreach($products as $product)
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
                                            <span  class="max-lg:hidden">Add To Cart</span>
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
                                        @if($product->originPrice > 0)
                                        <div class="product-origin-price caption1 text-secondary2">
                                            <del>₦ {{number_format($product->originPrice)}}</del>
                                        </div>
                                        @endif
                                        @if($product->originPrice > 0)
                                        <div class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">
                                            {{
                                            $product->originPrice ? '-'.round((($product->originPrice - $product->price)
                                            / $product->originPrice) * 100). '%' : ''
                                            }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div x-show="display === 'list'" class="list-product hide-product-sold gap-8 mt-7 lg:grid-cols-3 flex flex-col" data-item="4">
                        @foreach($products as $product)
                        <a data-item="{{$product->id}}" class="product-item list-type block" href={{route('product.detail', ['slug'=> $product->slug])}}>

                            <div class="product-main cursor-pointer flex lg:items-center sm:justify-between gap-7 max-lg:gap-5">
                                <div class="product-thumb bg-white relative overflow-hidden rounded-2xl block max-sm:w-1/2">
                                    @if($product->isNew())
                                    <div class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">
                                        New</div>
                                    @endif
                                    @if($product->onSale())
                                    <div class="product-tag text-button-uppercase text-white bg-red px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">
                                        Sale </div>
                                    @endif
                                    <div class="product-img w-full aspect-[3/4] rounded-2xl overflow-hidden">
                                        <img key="0" class="w-full h-full object-cover duration-700" src="{{asset('storage/'. $product->images[0]['url'])}}" alt="img">
                                        <img key="1" class="w-full h-full object-cover duration-700" src="{{asset('storage/'. $product->images[1]['url'])}}" alt="img">
                                    </div>
                                    <div class="list-action px-5 absolute w-full bottom-5 max-lg:hidden">
                                        <div class="quick-shop-block absolute left-5 right-5 bg-white p-5 rounded-[20px]">
                                            <div class="list-size flex items-center justify-center flex-wrap gap-2">

                                                @foreach($product->productSizes as $size)
                                                <div key="{{$size->id}}" class="size-item w-10 h-10 rounded-full flex items-center justify-center text-button bg-white border border-line">
                                                    {{$size->name}}
                                                </div>
                                                @endforeach

                                            </div>
                                            <div wire:click='addToCart("{{$product->id}}")' class="add-cart-btn button-main w-full text-center rounded-full py-3 mt-4">
                                                Add To cart</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex sm:items-center gap-7 max-lg:gap-4 max-lg:flex-wrap lg:w-2/3 lg:flex-shrink-0 max-lg:w-full max-sm:flex-col max-sm:w-1/2">
                                    <div class="product-infor max-sm:w-full">
                                        <div class="product-name heading6 inline-block duration-300">
                                            <a href="{{ route('product.detail', $product->slug) }}" class="hover:text-black">
                                                {{ $product->name }}
                                            </a>
                                        </div>
                                        <div class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                                            @foreach($product->productColors as $variantColor => $color)
                                            <div key="{{$color->id}}" class="color-item w-8 h-8 rounded-full duration-300 relative" style="background-color:{{$color->image}}; outline: 1px solid #eee;">
                                                <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">
                                                    {{ $color->name }}
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                            <div class="product-price text-title">
                                                ₦ {{number_format($product->price)}}
                                            </div>
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
                                        <div class="text-secondary desc mt-5 max-sm:hidden">
                                            {!! $product->description ? Str::limit($product->description, 200) : 'No
                                            description available.' !!}
                                        </div>
                                    </div>
                                    <div class="action w-fit flex flex-col items-center justify-center product-item" data-item={{$product->id}}>
                                        <div wire:click='addToCart("{{$product->id}}")' class="button-main whitespace-nowrap py-2 px-9 max-lg:px-5 rounded-full bg-white text-black border border-black hover:bg-black hover:text-white">
                                            Add To Cart
                                        </div>
                                        <div class="list-action-right flex items-center justify-center gap-3 mt-4 product-item" data-item="{{$product->id}}">

                                            <div class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white border border-line duration-300 relative hover:bg-black hover:text-white">
                                                <i class="ph ph-heart text-lg"></i>
                                            </div>
                                            <div class="quick-view-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white border border-line duration-300 relative hover:bg-black hover:text-white group">
                                                <i class="ph ph-eye text-lg"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    <div class="list-pagination w-full flex items-center gap-4 mt-10"></div>
                </div>
            </div>
        </div>
    </div>
</div>
