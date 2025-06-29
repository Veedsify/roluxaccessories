<x-layouts.main :title="$this->title ?? config('app.name')">
    <main>
        @livewire("components.top-nav")
        @livewire("components.nav-bar")

        <!-- Page Content -->
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-3xl font-bold mb-8 text-center">Order Tracking & Returns</h1>

                <!-- Order tracking and returns content will be added here -->
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold mb-4">Track Your Order</h2>
                        <!-- Order tracking form will be added here -->
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold mb-4">Return & Refund Policy</h2>
                        <!-- Return policy content will be added here -->
                    </div>
                </div>
            </div>
        </div>

        @include('partials.footer')
    </main>
</x-layouts.main>
