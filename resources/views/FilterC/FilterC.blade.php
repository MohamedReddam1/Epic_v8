<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    
</head>
<body>
    <div class="hidden lg:block w-[300px]  flex-col items-center justify-between relative top-44 lg:ml-10 xl:ml-16 border border-1 border-gray-200 rounded-lg shadow-md py-10 px-5">
        <div class="w-full border-b-2 pb-7">
            <form action="{{ route('minmax') }}" method="GET">
                <div>
                    <h1 class="font-semibold text-xl">Pricing (DH)</h1>
                </div>
                <div class="flex justify-between items-center my-5">
                    <div class="mr-2">
                        <p class="font-semibold text-md">Min</p>
                        <input type="number"  min="1" max="3000" name="min" class="bg-gray-300 py-2 rounded-md w-24 text-center">
                    </div>
                    <div class="ml-2">
                        <p class="font-semibold text-md">Max</p>
                        <input type="number"   min="1" max="2999" name='max' class="bg-gray-300 py-2 rounded-md w-24 text-center">
                    </div>
                </div>
                <div class="item-center ">
                    <button type="submit" class="bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 h-10 w-full rounded-md text-white font-bold shadow-lg transition-all duration-300 ease-in-out">
                        Filtrer par prix
                    </button>
                    
                </div>
            </form>
        </div>
        <div class="w-full mt-10 border-b-2 pb-7">
            <div>
                <h1 class="font-semibold text-xl">Level</h1>
            </div>
            <div class="mt-5">
                <div class="flex text-lg items-center space-y-4 w-full">
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

        <div class="w-full mt-10 border-b-2 pb-7">
            <div>
                <h1 class="font-semibold text-xl">Language</h1>
            </div>
            <div class="mt-5">
                
                <div class="flex text-lg items-center mt-4 space-y-4 w-full">    
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

        <div class="w-full mt-10 border-b-2 pb-7">
            <div>
                <h1 class="font-semibold text-xl">Rating</h1>
            </div>
            <form method="GET" action="{{ route('filterRating') }}">
                @csrf
            
                <div id="stars" class="flex items-center space-x-1 mt-9 ml-5">
                    <button type="submit"><span onclick="setRating(1)" class="star cursor-pointer text-3xl text-gray-500"><i class="fa-solid fa-star"></i></span></button>
                    <button type="submit"><span onclick="setRating(2)" class="star cursor-pointer text-3xl text-gray-500"><i class="fa-solid fa-star"></i></span></button>
                    <button type="submit"><span onclick="setRating(3)" class="star cursor-pointer text-3xl text-gray-500"><i class="fa-solid fa-star"></i></span></button>
                    <button type="submit"><span onclick="setRating(4)" class="star cursor-pointer text-3xl text-gray-500"><i class="fa-solid fa-star"></i></span></button>
                    <button type="submit"><span onclick="setRating(5)" class="star cursor-pointer text-3xl text-gray-500"><i class="fa-solid fa-star"></i></span></button>
                    {{-- <span onclick="setRating(1)" class="star cursor-pointer text-4xl">★</span>
                    <span onclick="setRating(2)" class="star cursor-pointer text-4xl">★</span>
                    <span onclick="setRating(3)" class="star cursor-pointer text-4xl">★</span>
                    <span onclick="setRating(4)" class="star cursor-pointer text-4xl">★</span>
                    <span onclick="setRating(5)" class="star cursor-pointer text-4xl">★</span> --}}
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
        <div class="w-full mt-10">
            <div>
                <h1 class="font-semibold text-xl">Sorted by</h1>
            </div>
            <div class="mt-5">
                <div class="flex text-lg items-center">
                    <h3><a href="/populairecourses" class="text-purple-600 hover:text-purple-700 font-meduim text-md">Populaire cours</a></h3>
                </div>
                <div class="flex text-lg items-center mt-4">
                    <h3><a href="/newestcourses" class="text-purple-600 hover:text-purple-700 font-meduim text-md">Newest Cours</a></h3>
                </div>
            </div>
        </div>
        
    </div>


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
                stars[i].style.color = 'gray'; // reset color
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
    
</body>
</html>