<!DOCTYPE html>
<html>
<head>
    <title>Login - Ruang Memori</title>
    <style>
        body {
            background-color: #191970; /* midnight blue */
            color: white;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: rgba(255, 255, 255, 0.1);
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
    <h2>Masuk ke Ruang Memori</h2>

    <form method="POST" action="/login">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Masuk</button>
        <p><a href="/forgot-password">Lupa Password?</a></p>
    </form>
    <p>Belum punya akun? <a href="/register">Daftar</a></p>
</body>
</html>
