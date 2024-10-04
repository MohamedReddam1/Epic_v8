

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar Example</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .active-link {
            background-color: #E5E7EB; /* Tailwind gray-200 */
            color: #4C1D95; /* Tailwind purple-600 */
        }

        /* Custom styles for the sliding navbar */
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
        .mobile-menu.show {
            transform: translateX(0);
        }
    </style>
    
</head>
<body class="fixed top-0">

    <!-- Sidebar -->
    <div id="sidebar" class="h-full bg-white text-black fixed  lg:flex-col lg:items-center shadow-lg px-5 hidden lg:block">
        <div class="py-4 px-6 flex justify-center">
            <a href="{{ route('home') }}"><img src="{{ asset('Assets/Images/EpicLogo.png') }}" alt="Logo" class="h-16"></a>
        </div>
        <nav class="mt-10 w-full">
            <!-- Workspace Links -->
            <div class="mb-6">
                <h3 class="text-gray-600 px-4 text-sm uppercase tracking-wider font-bold">Workspace</h3>
                <a href="{{ route('formateurDashboard') }}" class="flex mt-5 items-center justify-start text-lg py-2.5 px-4 rounded transition duration-200 text-gray-600 hover:bg-purple-600 hover:text-white" id="dashboard-link">
                    <i class="fas fa-tachometer-alt mr-3 text-lg"></i> <span>Dashboard</span>
                </a>
                <a href="{{ route('formateurCourses') }}" class="flex items-center justify-start text-lg py-2.5 px-4 rounded transition duration-200 text-gray-600 hover:bg-purple-600 hover:text-white" id="courses-link">
                    <i class="fas fa-book mr-3 text-lg"></i> <span>Courses</span>
                </a>
                <a href="/ajouter" class="flex items-center justify-start text-lg py-2.5 px-4 rounded transition duration-200 text-gray-600 hover:bg-purple-600 hover:text-white" id="add-course-link">
                    <i class="fas fa-plus-circle mr-3 text-lg"></i> <span>Add Course</span>
                </a>
            </div>
            <hr class="hidden lg:block lg:border-gray-300">
            <!-- Personal Links -->
            <div class="mt-8">
                <h3 class="text-gray-600 px-4 text-sm uppercase tracking-wider font-bold">Personal</h3>
                <a href="{{ route('notifications') }}" class="flex items-center text-lg mt-5 py-2.5 px-4 rounded transition duration-200 text-gray-600 hover:bg-purple-600 hover:text-white" id="notifications-link">
                    <i class="fas fa-bell mr-3"></i>
                    Notifications
                    <span id="notifications-count" class="ml-2 bg-red-500 text-white text-sm font-semibold px-2.5 py-0.5 rounded-full {{ $newNotificationsCount == 0 ? 'hidden' : '' }}">
                        {{ $newNotificationsCount }}
                    </span>
                </a>
                <a href="/setting" class="flex items-center justify-start text-lg py-2.5 px-4 rounded transition duration-200 text-gray-600 hover:bg-purple-600 hover:text-white" id="settings-link">
                    <i class="fas fa-cog mr-3 text-lg"></i> <span>Settings</span>
                </a>
                <a href="{{ route('home') }}" class="flex items-center justify-start text-lg py-2.5 px-4 rounded transition duration-200 text-gray-600 hover:bg-purple-600 hover:text-white" id="exit-link">
                    <i class="fas fa-sign-out-alt mr-3 text-lg"></i> <span>Exit</span>
                </a>
            </div>
        </nav>
    </div>

    <div class="flex items-center lg:hidden p-5 fixed top-0">
        <button id="mobile-menu-button" class="text-gray-900 hover:text-gray-700 focus:outline-none">
            <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>
            
     
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
        
        <div class="mb-6 mt-10">
            <h3 class="text-gray-600 px-4 text-sm uppercase tracking-wider font-bold">Workspace</h3>
            <a href="{{ route('formateurDashboard') }}" class="flex mt-5 items-center justify-start text-lg py-2.5 px-4 rounded transition duration-200 text-gray-600 hover:bg-purple-600 hover:text-white" id="dashboard-link">
                <i class="fas fa-tachometer-alt mr-3 text-lg"></i> <span>Dashboard</span>
            </a>
            <a href="{{ route('formateurCourses') }}" class="flex items-center justify-start text-lg py-2.5 px-4 rounded transition duration-200 text-gray-600 hover:bg-purple-600 hover:text-white" id="courses-link">
                <i class="fas fa-book mr-3 text-lg"></i> <span>Courses</span>
            </a>
            <a href="/ajouter" class="flex items-center justify-start text-lg py-2.5 px-4 rounded transition duration-200 text-gray-600 hover:bg-purple-600 hover:text-white" id="add-course-link">
                <i class="fas fa-plus-circle mr-3 text-lg"></i> <span>Add Course</span>
            </a>
        </div>
        
        <div class="mt-8">
            <h3 class="text-gray-600 px-4 text-sm uppercase tracking-wider font-bold">Personal</h3>
            <a href="{{ route('notifications') }}" class="flex items-center text-lg mt-5 py-2.5 px-4 rounded transition duration-200 text-gray-600 hover:bg-purple-600 hover:text-white" id="notifications-link">
                <i class="fas fa-bell mr-3"></i>
                Notifications
                <span id="notifications-count" class="ml-2 bg-red-500 text-white text-sm font-semibold px-2.5 py-0.5 rounded-full {{ $newNotificationsCount == 0 ? 'hidden' : '' }}">
                    {{ $newNotificationsCount }}
                </span>
            </a>
            <a href="/setting" class="flex items-center justify-start text-lg py-2.5 px-4 rounded transition duration-200 text-gray-600 hover:bg-purple-600 hover:text-white" id="settings-link">
                <i class="fas fa-cog mr-3 text-lg"></i> <span>Settings</span>
            </a>
            <a href="{{ route('home') }}" class="flex items-center justify-start text-lg py-2.5 px-4 rounded transition duration-200 text-gray-600 hover:bg-purple-600 hover:text-white" id="exit-link">
                <i class="fas fa-sign-out-alt mr-3 text-lg"></i> <span>Exit</span>
            </a>
        </div>

        
        
    </div>


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
            const menuButton = document.getElementById('menu-button');
            const sidebar = document.getElementById('sidebar');
            const links = document.querySelectorAll('nav a');
            const activeLinkId = localStorage.getItem('activeLinkId');

            if (activeLinkId) {
                document.getElementById(activeLinkId).classList.add('active-link');
            }

            links.forEach(link => {
                link.addEventListener('click', function () {
                    links.forEach(l => l.classList.remove('active-link'));
                    this.classList.add('active-link');
                    localStorage.setItem('activeLinkId', this.id);
                });
            });
        });
    </script>

</body>
</html>
