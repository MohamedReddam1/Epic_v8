@extends('Master/Master')
@section('title','home')
@section('content')
    <div class="w-full">
        <div class="w-full bg-gray-100 grid grid-cols-1 md:grid-cols-2 justify-between items-center p-6 md:p-10 mt-14 z-0">
            <div class="flex flex-col items-start justify-between p-4 md:p-7">
                <h1 class="text-4xl md:text-6xl text-wrap font-bold">Epic : Ignite Your</h1>
                <h1 class="text-4xl md:text-6xl text-wrap font-bold mt-2 md:mt-5">Potential</h1>
                <p class="text-lg md:text-xl mt-2 md:mt-5">Unlock limitless knowledge with Epic, your </p>
                <p class="text-lg md:text-xl mt-2">gateway to success.</p>
                <button class="py-2 md:py-3 px-12 md:px-20 bg-purple-600 text-white rounded-md mt-4 md:mt-5 hover:bg-purple-700 hover:scale-105 ease-in-out duration-500">Join us</button>
            </div>
            <div class="flex justify-center md:justify-end">
                <img src="{{ asset('Assets/Images/HomeImg.png') }}" alt="Home Image" class="max-w-full md:max-h-full">
            </div>
        </div>

        <div class="w-full bg-white flex flex-col justify-between items-center mt-10 px-5">
            <div class="bg-blue-50 grid grid-cols-1 md:grid-cols-2 justify-between items-center rounded-lg w-full md:w-10/12 px-4 md:px-8 lg:px-36 py-6 md:py-10 mt-6 md:mt-10">
                <div class="w-full relative right-0 lg:right-24">
                    <p class="text-lg text-blue-800 font-bold">Popular courses</p>
                    <h1 class="text-2xl md:text-4xl font-bold mt-2">Paris secrets</h1>
                    <p class="text-base md:text-lg mt-2 text-gray-600 mb-5">Sint occaecat deserunt aliquip do occaecat ut quis. Cupidatat magna fugiat quis sit duis est in volup</p>
                    <a href="#" class=" md:mt-10 text-base md:text-lg text-blue-600 hover:underline">View project </a>
                </div>
                <div class=" justify-center items-center flex md:w-auto mt-4 md:mt-0 p-10 w-full">
                    <img src="{{ asset('Assets/Images/Image 14.png') }}" alt="" class="mx-3 mb-3 md:mb-0 hidden xl:block">
                    <img src="{{ asset('Assets/Images/Image 12.png') }}" alt="" class="mx-3 mb-3 md:mb-0 hidden lg:block">
                    <img src="{{ asset('Assets/Images/Image 13.png') }}" alt="" class="mx-3 mb-3 md:mb-0 hidden md:block">
                </div>
            </div>
            <div class="bg-purple-50 grid grid-cols-1 md:grid-cols-2 justify-between items-center rounded-lg w-full md:w-10/12 px-4 md:px-8 lg:px-36 py-6 md:py-10 mt-6 md:mt-10">
                <div class="w-full relative right-0 lg:right-24">
                    <p class="text-lg text-blue-800 font-bold">Portrait</p>
                    <h1 class="text-2xl md:text-4xl font-bold mt-2">Oceanic feeling</h1>
                    <p class="text-base md:text-lg mt-2 text-gray-600 mb-5">Sint occaecat deserunt aliquip do occaecat ut quis. Cupidatat magna fugiat quis sit duis est in volup</p>
                    <a href="#" class="mt-4 md:mt-10 text-base md:text-lg text-blue-600 hover:underline">View project </a>
                </div>
                <div class="flex justify-center items-center md:w-auto mt-4 md:mt-0">
                    <img src="{{ asset('Assets/Images/Image 10.png') }}" alt="" class="mx-3 mb-3 md:mb-0 hidden lg:block">
                    <img src="{{ asset('Assets/Images/Image 11.png') }}" alt="" class="mx-3 mb-3 md:mb-0 hidden xl:block">

                </div>
            </div>
        </div>







