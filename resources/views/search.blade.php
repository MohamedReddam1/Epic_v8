

@extends('Main/Main')
@section('title', 'Courses')
@section('content')
<div class="flex justify-between items-start w-full ">
    @include('FilterC.FilterC')
    <div class="w-full flex flex-col items-center justify-start mt-56">
        <div class="w-full flex justify-center mb-28">
            <h1 class="text-5xl font-semibold ">Results of " {{ $query }} "</h1>
        </div>
        @if ($courses->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-7 gap-y-10 mt-16 w-11/12">
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
        @else
            <p>No courses found.</p>
        @endif
    </div>
</div>
{{-- <div class="container mx-auto px-4 mt-20 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
    @foreach ($courses as $item)
    <div class="bg-white rounded-lg shadow-md p-4">
        <h2 class="text-lg font-semibold mb-2">{{$item['titre']}}</h2>
        <p class="text-gray-600 mb-2">{{$item['description']}}</p>
        <p class="text-gray-700 mb-2">Category: {{$item['categorie']}}</p>
        <video src="{{$item['content']}}" class="w-full mb-2" controls></video>
        <div class="flex justify-between items-center">
            <p class="text-base font-semibold">{{$item['prix']}} DH</p>
            <div>
                <a href="#" class="bg-gray-200 hover:bg-gray-300 text-gray-800 py-2 px-4 rounded-md mr-2 inline-block">Add to Cart</a>
                <a href="#" class="text-indigo-600 hover:text-indigo-800">Details</a>
            </div>
        </div>
    </div>
    @endforeach
</div> --}}
@endsection



{{-- @extends('Master/Master')
@section('title','Resulats de recherche')
@section('content')
<!-- In your courses.search view file -->
@if ($courses->count() > 0)
<div class="container mx-auto px-4 mt-20 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
    @foreach ($courses as $item)
    <div class="bg-white rounded-lg shadow-md p-4">
        <h2 class="text-lg font-semibold mb-2">{{$item['titre']}}</h2>
        <p class="text-gray-600 mb-2">{{$item['description']}}</p>
        <p class="text-gray-700 mb-2">Category: {{$item['categorie']}}</p>
        <video src="{{$item['content']}}" class="w-full mb-2" controls></video>
        <div class="flex justify-between items-center">
            <p class="text-base font-semibold">{{$item['prix']}} DH</p>
            <div>
                <a href="#" class="bg-gray-200 hover:bg-gray-300 text-gray-800 py-2 px-4 rounded-md mr-2 inline-block">Add to Cart</a>
                <a href="#" class="text-indigo-600 hover:text-indigo-800">Details</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
    <p>No courses found.</p>
@endif

@endsection --}}