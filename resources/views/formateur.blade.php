<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>@yield('formateurtitle')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        *{
            font-family: "Poppins", sans-serif;
        }
        .trueE {
            background-color: red; /* Set background color to red */
    /* Add any other styles you want for the trueE class */
        }
    </style>
</head>

<body class="bg-gray-50 flex justify-between items-start">
    <div class=" w-1/12 lg:w-2/12"> <!-- Sidebar width + 10px margin -->
        @include('sidebar/sidebarformateur')
    </div>
    <div class="w-full lg:w-9/12 xl:w-10/12">
        @yield('contentFormateur')
    </div>
</body>
</html>
