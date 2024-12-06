<x-app-layout>
    @slot('title', 'List Stores')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('List Stores') }}
        </h2>
    </x-slot>

    <x-container>
        @php $isAdmin = auth()->user()->isAdmin() @endphp
        <div class="grid grid-cols-4 gap-6">
            @foreach ($stores as $store)
                <x-stores.item :$isAdmin :$store />
            @endforeach
        </div>

        <div class="mt-8">
            {{ $stores->links() }}
        </div>

    </x-container>


</x-app-layout>
