@extends('Main/Main')

@section('content')
    <div class="w-full">
        <div class="w-full px-20 my-32">
            <div class="flex justify-between items-center w-full my-10">
                <h1 class="text-2xl font-semibold ">recommanded for you</h1>
                <a href="">view all</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4 gap-4">
                @foreach($formations as $formation)
                    <div class="bg-white rounded-lg shadow-md">
                        <img src="{{ $formation->image }}" alt="{{ $formation->titre }}" class="w-full h-44 object-cover rounded-t-lg">
                        <div class="p-4">
                            <p class="text-gray-500 mt-2">{{ $formation->categorie }}</p>
                            <h2 class="text-lg font-semibold">{{ $formation->titre }}</h2>
                            <div class="flex justify-between items-center">
                                <p class="text-black font-semibold mt-2 text-xl">{{ $formation->prix }} MAD</p>
                                <form action="{{ route('wishlist.add') }}" method="POST" id="wishlistForm" class="flex items-center justify-center">
                                    @csrf
                                    <input type="hidden" name="formation_id" value="{{ $formation['id'] }}">
                                    <button type="submit" id="heart{{$formation['id']}}" onclick="toggleColor(this, {{$formation['id']}})">
                                        <i class="fa-regular fa-heart text-2xl"></i>
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
        <div class="my-20 px-4 md:px-20"> <!-- Adjusted padding for smaller screens -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 items-center bg-red-50"> <!-- Adjusted grid layout and padding -->
                <div class="flex flex-col items-center lg:items-start px-4 md:px-4 py-10 "> <!-- Adjusted padding and alignment for smaller screens -->
                    <h1 class="text-4xl lg:text-4xl font-bold text-black">Digital illustration</h1> <!-- Adjusted text size for smaller screens -->
                    <p class="mt-3 text-lg md:text-xl text-center lg:text-start">Qui aliquip quis magna non sint voluptate officia qui. Laborum sit mollit id sint et dolore conseq</p> <!-- Adjusted text size for smaller screens -->
                    <button class="py-3 px-6 md:px-8 bg-purple-600 text-white font-semibold rounded-md mt-3">Explore more</button> <!-- Adjusted button padding for smaller screens -->
                </div>
                <div class="flex justify-center md:justify-end"> <!-- Adjusted alignment for smaller screens -->
                    <img src="{{ asset('Assets/Images/Image 17.png') }}" alt="" class="w-full"> <!-- Adjusted image size for smaller screens -->
                </div>
            </div>
        </div>
        
        <div class="w-full px-20 my-32">
            <div class="flex justify-between items-center w-full my-10">
                <h1 class="text-2xl font-semibold ">popular courses</h1>
                <a href="">view all</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach($formations as $formation)
                    <div class="bg-white rounded-lg shadow-md">
                        <img src="{{ $formation->image }}" alt="{{ $formation->titre }}" class="w-full h-44 object-cover rounded-t-lg">
                        <div class="p-4">
                            <p class="text-gray-500 mt-2">{{ $formation->categorie }}</p>
                            <h2 class="text-lg font-semibold">{{ $formation->titre }}</h2>
                            <div class="flex justify-between items-center">
                                <p class="text-black font-semibold mt-2 text-xl">{{ $formation->prix }} MAD</p>
                                <form action="{{ route('wishlist.add') }}" method="POST" id="wishlistForm" class="flex items-center justify-center">
                                    @csrf
                                    <input type="hidden" name="formation_id" value="{{ $formation['id'] }}">
                                    <button type="submit" id="heart{{$formation['id']}}" onclick="toggleColor(this, {{$formation['id']}})">
                                        <i class="fa-regular fa-heart text-2xl"></i>
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>

        <div class="w-full px-20 my-32">
            <div class="flex justify-between items-center w-full my-10">
                <h1 class="text-2xl font-semibold ">Trending courses</h1>
                <a href="">view all</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach($formations as $formation)
                    <div class="bg-white rounded-lg shadow-md">
                        <img src="{{ $formation->image }}" alt="{{ $formation->titre }}" class="w-full h-44 object-cover rounded-t-lg">
                        <div class="p-4">
                            <p class="text-gray-500 mt-2">{{ $formation->categorie }}</p>
                            <h2 class="text-lg font-semibold">{{ $formation->titre }}</h2>
                            <div class="flex justify-between items-center">
                                <p class="text-black font-semibold mt-2 text-xl">{{ $formation->prix }} MAD</p>
                                <form action="{{ route('wishlist.add') }}" method="POST" id="wishlistForm" class="flex items-center justify-center">
                                    @csrf
                                    <input type="hidden" name="formation_id" value="{{ $formation['id'] }}">
                                    <button type="submit" id="heart{{$formation['id']}}" onclick="toggleColor(this, {{$formation['id']}})">
                                        <i class="fa-regular fa-heart text-2xl"></i>
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
        <div>
            @include('Footer/Footer')
        </div>
    </div>
@endsection