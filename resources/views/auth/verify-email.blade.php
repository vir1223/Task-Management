<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi Email - Ruang Memori</title>
    <style>
        body {
            background-color: #191970; /* Midnight Blue */
            color: white;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            text-align: center;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 15px;
            width: 350px;
        }

        button {
            background-color: gold;
            color: black;
            font-weight: bold;
            padding: 10px 15px;
            border: none;
            border-radius: 10px;
            margin-top: 15px;
            cursor: pointer;
        }

        form {
            margin-top: 1rem;
        }

        .message {
            margin-top: 10px;
            font-size: 0.9rem;
            color: #ccc;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Verifikasi Email</h2>
        <p>Halo! Sebelum melanjutkan, mohon verifikasi alamat email kamu.</p>
        <p>Jika kamu belum menerima email, kami bisa mengirim ulang.</p>

        @if (session('status') === 'verification-link-sent')
            <p class="message">Link verifikasi baru telah dikirim ke email kamu.</p>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit">Kirim Ulang Email Verifikasi</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="background-color: #ff6961; color: white; margin-top: 10px;">Keluar</button>
        </form>
    </div>
</body>
</html>
