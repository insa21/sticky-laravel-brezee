<div class="min-h-screen">
    @include('layouts.navigation')

    <!-- Page Heading -->
    <header class="bg-zinc-900 border-b border-zinc-800 mb-12 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    <x-footer/>
</div>
