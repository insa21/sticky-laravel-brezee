<x-app-layout>

    @slot('title', 'Verify Email')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Verify Email') }} <span class="text-gray-500">( {{ auth()->user()->email }})</span>
        </h2>
    </x-slot>

    <x-container>
        <div class="max-w-2xl">
            <x-auth-card>
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <div class="mt-4 flex items-center justify-between">
                    <x-splade-form action="{{ route('verification.send') }}">
                        <x-splade-submit :label="__('Resend Verification Email')" />
                    </x-splade-form>

                    <div class="flex items-center gap-2">
                        <a href="{{ route('profile.edit')}}" class="underline text-sm text-gray-600 hover:text-gray-900">
                            {{ __('Edit Profile') }}
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>

                </div>
            </x-auth-card>
        </div>
    </x-container>
</x-app-layout>
