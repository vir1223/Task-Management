<!DOCTYPE html>
<html>
<head>
    <title>Reset Password - Ruang Memori</title>
    <style>
        body {
            background-color: gold;
            color: black;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: rgba(0, 0, 0, 0.1);
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
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <h2>Reset Password</h2>

        <!-- Hidden Token -->
        <input type="hidden" name="token" value="{{ $token }}">
        
        <!-- Email -->
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
        
        <!-- New Password -->
        <input type="password" name="password" placeholder="Password baru" required>

        <!-- Confirm Password -->
        <input type="password" name="password_confirmation" placeholder="Ulangi Password" required>

        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
