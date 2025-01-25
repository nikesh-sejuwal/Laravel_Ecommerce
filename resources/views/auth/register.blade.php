@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <div class="flex justify-center">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="text-xl font-semibold mb-4">{{ __('Register') }}</div>

                <div class="space-y-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name Input -->
                        <div class="flex flex-col mb-4">
                            <label for="name" class="text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                            <input id="name" type="text" class="mt-2 p-2 border  rounded-md focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email Input -->
                        <div class="flex flex-col mb-4">
                            <label for="email" class="text-sm font-medium text-gray-700">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="mt-2 p-2 border  rounded-md focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="flex flex-col mb-4">
                            <label for="password" class="text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                            <input id="password" type="password" class="mt-2 p-2  rounded-md focus:ring-indigo-500 focus:border-indigo-500 @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Confirm Password Input -->
                        <div class="flex flex-col mb-4">
                            <label for="password-confirm" class="text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="mt-2 p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-center mb-4">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection