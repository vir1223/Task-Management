<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ruangan Memori</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Crimson+Text&display=swap" rel="stylesheet">
    <style>
        :root {
            --warna-teks: #f5f3e7;
            --transisi-lambat: 0.8s ease;
        }

        body {
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Crimson Text', serif;
            background: #1e1e1e;
            transition: background var(--transisi-lambat);
            position: relative;
            animation: fadeIn 1.2s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.98); }
            to { opacity: 1; transform: scale(1); }
        }

        .overlay {
            background-color: rgba(20, 16, 10, 0.85);
            padding: 30px 40px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.5);
            text-align: center;
            max-width: 600px;
            z-index: 2;
            position: relative;
            color: var(--warna-teks);
            transition: color var(--transisi-lambat);
        }

        .title {
            font-size: 36px;
            font-family: 'Cinzel', serif;
            margin-bottom: 10px;
        }

        .desc {
            font-size: 18px;
            color: #d3cbb8;
            transition: color var(--transisi-lambat);
        }

        .click-zone {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 50%;
            cursor: pointer;
            z-index: 3;
        }

        .left-zone { left: 0; }
        .right-zone { right: 0; }

        .label {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: rgba(255,255,255,0.5);
            pointer-events: none;
            z-index: 4;
            transition: color var(--transisi-lambat);
        }

        .label.left { left: 20px; }
        .label.right { right: 20px; }
    </style>
</head>
<body id="ruanganMemori">
    <div class="click-zone left-zone"
         onclick="window.location.href='{{ url('/kenangan') }}'"
         onmouseover="ubahBackground('kenangan')"
         onmouseout="resetBackground()"></div>

    <div class="click-zone right-zone"
         onclick="window.location.href='{{ url('/tugas') }}'"
         onmouseover="ubahBackground('tugas')"
         onmouseout="resetBackground()"></div>

    <div class="label left" id="labelKiri">← Masuki Dunia Kenangan</div>
    <div class="label right" id="labelKanan">Masuki Dunia Tugas →</div>

    <div class="overlay">
        <div class="title">📖 Ruangan Memori</div>
        <div class="desc">
            Klik sisi kiri untuk kenangan... atau kanan untuk tugas.<br>
            Setiap sisi buku menyimpan kisahnya masing-masing.
        </div>
    </div>

    <script>
        const body = document.getElementById('ruanganMemori');
        const labelKiri = document.getElementById('labelKiri');
        const labelKanan = document.getElementById('labelKanan');

        function ubahBackground(zona) {
            if (zona === 'kenangan') {
                body.style.background = 'linear-gradient(to right, #fdf6e3, #fbe7a1)';
                labelKiri.style.color = '#000000';
                labelKanan.style.color = 'rgba(255,255,255,0.5)';
            } else if (zona === 'tugas') {
                body.style.background = 'linear-gradient(to bottom, #1a2135, #0b0f1a)';
                labelKanan.style.color = '#ffffff';
                labelKiri.style.color = 'rgba(255,255,255,0.5)';
            }
        }

        function resetBackground() {
            body.style.background = '#1e1e1e';
            labelKiri.style.color = 'rgba(255,255,255,0.5)';
            labelKanan.style.color = 'rgba(255,255,255,0.5)';
        }
    </script>
</body>
</html>
