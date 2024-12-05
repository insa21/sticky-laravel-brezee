<x-app-layout>
    @slot('title', 'My Stores')

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('My Stores') }}
        </h2>
    </x-slot>

    <x-container>

        @if ($stores->count())
            <div class="grid grid-cols-4 gap-6">
                @foreach ($stores as $store)
                
                <x-stores.item :$store />
                    <x-card>
                        <x-card.header>
                            <x-card.title> {{ $store->title }} </x-card.title>
                            <x-card.description>
                                {{ $store->description }}
                            </x-card.description>
                        </x-card.header>
                    </x-card>
                @endforeach
            </div>
        @else
            <p class="text-zinc-400">
                {{ __('You have not created any stores yet.') }}
            </p>
        @endif
    </x-container>
</x-app-layout>
