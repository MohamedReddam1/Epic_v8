@include('Navbar2/Navbar2')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Wishlist</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        *{
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>
<body>
    @if($mywishlist->isEmpty())
    <div class="w-full p-20 py-40 text-center">
        <p class="text-2xl lg:text-4xl font-semibold text-center mb-10 mt-10 ">Your wishlist is empty.</p>
        <a href="/courses" class="px-7 py-2 text-lg lg:py-4 lg:px-14 bg-purple-600 font-semibold text-white lg:text-xl text-nowrap">Browse now</a>
    </div>
    @else
    
    <div class=" mt-44 px-20 mb-20">
        <div>
            <h1 class="font-semibold text-5xl">My Wishlist</h1>
        </div>
        <div class="flex justify-center">
            <div class="w-10/12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mt-10 justify-center items-center gap-10">
                @foreach($mywishlist as $item)
                            <div class="bg-white rounded-lg shadow-md mt-3">
                                <img src="{{ $item->image }}" alt="{{ $item->titre }}" class="w-full h-44 object-cover rounded-t-lg">
                                <div class="p-4">
                                    <p class="text-gray-500 mt-2">{{ $item->categorie }}</p>
                                    <h2 class="text-lg font-semibold">{{ $item->titre }}</h2>
                                    <div class="flex justify-between items-center">
                                        <p class="text-black font-semibold mt-2 text-xl">{{ $item->prix }} MAD</p>
                                        <form action="{{ route('wishlist.add') }}" method="POST" id="wishlistForm" class="flex items-center justify-center">
                                            @csrf
                                            <input type="hidden" name="formation_id" value="{{ $item['id'] }}">
                                            <button type="submit" id="heart{{$item['id']}}" onclick="toggleColor(this, {{$item['id']}})">
                                                <i class="fa-solid fa-heart text-2xl text-red-500 mt-3"></i>
                                            </button>
                                        </form>
                                    </div>
        
                                </div>
                            </div>
                        @endforeach
            </div>
        </div>
        
    </div>
    
    @endif
    @include('Footer/Footer')
</body>
</html>





