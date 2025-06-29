<x-layouts.main :title="'Search Results - ' . config('app.name')">
    <main class="bg-gray-50 min-h-screen">
        @push('styles')
            <link rel="stylesheet" href="{{ asset('frontend/css/search-page.css') }}" />
        @endpush
        @livewire("components.top-nav")
        @livewire("components.nav-bar")

        <div class="search-page py-8 lg:py-16">
                @livewire("components.search-page-content")
        </div>

        @include('partials.footer')
    </main>
</x-layouts.main>
