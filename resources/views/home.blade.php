<x-app-layout>
    @slot('title', 'Dashboard')
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-container class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-zinc-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                You're logged in!
            </div>
        </div>
    </x-container>
</x-app-layout>
