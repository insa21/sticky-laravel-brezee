<x-app-layout>
    @slot('title', $store->name)

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ $store->name }}
        </h2>
    </x-slot>

    @php
        $link = 'http://127.0.0.1:8000/storage';
    @endphp

    <x-container>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($store->products as $product)
                <x-card class="relative">
                    <x-card.header>
                        <x-card.title> {{ $product->name }} </x-card.title>
                        <x-card.description>
                            Rp{{ number_format($product->price, 0, ',', '.') }}
                        </x-card.description>
                    </x-card.header>
                </x-card>
            @endforeach
        </div>
    </x-container>

</x-app-layout>
