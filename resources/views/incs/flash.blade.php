<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alerts Example</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .alert {
            opacity: 1;
            transition: opacity 0.5s ease-out;
        }
        .alert.hide {
            opacity: 0;
        }
    </style>
</head>
<body>
    <div class="container mx-auto mt-5">

        @if($message = Session::get('successValidation')) 
        <div class="alert bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert"> 
            <span class="block sm:inline">{{ $message }}</span> 
            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.classList.add('hide');">X</button> 
        </div> 
        @endif

        
        @if($message = Session::get('successReject')) 
        <div class="alert bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"> 
            <span class="block sm:inline">{{ $message }}</span> 
            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.classList.add('hide');">X</button> 
        </div> 
        @endif

        @if($message = Session::get('successSaveChanges')) 
        <div class="alert bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert"> 
            <span class="block sm:inline">{{ $message }}</span> 
            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.classList.add('hide');">X</button> 
        </div> 
        @endif

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                    alert.classList.add('hide');
                });
            }, 5000);
        });
    </script>
</body>
</html>
