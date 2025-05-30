</html> 
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Tugas</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            color: #0b0f1a;
            background-color: #fdf6e3;
        }

        .header {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }

        .quote {
            text-align: center;
            font-style: italic;
            margin-bottom: 20px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
            padding: 20px;
        }

        .task-card {
            background-color: #f6d784;
            padding: 15px;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .task-card:hover {
            background-color: #f5d06c;
        }

        .modal-bg {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .modal {
            background-color: #fdf6e3;
            padding: 25px;
            border-radius: 15px;
            max-width: 500px;
            color: #201802;
            position: relative;
        }

        .btn-close {
            position: absolute;
            top: 10px; right: 15px;
            background: none;
            color: #201802;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }


        .btn-delete {
            background-color: crimson;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
        }

        a.back-link {
            color: #0b0f1a;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>📘 Dunia Kenangan</h2>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="button" onclick="confirmLogout()" style="background-color: #0b0f1a; color: white  ; padding: 8px 12px; border: none; border-radius: 5px;">
                Logout
            </button>
        </form>
        <a href="/home" class="back-link"> Kembali ke Ruang Memori → </a>
    </div>

    <div class="quote">"Di sinilah kisah lama disimpan. Setiap tawa, air mata, dan momen terpatri di antara lembaran waktu."</div>
    <div style="padding: 0 20px 20px; display: flex; flex-wrap: wrap; gap: 10px; align-items: center;">
        <form method="GET" action="{{ route('kenangan.index') }}" style="display: flex; flex-wrap: wrap; gap: 10px;">
            <select name="jenis">
                <option value="">Jenis</option>
                @foreach ($jenisList as $jenis)
                    <option value="{{ $jenis->id }}" {{ request('jenis') == $jenis->id ? 'selected' : '' }}>
                        {{ $jenis->name }}
                    </option>
                @endforeach
            </select>

            <select name="condition">   
                <option value="">Kondisi</option>
                <option value="complete" {{ request('condition') == 'complete' ? 'selected' : '' }}>Complete</option>
                <option value="ongoing" {{ request('condition') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="deadline" {{ request('condition') == 'deadline' ? 'selected' : '' }}>Deadline</option>
                <option value="abandon" {{ request('condition') == 'abandon' ? 'selected' : '' }}>Abandon</option>
            </select>

            <select name="difficulty">
                <option value="">Kesusahan</option>
                <option value="easy" {{ request('difficulty') == 'easy' ? 'selected' : '' }}>Easy</option>
                <option value="medium" {{ request('difficulty') == 'medium' ? 'selected' : '' }}>Medium</option>
                <option value="hard" {{ request('difficulty') == 'hard' ? 'selected' : '' }}>Hard</option>
            </select>

            <button type="submit" style="background-color: #0b0f1a; color: #fdf6e3; padding: 8px 12px; border: none; border-radius: 5px;">Filter</button>
        </form>
    </div>


    <div class="grid">
        @foreach ($kenangan as $item)
            <div class="task-card" onclick="openModal({{ $item->id }})">
                <h4>{{ $item->judul }}</h4>
                <p style="font-size: 12px;">{{ \Illuminate\Support\Str::limit($item->isi, 20) }}</p>
            </div>

            <div class="modal-bg" id="modal-{{ $item->id }}">
                <div class="modal">
                    <button class="btn-close" onclick="closeModal({{ $item->id }})">&times;</button>
                    <h3>{{ $item->judul }}</h3>
                    <p style="word-wrap: break-word;">{{ $item->isi }}</p>
                    <p>
                        📅 {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}<br>
                        @foreach ($jenisList as $list)
                            @if ($list->id==$item->jenis)
                                🔖 Jenis: {{ $list->name ?? '-' }}<br>
                            @endif
                        @endforeach
                        📌 Kondisi: {{ ucfirst($item->condition) }}<br>
                        💪 Kesusahan: {{ ucfirst($item->difficulty) }}
                    </p>

                    <form action="{{ route('kenangan.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('Yakin hapus tugas ini?')">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function openModal(id) {
            document.getElementById('modal-' + id).style.display = 'flex';
        }
        function closeModal(id) {
            document.getElementById('modal-' + id).style.display = 'none';
        }
        function confirmLogout() {
            if (confirm("Apakah ini saatnya untuk pergi?")) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>

</body>
</html>
