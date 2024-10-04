@extends('Main/Main')
@section('title','rating')
@section('content')
<div class="bg-purple-50 pt-32">
  <div class="w-10/12 lg:w-6/12 mx-auto mb-24 bg-purple-50">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
          <span class="block sm:inline">{{ session('success') }}</span>
        </div>
      @endif

      <!-- Display course image -->
      <div class="mb-4">
        <img src="{{ asset('F_images/'.$course->image) }}" alt="Course Image" class="w-full h-auto rounded-md shadow-sm">
      </div>

      <form method="POST" action="{{ route('submit.feedback') }}">
        @csrf

        <div class="mb-4">
          <label for="rating" class="block text-gray-700 text-lg font-bold mb-2">{{ __('Rating') }}</label>
          <div id="stars" class="flex items-center space-x-1">
            <span onclick="setRating(1)" class="star cursor-pointer text-4xl text-gray-500"><i class="fa-solid fa-star"></i></span>
            <span onclick="setRating(2)" class="star cursor-pointer text-4xl text-gray-500"><i class="fa-solid fa-star"></i></span>
            <span onclick="setRating(3)" class="star cursor-pointer text-4xl text-gray-500"><i class="fa-solid fa-star"></i></span>
            <span onclick="setRating(4)" class="star cursor-pointer text-4xl text-gray-500"><i class="fa-solid fa-star"></i></span>
            <span onclick="setRating(5)" class="star cursor-pointer text-4xl text-gray-500"><i class="fa-solid fa-star"></i></span>
            <h3 id="output" class="ml-4 text-sm text-gray-600 font-bold hidden">Rating is: 0/5</h3>
            <input type="hidden" id="rating" name="rating" value="0">
          </div>
          @error('rating')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-6">
          <label for="feedback" class="block text-gray-700 text-lg font-bold mb-2">{{ __('Feedback') }}</label>
          <textarea id="feedback" class="form-textarea ring ring-gray-400 outline-none focus:ring-purple-300 px-5 py-3 rounded-md shadow-sm mt-1 block w-full @error('feedback') border-red-500 @enderror" name="feedback" required></textarea>
          @error('feedback')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
          @enderror
        </div>

        <div class="flex items-center justify-between">
          <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            {{ __('Submit') }}
          </button>
        </div>
        <input type="hidden" name="id_formation" value="{{ $id }}">
      </form>
    </div>
  </div>
  @include('Footer/Footer')
</div>

<script>
  // Function to handle star rating
  function setRating(n) {
    removeStars();
    for (let i = 0; i < n; i++) {
      document.getElementsByClassName('star')[i].style.color = '#FFD700'; // gold color
    }
    const output = document.getElementById('output');
    output.innerText = "Rating is: " + n + "/5";
    document.getElementById('rating').value = n;

    if (n >= 4) {
      output.style.color = 'green';
    } else {
      output.style.color = 'red';
    }
  }

  function removeStars() {
    let stars = document.getElementsByClassName('star');
    for (let i = 0; i < stars.length; i++) {
      stars[i].style.color = 'gray'; // reset color
    }
  }
</script>
@endsection
