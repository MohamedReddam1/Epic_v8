@extends('Main.Main')

@section('title', 'Change Password')

@section('content')

<div class="flex flex-col justify-center items-center min-h-screen bg-purple-50 ">
    <div class="w-5/12  shadow-lg rounded-lg overflow-hidden mt-32 mb-24 bg-white">
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

        <form action="/setting/{{ $user['id'] }}/reset" method="POST" enctype="multipart/form-data" class=" rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method("put")
            <div class="mb-8">
                <h2 class="text-lg font-semibold mb-2">Change Password</h2>
                <div class="mb-5">
                    <input type="password" name="oldpass" placeholder="Old Password" class="ring ring-gray-300 focus:ring-purple-300 focus:outline-none  rounded-md px-4 py-3 w-full">
                </div>
                <div class="mb-5">
                    <input type="password" name="newpass" placeholder="New Password" class="ring ring-gray-300 focus:ring-purple-300 focus:outline-none  rounded-md px-4 py-3 w-full">
                </div>
                <div class="mb-5">
                    <input type="password" name="newpass_confirmation" placeholder="Confirm New Password" class="ring ring-gray-300 focus:ring-purple-300 focus:outline-none  rounded-md px-4 py-3 w-full">
                </div>
                <div class="mt-3 flex justify-between items-center">
                    <a href="/send-email/{{ $user['id'] }}" class="text-purple-600 hover:text-purple-700">Forgot Password?</a>
                    <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Save Changes
                    </button>
                </div>
            </div>
            
        </form>
    </div>
    @include('Footer/Footer')
</div>

@endsection