<x-layouts.main :title="$this->title ?? config('app.name')">
    <main>
        @livewire("components.top-nav")
        @livewire("components.nav-bar")
        @livewire("components.shop-page-sorting")
        @include('partials.footer')
    </main>
</x-layouts.main>
