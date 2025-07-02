<div x-data="homeFeaturedTabs($wire, @entangle('tab').defer)" class="tab-features-block filter-product-block md:pt-20 pt-10">
    <div class="container">
        <div class="heading flex flex-col items-center text-center">
            <div class="menu-tab bg-surface rounded-2xl">
                <div class="menu flex items-center gap-2 p-1 relative">
                    <div class="indicator absolute top-1 bottom-1 bg-white rounded-full shadow-md duration-300" :style="`width: ${100/tabs.length}%; transform: translateX(${tabs.indexOf(tab) * 100}%);`"></div>
                    <template x-for="(tabName, index) in tabs" :key="index">
                        <div class="tab-item relative text-secondary heading5 py-2 px-5 cursor-pointer duration-500 hover:text-black" :class="{ 'active text-black': tab === tabName }" x-text="tabName" @click="selectTab(tabName)">
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <script>
        function homeFeaturedTabs($wire, initialTab) {
            return {
                tab: initialTab
                , tabs: ['best sellers', 'on sale', 'new arrivals']
                , busy: false
                , selectTab(tabName) {
                    if (this.busy || this.tab === tabName) return;

                    this.busy = true;
                    this.tab = tabName;

                    // If you need to call the server, uncomment this:
                    // $wire.selectTab(tabName).then(() => {
                    //     this.busy = false;
                    //     if (window.initMain) window.initMain();
                    // });

                    // If not using Livewire server calls:
                    this.$nextTick(() => {
                        if (window.initMain) window.initMain();
                        this.busy = false;
                    });
                }
            }
        }

    </script>

    <div class="list-product six-product hide-product-sold relative section-swiper-navigation style-outline style-small-border md:mt-10 mt-6 container">
        @php
        $allProducts = [
        'best sellers' => $bestSellers ?? [],
        'on sale' => $onSale ?? [],
        'new arrivals' => $newArrivals ?? [],
        ];
        @endphp

        @foreach($allProducts as $tabName => $products)
        <div x-show="tab === '{{ $tabName }}'" x-transition x-cloak class="h-full">
            <div class="swiper-button-prev2 sm:left-10 left-6">
                <i class="ph-bold ph-caret-left text-xl"></i>
            </div>
            <div class="swiper swiper-list-product h-full relative">
                <div class="swiper-wrapper">
                    @forelse($products as $product)
                    <div class="swiper-slide">
                        <div class="product-item grid-type">
                            <div class="product-main cursor-pointer block">
                                <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                                    @if($product->isNew())
                                    <div class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">New</div>
                                    @endif
                                    @if($product->onSale())
                                    <div class="product-tag text-button-uppercase text-white bg-red px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">Sale</div>
                                    @endif
                                    <a href="{{ route('product.detail', ['slug'=> $product->slug]) }}" class="product-img block w-full h-full aspect-[3/4]">
                                        <img src="{{ asset('storage/' . $product->images[0]['url']) }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded-2xl" loading="lazy" />
                                    </a>
                                </div>
                                <div class="product-infor mt-4 lg:mb-7">
                                    <div class="product-name text-title duration-300">{{ $product->name }}</div>
                                    <div class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                                        <span class="product-price heading5">₦{{ number_format($product->price, 2) }}</span>
                                        @if($product->originPrice && $product->originPrice > $product->price)
                                        <span class="product-origin-price font-normal text-secondary2"><del>₦{{ number_format($product->originPrice, 2) }}</del></span>
                                        <div class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">
                                            {{ round((($product->originPrice - $product->price) / $product->originPrice) * 100) }}%
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="swiper-slide">
                        <div class="text-center py-10 w-full">No products found.</div>
                    </div>
                    @endforelse
                </div>
            </div>
            <div class="swiper-button-next2 sm:right-10 right-6">
                <i class="ph-bold ph-caret-right text-xl"></i>
            </div>
        </div>
        @endforeach
    </div>
</div>
