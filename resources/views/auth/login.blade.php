{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     @vite('resources/css/app.css')
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        *{
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>
<body>
    <div class="w-full h-full px-5 md:px-5  lg:py-0 flex-col md:flex-row items-center justify-center left-0">
        <div class="text-center md:text-left mt-14 md:mt-5">
            <img src="{{ asset('Assets/Images/EpicLogo.png') }}" alt="">
        </div>
        <div class="my-5 lg:my-10 grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-10 items-center h-auto">
            <div class="w-full">
                <div class="bg-white p-5 md:p-10 rounded-2xl w-full lg:w-9/12 border border-1 border-gray-200 shadow-md ml-0 lg:ml-28">
                    <div class="text-center text-xl md:text-4xl font-bold">{{ __('Sign in') }}</div>
                    <form method="POST" action="{{ route('login') }}" class="mt-5">
                        @csrf
                        <div class="my-3">
                            <label for="email" class="text-xs md:text-lg font-bold">{{ __('Email Address') }}</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class=" px-2 py-2 text-xs md:text-lg md:px-4 md:py-3 rounded-md bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500" placeholder="example.email@gmail.com">
                            @error('email')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="my-3">
                            <label for="password" class="text-xs md:text-lg font-bold">{{ __('Password') }}</label>
                            <input id="password" type="text" name="password" required autocomplete="current-password" class="px-2 py-2 text-xs md:text-lg md:px-4 md:py-3 rounded-md bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500" placeholder="password">
                            @error('password')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex justify-between items-center my-3 w-auto">
                            <div class="flex items-center w-full">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember" class="ml-2 text-xs md:text-lg text-nowrap">{{ __('Remember Me') }}</label>
                            </div>
                            <div>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-xs text-nowrap md:text-lg text-purple-600 ml-0 w-full">{{ __('Forgot Your Password?') }}</a>
                                @endif
                            </div>

                        </div>
                        <div class="mt-3  w-full">
                            <button type="submit" class="w-full py-2 px-2 md:py-3 md:px-3 rounded-md bg-purple-600 text-white font-semibold text-xs md:text-lg hover:bg-purple-700 duration-300 ease-in-out">{{ __('Sign in') }}</button>
                        </div>
                    </form>
                    <div class="flex flex-col justify-center items-center mt-5">
                        <p class="mb-2 text-xs md:text-lg">OR</p>
                        <p class="text-xs md:text-lg">if you don't have an account ? <a href="{{ route('register') }}" class="text-purple-600 font-bold">Register</a></p>
                    </div>
                </div>
            </div>
            <div class="p-5 md:p-5 w-full hidden lg:block">
                <h1 class="text-2xl md:text-4xl font-semibold">Come join us</h1>
                <div class="mt-5">
                    <div class="flex items-center my-2">
                        <i class="fa-solid fa-bomb text-2xl md:text-3xl text-black mx-3 text-rose-500"></i>
                        <p class="text-base md:text-xl mx-3">Explore articles, tutorials, and guides on diverse subjects</p>
                    </div>
                    <div class="flex items-center  my-2">
                        <i class="fa-regular fa-clock text-2xl md:text-3xl text-yellow-500 mx-3"></i>
                        <p class="text-base md:text-xl mx-3">Learn at your own pace and access educational resources anytime</p>
                    </div>
                    <div class="flex items-center  my-2">
                        <i class="fa-solid fa-earth-americas text-2xl md:text-3xl text-blue-500 mx-3"></i>
                        <p class="text-base md:text-xl mx-3">Explore articles, tutorials, and guides on diverse subjects</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html> --}}



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        *{
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>
<body>
    <div class="w-full flex flex-col items-center h-screen">
        <div class="w-full flex justify-between items-center px-3 lg:px-10">
            <img src="{{ asset('Assets/Images/EpicLogo.png') }}" alt="" class="w-38 h-14">

            <p class="text-xs md:text-md lg:text-lg text-nowrap text-purple-600 font-semibold"><a href="/register">register here</a></p>
        </div>

        <div class="w-full mt-20">
            <div class="flex flex-col items-center">
                <h1 class="text-xl font-bold md:text-3xl lg:text-5xl">Welcome back</h1>
                <p class="text-xs mt-3 lg:text-lg">Enter your details to get sign in to your accoun.</p>
            </div>
            <div class="w-full flex justify-center mt-5 lg:mt-14">
                <form method="POST" action="{{ route('login') }}" class=" w-11/12 px-5 lg:w-5/12">
                    @csrf
                    <div class="my-3">
                        <label for="email" class="text-xs md:text-lg font-bold">{{ __('Email Address') }}</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class=" px-2 py-2 text-xs md:text-lg md:px-4 md:py-3 rounded-full bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500" placeholder="example.email@gmail.com">
                        @error('email')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="my-3">
                        <label for="password" class="text-xs md:text-lg font-bold">{{ __('Password') }}</label>
                        <input id="password" type="text" name="password" required autocomplete="current-password" class="px-2 py-2 text-xs md:text-lg md:px-4 md:py-3 rounded-full bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500" placeholder="password">
                        @error('password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex justify-between items-center my-3 w-auto">
                        <div class="flex items-center w-full">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember" class="ml-2 text-xs md:text-lg text-nowrap">{{ __('Remember Me') }}</label>
                        </div>
                        <div>
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-xs text-nowrap md:text-lg text-purple-600 ml-0 w-full">{{ __('Forgot Your Password?') }}</a>
                            @endif
                        </div>

                    </div>
                    <div class="mt-3  w-full">
                        <button type="submit" class="w-full py-2 px-2 md:py-3 md:px-3 rounded-full bg-purple-600 text-white font-semibold text-xs md:text-lg hover:bg-purple-700 duration-300 ease-in-out">{{ __('Sign in') }}</button>
                    </div>
                </form>
            </div>
            <div>

            </div>
            <div>

            </div>
        </div>

        <div>

        </div>
    </div>
</body>
</html>