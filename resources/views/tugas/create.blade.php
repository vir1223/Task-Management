<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Tugas</title>
    <style>
        body {
            background-color: #0b0f1a;
            color: #ffd700;
            font-family: 'Segoe UI', sans-serif;
            padding: 30px;
        }

        .form-container {
            background-color: #1e293b;
            padding: 20px;
            border-radius: 15px;
            max-width: 600px;
            margin: auto;
        }

        input, textarea, select {
            width: 100%;
            margin-top: 10px;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #334155;
            color: #fff;
        }

        button {
            background-color: #ffd700;
            color: #0b0f1a;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
        }

        a {
            color: #ffd700;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Tambah Tugas</h2>

        <form action="{{ route('tugas.store') }}" method="POST">
            @csrf

            <label>Judul</label>
            <input type="text" name="judul" required>

            <label>Isi</label>
            <textarea name="isi" required></textarea>

            <label>Tanggal</label>
            <input type="date" name="tanggal" required>

            <label>Jenis</label>
            <select name="jenis" required>
                @foreach ($jenisList as $jenis)
                    <option value="{{ $jenis->id }}">{{ $jenis->name }}</option>
                @endforeach
            </select>

            <label>Kondisi</label>
            <select name="condition">
                <option value="ongoing">Ongoing</option>
                <option value="deadline">Deadline</option>
                <option value="complete">Complete</option>
                <option value="abandon">Abandon</option>
            </select>

            <label>Kesusahan</label>
            <select name="difficulty">
                <option value="easy">Easy</option>
                <option value="medium">Medium</option>
                <option value="hard">Hard</option>
            </select>

            <button type="submit">Simpan</button>
        </form>

        <a href="{{ route('tugas.index') }}">← Kembali ke Daftar Tugas</a>
    </div>

</body>
</html>
