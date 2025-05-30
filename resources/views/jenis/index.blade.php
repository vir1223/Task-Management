<!DOCTYPE html>
<html>
<head>
    <title>Jenis Tugas</title>
    <style>
        body {
            background-color: #0b0f1a;
            color: #ffd700;
            font-family: 'Segoe UI', sans-serif;
            padding: 40px;
        }
        a { color: #ffd700; text-decoration: none; margin-right: 10px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        ul { list-style: none; padding: 0; }
        li {
            background-color: #1e293b;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 10px;
        }
        form { display: inline; }
        button {
            background-color: transparent;
            border: none;
            color: #ffd700;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="header">
        <a href="/tugas">← Kembali</a>
        <h2>📚 Daftar Jenis Tugas</h2>
        <a href="{{ route('jenis.create') }}">+ Tambah Jenis</a>
    </div>

    <ul>
        @foreach($jenis as $item)
        <li>
            {{ $item->name }}
            <a href="{{ route('jenis.edit', $item->id) }}">✏️</a>
            <form action="{{ route('jenis.destroy', $item->id) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit">🗑️</button>
            </form>
        </li>
        @endforeach
    </ul>

</body>
</html>
