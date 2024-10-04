<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="bg-black px-5 py-10 md:px-20 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-7 gap-4 border-b-2 py-5 border-gray-600 items-start justify-between w-full">
            <div class=" w-auto">
                <img src="{{ asset('Assets/Images/Image 75.png') }}" alt="" class="w-auto">
            </div>
            <div class="">
                <h2 class="text-md md:text-xl font-semibold text-white mb-3">Support</h2>
                <ul class="text-white">
                    <li class="hover:text-purple-600 transition duration-200 ease-in-out mb-2"><a href="">Support</a></li>
                    <li class="hover:text-purple-600 transition duration-200 ease-in-out mb-2"><a href="">Pricing</a></li>
                </ul>
            </div>
            <div class="">
                <h2 class="text-md md:text-xl font-semibold text-white mb-3">Quick Links</h2>
                <ul class="text-white">
                    <li class="hover:text-purple-600 transition duration-200 ease-in-out mb-2"><a href="">Home</a></li>
                    <li class="hover:text-purple-600 transition duration-200 ease-in-out mb-2"><a href="">Courses</a></li>
                    <li class="hover:text-purple-600 transition duration-200 ease-in-out mb-2"><a href="/Contact">Contact Us</a></li>
                </ul>
            </div>
            <div class="">
                <h2 class="text-md md:text-xl font-semibold text-white mb-3">Company</h2>
                <ul class="text-white">
                    <li class="hover:text-purple-600 transition duration-200 ease-in-out mb-2"><a href="">About</a></li>
                    <li class="hover:text-purple-600 transition duration-200 ease-in-out mb-2"><a href="">Join us</a></li>
                </ul>
            </div>
            <div class="flex flex-col w-full">
                <div>
                    <h2 class="text-md md:text-xl font-semibold text-purple-700 mb-3 text-nowrap">Subscribe to our newsletter</h2>
                    <p class="text-white mb-3">For product announcements and exclusive insights</p>
                </div>
                <div class="flex justify-start w-full">
                    <input type="email" class="py-2 md:px-6 rounded-sm outline-purple-400 bg-gray-900 text-white px-1" placeholder="Input your email">
                    <button class=" md:mt-0 py-2 md:px-6 bg-purple-700 mx-1 rounded-sm text-white px-1">Subscribe</button>
                </div>
            </div>
        </div>
        <div class="flex justify-end items-center w-full text-white mt-5">
            <a href="#" class="mr-3"><i class="fab fa-twitter text-2xl md:text-3xl"></i></a>
            <a href="#" class="mr-3"><i class="fab fa-facebook text-2xl md:text-3xl"></i></a>
            <a href="#" class="mr-3"><i class="fab fa-linkedin text-2xl md:text-3xl"></i></a>
            <a href="#" class="mr-3"><i class="fab fa-youtube text-2xl md:text-3xl"></i></a>
        </div>
    </div>
    
</body>
</html>