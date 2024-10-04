@extends('Master/Master')
@section('title', 'Courses')
@section('content')
<div class="container mx-auto px-4 mt-20 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
    @foreach ($courses as $item)
    <div class="bg-white rounded-lg shadow-md p-4">
        <h2 class="text-lg font-semibold mb-2">{{$item['titre']}}</h2>
        <p class="text-gray-600 mb-2">{{$item['description']}}</p>
        <p class="text-gray-700 mb-2">Category: {{$item['categorie']}}</p>
        <video src="{{$item['content']}}" class="w-full mb-2" controls></video>
        <div class="flex justify-between items-center">
            <p class="text-base font-semibold">{{$item['prix']}} DH</p>
            <div>
                <a href="#" class="bg-gray-200 hover:bg-gray-300 text-gray-800 py-2 px-4 rounded-md mr-2 inline-block">Add to Cart</a>
                <a href="#" class="text-indigo-600 hover:text-indigo-800">Details</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
