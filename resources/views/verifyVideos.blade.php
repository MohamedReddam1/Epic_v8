@extends('Admin/Admin')
@section('title', 'Pending Videos')
@section('contentAdmin')
<div class="w-9/12 md:w-10/12 ml-14 md:mr-64 lg:ml-5 lg:w-11/12 flex flex-col justify-start items-start">
    <div class="w-11/12  flex-1 justify-start py-10 xl:p-10 mb-10 lg:mb-0">
        <h1 class="text-3xl font-bold text-gray-900">Welcome to the Dashboard</h1>
        <p class="mt-4 text-gray-700 mb-10">This is the content area. Click the links in the sidebar to navigate.</p>
        <a href="javascript:history.back()" class="text-purple-600 bg-purple-100 py-3 px-5 rounded-full hover:text-purple-800 underline text-2xl "><i class="fa-solid fa-angle-left"></i></a>
    </div>
    <div class="  mx-auto rounded-md">
        @foreach($pendingvideo as $video)
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6 video-card w-full">
                <video src="{{ asset('videos/' . $video->content) }}" controls class="video-element w-90 lg:w-full"></video>
                <div class="p-4">
                    <h2 class="text-lg md:text-xl lg:text-2xl font-semibold mb-2">{{ $video->titre }}</h2>
                    <p class="text-gray-600 mb-2 text-md md:text-lg lg:text-xl">Duration: {{ $video->duree }} Min</p>
                </div>
            </div>
        @endforeach
    </div>
</div>



@endsection
