<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, rgb(13, 12, 77), #53A2DC); 
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.1); 
            backdrop-filter: blur(10px);
            border-radius: 10px;
            padding: 2rem;
            width: 21rem;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }
        .input-field {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            color: white;
            margin: 10px 0;
        }
        .field-row {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }
        .field-row label {
            color: white;
            font-size: 1rem;
            font-weight: 500;
            margin-right: 1rem;
            width: 20%; /* Lebar label */
            text-align: right;
        }
        .select-field {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 5px;
            padding: 10px;
            width: 80%; /* Lebar dropdown */
            color: white;
        }
        .error-message {
            color: #ff4d4d; /* Warna merah untuk pesan error */
            font-size: 0.875rem; /* Ukuran font kecil */
            margin-top: -8px;
            margin-bottom: 10px;
        }
        .button {
            background: #6a82fb;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            text-align: center;
        }
    select:focus { outline: none; border: 2px solid #6a82fb; } option { color: black; /* Warna teks default */ } select option:checked { background-color: #6a82fb; /* Warna latar belakang saat dipilih */ color: white; /* Warna teks saat dipilih */ }
    </style>
</head>
<body>
    <form class="form-container" action="{{ route('user.store') }}" method="POST">
        @csrf
        <h2 class="text-2xl font-semibold text-center text-white mb-6">Login</h2>

        <!-- Input Nama -->
        <input class="input-field" type="text" name="nama" placeholder="NAMA">
        @foreach ($errors->get('nama') as $msg) 
            <p class="error-message">{{ $msg }}</p>
        @endforeach

        <!-- Input NPM -->
        <input class="input-field" type="text" name="npm" placeholder="NPM">
        @foreach ($errors->get('npm') as $msg) 
            <p class="error-message">{{ $msg }}</p>
        @endforeach

        <!-- Dropdown Kelas -->
        <div class="field-row">
            <label for="kelas_id">Kelas:</label>
            <select class="select-field" name="kelas_id" id="kelas_id">
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <button class="button" type="submit">Submit</button>
    </form>
</body>
</html>