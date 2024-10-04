@extends('Formateur')

@section('formateurTitle', 'Settings')

@section('contentFormateur')
<div class=" w-10/12 ml-7 py-8">
    <h1 class="text-xl lg:text-2xl font-bold mb-4 mt-10">Welcome {{ $user->name }}</h1>
    <form action="/setting/{{ $user->id }}" method="POST" enctype="multipart/form-data" class="w-full bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method("PUT")
        <!-- Change Profile Photo Section -->
        <div>
            @include('incs.flash')
        </div>
        <div class="mb-8">
            <h2 class="text-lg font-semibold mb-2">Change Profile Photo</h2>
            <div class="grid grid-cols-1 md:grid-cols-2">
                <img src="{{ asset('imgs/'.$user->image) }}" alt="Current Profile Photo" class="w-20 h-20 rounded-full mr-4 border mb-3 lg:mb-0">
                <input type="file" name="image" value="{{ $user->image }}" class="mt-0 lg:mt-5 flex items-center rounded px-4 py-2 lg:py-0 text-xs lg:text-lg">
            </div>
        </div>

        <!-- Change Name Section -->
        <div class="mb-8">
            <h2 class="text-lg font-semibold mb-2">Change Name</h2>
            <input type="text" name="name" value="{{ $user->name }}" placeholder="Enter your new name" class="border rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-purple-600">
        </div>

        <!-- Save Button -->
        <div class="flex items-center justify-between">
            <button type="submit" class="text-xs lg:text-md bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-4 lg:py-2 lg:px-4 rounded focus:outline-none focus:shadow-outline">
                Save Changes
            </button>
            <a href="/changePassword/{{ $user->id }}" class="text-xs lg:text-md text-blue-500 hover:text-blue-700 ml-4">Change password</a>
        </div>
    </form>
</div>
@endsection