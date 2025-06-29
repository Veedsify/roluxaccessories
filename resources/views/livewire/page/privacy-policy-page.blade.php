<x-layouts.main :title="$this->title ?? config('app.name')">
    <main>
        @livewire("components.top-nav")
        @livewire("components.nav-bar")

        <!-- Page Content -->
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-3xl font-bold mb-8 text-center">Privacy Policy</h1>

                <!-- Privacy Policy content will be added here -->
                <div class="prose prose-lg max-w-none">
                    <!-- Privacy policy content will be added here -->
                </div>
            </div>
        </div>

        @include('partials.footer')
    </main>
</x-layouts.main>
