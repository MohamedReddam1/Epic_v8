@extends('Main/Main')
@section('title', 'Details de ' . $formation->titre)
@section('content')


<div class="relative top-36">
    <div class="px-5 lg:px-10">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl lg:text-4xl font-bold text-gray-900">{{ $formation->titre }}</h1>

            <form action="{{ route('wishlist.add') }}" method="POST" id="wishlistForm" class="flex items-center justify-center">
                @csrf
                <input type="hidden" name="formation_id" value="{{ $formation['id'] }}">
                <button type="submit" id="heart{{$formation['id']}}" onclick="toggleColor(this, {{$formation['id']}})" class="py-2 px-3 bg-purple-600 text-white rounded-md hover:bg-purple-800 duration-200 ease-in-out flex  items-center ">
                    <i class="fa-regular fa-heart text-xl mr-3"></i>
                    Save
                </button>
            </form>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 mt-10">
            <div>
                <img src="{{ asset('F_images/'.$formation['image']) }}" alt="{{ $formation->titre }}">
            </div>
            <div class="px-0 mt-10 lg:mt-0 lg:px-20 flex flex-col items-start">
                @if ($formation->user)
                <div class="flex justify-start items-center">
                    <img src="{{ asset('imgs/Avatar 7.png') }}" alt="" class="w-14 h-14">
                    <p class="font-semibold ml-3 text-sm lg:text-lg">{{ $formation->user->name }}</p>
                </div>
                @else
                    <p>unknown</p>
                @endif

                <div class="flex justify-start items-center mt-16">
                    <h1 class="font-semibold text-nowrap text-md lg:text-xl ">{{ \Illuminate\Support\Str::limit($formation['titre'], 20, '...') }}</h1>

                    <div class="text-gray-600 text-md lg:text-lg ml-10 lg:ml-20 flex space-x-1">
                        
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $formation->rate)
                                <i class="fas fa-star text-yellow-500"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </div>
                </div>

                <div class="flex flex-col items-start border-b pb-5 border-gray-300 w-10/12">
                    <h1 class="font-semibold text-md lg:text-lg text-black mt-3">Level :    <span class="text-gray-700 ml-5">{{ $formation->niveau }}</span></h1>
                    <h1 class="font-semibold text-md lg:text-lg text-black mt-3">Language :    <span class="text-gray-700 ml-5">{{ $formation->langue }}</span></h1>
                </div>

                <div>
                    <h1 class="font-semibold text-md lg:text-lg text-black mt-3">Price :    <span class="text-gray-700 ml-5">{{ $formation->prix }} $</span></h1>
                </div>

                <div class="w-full mt-10">
                    <a href="{{ url('cart/addc', ['id' => $formation['id']])}}" class="text-xm py-2 px-10 lg:text-xl mr-5  text-purple-600  lg:py-4 lg:px-44 bg-purple-200 rounded-md hover:bg-purple-600 hover:text-white duration-200 ease-in-out"> Add to cart</a>
                </div>
            </div>
        </div>
    </div>

    <div class="px-10 lg:px-20">
        <div class="border-b border-gray-300 w-full mt-16 py-4 px-5">
            <h1 class="font-semibold text-xl text-gray-800">Class description</h1>
        </div>
        <div>
            <p class="text-lg p-10 w-7/12">{{ $formation->description }}</p>
        </div>
    </div>

    <div class="px-10 lg:px-20">
        <div class="mt-10 py-4 px-5">
            <h1 class="font-semibold text-xl text-gray-800">About the instuctor</h1>
        </div>
        <div>
            @if ($formation->user)
                <div class="bg-white rounded-lg shadow-lg p-5 flex flex-col items-start w-full ">
                    <img src="{{ asset('imgs/' . $formation->user->image) }}" alt="Instructor Photo" class="w-20 h-20 rounded-full mr-4">
                    <div>
                        <h3 class="text-lg lg:text-2xl font-bold text-gray-900">{{ $formation->user->name }}</h3>
                        <p class="text-gray-600 text-sm">{{ $formation->user->About }}</p>
                        <p class="text-gray-600 mt-2 text-sm"><strong>Email:</strong> {{ $formation->user->email }}</p>
                        <p class="text-gray-600 mt-2"><strong>Date de Naissance:</strong> {{ $formation->user->date_naissance }}</p>
                        <p class="text-gray-600 mt-2"><strong>Nationalité:</strong> {{ $formation->user->nationality }}</p>
                        <p class="text-gray-600 mt-2"><strong>Université:</strong> {{ $formation->user->university }}</p>

                        <!-- Diplomas Section -->
                        <div class="mt-4">
                            <h4 class="text-xl font-semibold text-gray-800">Diplomas</h4>
                            @if($formation->user->diplomas->isEmpty())
                                <p class="text-lg text-gray-600">No diplomas available.</p>
                            @else
                                <ul class="list-disc pl-5">
                                    @foreach($formation->user->diplomas as $diploma)
                                        <li class="text-lg text-gray-800">
                                            <strong>{{ $diploma->diploma }}</strong>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <p class="text-xl text-gray-600">Information about the instructor is not available.</p>
                </div>
            @endif
        </div>
    </div>

    <div class="px-10 lg:px-20">
        <div class="mt-10 py-4 px-5">
            <h1 class="font-semibold text-xl text-gray-800">Reviews</h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($reviews as $item)
                <div class="w-full py-4 px-5">
                    <div class="bg-gray-100 rounded-lg shadow-lg p-4 hover:shadow-xl transition-shadow flex flex-col items-start">
                        <div class="flex items-center mb-2">
                            <img src="{{ asset('F_images/'.$item->user->image) }}" alt="Profile Photo" class="w-10 h-10 rounded-full mr-4">
                            <p class="text-lg font-semibold text-gray-800">{{ $item->user->name }}</p>
                        </div>
                        <p class="text-gray-600 text-xl mt-5">{{ $item->feedback }}</p>
                        <p class="text-yellow-500 text-xl">{{ str_repeat('★', $item->rate) }}{{ str_repeat('☆', 5 - $item->rate) }}</p>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>

    <div class="mt-10 px-10 lg:px-10 mb-10">
        <div class="w-full mb-10">
            <h1 class="text-3xl font-semibold">Related Courses</h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-7 gap-y-10">
            @foreach ($courses as $item)

                <div class="bg-white rounded-lg shadow-md hover:scale-105 duration-200 ease-in-out transition-all">
                    <a href="details/{{$item->id}}" class="">
                    <img src="{{ asset('F_images/'.$item->image) }}" alt="{{ $item->titre }}" class="w-full h-44 object-cover rounded-t-lg">
                    </a>
                    <div class="p-4">
                        <p class="text-gray-500 mt-2">{{ $item->categorie }}</p>
                        <h2 class="text-lg font-semibold">{{ $item->titre }}</h2>
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

