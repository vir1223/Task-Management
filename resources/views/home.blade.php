<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ananta Memoir — Waktu Saat Ini</title>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&family=Cinzel&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('https://www.transparenttextures.com/patterns/paper-fibers.png');
            background-color: #f4f1ea;
            font-family: 'Crimson Text', serif;
            color: #3e2f1c;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            flex-direction: column;
            text-align: center;
        }

        .clock-box {
            background: #fffaf0;
            border: 4px solid #c0a67c;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            font-family: 'Cinzel', serif;
            font-size: 24px;
            max-width: 500px;
            width: 90%;
        }

        .title {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .note {
            margin-top: 20px;
            font-size: 16px;
            color: #7a6953;
        }
    </style>
</head>
<body onclick="window.location.href='{{ url('/home') }}'">
    <div class="clock-box">
        <div class="title">📚 Penjaga Waktu 🕰️ {{ auth()->user()->name }}</div>
        <div id="clock">Memuat waktu...</div>
        <div class="note">"Setiap detik adalah kenangan yang tertulis."</div>
    </div>

    <script>
        function updateClock() {
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const date = now.toLocaleDateString('id-ID', options);
            const time = now.toLocaleTimeString('id-ID');
            document.getElementById('clock').innerHTML = `${date}<br>${time}`;
        }

        setInterval(updateClock, 1000);
        updateClock();
    </script>

</body>
</html>
