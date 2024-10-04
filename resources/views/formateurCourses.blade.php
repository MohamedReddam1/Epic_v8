@extends('formateur')

@section('formateurTiltle', 'Your Courses')

@section('contentFormateur')
<div class="w-9/12  md:mr-72 lg:ml-5 md:w-full lg:w-11/12 flex flex-col justify-center items-center">
    <div class="w-full  flex-1 justify-start p-10 px-14">
        <h1 class="text-3xl font-bold text-gray-900">Welcome to the Dashboard</h1>
        <p class="mt-4 text-gray-700">This is the content area. Click the links in the sidebar to navigate.</p>
    </div>
    <div class="flex flex-col bg-white w-full mt-10 ml-20 md:ml-0 lg:ml-0">
        <div class="grid grid-cols-1 lg:grid-cols-2 w-full mb-3 py-2 pt-4 justify-between ">
            <h1 class="text-md lg:text-2xl font-semibold flex justify-start items-center text-gray-800"><i class="fa-regular fa-newspaper mx-3"></i>Detailed report</h1>
            <button class="lg:w-6/12 flex justify-center mt-1 items-center py-2 px-5 mx-3 lg:ml-40 bg-purple-100 text-purple-600 font-semibold rounded-md"><i class="fa-solid fa-arrow-up-from-bracket mr-3"></i>Export</button>
        </div>
        <table class="text-center border border-gray-100 text-xs px-2">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-4 font-semibold">#</th>
                    <th class="py-4 font-semibold">Course</th>
                    <th class="py-4 font-semibold">Category</th>
                    <th class="py-4 font-semibold">Price</th>
                    <th class="py-4 font-semibold">Status</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($courseFormateur as $item)
                    <tr class=" border-b border-gray-100">
                        <td class="py-4">{{ $item->id }}</td>
                        <td class="py-4">{{ $item->titre }}</td>
                        <td class="py-4">{{ $item->categorie }}</td>
                        <td class="py-4">{{ $item->prix }} MAD</td>
                        <td class="py-4 text-center">
                            <span class="{{ 
                                $item->status == 'rejected' ? 'text-red-600 px-3 bg-red-100 font-semibold rounded-full' : 
                                ($item->status == 'under review' ? 'text-blue-600 px-3 bg-blue-100 font-semibold rounded-full' : 
                                ($item->status == 'published' ? 'text-green-600 py-1 px-3 bg-green-100 font-semibold rounded-full' : '')) 
                            }}">
                                {{ $item->status }}
                            </span>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- <div class="container mx-auto px-4 mt-20 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
    @foreach ($courseFormateur as $item)
        <div class="bg-white rounded-lg shadow-md p-4">
            <h2 class="text-lg font-semibold mb-2">{{ $item->titre }}</h2>
            <p class="text-gray-600 mb-2">{{ $item->description }}</p>
            <p class="text-gray-700 mb-2">Category: {{ $item->categorie }}</p>
            <p class="mb-2">
                Status: 
                <span class="{{ 
                    $item->status == 'rejected' ? 'text-red-600' : 
                    ($item->status == 'under review' ? 'text-blue-600' : 
                    ($item->status == 'published' ? 'text-green-600' : '')) 
                }}">
                    {{ $item->status }}
                </span>
            </p>
            <video src="{{ $item->content }}" class="w-full mb-2" controls></video>
            <div class="flex justify-between items-center">
                <p class="text-base font-semibold">{{ $item->prix }} DH</p>
                <form action="{{ route('wishlist.add') }}" method="POST" id="wishlistForm">
                    @csrf
                    <input type="hidden" name="formation_id" value="{{ $item->id }}">
                    <button type="submit" id="heart{{ $item->id }}" onclick="toggleClass(this)">
                        <img src="/heart.png" alt="icone heart">
                    </button>
                </form>
                <div>
                    <a href="#" class="bg-gray-200 hover:bg-gray-300 text-gray-800 py-2 px-4 rounded-md mr-2 inline-block">Add to Cart</a>
                    <a href="#" class="text-indigo-600 hover:text-indigo-800">Details</a>
                    <a href="/rate/{{ $item->id }}" class="text-indigo-600 hover:text-indigo-800">Rate</a>
                </div>
            </div>
        </div>
    @endforeach
</div> --}}
@endsection