{{-- <div class="container mx-auto px-4 mt-20 flex justify-center">
    <div class="w-2/5 bg-white rounded-lg shadow-lg overflow-hidden transform transition-all hover:shadow-2xl">
        <div class="p-8">
            <h1 class="text-4xl font-bold mb-6 text-gray-900">{{ $formation->titre }}</h1>
            <div class="mb-4">
                <span class="block text-xl font-semibold text-gray-700 hover:text-gray-900">Categorie:</span>
                <span class="block text-xl text-gray-600 hover:text-gray-800">{{ $formation->categorie }}</span>
            </div>
            <div class="mb-4">
                <span class="block text-xl font-semibold text-gray-700 hover:text-gray-900">Niveau:</span>
                <span class="block text-xl text-gray-600 hover:text-gray-800">{{ $formation->niveau }}</span>
            </div>
            <div class="mb-4">
                <span class="block text-xl font-semibold text-gray-700 hover:text-gray-900">Langue:</span>
                <span class="block text-xl text-gray-600 hover:text-gray-800">{{ $formation->langue }}</span>
            </div>
            <div class="mb-4">
                <span class="block text-xl font-semibold text-gray-700 hover:text-gray-900">Prix:</span>
                <span class="block text-xl text-gray-600 hover:text-gray-800">{{ $formation->prix }} €</span>
            </div>
            <div class="mb-4">
                <span class="block text-xl font-semibold text-gray-700 hover:text-gray-900">Rate:</span>
                <span class="block text-xl text-gray-600 hover:text-gray-800">{{ $formation->rate }}</span>
            </div>
            @if ($formation->user)
                <div class="mb-4">
                    <span class="block text-xl font-semibold text-gray-700 hover:text-gray-900">Instructeur:</span>
                    <span class="block text-xl text-gray-600 hover:text-gray-800">{{ $formation->user->name }}</span>
                </div>
            @else
                <div class="mb-4">
                    <span class="block text-xl font-semibold text-gray-700 hover:text-gray-900">Instructeur:</span>
                    <span class="block text-xl text-gray-600 hover:text-gray-800">Unknown</span>
                </div>
            @endif
            <div class="text-lg text-gray-600 mt-8">
                <h2 class="text-3xl font-semibold mb-4 text-gray-800">Description:</h2>
                <p class="leading-relaxed">{{ $formation->description }}</p>
            </div>
            <div class="mt-6 flex justify-between">
                <a href="{{ url('cart/addc', ['id' => $formation['id']])}}" class="text-xl mr-5 text-purple-600 py-2 px-3 bg-purple-200 rounded-md hover:bg-purple-600 hover:text-white duration-200 ease-in-out"><i class="fa-solid fa-cart-plus"></i></a>

                <a href="javascript:history.back()" class="bg-gray-600 text-white py-2 px-4 rounded-md hover:bg-gray-700 focus:outline-none">
                    Retour
                </a>
            </div>
        </div>
    </div>
</div> --}}


