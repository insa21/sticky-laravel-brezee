@use('App\Enums\StoreStatus')

<x-card class="flex flex-col">
    <div class="flex-1">
        <!-- Header -->
        <x-card.header>
            <x-card.title>
                {{ $store->name }}
            </x-card.title>
            <x-card.description>
                Created on {{ $store->created_at->format('d F Y') }} by {{ $store->user->name }}
            </x-card.description>
        </x-card.header>

        <!-- Content -->
        <x-card.content>
            <section>
                <p class="mb-6">
                    {{ $store->description }}
                </p>
            </section>
        </x-card.content>
    </div>

    <!-- Footer -->
    <x-card.footer>
        <div class="flex items-center justify-between w-full gap-4">
            <!-- Badge -->
            <x-badge>
                {{ $store->status }}
            </x-badge>

            <!-- Approve Button -->
            @if (auth()->user()->isAdmin() && $store->status === StoreStatus::PENDING)
                <x-splade-form method="PUT" :action="route('stores.approve', $store)" :confirm="__('Approve Store: ' . $store->name)" :confirm-text="__('Are you sure you want to approve this store? Description: ' . $store->description)" :confirm-button="__('Approve')">
                    <button type="submit"
                        class="px-4 py-2 bg-zinc-900 hover:bg-zinc-950 border border-zinc-700 hover:border-zinc-800 text-white rounded">
                        {{ __('Approve') }}
                    </button>
                </x-splade-form>
            @endif
        </div>
    </x-card.footer>
</x-card>
