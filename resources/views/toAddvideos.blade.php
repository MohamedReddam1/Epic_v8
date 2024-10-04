@extends('formateur')

@section('contentFormateur')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Videos</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .video-input {
            width: 70%;
            margin-top: 0.5rem;
        }

        .video-label {
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-gray-100 pt-16">
    <div class="w-10/12 lg:w-7/12 mx-auto bg-white p-6 rounded-md shadow-md mt-32">
        <h2 class="text-2xl font-semibold mb-4">Add Content to {{$title}} course</h2>
        <form action="{{ route('saveVideos') }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div id="videoUploadInputs">

            </div>
            
            <input type="hidden" name="id_pendingformation" value="{{$id_pendingformation}}">
            <button type="button" onclick="addVideoUploadInput()" class="mt-2 bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700">+</button>
            <button type="submit" class="bg-purple-600 text-white py-2 px-4 rounded-md hover:bg-purple-700 w-full mt-4">Add content</button>
        </form>
        <form action="/cancelCourse/{{$id_pendingformation}}" method="GET"> 
            @csrf 
            @method('DELETE') 
            <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 w-full mt-4">Annuler la formation</button> 
        </form>
    </div>
    

    <script>
        let videoIndex = 0;

        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        function addVideoUploadInput() {
            videoIndex++;
            var videoUploadInputs = document.getElementById('videoUploadInputs');
            
            var div = document.createElement('div');
            div.classList.add('mb-4');
            div.setAttribute('id', 'video-input-' + videoIndex);
            
            var color = getRandomColor();
            
            // Title input
            var titleLabel = document.createElement('label');
            titleLabel.textContent = 'Video Title:';
            titleLabel.classList.add('block', 'text-sm', 'font-medium', 'text-gray-700', 'video-label');
            titleLabel.style.color = color;
            div.appendChild(titleLabel);
            var titleInput = document.createElement('input');
            titleInput.type = 'text';
            titleInput.name = 'video_' + videoIndex + '_title';
            titleInput.required = true;
            titleInput.classList.add('mt-1', 'p-2', 'w-full', 'border', 'border-gray-300', 'rounded-md', 'focus:outline-none', 'focus:ring', 'focus:ring-indigo-200', 'video-input');
            div.appendChild(titleInput);
            
            // Duration input
            var durationLabel = document.createElement('label');
            durationLabel.textContent = 'Video Duration:';
            durationLabel.classList.add('block', 'text-sm', 'font-medium', 'text-gray-700', 'mt-4', 'video-label');
            durationLabel.style.color = color;
            div.appendChild(durationLabel);
            var durationInput = document.createElement('input');
            durationInput.type = 'text';
            durationInput.name = 'video_' + videoIndex + '_duration';
            durationInput.required = true;
            durationInput.classList.add('mt-1', 'p-2', 'w-full', 'border', 'border-gray-300', 'rounded-md', 'focus:outline-none', 'focus:ring', 'focus:ring-indigo-200', 'video-input');
            div.appendChild(durationInput);

            // Content input
            var contentLabel = document.createElement('label');
            contentLabel.textContent = 'Video Content:';
            contentLabel.classList.add('block', 'text-sm', 'font-medium', 'text-gray-700', 'mt-4', 'video-label');
            contentLabel.style.color = color;
            div.appendChild(contentLabel);
            var contentInput = document.createElement('input');
            contentInput.type = 'file';
            contentInput.name = 'video_' + videoIndex + '_content';
            contentInput.required = true;
            contentInput.accept = '.pdf,.mp4';
            contentInput.classList.add('mt-1', 'p-2', 'w-full', 'border', 'border-gray-300', 'rounded-md', 'focus:outline-none', 'focus:ring', 'focus:ring-indigo-200', 'video-input');
            div.appendChild(contentInput);

            // Cancel button
            var cancelButton = document.createElement('button');
            cancelButton.type = 'button';
            cancelButton.textContent = 'Cancel';
            cancelButton.classList.add('mt-2', 'bg-red-600', 'text-white', 'py-3', 'px-3', 'rounded-md', 'hover:bg-red-700');
            cancelButton.onclick = function() {
                removeVideoUploadInput(videoIndex);
            };
            div.appendChild(cancelButton);
            
            // Add a line break
            div.appendChild(document.createElement('br'));

            // Append the div to the parent container
            videoUploadInputs.appendChild(div);
        }

        function removeVideoUploadInput(index) {
            var element = document.getElementById('video-input-' + index);
            element.parentNode.removeChild(element);
        }
    </script>
</body>
</html>

@endsection


