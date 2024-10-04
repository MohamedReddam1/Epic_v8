@extends('formateur')

@section('formateurTitle', 'Settings')

@section('contentFormateur')
<div class="flex justify-center items-center min-h-screen ">
    <div class="w-full  rounded-lg overflow-hidden mt-24">
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

        <form action="/setting/{{ $user['id'] }}/reset" method="POST" enctype="multipart/form-data" class=" px-8 pt-6 pb-8 mb-4">
            @csrf
            @method("put")
            <div class="mb-8">
                <h2 class="text-lg font-semibold mb-2">Change Password</h2>
                <div class="mb-4">
                    <input type="password" name="oldpass" placeholder="Old Password" class="border rounded px-4 py-2 w-full">
                </div>
                <div class="mb-4">
                    <input type="password" name="newpass" placeholder="New Password" class="border rounded px-4 py-2 w-full">
                </div>
                <div class="mb-4">
                    <input type="password" name="newpass_confirmation" placeholder="Confirm New Password" class="border rounded px-4 py-2 w-full">
                </div>
                <div class="mt-2 text-center">
                    <a href="/send-email/{{ $user['id'] }}" class="text-blue-500 hover:text-blue-700">Forgot Password?</a>
                </div>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Save Changes
            </button>
        </form>
    </div>
</div>
@endsection