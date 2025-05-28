<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-gray-100 to-gray-300">
        <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-xl">
            <div class="flex justify-center mb-6">
                <x-authentication-card-logo class="w-20 h-20" />
            </div>

            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 text-sm font-medium text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-semibold text-gray-700">{{ __('Email') }}</label>
                    <x-input id="email" type="email" name="email" class="w-full mt-1 rounded-lg shadow-sm" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-semibold text-gray-700">{{ __('Password') }}</label>
                    <x-input id="password" type="password" name="password" class="w-full mt-1 rounded-lg shadow-sm" required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-4">
                    <x-checkbox id="remember_me" name="remember" />
                    <label for="remember_me" class="ms-2 text-sm text-gray-600">
                        {{ __('Remember me') }}
                    </label>
                </div>

                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-500 hover:underline">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-button class="ms-4 px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow-md">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
