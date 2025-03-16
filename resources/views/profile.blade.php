<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .animate-bounce {
            @apply animate-bounce;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-200">

<div class="bg-white p-8 rounded-lg shadow-lg w-80 text-center">
    <img class="w-24 h-24 mx-auto rounded-full border-4 border-blue-200 hover:animate-bounce" src="{{asset('assets/img/fotoprofile.jpeg')}}" alt="Foto Profile">
       <div class="mt-4 space-y-2">
        <div class="bg-gray-200 text-gray-800 font-semibold py-2 rounded-md px-4"> 
            <span><?= $nama ?></span>
        </div>
        <div class="bg-gray-200 text-gray-800 font-semibold py-2 rounded-md px-4">
           <span><?= $npm ?></span>
        </div>
        <div class="bg-gray-200 text-gray-800 font-semibold py-2 rounded-md px-4"> 
            <span><?= $kelas ?></span>
        </div>
    </div>
</div>

</body>
</html>