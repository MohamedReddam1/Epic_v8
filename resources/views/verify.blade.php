@extends('Admin/Admin')
@section('title', 'Verifier Cours')
@section('contentAdmin')
<body class="bg-gray-100 pt-16">
<div class="w-10/12 md:w-10/12 ml-9 md:mr-64 lg:ml-20 lg:w-11/12 flex flex-col justify-start items-start mb-10">
    <div class="w-11/12  flex-1 justify-start py-10 xl:p-10">
        <h1 class="text-3xl font-bold text-gray-900">Welcome to the Dashboard</h1>
        <p class="mt-4 text-gray-700 mb-10">This is the content area. Click the links in the sidebar to navigate.</p>
        <a href="javascript:history.back()" class="text-purple-600 bg-purple-100 py-3 px-5 rounded-full hover:text-purple-800 underline text-2xl "><i class="fa-solid fa-angle-left"></i></a>
        {{-- message --}}
        @include('incs.flash')
    </div>
    <div class="w-full lg:w-11/12 bg-white px-3 py-6 rounded-md shadow-md">
    <h2 class="text-xl md:text-2xl lg:text-4xl font-semibold mb-4 text-center">Verify Course</h2>
    <!-- Back Link -->
    <div class="mb-4">
        
    </div>
    <form action="/storeAfterValidation" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="image" class="block text-lg font-semibold text-gray-700">Image:</label>
            <input type="hidden" name="image" id="image" value="{{ $course->image }}">
            <img name="image" id="image" class="mt-1 p-2 w-96 h-44 md:w-full md:h-64 lg:w-8/12 lg:h-80 xl:w-8/12 xl:h-96 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200" src="{{ asset('F_images/'.$course->image) }}" />
        </div>
        <div class="mb-4">
            <label for="title" class="block text-lg font-semibold text-gray-700">Title:</label>
            <input type="text" id="title" name="title" required value="{{ $course->titre }}"
                   class="mt-1 py-4 px-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-purple-200" readonly>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-lg font-semibold text-gray-700">Description:</label>
            <textarea id="description" name="description" required rows="3"
                      class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200" readonly>{{ $course->description }}</textarea>
        </div>
        <div class="mb-4">
            <label for="price" class="block text-lg font-semibold text-gray-700">Price:</label>
            <input type="number" id="price" name="price" required value="{{ $course->prix }}"
            class="mt-1 py-4 px-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-purple-200" readonly>
        </div>
        <div class="mb-4">
            <label for="category" class="block text-lg font-semibold text-gray-700">Category:</label>
            <input type="text" id="category" name="category" required value="{{ $course->categorie }}"
            class="mt-1 py-4 px-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-purple-200" readonly>
        </div>
        <div class="mb-4">
            <label for="niveau" class="block text-lg font-semibold text-gray-700">Niveau de cours:</label>
            <input type="text" id="niveau" name="niveau" required value="{{ $course->niveau }}"
            class="mt-1 py-4 px-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-purple-200" readonly>
        </div>
        <div class="mb-4">
            <label for="langue" class="block text-lg font-semibold text-gray-700">Langue de cours:</label>
            <input type="text" id="langue" name="langue" required value="{{ $course->langue }}"
            class="mt-1 py-4 px-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-purple-200" readonly>
        </div>
        <div class="mb-4">
            <label for="nombre_videos" class="block text-lg font-semibold text-gray-700">Nombre des videos:</label>
            <input type="text" id="nombre_videos" name="nombre_videos" required value="{{ $course->nombre_videos }}"
            class="mt-1 py-4 px-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-purple-200" readonly>
            <div id="videoList" class="mt-3 p-2 w-full border border-gray-300 rounded-md transition-opacity duration-400 opacity-0 max-h-0 overflow-hidden">
                <ul>
                    @foreach($videos as $video)
                    <li class="m-2 hover:text-purple-800 hover:bg-purple-100 py-2 px-3 rounded-md">
                        <a href="{{ route('verifyVideos', ['id_video' => $video->id_video]) }}" class="video-link text-purple-600 font-semibold flex justify-start items-center text-lg mt-" data-id="{{ $video->id_video }}">
                            <i class="fa-solid fa-video mr-3"></i>{{ $video->titre }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <input type="hidden" name="id" value="{{ $course->id }}">
        <input type="hidden" name="id_user" value="{{ $course->id_user }}">
        <div class="flex flex-col md:flex-row md:space-x-4">
            <input type="submit" value="Valider" class="bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 mb-2 md:mb-0">
            <a href="/refuser/{{ $course->id }}/{{ $course->id_user }}" class="bg-gray-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 text-center">Refuser</a>
        </div>
    </form>
    </div>
    
</div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const nombreVideosInput = document.getElementById('nombre_videos');
        const videoList = document.getElementById('videoList');

        nombreVideosInput.addEventListener('click', function() {
            videoList.classList.toggle('opacity-0');
            videoList.classList.toggle('max-h-0');
            videoList.classList.toggle('opacity-100');
            videoList.classList.toggle('max-h-96'); // Adjust this value as necessary
        });

        const videoLinks = document.querySelectorAll('.video-link');

        videoLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default behavior of anchor tag
                const videoId = this.getAttribute('data-id');
                window.location.href = `/verifyVideos/${videoId}`; // Redirect to the route
            });
        });
    });
</script>

<style>
    .transition-opacity {
        transition: opacity 0.4s ease-in-out, max-height 0.4s ease-in-out;
    }
    .opacity-0 {
        opacity: 0;
    }
    .opacity-100 {
        opacity: 1;
    }
    .max-h-0 {
        max-height: 0;
    }
    .max-h-96 {
        max-height: 24rem; /* Adjust as necessary to fit your content */
    }
</style>
@endsection
