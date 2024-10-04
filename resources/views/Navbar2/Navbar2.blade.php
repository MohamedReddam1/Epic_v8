


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
        <div class="w-full mx-auto px-4 sm:px-6 bg-white">
            <div class="flex justify-between h-16 items-center w-full">
              <div class="flex items-center justify-between w-full">
                <div class="">
                  <img src="{{ asset('Assets/Images/EpicLogo.png') }}" alt="Logo" class="h-12 w-24 lg:w-32 xl:w-24">
                </div>
                <div class="hidden lg:flex lg:justify-start md:space-x-8 items-center">
                  <a href="/home" class=" text-gray-700 font-semibold mr-3 hover:text-purple-600 duration-200 ease-in-out text-sm xl:text-md">Home</a>
                  <a href="/mycourses" class=" text-gray-700 font-semibold mr-3 hover:text-purple-600 duration-200 ease-in-out text-sm xl:text-md text-nowrap">My courses</a>
                  <a href="/courses" class=" text-gray-700 font-semibold mr-3 hover:text-purple-600 duration-200 ease-in-out text-sm xl:text-md">Courses</a>
      
                  
                    <div class=" text-left"> 
                        <button id="dropdownButton1" class="bg-primary flex items-center rounded-[5px] px-4 py-3 font-medium text-black ring ring-gray-600 focus:ring-purple-400"> 
                            Categories 
                            <span class="pl-4"> 
                                <i class="fa-solid fa-chevron-down"></i> 
                            </span> 
                        </button> 
                        <div id="dropdownMenu1" class="shadow-md absolute z-40 mt-2 w-64 rounded-md bg-white dark:bg-dark-2 py-[10px] transition-all top-[110%] invisible opacity-0"> 
                          <a href="{{ route('coursesByCategories', 'developpement') }}" class="text-body-color dark:text-dark-6 hover:bg-[#F5F7FD] dark:hover:bg-primary/5 hover:text-primary block px-5 py-2 text-base"> 
                              Développement 
                          </a> 
                          <a href="{{ route('coursesByCategories', 'affaires') }}" class="text-body-color dark:text-dark-6 hover:bg-[#F5F7FD] dark:hover:bg-primary/5 hover:text-primary block px-5 py-2 text-base"> 
                              Affaires 
                          </a> 
                          <a href="{{ route('coursesByCategories', 'finance-comptabilite') }}" class="text-body-color dark:text-dark-6 hover:bg-[#F5F7FD] dark:hover:bg-primary/5 hover:text-primary block px-5 py-2 text-base"> 
                              Finance & Comptabilité 
                          </a> 
                          <a href="{{ route('coursesByCategories', 'it-logiciels') }}" class="text-body-color dark:text-dark-6 hover:bg-[#F5F7FD] dark:hover:bg-primary/5 hover:text-primary block px-5 py-2 text-base"> 
                              IT & Logiciels 
                          </a> 
                          <a href="{{ route('coursesByCategories', 'productivite-bureau') }}" class="text-body-color dark:text-dark-6 hover:bg-[#F5F7FD] dark:hover:bg-primary/5 hover:text-primary block px-5 py-2 text-base"> 
                              Productivité de Bureau 
                          </a> 
                          <a href="{{ route('coursesByCategories', 'developpement-personnel') }}" class="text-body-color dark:text-dark-6 hover:bg-[#F5F7FD] dark:hover:bg-primary/5 hover:text-primary block px-5 py-2 text-base"> 
                              Développement Personnel 
                          </a> 
                          <a href="{{ route('coursesByCategories', 'conception') }}" class="text-body-color dark:text-dark-6 hover:bg-[#F5F7FD] dark:hover:bg-primary/5 hover:text-primary block px-5 py-2 text-base"> 
                              Conception 
                          </a> 
                          <a href="{{ route('coursesByCategories', 'marketing') }}" class="text-body-color dark:text-dark-6 hover:bg-[#F5F7FD] dark:hover:bg-primary/5 hover:text-primary block px-5 py-2 text-base"> 
                              Marketing 
                          </a> 
                          <a href="{{ route('coursesByCategories', 'photographie-video') }}" class="text-body-color dark:text-dark-6 hover:bg-[#F5F7FD] dark:hover:bg-primary/5 hover:text-primary block px-5 py-2 text-base"> 
                              Photographie & Vidéo 
                          </a> 
                          <a href="{{ route('coursesByCategories', 'sante-fitness') }}" class="text-body-color dark:text-dark-6 hover:bg-[#F5F7FD] dark:hover:bg-primary/5 hover:text-primary block px-5 py-2 text-base"> 
                              Santé & Fitness 
                          </a> 
                      </div>
                       
                   
              
                    
                    </div>
                    <div class="hidden lg:flex ml-20 items-center">
                      <form action="{{ route('courses.search') }}" method="GET" class=" flex items-center">
                        <input type="text" name="query" placeholder="Search courses..." class="w-44 border border-gray-300 rounded-md py-2 px-5 focus:outline-none focus:ring focus:ring-purple-200">
                        <button type="submit" class="ml-2 bg-purple-600 text-white py-2 px-4 rounded-md hover:bg-purple-700 focus:outline-none focus:ring focus:ring-indigo-200 duration-200"><i class="fa-solid fa-magnifying-glass"></i></button>
                      </form>
                      
                        <div class="ml-4 flex items-center">
                            <a href="{{ route('notifications') }}" class="flex justify-start items-center"><i class="fa-regular fa-bell text-2xl mx-4"></i>
                              <span id="notifications-count" class="-ml-4 -mt-4 bg-purple-600 text-white text-xs font-semibold px-2.5 py-0.5 rounded-full {{ $newNotificationsCount == 0 ? 'hidden' : '' }}">
                                {{ $newNotificationsCount }}
                            </span>  
                            </a>
                           
                            <a href="/cart" class="relative ml-4 mr-4 flex items-center">
                              <i class="fa fa-shopping-bag fa-2x"></i>
                              <span class="badge bg-purple-600">
                                  @if(session('cart')) {{ count(session('cart')) }} @else 0 @endif
                              </span>
                            </a>
            
                               
                        </div>
                        
                        <div class="container">
                          <!-- Account Dropdown Style One -->
                          <div class="flex justify-center">
                            <div class="relative inline-block">
                              <button
                                id="dropdownButton"
                                class=" inline-flex h-12 items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-6 py-3 text-base font-medium text-gray-900"
                              >
                                A
                                
                                </span>
                              </button>
                              <div
                                id="dropdownMenu"
                                class="absolute right-0 top-full mt-5 w-[240px] hidden divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow-md"
                              >
                                <div class="flex items-center gap-3 px-4 py-3">
                                  <div class="relative aspect-square w-10 h-10 rounded-full">
                                    <img
                                      src="{{ asset('imgs/'.Auth::user()->image) }}"
                                      alt="account"
                                      class="w-44 h-10 rounded-full object-center"
                                    />
                                    <span
                                      class="absolute -right-0.5 -top-0.5 block h-3.5 w-3.5 rounded-full border-2 border-white bg-green-500"
                                    ></span>
                                  </div>
                                  <div>
                                    <p class="text-sm font-semibold text-gray-900">
                                      {{ Auth::user()->name }}
                                    </p>
                                    <p class="text-sm text-gray-600">
                                      {{ \Illuminate\Support\Str::limit(Auth::user()->email , 10, '...') }}
                                    </p>
                                  </div>
                                </div>
                                <div>
                                  <a
                                    href="/profileuser"
                                    class="flex w-full items-center justify-start px-4 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-50"
                                  >
                                    <i class="fa-regular fa-user mx-4"></i>
                                    View profile
                                  </a>
                                  <a
                                    href="mycourses"
                                    class="flex w-full items-center justify-start px-4 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-50"
                                  >
                                    <i class="fa-solid fa-tv mx-4"></i>
                                    My courses
                                  </a>
                                  <a href="{{ route('wishelist') }}" class="flex w-full items-center justify-start px-4 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-50">
                                    <i class="fa-regular fa-heart mx-4"></i>
                                    Wishlist
                                    @if(isset($wishlistCount) && $wishlistCount > 0)
                                        <span class="ml-2 bg-purple-600 text-white rounded-full px-2 py-1 text-xs">{{ $wishlistCount }}</span>
                                    @endif
                                  </a>
                                  @if(Auth::check())
                                    @if(Auth::user()->role==='FORMATEUR')
                                      <a
                                        href="{{route('formateurCourses')}}"
                                        class="flex w-full items-center justify-start px-4 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-50"
                                      >
                                        <i class="fa-solid fa-chalkboard mx-4"></i>
                                        Teacher Dashboard
                                        
                                      </a>
                                    @endif
                                  
                                  {{-- @if(Auth::user()->role === 'ADMIN')
                                    <a
                                      href="{{route('dashboard')}}"
                                      class="flex w-full items-center justify-start px-4 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-50"
                                    >
                                      <i class="fa-solid fa-chalkboard mx-4"></i>
                                      Admin Dashboard
                                      
                                    </a> --}}
                                  {{-- @endif --}}
                                  @endif
                                </div>
                                
                                
                                <div>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                    @csrf
                                    <a
                                      href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                      class="flex w-full items-center justify-start px-4 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-50"
                                    >
                                      <i class="fa-solid fa-arrow-right-from-bracket mx-4"></i>
                                      Log out
                                    </a>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
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
            <div class="flex justify-between items-center">
                <div class="">
                  <img src="{{ asset('Assets/Images/EpicLogo.png') }}" alt="Logo" class="h-12 lg:h-16">
                </div>
                <button id="mobile-menu-close" class="text-gray-900 hover:text-gray-700 focus:outline-none">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form action="{{ route('courses.search') }}" method="GET" class=" flex items-center mt-5 ml-3 mb-3">
              <input type="text" name="query" placeholder="Search courses..." class="w-full border border-gray-300 rounded-md py-2 px-5 focus:outline-none focus:ring focus:ring-purple-200">
              <button type="submit" class="ml-2 bg-purple-600 text-white py-2 px-4 rounded-md hover:bg-purple-700 focus:outline-none focus:ring focus:ring-indigo-200 duration-200"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>

            <a href="/profileuser" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 flex justify-start items-center rounded-md font-meduim "><i class="fa-regular fa-user mr-3"></i>View profile</a>
            <a href="/home" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 flex justify-start items-center rounded-md font-meduim "><i class="fa-solid fa-house mr-3"></i>Home</a>
            <a href="/courses" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 flex justify-start items-center rounded-md font-meduim "><i class="fa-solid fa-tv mr-3"></i>Courses</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 flex justify-start items-center rounded-md font-meduim "><i class="fa-solid fa-tv mr-3"></i>My courses</a>
            <a href="{{ route('wishelist') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 flex justify-start items-center rounded-md font-meduim "><i class="fa-regular fa-heart mr-3"></i>Wishlist</a>
            <a href="/cart" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 flex justify-start items-center rounded-md font-meduim "><i class="fa-solid fa-cart-shopping mr-3"></i>Cart</a>

            @if(Auth::user())
              @if(Auth::user()->role==='FORMATEUR')
                <a href="{{ route('formateurDashboard') }}" class="block px-4 py-2 text-gray-700 flex justify-start items-center rounded-md hover:bg-gray-100 font-medium"><i class="fa-solid fa-chalkboard mr-3"></i> Formateur dashboard</a>
              @endif
            @endif
            {{-- @if(Auth::user()->role === 'ADMIN')
              <a href="/admin" class="block px-4 py-3 text-gray-700 flex justify-start items-center rounded-md hover:bg-gray-100 font-medium"><i class="fa-solid fa-chalkboard mr-3"></i> Admin dashboard</a>
            @endif --}}
            
            <div class="relative group">
                <button class="block flex justify-start items-center w-full text-left px-4 py-2 text-gray-900 hover:bg-gray-100 focus:outline-none">
                  <i class="fa-solid fa-layer-group mr-3"></i>
                    Categories
                </button>
                <div class="mt-2 ml-4  shadow-md rounded-md">
                    <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Item 1</a>
                    <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Item 2</a>
                    <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Item 3</a>
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
              @csrf
              <a
                href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="block px-2 py-2 text-gray-700 hover:bg-gray-100 flex justify-start items-center rounded-md font-meduim mt-4"
              >
                <i class="fa-solid fa-arrow-right-from-bracket mx-4"></i>
                Log out
              </a>
            </form>
            
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
