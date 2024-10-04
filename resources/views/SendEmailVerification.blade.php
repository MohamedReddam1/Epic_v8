@extends('formateur')

@section('formateurTitle', 'Email Verification')

@section('contentFormateur')

@if ($errors->any())
    <div class="bg-red-500 text-white p-4 mb-4 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
    <div class="bg-red-500 text-white p-4 mb-4 rounded">
        {{ session('error') }}
    </div>
@endif

@if (session('message'))
    <div class="bg-green-500 text-white p-4 mb-4 rounded">
        {{ session('message') }}
    </div>
@endif

<form action="{{ route('password.email') }}" method="post" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf
    <div class="mb-8">
        <h2 class="text-lg font-semibold mb-2">Email Verification</h2>
        <div class="mb-4">
            <input type="email" name="email" placeholder="Enter your email" class="border rounded px-4 py-2 w-full" required>
        </div>
    </div>
    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Send Verification Code
    </button>
</form>

@endsection
