@use('lluminate\Support\Facades')

<x-app-layout>
    @slot('title', 'Stores')

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Stores') }}
        </h2>
    </x-slot>

    <!-- cara yang tidak rekomended mengambil dari url langsung -->
    @php
        $link = 'http://127.0.0.1:8000/storage';
    @endphp
    <!-- ============= -->


    <x-container>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($stores as $store)
                <x-card class="relative">
                    <a href="{{ route('stores.show', $store) }}" class="absolute inset-0 size-full"></a>
                    <div class="p-6 pb-0">
                        @if ($store->logo)
                            <img src="{{ $link . '/' . $store->logo }}" alt="{{ $store->name }}"
                                class="size-16 rounded-lg">
                        @else
                            <div class="size-16 rounded-lg bg-zinc-600"></div>
                        @endif
                        <!-- Tutorial -->
                        {{-- <img src="{{ Storage::url($store->logo) }}" alt="{{ $store->name }}" class="size-16 rounded-lg"> --}}

                        <!-- Cara Sendiri -->
                    </div>
                    <x-card.header>
                        <x-card.title> {{ $store->name }} </x-card.title>
                        <x-card.description>
                            {{ str($store->description)->limit(100) }}
                        </x-card.description>

                        @auth
                            @if (auth()->check() && $store->user_id == auth()->user()->id)
                                <a href="{{ route('stores.edit', $store) }}" class="underline text-blue-600 mb-3">
                                    Edit Store
                                </a>
                            @endif
                        @endauth

                    </x-card.header>
                </x-card>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $stores->links() }}
        </div>
    </x-container>
</x-app-layout>
