        @extends('Master/Master')


@section('content')
    <div>
        <div class="bg-purple-100 w-full p-5 md:p-20 justify-center items-center flex mt-10">
            <div class="bg-white p-6 md:p-12 items-center w-full md:w-7/12 justify-center">
                <div>
                    <h1 class="text-4xl md:text-6xl font-semibold text-center">Our story begins</h1>
                </div>
                <div class="p-5 md:p-10">
                    <p class="text-base md:text-lg">At Poke Now, we believe fast food should be fresh food. From our premium ingredients to our exceptional service, eating healthy has never been easier—or more enjoyable! </p>
                    <h3 class="text-2xl md:text-3xl font-semibold mt-7 md:mt-10">What's Epic</h3>
                    <p class="mt-3 md:mt-5">Poke is a traditional Hawaiian dish that typically consists of diced raw fish (such as tuna or salmon) marinated in soy sauce and other flavorful ingredients. It is often served over a bed of rice and topped with various toppings like seaweed, cucumber, avocado, and sesame seeds.</p>
                </div>
                <div class="w-full flex justify-center">
                    <a href="" class="bg-purple-600 py-3 px-6 md:px-8 w-full md:w-6/12 text-white font-medium text-center rounded-md">Start Now</a>
                </div>
            </div>
        </div>
        
        <div class="bg-gray-100 grid grid-cols-1 md:grid-cols-2 p-5 md:p-10 items-center justify-center">
            <div class="p-5 md:p-10">
                <div class="mb-5 md:mb-8">
                    <h1 class="text-3xl md:text-5xl font-semibold">Follow us</h1>
                    <p class="text-base md:text-lg my-2">@epicours</p>
                    <p class="text-base md:text-lg my-2">To stay updated with the latest news, promotions, and offerings from the poke restaurant, make sure to follow us on social media. Don't miss out on any updates!</p>
                </div>
                <div class="mt-3 md:mt-5">
                    <i class="fab fa-twitter text-2xl md:text-4xl mx-3 mt-3 text-blue-500"></i>
                    <i class="fab fa-facebook text-2xl md:text-4xl mx-3 mt-3 text-blue-700"></i>
                    <i class="fab fa-linkedin text-2xl md:text-4xl mx-3 mt-3 text-blue-500"></i>
                    <i class="fab fa-youtube text-2xl md:text-4xl mx-3 mt-3 text-red-600"></i>
                </div>
            </div>
            <div class="text-center">
                <img src="{{ asset('Assets/Images/Image 93.png') }}" alt="">
            </div>
        </div>
        
        {{-- <div>
            @include('Footer/Footer')
        </div> --}}
    </div>
@endsection