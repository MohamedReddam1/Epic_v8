@extends('Main/Main')

@section('title', 'Shopping Cart')

@section('content')
<div class="container mx-auto px-4 mt-32 mb-44">
    <h1 class="text-3xl font-semibold mb-8">Shopping Cart</h1>

    @if(session('cart'))
    <div class="grid grid-cols-1 gap-8 px-0 md:px-10 lg:px-28">
        @foreach(session('cart') as $id => $item)
        <div class="bg-white rounded-lg shadow-md border border-gray-200 hover:shadow-lg duration-200 ease-in-out">
            <div class="grid grid-cols-1 lg:grid-cols-3 p-0 pb-3 lg:p-4">
                <div class=" lg:w-96 lg:h-54 bg-gray-200 rounded-lg overflow-hidden">
                    <img src="{{ asset('F_images/'. $item['image']) ?? 'default-image.jpg' }}" alt="{{ $item['titre'] }}" class="object-cover w-full h-full">
                </div>
                <div class="w-full mt-3 lg:mt-0 ml-4 lg:ml-44 xl:ml-20 flex-grow">
                    <h2 class="text-lg font-semibold mb-2">{{ $item['titre'] }}</h2>
                    <p class="text-gray-600 mb-2">Price: {{ $item['prix'] }} DH</p>
                </div>
                <div class="flex flex-row-reverse justify-between lg:justify-start">
                    <div class="flex justify-end items-center lg:items-start">
                        <form action="{{ route('wishlist.destroy') }}" method="post" class="inline">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $id }}">
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-xs p-1 px-2 rounded-full mr-2"><i class="fa-solid fa-xmark"></i></button>
                        </form>
                    </div>
                    <div class="flex pl-3 lg:pl-0 lg:justify-end lg:items-end lg:h-full lg:-mt-5">
                        <form action="{{ route('session', ['id_formation' => $id, 'prix' => $item['prix']]) }}" method="post">
                            @csrf
                            <input type='hidden' name="id_formation" value="{{ $id }}">
                            <input type='hidden' name="prix" value="{{ $item['prix'] }}">
                            <input type='hidden' name="total" value="{{ $item['prix'] }}">
                            <input type='hidden' name="productname" value="{{ $item['titre'] }}">
                            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md mr-3  text-lg">Checkout</button>
                        </form>
                        <form action="{{ route('wishlist.add') }}" method="POST" id="wishlistForm" class="flex items-center justify-center">
                            @csrf
                            <input type="hidden" name="formation_id" value="{{ $id }}">
                            <button type="submit" id="heart{{$id}}" onclick="toggleColor(this, {{$id}})" class="py-2 px-3 bg-red-200 text-red-600 rounded-md hover:bg-red-600 hover:text-white duration-200 ease-in-out">
                                <i class="fa-regular fa-heart text-2xl"></i>
                            </button>
                        </form>
                    </div>
                    
                    
                </div>
            </div>
            
        </div>
        @endforeach
    </div>
    @else
    <div class="w-full p-20 text-center">
        <p class="text-2xl lg:text-4xl font-semibold text-center mb-10 mt-10 ">Your cart is empty.</p>
        <a href="/courses" class="px-7 py-2 text-lg lg:py-4 lg:px-14 bg-purple-600 font-semibold text-white lg:text-xl text-nowrap">Browse now</a>
    </div>
    @endif
</div>
@include('Footer/Footer')
@endsection
