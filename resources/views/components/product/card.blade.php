@props(['product'])

<div class="product-item grid-type" data-item="{{ $product->id }}">
    <div class="product-main cursor-pointer block">
        <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
            <div class="product-img">
                <a href="{{ route('product.detail', ['slug' => $product->slug]) }}">
                    <img class="w-full h-full aspect-[3/4] object-cover"
                        src="{{ asset('storage/' . ($product->images->first()->url ?? 'default.jpg')) }}"
                        alt="{{ $product->name }}" />
                    @if($product->images->count() > 1)
                    <img class="w-full h-full aspect-[3/4] object-cover"
                        src="{{ asset('storage/' . $product->images->skip(1)->first()->url) }}"
                        alt="{{ $product->name }}" />
                    @endif
                </a>
            </div>
            <div class="product-option absolute top-4 right-4 flex items-center gap-2">
                <div
                    class="quick-view-btn w-10 h-10 bg-white rounded-full flex items-center justify-center cursor-pointer duration-300 hover:bg-black hover:text-white">
                    <i class="ph ph-eye text-lg"></i>
                </div>
            </div>
            @if($product->sale_price && $product->sale_price < $product->price)
                <div class="product-sale-tag absolute top-4 left-4 bg-red text-white px-3 py-1 rounded-full">
                    <div class="caption2 font-semibold">
                        -{{ round((($product->price - $product->sale_price) / $product->price) * 100) }}%
                    </div>
                </div>
                @endif
        </div>
        <div class="product-infor mt-4 lg:mb-7">
            <div class="product-sold sm:pb-4 pb-2">
                <div class="progress bg-line h-1.5 w-full rounded-full overflow-hidden relative">
                    <div class="progress-sold bg-red absolute left-0 top-0 h-full rounded-full"
                        style="width: {{ $product->sold + $product->quantity > 0 ? ($product->sold / ($product->sold + $product->quantity)) * 100 : 0 }}%">
                    </div>
                </div>
                <div class="flex items-center justify-between gap-3 gap-y-1 flex-wrap mt-2">
                    <div class="text-button-uppercase">
                        <span class="text-secondary2 max-sm:text-xs">Sold: </span><span class="max-sm:text-xs">{{
                            $product->sold }}</span>
                    </div>
                    <div class="text-button-uppercase">
                        <span class="text-secondary2 max-sm:text-xs">Available: </span><span class="max-sm:text-xs">{{
                            $product->quantity }}</span>
                    </div>
                </div>
            </div>

            <div class="product-name text-title duration-300">
                <a href="{{ route('product.detail', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
            </div>

            <div class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                <div class="product-price text-title">
                    ${{ number_format($product->sale_price ?: $product->price, 2) }}
                </div>
                @if($product->sale_price && $product->sale_price < $product->price)
                    <div class="product-origin-price text-title text-secondary2">
                        <del>${{ number_format($product->price, 2) }}</del>
                    </div>
                    @endif
            </div>

            @if($product->colors && $product->colors->count())
            <div class="product-color-block flex items-center gap-2 mt-3 flex-wrap">
                @foreach($product->colors as $color)
                <div class="color-item w-8 h-8 rounded-full duration-300 relative"
                    style="background-color: {{ $color->code }}">
                    <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">{{ $color->name }}
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>