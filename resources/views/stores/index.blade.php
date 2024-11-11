<x-app-layout>
    @slot('title', 'Stores')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stores') }}
        </h2>
    </x-slot>


        <x-container>

            <div class="grid grid-cols-4 gap-6">
               @foreach($stores as $store)
                    <!-- cara yang tidak rekomended mengambil dari url langsung -->
                    @php
                        $link = 'http://127.0.0.1:8000/storage';
                    @endphp
                        <!-- ============= -->
                    <x-card>
                       <div class="p-6 pb-0">
                           <!-- Tutorial -->
            {{-- <img src="{{ \Illuminate\Support\Facades\Storage::url($store->logo) }}" alt="{{ $store->name }}" class="size-16 rounded-lg">--}}

                           <!-- Cara Sendiri -->
                           <img src="{{ $link . '/' . $store->logo  }}" alt="{{ $store->name }}" class="size-16 rounded-lg">
                       </div>
                       <x-card.header>
                           <x-card.title> {{ $store->name }} </x-card.title>
                           <x-card.description>
                               {{ $store->description  }}
                           </x-card.description>
                       </x-card.header>
                   </x-card>

               @endforeach
           </div>
        </x-container>
</x-app-layout>