<div class=" px-4 mt-20 grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 xl:grid-cols-4 gap-4">
    @foreach($courses as $item)
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
                        <button type="submit" id="heart{{$item['id']}}" onclick="toggleColor(this, {{$item['id']}})" class="py-2 px-3 bg-red-200 text-red-600 rounded-md hover:bg-red-600 hover:text-white duration-200 ease-in-out mt-4">
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








        <div class="flex flex-col justify-center items-center">
            <div>
                <h1 class="text-4xl font-bold mt-10 md:mt-20 text-center">Reviews of ours learners</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 justify-center items-center w-full p-5 md:p-20">
                <div class="p-5 border border-gray-500 rounded-md">
                    <div class="flex justify-start items-center">
                        <img src="{{ asset('Assets/Images/Avatar 18.png') }}" alt="" class="w-10 h-10 rounded-full">
                        <h6 class="mx-3 font-semibold">Mohamed Reddam</h6>
                    </div>
                    <div class="mt-5 md:mt-10">
                        <p class="text-sm md:text-base">
                            Overall, this course is ideal for beginners looking to build a strong foundation in digital marketing. It equips learners with the skills needed to create effective marketing campaigns and measure their success, making it a valuable resource for anyone aiming to excel in the digital marketing landscape.
                        </p>
                    </div>
                </div>
                <div class="p-5 border border-gray-500 rounded-md">
                    <div class="flex justify-start items-center">
                        <img src="{{ asset('Assets/Images/Avatar 18.png') }}" alt="" class="w-10 h-10 rounded-full">
                        <h6 class="mx-3 font-semibold">Youssef Boughanem</h6>
                    </div>
                    <div class="mt-5 md:mt-10">
                        <p class="text-sm md:text-base">
                            The "Laravel Essentials" course is a comprehensive and well-structured introduction to the Laravel framework. Designed for both beginners and those with some experience in PHP, this course covers the fundamentals of Laravel, including routing, controllers, views, and Eloquent ORM.
                        </p>
                    </div>
                </div>
                <div class="p-5 border border-gray-500 rounded-md">
                    <div class="flex justify-start items-center">
                        <img src="{{ asset('Assets/Images/Avatar 18.png') }}" alt="" class="w-10 h-10 rounded-full">
                        <h6 class="mx-3 font-semibold">Mohamed M'rini</h6>
                    </div>
                    <div class="mt-5 md:mt-10">
                        <p class="text-sm md:text-base">
                            The "React for Beginners" course is an outstanding introduction to one of the most popular JavaScript libraries for building user interfaces. Aimed at developers new to React, this course covers the core concepts such as components, state, props, and lifecycle methods.
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div class="bg-purple-100 grid grid-cols-1 md:grid-cols-2 p-5 md:p-20 justify-center items-center p-10">
            <div class="md:mr-20 felx justify-center ml-8 mb-3 md:mb-0">
                <img src="{{ asset('Assets/Images/Image 74.png') }}" alt="">
            </div>
            <div class="text-center mt-5 md:mt-0">
                <h1 class="text-4xl font-bold">Become an instructor</h1>
                <p class="mt-5 md:mt-10 text-xl">Consequat incididunt reprehenderit velit veniam sint dolor minim sit minim amet consectetur deserunt ea do velit ut deserunt. Reprehenderit eiusmod minim excepteur</p>
                <button class="w-full py-3 px-7 text-center text-white bg-purple-600 mt-5">Start now</button>
            </div>
        </div>
    </div>
@endsection

{{-- 
<script>
    function toggleClass(button) {
        if (button.classList.contains('trueE')) {
            button.classList.remove('trueE');
            button.classList.add('falseE');
        } else {
            button.classList.remove('falseE');
            button.classList.add('trueE');
        }

    }
    </script> --}}
    



<script>
function toggleColor(button, formationId) {
    if (button.dataset.clicked === "true") {
        button.style.backgroundColor = '';
        button.dataset.clicked = "false";

        // Submit the form via AJAX to remove the formation from wishlist
        const form = document.getElementById('wishlistForm');
        const formData = new FormData(form);
        formData.append('formation_id', formationId); // Add formation_id to the form data

        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.error('Error:', error));
    } else {
        button.style.backgroundColor = 'red';
        button.dataset.clicked = "true";

        // Submit the form via AJAX to add the formation to wishlist
        const form = document.getElementById('wishlistForm');
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.error('Error:', error));
    }
}



 </script>
