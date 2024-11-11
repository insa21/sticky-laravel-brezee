<x-app-layout>
    @slot('title', $page_meta['title'])

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $page_meta['title'] }}
        </h2>
    </x-slot>

    <x-container>
        <x-card class="max-w-2xl">
            <x-card.header>
                <x-card.title>
                    {{ $page_meta['title'] }}
                </x-card.title>
                <x-card.description>
                    {{ $page_meta['description'] }}
                </x-card.description>
            </x-card.header>
            <x-card.content>
                <!-- Form for creating a new store -->
                <form action="{{ $page_meta['url'] }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method($page_meta['method'])

                    <div class="mb-4">
                        <label for="logo" class="block text-sm font-medium text-gray-700 mb-1">
                            Logo
                        </label>
                        <!-- preview -->
                        <x-logo/>
                        <!-- Error Message -->
                        @error('logo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Name
                        </label>
                        <input id="name" type="text" name="name" value="{{ old('name', $store->name) }}" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 text-gray-700" required>
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">
                            Description
                        </label>
                        <x-text-area id="description" type="text" name="description" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 text-gray-700" required>{{ old('description', $store->description) }}</x-text-area>
                        @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-primary-button type="submit">
                        Save
                    </x-primary-button>
                </form>

            </x-card.content>
        </x-card>
    </x-container>
</x-app-layout>
