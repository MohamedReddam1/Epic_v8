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
        * {
            font-family: "Poppins", sans-serif;
        }
        .hidden {
            display: none;
        }
        .suggestions {
            border: 1px solid #ccc;
            max-height: 150px;
            overflow-y: auto;
            position: absolute;
            z-index: 1000;
            background-color: white;
            width: calc(100% - 30px);
        }
        .suggestion-item {
            padding: 8px;
            cursor: pointer;
        }
        .suggestion-item:hover {
            background-color: #f0f0f0;
        }
        .diploma-item {
            display: flex;
            align-items: center;
            margin-top: 5px;
        }
        .remove-diploma {
            cursor: pointer;
            color: red;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class=" w-full h-screen px-4 md:px-5 lg:py-0 flex-col items-center justify-center left-0">
        <div>
            <img src="{{ asset('Assets/Images/EpicLogo.png') }}" alt="">
        </div>
        <div class="my-5 lg:my-10 grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-10 items-center h-auto">
            <div class="bg-white p-5 md:p-10 rounded-2xl w-full lg:w-9/12 border border-1 border-gray-200 shadow-md ml-0 lg:ml-10">
                <div>
                    <div class="text-2xl font-semibold">{{ __('Begin your journey') }}</div>
                    <div class="mt-5">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="my-2">
                                <label for="name" class="text-xs md:text-lg font-bold">{{ __('Username') }}</label>
                                <div>
                                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus class="py-2 px-2 text-xs lg:text-lg lg:px-4 lg:py-[7px] rounded-md bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500" placeholder="John Doe">
                                    @error('name')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="my-2">
                                <label for="email" class="text-xs md:text-lg font-bold">{{ __('Email Address') }}</label>
                                <div>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" class="py-2 px-2 text-xs lg:text-lg lg:px-4 lg:py-[7px] rounded-md bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500" placeholder="email@example.com">
                                    @error('email')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="my-2">
                                <label for="password" class="text-xs md:text-lg font-bold">{{ __('Password') }}</label>
                                <div>
                                    <input id="password" type="password" name="password" required autocomplete="new-password" class="py-2 px-2 text-xs lg:text-lg lg:px-4 lg:py-[7px] rounded-md bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500" placeholder="password">
                                    @error('password')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="my-2">
                                <label for="password-confirm" class="text-xs md:text-lg font-bold">{{ __('Confirm Password') }}</label>
                                <div>
                                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" class="py-2 px-2 text-xs lg:text-lg lg:px-4 lg:py-[7px] rounded-md bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500" placeholder="confirm password">
                                </div>
                            </div>

                            <div class="my-2">
                                <label for="role" class="text-xs md:text-lg font-bold">{{ __('Role') }}</label>
                                <div>
                                    <select id="role" name="role" class="py-2 px-2 text-sm lg:text-lg lg:px-4 lg:py-[7px] block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                        <option value="user" class="bg-purple-200 text-white">Student</option>
                                        <option value="formateur" class="bg-purple-200 text-white">Formateur</option>
                                    </select>
                                </div>
                            </div>

                            <div id="formateur-fields" class="hidden">
                                <div class="my-2">
                                    <label for="date_naissance" class="text-xs md:text-lg font-bold">{{ __('Date of Birth') }}</label>
                                    <div>
                                        <input id="date_naissance" type="date" name="date_naissance" class="py-2 px-2 text-xs lg:text-lg lg:px-4 lg:py-[7px] rounded-md bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500">
                                    </div>
                                </div>
                                <div class="my-2">
                                    <label for="university" class="text-xs md:text-lg font-bold">{{ __('University') }}</label>
                                    <div style="position: relative;">
                                        <input id="university" type="text" name="university" class="py-2 px-2 text-xs lg:text-lg lg:px-4 lg:py-[7px] rounded-md bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500" placeholder="Type your university">
                                        <div id="suggestions" class="suggestions hidden"></div>
                                    </div>
                                </div>
                                <div class="my-2">
                                    <label for="diplomas" class="text-xs md:text-lg font-bold">{{ __('Diplomas') }}</label>
                                    <div id="diplomas-container">
                                        <div class="diploma-item">
                                            <input id="diplomas" type="text" name="diplomas" class="py-2 px-2 text-xs lg:text-lg lg:px-4 lg:py-[7px] rounded-md bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500" placeholder="Add a diploma">
                                        </div>
                                    </div>
                                </div>
                                <div class="my-2">
                                    <label for="nationality" class="text-xs md:text-lg font-bold">{{ __('Nationality') }}</label>
                                    <div style="position: relative;">
                                        <input id="nationality" type="text" name="nationality" class="py-2 px-2 text-xs lg:text-lg lg:px-4 lg:py-[7px] rounded-md bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500" placeholder="Type your nationality">
                                        <div id="nationality-suggestions" class="suggestions hidden"></div>
                                    </div>
                                </div>
                                 <div class="my-2">
                                    <label for="about" class="text-xs md:text-lg font-bold">{{ __('Tell us about yourself') }}</label>
                                    <div>
                                        <textarea id="about" name="about" rows="4" class="py-2 px-2 text-xs lg:text-lg lg:px-4 lg:py-[7px] rounded-md bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500" placeholder="Tell us about yourself"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="my-2">
                                <label for="image" class="text-xs md:text-lg font-bold">{{ __('Profile Image') }}</label>
                                <div>
                                    <input id="image" type="file" name="image" class="py-2 px-2 text-xs lg:text-lg lg:px-4 lg:py-[7px] rounded-md bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500">
                                </div>
                            </div>

                            <div class="my-3">
                                <button type="submit" class="text-xs px-2 py-2 w-full lg:py-3 lg:px-3 lg:text-lg rounded-md bg-purple-600 text-white font-semibold hover:bg-purple-700 duration-300 ease-in-out">{{ __('Register') }}</button>
                            </div>
                            <div class="flex flex-col justify-center items-center mt-5">
                                <p class="mb-2 text-xs md-text-lg">OR</p>
                                <p class="text-xs md:text-lg">if you have an account? <a href="{{ route('login') }}" class="text-purple-600 font-bold">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="p-5 md:p-5 w-full hidden lg:block bg-black">
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
 <script>
    document.getElementById('role').addEventListener('change', function() {
        const formateurFields = document.getElementById('formateur-fields');
        if (this.value === 'formateur') {
            formateurFields.classList.remove('hidden');
        } else {
            formateurFields.classList.add('hidden');
        }
    });

    const universityInput = document.getElementById('university');
    const universitySuggestionsContainer = document.getElementById('suggestions');

    universityInput.addEventListener('input', async () => {
        const query = universityInput.value;
        if (query.length < 3) {
            universitySuggestionsContainer.classList.add('hidden');
            return;
        }
        try {
            const response = await fetch('https://raw.githubusercontent.com/Hipo/university-domains-list/master/world_universities_and_domains.json');
            const universities = await response.json();
            const filteredUniversities = universities
                .filter(univ => univ.name.toLowerCase().includes(query.toLowerCase()))
                .slice(0, 10);

            universitySuggestionsContainer.innerHTML = '';
            filteredUniversities.forEach(univ => {
                const suggestionItem = document.createElement('div');
                suggestionItem.className = 'suggestion-item';
                suggestionItem.textContent = univ.name;
                suggestionItem.addEventListener('click', () => {
                    universityInput.value = univ.name;
                    universitySuggestionsContainer.classList.add('hidden');
                });
                universitySuggestionsContainer.appendChild(suggestionItem);
            });
            universitySuggestionsContainer.classList.remove('hidden');
        } catch (error) {
            console.error('Error fetching university data:', error);
        }
    });

    const nationalityInput = document.getElementById('nationality');
    const nationalitySuggestionsContainer = document.getElementById('nationality-suggestions');

    nationalityInput.addEventListener('input', async () => {
        const query = nationalityInput.value;
        if (query.length < 3) {
            nationalitySuggestionsContainer.classList.add('hidden');
            return;
        }
        try {
            const response = await fetch('https://api.first.org/data/v1/countries');
            const countriesData = await response.json();
            const countries = Object.values(countriesData.data);
            const filteredCountries = countries
                .filter(country => country.country.toLowerCase().includes(query.toLowerCase()))
                .slice(0, 10);

            nationalitySuggestionsContainer.innerHTML = '';
            filteredCountries.forEach(country => {
                const suggestionItem = document.createElement('div');
                suggestionItem.className = 'suggestion-item';
                suggestionItem.textContent = country.country;
                suggestionItem.addEventListener('click', () => {
                    nationalityInput.value = country.country;
                    nationalitySuggestionsContainer.classList.add('hidden');
                });
                nationalitySuggestionsContainer.appendChild(suggestionItem);
            });
            nationalitySuggestionsContainer.classList.remove('hidden');
        } catch (error) {
            console.error('Error fetching country data:', error);
        }
    });

    document.addEventListener('click', (event) => {
        if (!universityInput.contains(event.target) && !universitySuggestionsContainer.contains(event.target)) {
            universitySuggestionsContainer.classList.add('hidden');
        }
        if (!nationalityInput.contains(event.target) && !nationalitySuggestionsContainer.contains(event.target)) {
            nationalitySuggestionsContainer.classList.add('hidden');
        }
    });

    const diplomasContainer = document.getElementById('diplomas-container');

    diplomasContainer.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            const input = event.target;
            if (input.value.trim() === '') return;
            const newDiplomaItem = document.createElement('div');
            newDiplomaItem.classList.add('diploma-item');
            newDiplomaItem.innerHTML = `
                <input type="text" name="diplomas[]" class="py-2 px-2 text-xs lg:text-lg lg:px-4 lg:py-[7px] rounded-md bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500" value="${input.value}" readonly>
                <span class="remove-diploma">&times;</span>
            `;
            diplomasContainer.appendChild(newDiplomaItem);
            input.value = '';
        }
    });

    diplomasContainer.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-diploma')) {
            const diplomaItem = event.target.closest('.diploma-item');
            diplomasContainer.removeChild(diplomaItem);
        }
    });
    </script>
