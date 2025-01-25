@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6 relative">
    <!-- Register Button -->


    <div class="flex justify-center">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="text-xl font-semibold mb-4">{{ __('Login') }}</div>

                <div class="space-y-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Input -->
                        <div class="flex flex-col mb-4">
                            <label for="email" class="text-sm font-medium text-gray-700">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="mt-2 p-2 border  rounded-md focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="flex flex-col mb-4">
                            <label for="password" class="text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                            <input id="password" type="password" class="mt-2 p-2 border  rounded-md focus:ring-indigo-500 focus:border-indigo-500 @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center mb-4">
                            <input class="mr-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember" class="text-sm text-gray-600">{{ __('Remember Me') }}</label>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-between items-center">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                            <a class="text-sm text-indigo-600 hover:text-indigo-800" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection