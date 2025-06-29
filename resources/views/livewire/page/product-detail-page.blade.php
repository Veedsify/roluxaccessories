<x-layouts.main :title="$this->title ?? config('app.name')">
    <main>
        @livewire("components.top-nav")
        @livewire("components.nav-bar")
        @livewire("components.product-sale-page", ['slug' => $productSlug])
        @livewire('components.related-products', ['slug' => $productSlug])
        @include('partials.footer')
    </main>
</x-layouts.main>
