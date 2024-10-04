@extends('formateur')
@section('formateurTiltle','ajouter un cours')
@section('contentFormateur')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Course</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include FontAwesome for the '+' icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .video-input {
            width: 70%; /* Adjust the width as needed */
            margin-top: 0.5rem; /* Adjust spacing */
        }

        .video-label {
            font-weight: bold;
        }

        .icon-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem;
            height: 2.5rem;
            background-color: #4F46E5; /* indigo-600 */
            color: white;
            border-radius: 50%;
            cursor: pointer;
            margin-top: 0.5rem;
        }

        .cancel-button {
            background-color: #DC2626; /* red-600 */
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem; /* md rounded */
            cursor: pointer;
            margin-top: 0.5rem;
            display: inline-block;
        }
    </style>
</head>
<body class="bg-gray-100 pt-16"> <!-- Add extra padding to the top -->
    <div class="w-10/12 mx-auto bg-white p-6 rounded-md shadow-md mt-20">
        <h2 class="text-2xl font-semibold mb-4">Add Course</h2>
        <form action="{{ route('str') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                <input type="text" id="title" name="title" required class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
                @error('title') 
                                    <span class="invalid-feedback" role="alert"> 
                                        <strong>{{ $message }}</strong> 
                                    </span> 
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea id="description" name="description" required rows="3" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200"></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700 font-semibold">Image:</label>
                <input type="file" id="image" name="image" required class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
            </div>
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Price:</label>
                <input type="number" id="price" name="price" required class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
            </div>
            <div class="mb-4"> 
                <label for="category" class="block text-sm font-medium text-gray-700">Category :</label> 
                <select id="category" name="category" required class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200"> 
                    <option value="">Sélectionnez une catégorie</option> 
                    <option value="developpement">Développement</option> 
                    <option value="affaires">Affaires</option> 
                    <option value="finance-comptabilite">Finance & Comptabilité</option> 
                    <option value="it-logiciels">IT & Logiciels</option> 
                    <option value="productivite-bureau">Productivité de Bureau</option> 
                    <option value="developpement-personnel">Développement Personnel</option> 
                    <option value="conception">Conception</option> 
                    <option value="marketing">Marketing</option> 
                    <option value="photographie-video">Photographie & Vidéo</option> 
                    <option value="sante-fitness">Santé & Fitness</option> 
                </select> 
            </div>
            <div class="mb-4">
                <label for="level" class="block text-sm font-medium text-gray-700">Niveau de Compétence:</label>
                <select id="level" name="level" required class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
                    <option value="">Select Level</option>
                    <option value="beginner">Beginner</option>
                    <option value="junior">Junior</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="senior">Senior</option>
                    <option value="expert">Expert</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="langue" class="block text-sm font-medium text-gray-700">Langue de Formation:</label>
                <select id="langue" name="langue" required class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
                    <option value="">Select Language</option>
                    <option value="francais">Français</option>
                    <option value="arabe">Arabe</option>
                    <option value="anglais">Anglais</option>
                    <option value="espagnol">Espagnol</option>
                </select>
            </div>
            <button type="submit" class="bg-purple-600 text-white py-2 px-4 rounded-md hover:bg-purple-700 w-full">Submit</button>
        </form>
        
        
    </div>

</body>
</html>
@endsection