</body>
</html> --}}



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            font-family: "Poppins", sans-serif;
        }
        .hidden {
            display: none;
        }
        .suggestions {
            border: 1px solid #ccc;
            max-height: 150px;
            overflow-y: auto;
            position: absolute;
            z-index: 1000;
            background-color: white;
            width: calc(100% - 30px);
        }
        .suggestion-item {
            padding: 8px;
            cursor: pointer;
        }
        .suggestion-item:hover {
            background-color: #f0f0f0;
        }
        .diploma-item {
            display: flex;
            align-items: center;
            margin-top: 5px;
        }
        .remove-diploma {
            cursor: pointer;
            color: red;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="w-full flex flex-col items-center h-screen">
        <div class="w-full flex justify-between items-center px-3 lg:px-10">
            <img src="{{ asset('Assets/Images/EpicLogo.png') }}" alt="" class="w-38 h-14">

            <p class="text-xs md:text-md lg:text-lg text-nowrap text-purple-600 font-semibold"><a href="/login">Login</a></p>
        </div>

        <div class="w-full mt-7">
            <div class="flex flex-col items-center">
                <h1 class="text-xl font-bold md:text-3xl lg:text-5xl">Register</h1>
                <p class="text-xs mt-3 lg:text-lg">Enter your details to get sign up to your account.</p>
            </div>
            <div class="w-full flex justify-center mt-5 lg:mt-5">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="w-11/12 lg:w-5/12 pb-5 lg:pb-0 px-3">
                    @csrf

                    <div class="my-2">
                        <label for="name" class="text-xs md:text-lg font-bold">{{ __('Username') }}</label>
                        <div>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus class="py-2 px-2 text-xs lg:text-lg lg:px-4 lg:py-[7px] rounded-full bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500" placeholder="John Doe">
                            @error('name')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="my-2">
                        <label for="email" class="text-xs md:text-lg font-bold">{{ __('Email Address') }}</label>
                        <div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" class="py-2 px-2 text-xs lg:text-lg lg:px-4 lg:py-[7px] rounded-full bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500" placeholder="email@example.com">
                            @error('email')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="my-2">
                        <label for="password" class="text-xs md:text-lg font-bold">{{ __('Password') }}</label>
                        <div>
                            <input id="password" type="password" name="password" required autocomplete="new-password" class="py-2 px-2 text-xs lg:text-lg lg:px-4 lg:py-[7px] rounded-full bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500" placeholder="password">
                            @error('password')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="my-2">
                        <label for="password-confirm" class="text-xs md:text-lg font-bold">{{ __('Confirm Password') }}</label>
                        <div>
                            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" class="py-2 px-2 text-xs lg:text-lg lg:px-4 lg:py-[7px] rounded-full bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500" placeholder="confirm password">
                        </div>
                    </div>

                    <div class="my-2">
                        <label for="role" class="text-xs md:text-lg font-bold">{{ __('Role') }}</label>
                        <div>
                            <select id="role" name="role" class="py-2 px-2 text-sm lg:text-lg lg:px-4 lg:py-[7px] block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 rounded-full shadow leading-tight focus:outline-none focus:shadow-outline">
                                <option value="user" class="bg-purple-200 text-white">Student</option>
                                <option value="formateur" class="bg-purple-200 text-white">Formateur</option>
                            </select>
                        </div>
                    </div>

                    <div id="formateur-fields" class="hidden">
                        <div class="my-2">
                            <label for="date_naissance" class="text-xs md:text-lg font-bold">{{ __('Date of Birth') }}</label>
                            <div>
                                <input id="date_naissance" type="date" name="date_naissance" class="py-2 px-2 text-xs lg:text-lg lg:px-4 lg:py-[7px] rounded-full bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500">
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="university" class="text-xs md:text-lg font-bold">{{ __('University') }}</label>
                            <div style="position: relative;">
                                <input id="university" type="text" name="university" class="py-2 px-2 text-xs lg:text-lg lg:px-4 lg:py-[7px] rounded-full bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500" placeholder="Type your university">
                                <div id="suggestions" class="suggestions hidden"></div>
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="diplomas" class="text-xs md:text-lg font-bold">{{ __('Diplomas') }}</label>
                            <div id="diplomas-container">
                                <div class="diploma-item">
                                    <input id="diplomas" type="text" name="diplomas" class="py-2 px-2 text-xs lg:text-lg lg:px-4 lg:py-[7px] rounded-full bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500" placeholder="Add a diploma">
                                </div>
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="nationality" class="text-xs md:text-lg font-bold">{{ __('Nationality') }}</label>
                            <div style="position: relative;">
                                <input id="nationality" type="text" name="nationality" class="py-2 px-2 text-xs lg:text-lg lg:px-4 lg:py-[7px] rounded-full bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500" placeholder="Type your nationality">
                                <div id="nationality-suggestions" class="suggestions hidden"></div>
                            </div>
                        </div>
                         <div class="my-2">
                            <label for="about" class="text-xs md:text-lg font-bold">{{ __('Tell us about yourself') }}</label>
                            <div>
                                <textarea id="about" name="about" rows="4" class="py-2 px-2 text-xs lg:text-lg lg:px-4 lg:py-[7px] rounded-lg bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500" placeholder="Tell us about yourself"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="my-2">
                        <label for="image" class="text-xs md:text-lg font-bold">{{ __('Profile Image') }}</label>
                        <div>
                            <input id="image" type="file" name="image" class="py-2 px-2 text-xs lg:text-lg lg:px-4 lg:py-[7px] rounded-full bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500">
                        </div>
                    </div>

                    <div class="my-3">
                        <button type="submit" class="text-xs px-2 py-2 w-full lg:py-3 lg:px-3 lg:text-lg rounded-full bg-purple-600 text-white font-semibold hover:bg-purple-700 duration-300 ease-in-out">{{ __('Register') }}</button>
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


    <script>
        document.getElementById('role').addEventListener('change', function() {
            const formateurFields = document.getElementById('formateur-fields');
            if (this.value === 'formateur') {
                formateurFields.classList.remove('hidden');
            } else {
                formateurFields.classList.add('hidden');
            }
        });
    
        const universityInput = document.getElementById('university');
        const universitySuggestionsContainer = document.getElementById('suggestions');
    
        universityInput.addEventListener('input', async () => {
            const query = universityInput.value;
            if (query.length < 3) {
                universitySuggestionsContainer.classList.add('hidden');
                return;
            }
            try {
                const response = await fetch('https://raw.githubusercontent.com/Hipo/university-domains-list/master/world_universities_and_domains.json');
                const universities = await response.json();
                const filteredUniversities = universities
                    .filter(univ => univ.name.toLowerCase().includes(query.toLowerCase()))
                    .slice(0, 10);
    
                universitySuggestionsContainer.innerHTML = '';
                filteredUniversities.forEach(univ => {
                    const suggestionItem = document.createElement('div');
                    suggestionItem.className = 'suggestion-item';
                    suggestionItem.textContent = univ.name;
                    suggestionItem.addEventListener('click', () => {
                        universityInput.value = univ.name;
                        universitySuggestionsContainer.classList.add('hidden');
                    });
                    universitySuggestionsContainer.appendChild(suggestionItem);
                });
                universitySuggestionsContainer.classList.remove('hidden');
            } catch (error) {
                console.error('Error fetching university data:', error);
            }
        });
    
        const nationalityInput = document.getElementById('nationality');
        const nationalitySuggestionsContainer = document.getElementById('nationality-suggestions');
    
        nationalityInput.addEventListener('input', async () => {
            const query = nationalityInput.value;
            if (query.length < 3) {
                nationalitySuggestionsContainer.classList.add('hidden');
                return;
            }
            try {
                const response = await fetch('https://api.first.org/data/v1/countries');
                const countriesData = await response.json();
                const countries = Object.values(countriesData.data);
                const filteredCountries = countries
                    .filter(country => country.country.toLowerCase().includes(query.toLowerCase()))
                    .slice(0, 10);
    
                nationalitySuggestionsContainer.innerHTML = '';
                filteredCountries.forEach(country => {
                    const suggestionItem = document.createElement('div');
                    suggestionItem.className = 'suggestion-item';
                    suggestionItem.textContent = country.country;
                    suggestionItem.addEventListener('click', () => {
                        nationalityInput.value = country.country;
                        nationalitySuggestionsContainer.classList.add('hidden');
                    });
                    nationalitySuggestionsContainer.appendChild(suggestionItem);
                });
                nationalitySuggestionsContainer.classList.remove('hidden');
            } catch (error) {
                console.error('Error fetching country data:', error);
            }
        });
    
        document.addEventListener('click', (event) => {
            if (!universityInput.contains(event.target) && !universitySuggestionsContainer.contains(event.target)) {
                universitySuggestionsContainer.classList.add('hidden');
            }
            if (!nationalityInput.contains(event.target) && !nationalitySuggestionsContainer.contains(event.target)) {
                nationalitySuggestionsContainer.classList.add('hidden');
            }
        });
    
        const diplomasContainer = document.getElementById('diplomas-container');
    
        diplomasContainer.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                const input = event.target;
                if (input.value.trim() === '') return;
                const newDiplomaItem = document.createElement('div');
                newDiplomaItem.classList.add('diploma-item');
                newDiplomaItem.innerHTML = `
                    <input type="text" name="diplomas[]" class="py-2 px-2 text-xs lg:text-lg lg:px-4 lg:py-[7px] rounded-md bg-gray-100 w-full outline-none focus:ring-2 focus:ring-purple-500" value="${input.value}" readonly>
                    <span class="remove-diploma">&times;</span>
                `;
                diplomasContainer.appendChild(newDiplomaItem);
                input.value = '';
            }
        });
    
        diplomasContainer.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-diploma')) {
                const diplomaItem = event.target.closest('.diploma-item');
                diplomasContainer.removeChild(diplomaItem);
            }
        });
        </script>



</body>
</html>