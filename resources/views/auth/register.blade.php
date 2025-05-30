<!DOCTYPE html>
<html>
<head>
    <title>Register - Ruang Memori</title>
    <style>
        body {
            background-color: gold;
            color: black;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: rgba(0, 0, 0, 0.1);
            padding: 2rem;
            border-radius: 15px;
            width: 300px;
        }

        input, button {
            width: 100%;
            margin-top: 10px;
            padding: 10px;
            border: none;
            border-radius: 8px;
        }

        button {
            background-color: midnightblue;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        a {
            color: midnightblue;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h2>Daftar ke Ruang Memori</h2>

    <form method="POST" action="/register">
        @csrf
        <input type="text" name="name" placeholder="Nama" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Ulangi Password" required>
        <button type="submit">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="/login">Masuk</a></p>
</body>
</html>
