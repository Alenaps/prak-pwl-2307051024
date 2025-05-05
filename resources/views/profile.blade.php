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
     <div>
        @php
                $pathStorage = 'storage/uploads/' . $user->foto;
                $pathAsset = 'assets/upload/img/' . $user->foto;
        @endphp

        @if($user->foto && file_exists(public_path($pathStorage)))
            <img class="w-24 h-24 mx-auto rounded-full border-4 border-blue-200 hover:animate-bounce"
            src="{{ asset($pathStorage) }}" alt="Foto User" width="80">
        @elseif($user->foto && file_exists(public_path($pathAsset)))
            <img class="w-24 h-24 mx-auto rounded-full border-4 border-blue-200 hover:animate-bounce"
            src="{{ asset($pathAsset) }}" alt="Foto User" width="80">
        @else
            <img class="w-24 h-24 mx-auto rounded-full border-4 border-blue-200 hover:animate-bounce"
            src="{{ asset('assets/img/fotoprofile.jpeg') }}" alt="Default User" width="80">
        @endif
     </div>
       <div class="mt-4 space-y-2">
        <div class="bg-gray-200 text-gray-800 font-semibold py-2 rounded-md px-4"> 
            <span>{{ $user->nama }}</span>
        </div>
        <div class="bg-gray-200 text-gray-800 font-semibold py-2 rounded-md px-4">
           <span>{{ $user->npm  }}</span>
        </div>
        <div class="bg-gray-200 text-gray-800 font-semibold py-2 rounded-md px-4"> 
            <span>{{ $user->nama_kelas ?? 'Kelas tidak ditemukan'}}</span>
        </div>
    </div>
</div>

</body>
</html>