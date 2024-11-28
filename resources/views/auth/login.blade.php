<x-guest-layout>
    <div class="w-full max-w-md mx-auto mt-10 px-6 py-4 bg-white dark:bg-zinc-900 shadow-md rounded-lg">
        <h1 class="text-2xl font-bold text-center text-gray-800 dark:text-zinc-200 mb-6">
            {{ __('Welcome Back!') }}
        </h1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" />

        <x-splade-form action="{{ route('login') }}" class="space-y-4">
            <!-- Email Address -->
            <x-splade-input
                id="email"
                type="email"
                name="email"
                :label="__('Email Address')"
                required
                autofocus
                class="text-black dark:text-black :border-zinc-700 focus:ring-blue-500 dark:focus:ring-blue-400 placeholder:text-zinc-500"
                label-class="text-gray-900 dark:text-zinc-100"
            />

            <!-- Password -->
            <x-splade-input
                id="password"
                type="password"
                name="password"
                :label="__('Password')"
                required
                autocomplete="current-password"
                class="text-black dark:text-black :border-zinc-700 focus:ring-blue-500 dark:focus:ring-blue-400 placeholder:text-zinc-500"
                label-class="text-gray-900 dark:text-zinc-100"
            />

            <!-- Remember Me -->
            <x-splade-checkbox
                id="remember_me"
                name="remember"
                :label="__('Remember Me')"
                class="dark:text-zinc-300"
            />

            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a
                        class="underline text-sm text-gray-600 dark:text-zinc-300 hover:text-gray-800 dark:hover:text-zinc-400"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-splade-submit
                    class="ml-3 px-4 py-2 bg-gray-800 dark:bg-zinc-700 text-white dark:text-zinc-300 rounded-md hover:bg-gray-700 dark:hover:bg-zinc-600 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 transition"
                    :label="__('Log In')"
                />
            </div>
        </x-splade-form>

        <p class="mt-4 text-center text-sm text-gray-600 dark:text-zinc-400">
            {{ __("Don't have an account?") }}
            <a
                href="{{ route('register') }}"
                class="text-blue-500 dark:text-blue-400 hover:underline">
                {{ __('Sign up') }}
            </a>
        </p>
    </div>
</x-guest-layout>
