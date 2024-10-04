@extends('Main/Main')
@section('title', 'Courses')
@section('content')
<div class="flex justify-center lg:justify-between items-start ">
    @include('FilterC.FilterC')
    <div class="w-10/12 flex flex-col items-center justify-start mt-56">
        <div class="w-full flex justify-center mb-28">
            <h1 class="text-5xl font-semibold">All courses</h1>
        </div>

        <div class="block w-full flex justify-end mb-10 absolute top-80 right-0 lg:hidden">
            <div class="text-center mx-10 text-xs">
                <div class=" text-left">
                  <button
                    id="dropdownButton3"
                    class="bg-primary text-xl flex items-center rounded-[5px] px-4 py-3 font-medium text-black ring ring-gray-600 focus:ring-purple-400 focus:text-purple-600"
                  >
                    
                    
                        <i class="fa-solid fa-filter"></i>
                      
                    
                  </button>
                  <div
                    id="dropdownMenu3"
                    class="shadow-md absolute z-40  right-9 w-64 rounded-md bg-white dark:bg-dark-2 py-4 px-10 transition-all top-20 mt-5 invisible opacity-0"
                  >
                  <div class="w-full border-b-2 pb-3">
                    <form action="{{ route('minmax') }}" method="GET">
                        <div>
                            <h1 class="font-semibold text-lg">Pricing (DH)</h1>
                        </div>
                        <div class="flex justify-between items-center my-5 w-full">
                            <div class="mr-2">
                                <p class="font-semibold text-md">Min</p>
                                <input type="number"  min="1" max="3000" name="min" class="bg-gray-300 py-2 rounded-md w-20 text-center">
                            </div>
                            <div class="ml-2">
                                <p class="font-semibold text-md">Max</p>
                                <input type="number"   min="1" max="2999" name='max' class="bg-gray-300 py-2 rounded-md w-20 text-center">
                            </div>
                        </div>
                        <div class="item-center ">
                            <button type="submit" class="bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 h-10 w-full rounded-md text-white font-bold shadow-lg transition-all duration-300 ease-in-out">
                                Filtrer par prix
                            </button>
                            
                        </div>
                    </form>
                </div>
                      
                <div class="w-full mt-3 border-b-2 pb-3">
                    <div>
                        <h1 class="font-semibold text-lg">Level</h1>
                    </div>
                    <div class="mt-5">
                        <div class="flex text-md items-center space-y-4 w-full">
                            <form id="levelForm" action="/filtrerniveau" method="GET" class="w-full">
                                <select id="level" name="niveau" required class="p-2 w-full border border-purple-600 rounded-md focus:outline-purple-600 focus:ring focus:ring-indigo-200">
                                    <option class="hover:bg-purple-600 hover:text-white"value="" class="text-gray-400">Filtrer par niveau</option>
                                    <option class="hover:bg-purple-600 hover:text-white"value="beginner">Beginner</option>
                                    <option class="hover:bg-purple-600 hover:text-white"value="junior">Junior</option>
                                    <option class="hover:bg-purple-600 hover:text-white"value="intermediate">Intermediate</option>
                                    <option class="hover:bg-purple-600 hover:text-white"value="senior">Senior</option>
                                    <option class="hover:bg-purple-600 hover:text-white"value="expert">Expert</option>
                                </select>
                            </form>
                        </div> 
                        
                    </div>
                </div>
                <div class="w-full mt-3 border-b-2 pb-3">
                    <div>
                        <h1 class="font-semibold text-lg">Language</h1>
                    </div>
                    <div class="mt-5">
                        
                        <div class="flex text-md items-center mt-4 space-y-4 w-full">    
                            <form id="langueForm" action="/filtrerLangue" method="GET" class="w-full">
                                <select id="langue" name="langue" required class="p-2 w-full border border-purple-600 rounded-md focus:outline-purple-600 focus:ring focus:ring-indigo-200">
                                    <option class="hover:bg-purple-600 hover:text-white"value="" class="text-gray-400">Language</option>
                                    <option class="hover:bg-purple-600 hover:text-white"value="arabe">Arabe</option>
                                    <option class="hover:bg-purple-600 hover:text-white"value="anglais">Anglais</option>
                                    <option class="hover:bg-purple-600 hover:text-white"value="espagnole">Espagnole</option>
                                    <option class="hover:bg-purple-600 hover:text-white"value="francais">Francais</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-3 border-b-2 pb-3">
                    <div>
                        <h1 class="font-semibold text-lg">Rating</h1>
                    </div>
                    <form method="GET" action="{{ route('filterRating') }}">
                        @csrf
                    
                        <div id="stars" class="flex items-center space-x-1 mt-3 ml-5">
                            <button type="submit"><span onclick="setRating(1)" class="star cursor-pointer text-3xl">★</span></button>
                            <button type="submit"><span onclick="setRating(2)" class="star cursor-pointer text-3xl">★</span></button>
                            <button type="submit"><span onclick="setRating(3)" class="star cursor-pointer text-3xl">★</span></button>
                            <button type="submit"><span onclick="setRating(4)" class="star cursor-pointer text-3xl">★</span></button>
                            <button type="submit"><span onclick="setRating(5)" class="star cursor-pointer text-3xl">★</span></button>
                            <input type="hidden" id="rating" name="rating" value="0">
                            <span id="output" class="hidden"></span>
                        </div>
                    </form>
                </div>

                <script>
                    document.getElementById('level').addEventListener('change', function() {
                        document.getElementById('levelForm').submit();
                    });
                    document.getElementById('langue').addEventListener('change', function() {
                        document.getElementById('langueForm').submit();
                    });
                </script>
                <div class="w-full mt-3">
                    <div>
                        <h1 class="font-semibold text-lg">Sorted by</h1>
                    </div>
                    <div class="mt-5">
                        <div class="flex text-md items-center">
                            <h3><a href="/populairecourses" class="text-purple-600 hover:text-purple-700 font-meduim text-md">Populaire cours</a></h3>
                        </div>
                        <div class="flex text-md items-center mt-4">
                            <h3><a href="/newestcourses" class="text-purple-600 hover:text-purple-700 font-meduim text-md">Newest Cours</a></h3>
                        </div>
                    </div>
                </div>
                  </div>
                </div>
              </div>
            
            
            
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-x-7 gap-y-10">
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
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
      const dropdownButton = document.getElementById('dropdownButton3');
      const dropdownMenu = document.getElementById('dropdownMenu3');
  
      dropdownButton.addEventListener('click', function () {
        const isVisible = dropdownMenu.classList.contains('visible');
        if (isVisible) {
          dropdownMenu.classList.add('top-[110%]', 'invisible', 'opacity-0');
          dropdownMenu.classList.remove('top-full', 'visible', 'opacity-100');
        } else {
          dropdownMenu.classList.add('top-full', 'visible', 'opacity-100');
          dropdownMenu.classList.remove('top-[110%]', 'invisible', 'opacity-0');
        }
      });
  
      document.addEventListener('click', function (event) {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
          dropdownMenu.classList.add('top-[110%]', 'invisible', 'opacity-0');
          dropdownMenu.classList.remove('top-full', 'visible', 'opacity-100');
        }
      });
    });
  </script>

<script>
    document.getElementById('level').addEventListener('change', function() {
        document.getElementById('levelForm').submit();
    });
    document.getElementById('langue').addEventListener('change', function() {
        document.getElementById('langueForm').submit();
    });
</script>

<script>
    // Function to handle star rating
    function setRating(n) {
        removeStars();
        for (let i = 0; i < n; i++) {
            document.getElementsByClassName('star')[i].style.color = '#FFD700'; // gold color
        }
        const output = document.getElementById('output');
        output.innerText = "Rating is: " + n + "/5";
        document.getElementById('rating').value = n;

        // Store the selected rating in localStorage
        localStorage.setItem('selectedRating', n);
    }

    function removeStars() {
        let stars = document.getElementsByClassName('star');
        for (let i = 0; i < stars.length; i++) {
            stars[i].style.color = 'black'; // reset color
        }
    }

    // Check if a rating was previously selected and set it accordingly
    window.onload = function () {
        const selectedRating = localStorage.getItem('selectedRating');
        if (selectedRating) {
            setRating(selectedRating);
        }
    };
</script>

@endsection