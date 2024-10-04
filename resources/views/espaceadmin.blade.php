{{-- @extends('Admin/Admin')
@section('title','Espace Admin')
@section('content')
<div class="container mx-auto px-4 mt-20 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
    @foreach ($pendingcourses as $item)
  <div class="bg-white rounded-lg shadow-md p-4">
      <h2 class="text-lg font-semibold mb-2">{{$item['titre']}}</h2>
      <p class="text-gray-600 mb-2">{{$item['description']}}</p>
      <p class="text-gray-700 mb-2">Category: {{$item['categorie']}}</p>
      <div class="flex justify-between items-center">
          <p class="text-base font-semibold">{{$item['prix']}} DH</p>
  
          <div class='items-center'>
            <a href="/verify/{{$item->id}}">Verify</a>
            
          </div>
      </div>
  </div>
  @endforeach
  
  </div>
@endsection --}}

@extends('Admin/Admin')
@section('title','Admin dashboard')
@section('contentAdmin')
<div class="w-10/12 ml-8 md:ml-0 md:w-10/12 lg:ml-10 lg:w-11/12 flex flex-col justify-center items-center">
  <div class="w-full flex-1 justify-start py-10 mt-20">
    <h1 class="text-3xl font-bold text-gray-900">Welcome to the Dashboard</h1>
    <p class="mt-4 text-gray-700">This is the content area. Click the links in the sidebar to navigate.</p>
  </div>
  <div class="w-full py-2 pb-4 ml-22 lg:ml-0">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 w-full">
      @foreach ($pendingcourses as $item)
        <div class="bg-white rounded-lg shadow-md p-4 object-cover w-full">
          <img src="{{asset('F_images/'.$item['image'])}}" alt="{{ $item['titre'] }}" class="w-full h-44 object-cover">
          <p class="text-gray-700 mb-2">Category: {{$item['categorie']}}</p>
          <h2 class="text-lg font-semibold mb-2">{{ \Illuminate\Support\Str::limit($item['titre'], 20, '...') }}</h2>
          <p class="text-gray-600 mb-2">{{ \Illuminate\Support\Str::limit($item['description'], 20, '...') }}</p>
          <div class="flex justify-between items-center">
              <p class="text-base font-semibold">{{$item['prix']}} DH</p>
              <div class="items-center">
                <a href="/verify/{{$item->id}}" class="text-blue-500 hover:text-blue-700">Verify</a>
              </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection


