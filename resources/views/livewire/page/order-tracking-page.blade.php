<x-layouts.main :title="$this->title ?? config('app.name')">
    <main>
        @livewire("components.top-nav")
        @livewire("components.nav-bar")

        <!-- Page Content -->
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <h1 class="text-4xl font-bold text-gray-900 mb-4">Order Tracking & Returns</h1>
                    <p class="text-lg text-gray-600">Track your order status and learn about our return policy</p>
                </div>

                <div class="grid lg:grid-cols-2 gap-12">
                    <!-- Order Tracking Section -->
                    <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                        <div class="flex items-center mb-6">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-semibold text-gray-900">Track Your Order</h2>
                        </div>
                        
                        <form wire:submit.prevent="trackOrder" class="space-y-6">
                            <div class="mt-2">
                                <label for="tracking_id" class="block text-sm font-medium text-gray-700 mb-2">
                                    Order ID or Tracking Number
                                </label>
                                <input 
                                    type="text" 
                                    id="tracking_id"
                                    wire:model="trackingId"
                                    placeholder="Enter your order ID or tracking number"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 transition duration-200 mt-4"
                                    required
                                >
                            </div>
                            
                            <button 
                                type="submit"
                                class="w-full bg-black hover:bg-black/80 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 mt-4"
                            >
                                Track Order
                            </button>
                        </form>
                        
                        <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-600">
                                <strong>Need help?</strong> Contact our support team at 
                                <a href="mailto:support@example.com" class=" hover:underline">support@example.com</a>
                            </p>
                        </div>
                    </div>

                    <!-- Return Policy Section -->
                    <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                        <div class="flex items-center mb-6">
                            <div class="bg-green-100 p-3 rounded-full mr-4">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-semibold text-gray-900">Return & Refund Policy</h2>
                        </div>
                        
                        <div class="space-y-6">
                            <div class="border-l-4 border-green-500 pl-4">
                                <h3 class="font-semibold text-gray-900 mb-2">30-Day Return Window</h3>
                                <p class="text-gray-600">Returns are accepted within 30 days of delivery for unused items in original packaging.</p>
                            </div>
                            
                            <div class="border-l-4 border-blue-500 pl-4">
                                <h3 class="font-semibold text-gray-900 mb-2">Free Return Shipping</h3>
                                <p class="text-gray-600">We provide prepaid return labels for all eligible returns within the US.</p>
                            </div>
                            
                            <div class="border-l-4 border-purple-500 pl-4">
                                <h3 class="font-semibold text-gray-900 mb-2">Quick Refunds</h3>
                                <p class="text-gray-600">Refunds are processed within 3-5 business days after we receive your return.</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        @include('partials.footer')
    </main>
</x-layouts.main>
