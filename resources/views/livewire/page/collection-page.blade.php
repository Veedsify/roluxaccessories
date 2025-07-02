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
                            @foreach($collections as $collection)
                                <div class="item tab-item text-button-uppercase cursor-pointer has-line-before line-2px" data-item="{{ $collection->slug }}">{{ $collection->name }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @livewire('components.collection-page-sorting')
        @include('partials.footer')
    </main>
</x-layouts.main>
