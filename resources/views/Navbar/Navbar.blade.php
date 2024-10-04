{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Add your CSS stylesheets or CDN links here -->
</head>
<body>
    <nav class="flex justify-between items-center shadow-md fixed top-0 w-full z-10 bg-white">
        <div class="ml-4 lg:ml-8">
            <img src="{{ asset('Assets/Images/EpicLogo.png') }}" alt="Logo" class="h-12 lg:h-16">
        </div>
        <div class="hidden lg:flex flex-grow justify-center">
            <!-- Display different links based on the user's role -->
            @if (Auth::check())
                @if(Auth::user()->role === 'ADMIN')
                    <a href="{{route('dashboard')}}" class="mx-4 text-gray-600 hover:text-purple-600 duration-300 ease-in-out">Espace admin</a>
                @elseif(Auth::user()->role === 'FORMATEUR')
                    <a href="/" class="mx-4 text-gray-600 hover:text-purple-600 duration-300 ease-in-out">Home</a>
                    <a href="/About" class="mx-4 text-gray-600 hover:text-purple-600 duration-300 ease-in-out">About Us</a>
                    <a href="/Contact" class="mx-4 text-gray-600 hover:text-purple-600 duration-300 ease-in-out">Contact Us</a>
                    <a href="{{route('formateur')}}" class="mx-4 text-gray-600 hover:text-purple-600 duration-300 ease-in-out">Espace formateur</a>
                    <a href="{{route('wishelist')}}" class="mx-4 text-gray-600 hover:text-purple-600 duration-300 ease-in-out">My Wishlist</a>
                @endif
            @else
                <a href="/" class="mx-4 text-gray-600 hover:text-purple-600 duration-300 ease-in-out">Home</a>
                <a href="/About" class="mx-4 text-gray-600 hover:text-purple-600 duration-300 ease-in-out">About Us</a>
                <a href="/Contact" class="mx-4 text-gray-600 hover:text-purple-600 duration-300 ease-in-out">Contact Us</a>
            @endif
        </div>
        <div class="hidden lg:flex mr-7">
            <!-- Check if user is authenticated -->
            @auth
                <!-- If authenticated, show "Logout" link -->
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="py-2 px-6 bg-purple-600 text-white font-semibold rounded-md hover:bg-purple-700 duration-300 ease-in-out">Logout</a>
                <!-- Logout form -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <!-- If not authenticated, show "Get Started" link -->
                <a href="{{ route('loginform') }}" class="py-2 px-6 bg-purple-600 text-white font-semibold rounded-md hover:bg-purple-700 duration-300 ease-in-out">Get Started</a>
            @endauth
        </div>

        <button id="menu-toggle" class="lg:hidden focus:outline-none mr-4">
            <i class="fa-solid fa-bars text-xl"></i>
        </button>
    </nav>

    <!-- Mobile menu (hidden by default) -->
    <div id="mobile-menu" class="hidden">
        <!-- Display different links based on the user's role -->
        @if (Auth::check())
            @if(Auth::user()->role === 'ADMIN')
                <a href="{{route('dashboard')}}" class="block py-2 px-4 text-gray-600 hover:text-purple-600 duration-300 ease-in-out">Espace admin</a>
            @elseif(Auth::user()->role === 'FORMATEUR')
                <a href="/" class="block py-2 px-4 text-gray-600 hover:text-purple-600 duration-300 ease-in-out">Home</a>
                <a href="/About" class="block py-2 px-4 text-gray-600 hover:text-purple-600 duration-300 ease-in-out">About Us</a>
                <a href="/Contact" class="block py-2 px-4 text-gray-600 hover:text-purple-600 duration-300 ease-in-out">Contact Us</a>
                <a href="{{route('formateur')}}" class="block py-2 px-4 text-gray-600 hover:text-purple-600 duration-300 ease-in-out">Espace formateur</a>
                <a href="{{route('wishelist')}}" class="block py-2 px-4 text-gray-600 hover:text-purple-600 duration-300 ease-in-out">My Wishlist</a>
            @endif
        @else
            <a href="/" class="block py-2 px-4 text-gray-600 hover:text-purple-600 duration-300 ease-in-out">Home</a>
            <a href="/About" class="block py-2 px-4 text-gray-600 hover:text-purple-600 duration-300 ease-in-out">About Us</a>
            <a href="/Contact" class="block py-2 px-4 text-gray-600 hover:text-purple-600 duration-300 ease-in-out">Contact Us</a>
        @endif

        @auth
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();" class="block py-2 px-4 bg-purple-600 text-white font-semibold rounded-md hover:bg-purple-700 duration-300 ease-in-out">Logout</a>
            <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <a href="{{ route('loginform') }}" class="block py-2 px-4 bg-purple-600 text-white font-semibold rounded-md hover:bg-purple-700 duration-300 ease-in-out">Get Started</a>
        @endauth
    </div>

    <!-- JavaScript code to toggle mobile menu -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const menuToggle = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');

            menuToggle.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html> --}}








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles for the sliding navbar */
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
        .mobile-menu.show {
            transform: translateX(0);
        }
        .badge {
            position: absolute;
            top: -5px;
            left: 15px;
            background-color: rgb(167 139 250); /* Adjust this to match the secondary color in your design */
            color: #000; /* Text color */
            height: 20px;
            min-width: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 5px;
            font-size: 0.75rem; /* Adjust as needed */
            line-height: 1;
        }
    </style>
