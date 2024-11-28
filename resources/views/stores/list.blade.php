@use('App\Enums\StoreStatus')

<x-app-layout>
    @slot('title', 'List Stores')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('List Stores') }}
        </h2>
    </x-slot>

    <x-container>
       <div class="grid grid-cols-4 gap-6">
           @foreach($stores as $store)
               <x-card>
                   <x-card.header>
                       <x-card.title> {{ $store->name }} </x-card.title>
                        <x-card.description>
                            Created at {{ $store->created_at->format('d F Y')}} by {{ $store->user->name }}
                        </x-card.description>
                   </x-card.header>
                   <x-card.content>
                       <section class="space-y-6">
                           <header>

                               <p class="mt-1 text-sm text-gray-600">
                                   {{ $store->description }}
                               </p>
                           </header>

                           <x-splade-form
                               method="PUT"
                               :action="route('stores.approve', $store)"
                               :confirm="__(''. $store->name . '')"
                               :confirm-text="__('' . $store->description . '')"
                               :confirm-button="__('Approve')"
                           >
                               @if($store->status === StoreStatus::PENDING)
                                   <x-splade-submit primary :label="__('Approve')" />
                               @endif
                           </x-splade-form>

                       </section>


                   </x-card.content>
               </x-card>
           @endforeach
       </div>

        <div class="mt-8">
            {{ $stores->links() }}
        </div>

    </x-container>


</x-app-layout>