<!-- Formateur Section -->
{{-- <div class="container mx-auto px-4 mt-10">
    <h2 class="text-3xl font-semibold mb-6">About the Instructor</h2>
    @if ($formation->user)
        <div class="bg-white rounded-lg shadow-lg p-8 flex items-start">
            <img src="{{ asset('imgs/' . $formation->user->image) }}" alt="Instructor Photo" class="w-20 h-20 rounded-full mr-4">
            <div>
                <h3 class="text-2xl font-bold text-gray-900">{{ $formation->user->name }}</h3>
                <p class="text-gray-600">{{ $formation->user->About }}</p>
                <p class="text-gray-600 mt-2"><strong>Email:</strong> {{ $formation->user->email }}</p>
                <p class="text-gray-600 mt-2"><strong>Date de Naissance:</strong> {{ $formation->user->date_naissance }}</p>
                <p class="text-gray-600 mt-2"><strong>Nationalité:</strong> {{ $formation->user->nationality }}</p>
                <p class="text-gray-600 mt-2"><strong>Université:</strong> {{ $formation->user->university }}</p>

                <!-- Diplomas Section -->
                <div class="mt-4">
                    <h4 class="text-xl font-semibold text-gray-800">Diplomas</h4>
                    @if($formation->user->diplomas->isEmpty())
                        <p class="text-lg text-gray-600">No diplomas available.</p>
                    @else
                        <ul class="list-disc pl-5">
                            @foreach($formation->user->diplomas as $diploma)
                                <li class="text-lg text-gray-800">
                                    <strong>{{ $diploma->diploma }}</strong>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    @else
        <div class="bg-white rounded-lg shadow-lg p-8">
            <p class="text-xl text-gray-600">Information about the instructor is not available.</p>
        </div>
    @endif
</div> --}}

{{-- <div class="container mx-auto px-4 mt-10">
    <h2 class="text-3xl font-semibold mb-6">Reviews</h2>
    <div class="flex flex-wrap -mx-2">
        
    </div>
</div> --}}
@endsection