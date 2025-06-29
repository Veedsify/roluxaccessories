<div class="search-form relative" x-data="{ showSuggestions: @entangle('showSuggestions') }">
    <form wire:submit.prevent="search" class="relative">
        <div class="search-input-container relative">
            <input wire:model.live.debounce.300ms="query" wire:focus="$set('showSuggestions', true)" wire:blur="hideSuggestions" type="text" placeholder="What are you looking for?" class="search-input w-full h-10 px-4 pr-12 border border-line rounded-lg focus:outline-none focus:border-black transition duration-300 caption2" autocomplete="off">
            <button type="submit" class="search-btn absolute right-3 top-1/2 transform -translate-y-1/2 w-6 h-6 flex items-center justify-center text-secondary2 hover:text-black transition duration-300">
                <i class="ph ph-magnifying-glass text-lg"></i>
            </button>
        </div>

        <!-- Search Suggestions -->
        <div x-show="showSuggestions && $wire.suggestions.length > 0" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform translate-y-2" class="suggestions-dropdown absolute top-full left-0 right-0 bg-white border border-line rounded-lg shadow-lg mt-1 z-50">
            <div class="suggestions-header px-4 py-2 text-xs text-secondary2 uppercase font-medium border-b border-line">
                Suggestions
            </div>
            <div class="suggestions-list">
                @foreach($suggestions as $suggestion)
                <div wire:click="selectSuggestion('{{ $suggestion }}')" class="suggestion-item px-4 py-3 hover:bg-gray-50 cursor-pointer border-b border-line last:border-b-0 transition duration-150">
                    <div class="flex items-center gap-3">
                        <i class="ph ph-magnifying-glass text-secondary2"></i>
                        <span class="text-sm">{{ $suggestion }}</span>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="suggestions-footer px-4 py-3 border-t border-line">
                <button type="submit" class="view-all-btn text-sm text-black hover:underline">
                    Search for "{{ $query }}"
                </button>
            </div>
        </div>
    </form>

    @push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('hide-suggestions-delayed', () => {
                setTimeout(() => {
                    @this.set('showSuggestions', false);
                }, 200);
            });
        });

    </script>
    @endpush
</div>
