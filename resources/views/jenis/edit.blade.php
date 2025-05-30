<!DOCTYPE html>
<html>
<head>
    <title>Form Jenis</title>
    <style>
        body {
            background-color: #0b0f1a;
            color: #ffd700;
            font-family: 'Segoe UI', sans-serif;
            padding: 40px;
        }
        input {
            background-color: #1e293b;
            color: #ffd700;
            border: none;
            padding: 10px;
            border-radius: 8px;
            width: 100%;
            margin-bottom: 15px;
        }
        button {
            background-color: #ffd700;
            color: #0b0f1a;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
        }
        a { color: #ffd700; text-decoration: none; display: inline-block; margin-top: 20px; }
    </style>
</head>
<body>

    <h2>{{ isset($jeni) ? '✏️ Edit Jenis' : '➕ Tambah Jenis' }}</h2>

    <form action="{{ isset($jeni) ? route('jenis.update', $jeni->id) : route('jenis.store') }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="name" placeholder="Nama jenis..." value="{{ $jeni->name ?? '' }}" required>
        <button type="submit">{{ isset($jeni) ? 'Update' : 'Simpan' }}</button>
    </form>

    <a href="{{ route('jenis.index') }}">← Kembali ke daftar jenis</a>

</body>
</html>
