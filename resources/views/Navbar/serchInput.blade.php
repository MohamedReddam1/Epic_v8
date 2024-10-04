<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="max-w-lg mx-auto mt-20 w-full">
        <form action="{{ route('courses.search') }}" method="GET" class="mt-4 flex items-center">
            <input type="text" name="query" placeholder="Search courses..." class="w-full border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring focus:ring-indigo-200">
            <button type="submit" class="ml-2 bg-purple-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-200">Search</button>
        </form>
    </div>
</body>
</html>
