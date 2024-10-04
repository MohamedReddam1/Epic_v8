@extends('master.master')
@section('content')
<div class="container mx-auto py-24 h-full">
    <div class="w-full max-w-md mx-auto bg-white p-8 border border-gray-300 rounded-lg mt-10">
        <h2 class="text-2xl font-bold text-center mb-4">{{ __('Reset Password') }}</h2>

        @if (session('status'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-gray-700">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="border rounded px-4 py-2 w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="text-red-500 text-sm mt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
