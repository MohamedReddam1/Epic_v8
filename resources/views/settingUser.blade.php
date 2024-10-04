@extends('Main.Main')

@section('title', 'Settings')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Welcome {{ $user->name }}</h1>
    <form action="/setting/{{ $user->id }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method("PUT")
        <!-- Change Profile Photo Section -->
        <div>
            @include('incs.flash')
        </div>
        <div class="mb-8">
            <h2 class="text-lg font-semibold mb-2">Change Profile Photo</h2>
            <div class="flex items-center">
                <img src="{{ asset('imgs/'.$user->image) }}" alt="Current Profile Photo" class="w-20 h-20 rounded-full mr-4 border">
                <input type="file" name="image" value="{{ $user->image }}" class="border rounded px-4 py-2">
            </div>
        </div>

        <!-- Change Name Section -->
        <div class="mb-8">
            <h2 class="text-lg font-semibold mb-2">Change Name</h2>
            <input type="text" name="name" value="{{ $user->name }}" placeholder="Enter your new name" class="border rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-purple-600">
        </div>

        <!-- Save Button -->
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Save Changes
            </button>
            <a href="/changePassword/{{ $user->id }}" class="text-blue-500 hover:text-blue-700 ml-4">Change password</a>
        </div>
    </form>
</div>
@endsection