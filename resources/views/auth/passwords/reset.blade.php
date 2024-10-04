@extends('master.master')

@section('content')
<div class="flex items-center justify-center min-h-full py-20 bg-white">
    <div class="w-full max-w-md mt-20">
        <div class="bg-white border border-gray-300 rounded-lg p-6">
            <div class="text-xl font-semibold mb-4">{{ __('Reset Password') }}</div>

            <div>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">{{ __('Email Address') }}</label>
                        <div>
                            <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus class="mt-1 block w-full border border-gray-300 py-3 px-2 rounded-md shadow-sm @error('email') border-red-500 @enderror">
                            @error('email')
                                <div class="text-red-500 text-sm mt-1">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">{{ __('Password') }}</label>
                        <div>
                            <input id="password" type="password" name="password" required autocomplete="new-password" class="mt-1 block w-full border border-gray-300 py-3 px-2 rounded-md shadow-sm @error('password') border-red-500 @enderror">
                            @error('password')
                                <div class="text-red-500 text-sm mt-1">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="password-confirm" class="block text-gray-700">{{ __('Confirm Password') }}</label>
                        <div>
                            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" class="mt-1 block w-full border border-gray-300 py-3 px-2 rounded-md shadow-sm">
                        </div>
                    </div>

                    <div class="mb-0">
                        <div class="flex justify-end">
                            <button type="submit" class="bg-purple-600 text-white py-2 px-4 rounded-md hover:bg-purple-700">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
