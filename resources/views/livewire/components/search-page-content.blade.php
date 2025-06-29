<div>
    <div class="breadcrumb-block style-shared">
        <div class="breadcrumb-main bg-linear overflow-hidden">
            <div class="container lg:pt-[134px] pt-24 pb-10 relative">
                <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                    <div class="text-content">
                        <div class="heading2 text-center">Search Result</div>
                        <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                            <a href="/">Homepage</a>
                            <i class="ph ph-caret-right text-sm text-secondary2"></i>
                            <div class="text-secondary2 capitalize">Search Result</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-product search-result-block lg:py-20 md:py-14 py-10">
        <div class="container">
            <div class="heading flex flex-col items-center">
                <div class="heading4 text-center">
                    Found <span class="result-quantity">{{ $products->total() }}</span> results
                    @if($query)
                    for "<span class="result">{{ $query }}</span>"
                    @endif
                </div>
                <div class="input-block lg:w-1/2 sm:w-3/5 w-full md:h-[52px] h-[44px] sm:mt-8 mt-5">
                    <div class="w-full h-full relative flex items-center gap-4">
                        <input type="text" placeholder="Search..." class="caption1 w-full h-full pl-4 md:pr-[150px] pr-32 rounded-xl border border-line" wire:model.debounce.500ms="query" />
                        <button class="button-main flex items-center justify-center" wire:click="$refresh">search</button>
                    </div>
                </div>
            </div>

            {{-- Filters Section --}}
            <div class="filter-heading flex items-center justify-between gap-5 flex-wrap mb-6">
                <div class="left flex has-line items-center flex-wrap gap-5">
                    <div class="filter-sidebar-btn flex items-center gap-2 cursor-pointer" onclick="toggleSidebar()">
                        <x-icons.filter />
                        <span>Filters</span>
                    </div>

                    <div class="choose-layout menu-tab flex items-center gap-2">
                        @foreach(['three-col', 'four-col', 'five-col'] as $layout)
                        <div class="item tab-item {{ $layout }} p-2 border border-line rounded cursor-pointer {{ $display == $layout ? 'active' : '' }}" wire:click="$set('display', '{{ $layout }}')">
                            <x-icons.layout-icon :count="explode('-', $layout)[0]" />
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="sort-product right flex items-center gap-3">
                    <label for="select-filter" class="caption1 capitalize">Sort by</label>
                    <div class="select-block relative flex gap-2">
                        <select class="caption1 py-2 px-3 rounded-lg border border-line" wire:model="sortBy">
                            <option value="name">Name</option>
                            <option value="price">Price</option>
                            <option value="created_at">Date</option>
                            <option value="rate">Rating</option>
                        </select>
                        <select class="caption1 py-2 px-3 rounded-lg border border-line" wire:model="sortOrder">
                            <option value="asc">Ascending</option>
                            <option value="desc">Descending</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- Products List --}}
            <div class="list-product list-product-result grid {{
                $display === 'three-col' ? 'lg:grid-cols-3 sm:grid-cols-3' : (
                $display === 'four-col' ? 'lg:grid-cols-4 sm:grid-cols-3' : 'lg:grid-cols-5 sm:grid-cols-3')
            }} grid-cols-2 sm:gap-[30px] gap-[20px] mt-5">
                @forelse($products as $product)
                <x-product.card :product="$product" />
                @empty
                <div class="col-span-full text-center py-12">
                    <div class="heading6 text-secondary2">No products found matching your criteria</div>
                    <button class="button-main mt-4" wire:click="resetFilters">Reset Filters</button>
                </div>
                @endforelse
            </div>

            <div class="list-pagination w-full flex items-center justify-center gap-4 mt-10">
                {{ $products->links() }}
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar') ? .classList.toggle('open');
        }

        function initPriceRangeSlider() {
            const minInput = document.querySelector('.range-min');
            const maxInput = document.querySelector('.range-max');
            const progress = document.querySelector('.progress');

            function updateSlider() {
                if (!minInput || !maxInput || !progress) return;

                const min = parseInt(minInput.value);
                const max = parseInt(maxInput.value);
                const rangeMin = parseInt(minInput.min);
                const rangeMax = parseInt(minInput.max);

                const left = ((min - rangeMin) / (rangeMax - rangeMin)) * 100;
                const right = ((max - rangeMin) / (rangeMax - rangeMin)) * 100;
                progress.style.left = left + '%';
                progress.style.width = (right - left) + '%';
            }

            minInput ? .addEventListener('input', updateSlider);
            maxInput ? .addEventListener('input', updateSlider);
            updateSlider();
        }

        document.addEventListener('livewire:load', initPriceRangeSlider);
        document.addEventListener('livewire:update', initPriceRangeSlider);

    </script>
    @endpush

</div>