</head>
<body class="">
    <nav class="bg-white shadow-md fixed top-0 w-full z-50">
        <div class="w-full mx-auto px-4 sm:px-6 w-full bg-white">
            <div class="flex justify-between h-16 items-center w-full">
                <div class="flex items-center justify-between w-full">
                    <div class="">
                      <img src="{{ asset('Assets/Images/EpicLogo.png') }}" alt="Logo" class="h-12 w-24 lg:w-32 xl:w-24">
                    </div>
                    <div class="hidden lg:flex md:space-x-8 ml-10 items-center">
                      <a href="/home" class=" text-gray-700 font-semibold mr-3 hover:text-purple-600 duration-200 ease-in-out text-sm xl:text-md">Home</a>
                      <a href="/mycourses" class=" text-gray-700 font-semibold mr-3 hover:text-purple-600 duration-200 ease-in-out text-sm xl:text-md text-nowrap">About us</a>
                      <a href="/courses" class=" text-gray-700 font-semibold mr-3 hover:text-purple-600 duration-200 ease-in-out text-sm xl:text-md">Contact us</a>
                    </div>

                    <div class="hidden lg:block">
                        <a href="{{ route('loginform') }}" class="py-3 px-6 bg-purple-600 rounded-lg font-semibold hover:bg-purple-800 duration-200 ease-in-out text-white ">get started</a>
                    </div>

                    <div class="flex items-center lg:hidden">
                        <button id="mobile-menu-button" class="text-gray-900 hover:text-gray-700 focus:outline-none">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                        </button>
                      </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="lg:hidden fixed top-0 inset-0 bg-white z-50 p-4 mobile-menu">
            <div class="flex justify-between items-center mb-10">
                <div class="">
                  <img src="{{ asset('Assets/Images/EpicLogo.png') }}" alt="Logo" class="h-12 lg:h-16">
                </div>
                <button id="mobile-menu-close" class="text-gray-900 hover:text-gray-700 focus:outline-none">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <a href="/home" class=" px-4 py-2 text-gray-700 hover:bg-gray-100 flex justify-start items-center rounded-md font-meduim "><i class="fa-solid fa-house mr-3"></i>Home</a>
            <a href="/courses" class=" px-4 py-2 text-gray-700 hover:bg-gray-100 flex justify-start items-center rounded-md font-meduim "><i class="fa-regular fa-building mr-3"></i>>About us</a>
            <a href="#" class=" px-4 py-2 text-gray-700 hover:bg-gray-100 flex justify-start items-center rounded-md font-meduim "><i class="fa-solid fa-paper-plane mr-3"></i>Contact us</a>
            <a href="{{ route('wishelist') }}" class=" px-4 py-2 hover:bg-purple-800 flex justify-start items-center rounded-md font-meduim w-full bg-purple-600 text-white">Get started</a>
            
            
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuClose = document.getElementById('mobile-menu-close');

            mobileMenuButton.addEventListener('click', function () {
                mobileMenu.classList.add('show');
            });

            mobileMenuClose.addEventListener('click', function () {
                mobileMenu.classList.remove('show');
            });

            // Close the mobile menu if clicked outside
            document.addEventListener('click', function (event) {
                if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
                    mobileMenu.classList.remove('show');
                }
            });
        });
    </script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownMenu = document.getElementById('dropdownMenu');
    const dropdownIcon = document.getElementById('dropdownIcon');

    dropdownButton.addEventListener('click', function () {
      dropdownMenu.classList.toggle('hidden');
      dropdownIcon.classList.toggle('-scale-y-100');
    });

    document.addEventListener('click', function (event) {
      if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
        dropdownMenu.classList.add('hidden');
        dropdownIcon.classList.remove('-scale-y-100');
      }
    });
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const dropdownButton = document.getElementById('dropdownButton1');
    const dropdownMenu = document.getElementById('dropdownMenu1');

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

</body>
</html>
