<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo/>
        </x-slot>

        <x-validation-errors class="mb-4"/>

        @session('status')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ $value }}
        </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}"/>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                         autofocus autocomplete="username"/>
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}"/>
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                         autocomplete="current-password"/>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember"/>
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex mt-4 justify-center items-center">
                <div><a href="{{ route('social.redirect', 'facebook') }}" style="background-color: #183153"
                        class="inline-flex items-center px-2 float-left py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 h-10 px-2 py-2 mt-10 font-semibold text-xs text-white float-left transition-colors duration-150 rounded-lg uppercase focus:shadow-outline0 bg-gray-800 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900">
                        <img src="https://www.cdnlogo.com/logos/f/9/facebook.svg" class="w-8 m-0 p-0">
                        Login with Facebook
                    </a>
                    <a href="{{ route('social.redirect', 'twitter') }}" style="background-color: #183153"
                       class="inline-flex items-center px-2 float-left py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 h-10 px-2 py-2 mt-10 font-semibold text-xs text-white float-left transition-colors duration-150 rounded-lg uppercase focus:shadow-outline0 bg-gray-800 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900">
                        <img src="https://www.cdnlogo.com/logos/t/96/twitter-icon.svg" class="w-5 m-2 p-0">
                        Login with Twitter
                    </a>
                    <a href="{{ route('social.redirect', 'google') }}" style="background-color: #183153"
                       class="inline-flex items-center px-2 float-left py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 h-10 px-2 py-2 mt-10 font-semibold text-xs text-white float-left transition-colors duration-150 rounded-lg uppercase focus:shadow-outline0 bg-gray-800 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900">
                        <img src="https://www.cdnlogo.com/logos/g/35/google-icon.svg" class="w-4 m-2 p-0">
                            Login with Google
                    </a>
                </div>

                <x-button
                    class="h-10 px-10 py-2 m-2 ml-10 font-semibold text-xs text-white float-right transition-colors duration-150 rounded-lg uppercase focus:shadow-outline0 bg-gray-800 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900">
                    {{ __('Log in') }}
                </x-button>
            </div>

            <div class="block mt-4 text-right">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
            {{-- End custom changes in login.blade.php --}}
        </form>
    </x-authentication-card>
</x-guest-layout>
