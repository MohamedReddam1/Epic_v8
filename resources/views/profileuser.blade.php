@extends('Main.Main')

@section('title', 'User Profile')

@section('content')
<div class="w-full flex justify-center items-center bg-gray-100 px-5 lg:px-20">
    <div class=" w-full bg-white shadow-lg rounded-lg overflow-hidden mt-44">
        @foreach ($userprofile as $user)
            <div class="sm:flex sm:items-center px-6 py-4">
                <img class="block mx-auto sm:mx-0 sm:shrink-0 w-24 h-24 rounded-full shadow-md" src="/imgs/{{ $user->image }}" alt="User image">
                <div class="mt-4 sm:mt-0 sm:ml-4 text-center sm:text-left">
                    <p class="text-xl leading-tight">{{ $user->name }}</p>
                    <p class="text-sm leading-tight text-gray-600">{{ $user->email }}</p>
                    <p class="text-sm leading-tight text-gray-600">{{ ucfirst($user->role) }}</p>
                </div>
            </div>
            <div class="px-5 lg:px-20 mt-10">
                <ul>
                    <li class="flex justify-start items-center list-none text-md lg:text-lg mb-3"><p class="font-semibold mr-5 text-nowrap">birth date :</p><p>{{ $user->date_naissance }}</p></li>
                    <li class="flex justify-start items-center list-none text-md lg:text-lg mb-3"><p class="font-semibold mr-5 text-nowrap">Nationality :</p><p>{{ $user->nationality }}</p></li>
                    <li class="flex justify-start items-center list-none text-md lg:text-lg mb-3"><p class="font-semibold mr-5 text-nowrap">University :</p><p>{{ $user->university }}</p></li>
                    <li class="flex flex-col justify-start items-start list-none text-md lg:text-lg mb-3"><p class="font-semibold mr-5 text-nowrap">About me :</p><p>{{ $user->About }}</p></li>
                </ul>
            </div>
        @endforeach
        <div class="px-6 py-4 flex flex-col items-center">
            <a href="{{route('setting')}}" class="block w-6/12 bg-purple-600 hover:bg-purple-100 hover:text-purple-600 text-white font-bold py-2 px-4 rounded mb-2 text-center duration-200 ease-in-out">
                <i class="fas fa-edit"></i> Update Information
            </a>
            <form method="POST" action="{{ route('logout') }}" class="w-6/12">
                @csrf
                <button type="submit" class="w-full bg-purple-100 hover:bg-purple-700 hover:text-white text-purple-600 font-bold py-2 px-4 rounded text-center duration-200 ease-in-out">
                    <i class="fas fa-sign-out-alt"></i> Log Out
                </button>
            </form>
        </div>
    </div>
</div>

@endsection