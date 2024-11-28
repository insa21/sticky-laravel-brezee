<x-guest-layout>
    <div class="w-full max-w-md mx-auto mt-10 px-6 py-4 bg-white dark:bg-zinc-900 shadow-md rounded-lg">
        <h1 class="text-2xl font-bold text-center text-gray-700 dark:text-zinc-200 mb-6">
            {{ __('Create Your Account') }}
        </h1>

        <x-splade-form action="{{ route('register') }}" class="space-y-4">
            <!-- Name -->
            <x-splade-input
                id="name"
                type="text"
                name="name"
                :label="__('Name')"
                required
                autofocus
                class="dark:text-zinc-300 dark:border-zinc-700"
            />

            <!-- Email -->
            <x-splade-input
                id="email"
                type="email"
                name="email"
                :label="__('Email')"
                required
                class="dark:text-zinc-300 dark:border-zinc-700"
            />

            <!-- Password -->
            <x-splade-input
                id="password"
                type="password"
                name="password"
                :label="__('Password')"
                required
                autocomplete="new-password"
                class="dark:text-zinc-300 dark:border-zinc-700"
            />

            <!-- Confirm Password -->
            <x-splade-input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                :label="__('Confirm Password')"
                required
                class="dark:text-zinc-300 dark:border-zinc-700"
            />

            <div class="flex items-center justify-between">
                <!-- Already Registered -->
                <a
                    class="underline text-sm text-gray-600 dark:text-zinc-300 hover:text-gray-900 dark:hover:text-zinc-400"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <!-- Submit Button -->
                <x-splade-submit
                    class="ml-4 px-4 py-2 bg-gray-800 dark:bg-zinc-700 text-white dark:text-zinc-300 rounded-md hover:bg-gray-700 dark:hover:bg-zinc-600 transition"
                    :label="__('Register')"
                />
            </div>
        </x-splade-form>
    </div>
</x-guest-layout>
