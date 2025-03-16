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
            width: 24rem;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }
        .input-field {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 5px;
            padding: 12px;
            width: 100%;
            color: white;
            margin-bottom: 15px;
        }
        .input-field::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        .button {
            background: #6a82fb;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            text-align: center;
            transition: background 0.3s ease;
        }
        .button:hover {
            background: #5b72e2;
        }
    </style>
</head>
<body>
    <form class="form-container" action="{{ route('user.store') }}" method="POST">
        @csrf
        <h2 class="text-2xl font-semibold text-center text-white mb-6">Login</h2>
        <input class="input-field" type="text" name="nama" placeholder="NAMA" required>
        <input class="input-field" type="text" name="npm" placeholder="NPM" required>
        <input class="input-field" type="text" name="kelas" placeholder="KELAS" require>

        <!-- Submit Button -->
        <button class="button" type="submit">Submit</button>
    </form>
</body>
</html>
