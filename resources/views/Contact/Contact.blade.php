@extends('Main/main')

@section('content')
<div class="bg-gray-50 w-full p-5 md:p-20">
    <div class="flex justify-center my-10 md:my-20">
        <h1 class="text-black font-semibold text-3xl md:text-5xl">Contact Us</h1>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-10 justify-center items-center">
        <div class="flex justify-center md:justify-start">
            <img src="{{ asset('Assets/Images/Image 78.png') }}" alt="" class="shadow-md rounded-lg">
        </div>
        <div>
            <form action="{{ route('send.email') }}" method="post">
                @csrf
                <div class="w-full">
                    <label for="subject" class="font-semibold">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="Subject" class="w-full bg-gray-200 py-3 px-4 rounded-md mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600" required>
                </div>
                <div class="w-full mt-5">
                    <label for="message" class="font-semibold">Message</label>
                    <textarea id="message" name="message" cols="30" rows="5" class="w-full bg-gray-200 py-3 px-4 rounded-md mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600" placeholder="Your message" required></textarea>
                </div>
                <div class="w-full mt-5">
                    <button type="submit" class="w-full py-3 px-4 text-white bg-purple-600 rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600">Submit</button>
                </div>
            </form>
            @if($message = Session::get('success'))
                <div class="alert alert-success mt-5">
                    {{ $message }}
                </div>
            @endif
        </div>
    </div>
</div>
@include('Footer/Footer')
@endsection
