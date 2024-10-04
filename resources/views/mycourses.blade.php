@extends('Main/Main')
@section('title', 'My Courses')
@section('content')

@if ($courses->isEmpty())
    <h1>No courses found</h1>
@else
    <div class="relative top-28 ">
        <div class="px-5 lg:px-20">
            <h1 class="font-semibold text-4xl text-gray-800 text-nowrap">My Courses</h1>
        </div>
        <div class="flex flex-col justify-center items-center px-0 mb-10 lg:px-20 lg:mt-20 lg:mb-20">
            @foreach ($courses as $course)
                @if ($course->formation)
                    <div class="w-10/12 border grid grid-cols-1 md:grid-cols-3 border-gray-200 rounded-md shadow-md h-full mt-5">
                        <div class="h-full">
                            <img class="w-full h-full object-cover" src="{{ asset('F_images/'.$course->formation->image) }}" alt="">
                        </div>
                        <div class="flex flex-col items-start ml-5">
                            <h1 class="text-xl font-semibold text-gray-800">{{ $course->formation->titre }}</h1>
                            <div class="text-gray-600 text-lg mt-1">
                                Rating:
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $course->formation->rate)
                                        <i class="fas fa-star text-yellow-500"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                        </div>
                        <div class="border-l border-gray-200 grid grid-cols-2 md:grid-cols-1 w-full px-10 py-10">
                            <a href="/rate/{{$course->formation->id}}" class="bg-purple-600 hover:bg-purple-700 text-white font-bold rounded-md self-center text-center py-3 mx-1 mt-1 lg:mx-0">Rate</a>
                           
                            <a href="/openmycourse/{{$course->formation->id}}" class="bg-purple-600 hover:bg-purple-700 text-white font-bold rounded-md self-center text-center py-3 mt-1 mx-1 lg:mx-0">Open</a>
                        </div>
                    </div>
                @else
                    <div class="w-10/12 border grid grid-cols-1 md:grid-cols-3 border-gray-200 rounded-md shadow-md h-full mt-5">
                        <div class="h-full">
                            <img class="w-full h-full object-cover" src="{{ asset('default-image.jpg') }}" alt="Default Image">
                        </div>
                        <div class="flex flex-col items-start ml-5">
                            <h1 class="text-xl font-semibold text-gray-800">Course Title Unavailable</h1>
                            <div class="text-gray-600 text-lg mt-1">
                                Rating:
                                <span class="text-gray-600">No rating available</span>
                            </div>
                        </div>
                        <div class="border-l border-gray-200 grid grid-cols-2 md:grid-cols-1 w-full px-10 py-10">
                            <span class="bg-gray-400 text-white font-bold rounded-md self-center text-center py-3 mx-1 mt-1 lg:mx-0 cursor-not-allowed">Rate</span>
                            <span class="bg-gray-400 text-white font-bold rounded-md self-center text-center py-3 mt-1 mx-1 lg:mx-0 cursor-not-allowed">Open</span>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div>
            @include('Footer/Footer')
        </div>
    </div>
@endif

@endsection
