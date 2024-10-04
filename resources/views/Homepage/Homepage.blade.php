@extends('Main/Main')

@section('content')
    <div class="w-full">
        <div class="w-full px-5 lg:px-5 xl:px-20 my-32">
            <div class="flex justify-between items-center w-full my-10">
                <h1 class="text-lg lg:text-2xl font-semibold ">Web Developpement</h1>
                <a href="" class="text-sm lg:text-md text-purple-600">view all</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach($formations as $formation)
                <div class="bg-white rounded-lg shadow-md hover:scale-105 duration-200 ease-in-out">
                    <a href="details/{{$formation->id}}" class="">
                    <img src="{{ asset('F_images/'.$formation->image) }}" alt="{{ $formation->titre }}" class="w-full h-44 object-cover rounded-t-lg">
                    </a>
                    <div class="p-4">
                        <p class="text-gray-500 mt-2">{{ $formation->categorie }}</p>
                        <h2 class="text-lg font-semibold">{{ $formation->titre }}</h2>
                        <div class="text-gray-600 text-xs mt-1">
                            Rating:
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $formation->rate)
                                    <i class="fas fa-star text-yellow-500"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </div>
                        <div class="flex justify-between items-center mt-2">
                            <p class="text-black font-semibold text-xl">{{ $formation->prix }} $</p>
                            <div class="flex items-center">
                                <a href="{{ url('cart/addc', ['id' => $formation['id']])}}" class="text-xl mr-5 text-purple-600 py-2 px-3 bg-purple-200 rounded-md hover:bg-purple-600 hover:text-white duration-200 ease-in-out"><i class="fa-solid fa-cart-plus"></i></a>
                                <form action="{{ route('wishlist.add') }}" method="POST" id="wishlistForm" class="flex items-center justify-center">
                                    @csrf
                                    <input type="hidden" name="formation_id" value="{{ $formation['id'] }}">
                                    <button type="submit" id="heart{{$formation['id']}}" onclick="toggleColor(this, {{$formation['id']}})" class="py-2 px-3 bg-red-200 text-red-600 rounded-md hover:bg-red-600 hover:text-white duration-200 ease-in-out">
                                        <i class="fa-regular fa-heart text-2xl"></i>
                                    </button>
                                </form>
                                <div class="flex justify-end items-center">
                             
                              
                            </div>
                            </div>

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
                    <p class="mt-3 text-lg md:text-xl">Qui aliquip quis magna non sint voluptate officia qui. Laborum sit mollit id sint et dolore conseq</p> <!-- Adjusted text size for smaller screens -->
                    <button class="py-3 px-6 md:px-8 bg-purple-600 text-white font-semibold rounded-md mt-3">Explore more</button> <!-- Adjusted button padding for smaller screens -->
                </div>
                <div class="flex justify-center md:justify-end"> <!-- Adjusted alignment for smaller screens -->
                    <img src="{{ asset('Assets/Images/Image 17.png') }}" alt="" class="w-full"> <!-- Adjusted image size for smaller screens -->
                </div>
            </div>
        </div>
        
        <div class="w-full px-5 lg:px-5 xl:px-20 my-32">
            <div class="flex justify-between items-center w-full my-10">
                <h1 class="text-lg lg:text-2xl font-semibold ">Digital Illustration</h1>
                <a href="" class="text-sm lg:text-md text-purple-600">view all</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach($formations as $item)
                <div class="bg-white rounded-lg shadow-md hover:scale-105 duration-200 ease-in-out transition-all">
                    <a href="details/{{$item->id}}" class="">
                    <img src="{{ asset('F_images/'.$item->image) }}" alt="{{ $item->titre }}" class="w-full h-44 object-cover rounded-t-lg">
                    </a>
                    <div class="p-4">
                        <p class="text-gray-500 mt-2">{{ $item->categorie }}</p>
                        <h2 class="text-lg font-semibold">{{ \Illuminate\Support\Str::limit($item['titre'], 20, '...') }}</h2>
                        <div class="text-gray-600 text-xs mt-1">
                            Rating:
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $item->rate)
                                    <i class="fas fa-star text-yellow-500"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </div>
                        <div class="flex justify-between items-center mt-2">
                            <p class="text-black font-semibold text-xl">{{ $item->prix }} MAD</p>
                            <div class="flex items-center">
                                <a href="{{ url('cart/addc', ['id' => $item['id']])}}" class="text-xl mr-5 text-purple-600 py-2 px-3 bg-purple-200 rounded-md hover:bg-purple-600 hover:text-white duration-200 ease-in-out"><i class="fa-solid fa-cart-plus"></i></a>
                                <form action="{{ route('wishlist.add') }}" method="POST" id="wishlistForm" class="flex items-center justify-center">
                                    @csrf
                                    <input type="hidden" name="formation_id" value="{{ $item['id'] }}">
                                    <button type="submit" id="heart{{$item['id']}}" onclick="toggleColor(this, {{$item['id']}})" class="py-2 px-3 bg-red-200 text-red-600 rounded-md hover:bg-red-600 hover:text-white duration-200 ease-in-out">
                                        <i class="fa-regular fa-heart text-xl"></i>
                                    </button>
                                </form>
                                <div class="flex justify-end items-center">
                             
                              
                            </div>
                            </div>

                        </div>

                    </div>
                </div>
                @endforeach
            </div>
            
        </div>

        <div class="w-full px-5 lg:px-5 xl:px-20 my-32">
            <div class="flex justify-between items-center w-full my-10">
                <h1 class="text-lg lg:text-2xl font-semibold ">Digital Marketing</h1>
                <a href="" class="text-sm lg:text-md">view all</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach($formations as $item)
                <div class="bg-white rounded-lg shadow-md hover:scale-105 duration-200 ease-in-out transition-all">
                    <a href="details/{{$item->id}}" class="">
                    <img src="{{ asset('F_images/'.$item->image) }}" alt="{{ $item->titre }}" class="w-full h-44 object-cover rounded-t-lg">
                    </a>
                    <div class="p-4">
                        <p class="text-gray-500 mt-2">{{ $item->categorie }}</p>
                        <h2 class="text-lg font-semibold">{{ \Illuminate\Support\Str::limit($item['titre'], 20, '...') }}</h2>
                        <div class="text-gray-600 text-xs mt-1">
                            Rating:
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $item->rate)
                                    <i class="fas fa-star text-yellow-500"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </div>
                        <div class="flex justify-between items-center mt-2">
                            <p class="text-black font-semibold text-xl">{{ $item->prix }} MAD</p>
                            <div class="flex items-center">
                                <a href="{{ url('cart/addc', ['id' => $item['id']])}}" class="text-xl mr-5 text-purple-600 py-2 px-3 bg-purple-200 rounded-md hover:bg-purple-600 hover:text-white duration-200 ease-in-out"><i class="fa-solid fa-cart-plus"></i></a>
                                <form action="{{ route('wishlist.add') }}" method="POST" id="wishlistForm" class="flex items-center justify-center">
                                    @csrf
                                    <input type="hidden" name="formation_id" value="{{ $item['id'] }}">
                                    <button type="submit" id="heart{{$item['id']}}" onclick="toggleColor(this, {{$item['id']}})" class="py-2 px-3 bg-red-200 text-red-600 rounded-md hover:bg-red-600 hover:text-white duration-200 ease-in-out">
                                        <i class="fa-regular fa-heart text-xl"></i>
                                    </button>
                                </form>
                                <div class="flex justify-end items-center">
                             
                              
                            </div>
                            </div>

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