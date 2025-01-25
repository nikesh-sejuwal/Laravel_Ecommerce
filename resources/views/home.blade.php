@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <div class="flex justify-center">
        <div class="w-full max-w-2xl">
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="text-xl font-semibold mb-4">{{ __('Dashboard') }}</div>

                <div class="mb-4">
                    @if (session('status'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection