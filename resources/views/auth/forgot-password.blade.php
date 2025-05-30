<!DOCTYPE html>
<html>
<head>
    <title>Lupa Password - Ruang Memori</title>
    <style>
        body {
            background-color: #191970; /* Midnight blue */
            color: white;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 15px;
            width: 300px;
            text-align: center;
        }

        input, button {
            width: 100%;
            margin-top: 10px;
            padding: 10px;
            border: none;
            border-radius: 8px;
        }

        button {
            background-color: gold;
            font-weight: bold;
            cursor: pointer;
        }

        a {
            color: gold;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <h2>Lupa Password</h2>
        <input type="email" name="email" placeholder="Masukkan Email" required>
        <button type="submit">Kirim Link Reset</button>
    </form>
</body>
</html>
