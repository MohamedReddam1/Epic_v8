@extends('Main/Main')

@section('content')
    <div class="">
        <div class="mt-36 px-10 lg:px-20 mb-10">
            @foreach ($formations as $formation)
                <h1 class="text-4xl font-bold ">{{ $formation->titre }}</h1>
            @endforeach
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 mb-36 px-10 lg:px-20">
            <div class="w-full">
                <video id="videoPlayer" src="" controls class="w-full"></video>
            </div>
            <div class="mt-10 lg:mt-0 px-0 lg:px-20 w-full">
                <div>
                    <h1 class="font-semibold text-2xl text-purple-700">Sessions</h1>
                </div>
                <div class="flex flex-col items-start w-full mt-5 overflow-y-auto max-h-96">
                    @foreach ($videos as $video)

                        
                    <a href="#" class="video-link text-gray-800 font-bold text-md lg:text-lg flex justify-between items-center py-4 px-7 w-full rounded-md hover:bg-purple-100 hover:text-purple-600 mt-2 focus:bg-gray-200 focus:text-gray-600" data-video-src="{{ asset('videos/' . $video->content) }}">{{ $video->titre }} <i class="fa-solid fa-play"></i></a>
                    @endforeach
                </div>
            </div>
        </div>
        @include('Footer/Footer')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('.video-link');
            const videoPlayer = document.getElementById('videoPlayer');

            links.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const videoSrc = this.getAttribute('data-video-src');

                    // Debugging: Log videoSrc to ensure it is correct
                    console.log('Video Source:', videoSrc);

                    // Set video source and play
                    videoPlayer.setAttribute('src', videoSrc);
                    videoPlayer.load();
                    videoPlayer.play().catch(error => {
                        console.error('Error playing video:', error);
                    });
                });
            });
        });
    </script>
@endsection

