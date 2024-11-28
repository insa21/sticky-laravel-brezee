<x-guest-layout>
    <div class="w-full max-w-md mx-auto mt-10 px-6 py-4 bg-white dark:bg-zinc-900 shadow-md rounded-lg">
        <h1 class="text-2xl font-bold text-center text-gray-700 dark:text-zinc-200 mb-6">
            {{ __('Reset Your Password') }}
        </h1>

        <x-splade-form :default="['email' => $request->email, 'token' => $request->route('token')]" action="{{ route('password.store') }}" class="space-y-4">
            <!-- Email Address -->
            <x-splade-input
                id="email"
                type="email"
                name="email"
                :label="__('Email')"
                required
                autofocus
                class="dark:text-zinc-300 dark:border-zinc-700"
            />

            <!-- Password -->
            <x-splade-input
                id="password"
                type="password"
                name="password"
                :label="__('Password')"
                required
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

            <div class="flex items-center justify-end">
                <!-- Submit Button -->
                <x-splade-submit
                    :label="__('Reset Password')"
                    class="px-4 py-2 bg-gray-800 dark:bg-zinc-700 text-white dark:text-zinc-300 rounded-md hover:bg-gray-700 dark:hover:bg-zinc-600 transition"
                />
            </div>
        </x-splade-form>
    </div>
</x-guest-layout>
