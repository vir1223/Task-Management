<!-- Hampir sama dengan create.blade.php, hanya dengan data yang sudah diisi -->
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
<form action="{{ route('tugas.update', $tugas->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Judul</label>
    <input type="text" name="judul" value="{{ $tugas->judul }}" required>

    <label>Isi</label>
    <textarea name="isi" required>{{ $tugas->isi }}</textarea>

    <label>Tanggal</label>
    <input type="date" name="tanggal" value="{{ $tugas->tanggal }}" required>

    <label>Jenis</label>
    <select name="jenis">
        @foreach ($jenisList as $jenis)
            <option value="{{ $jenis->id }}" {{ $tugas->jenis_id == $jenis->id ? 'selected' : '' }}>
                {{ $jenis->name }}
            </option>
        @endforeach
    </select>
    @if ($tugas)
    
    @endif
    <label>Kondisi</label>
    <select name="condition">
        <option value="complete" {{ $tugas->condition == 'complete' ? 'selected' : '' }}>Complete</option>
        <option value="ongoing" {{ $tugas->condition == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
        <option value="deadline" {{ $tugas->condition == 'deadline' ? 'selected' : '' }}>Deadline</option>
        <option value="abandon" {{ $tugas->condition == 'abandon' ? 'selected' : '' }}>Abandon</option>
    </select>

    <label>Kesusahan</label>
    <select name="difficulty">
        <option value="easy" {{ $tugas->difficulty == 'easy' ? 'selected' : '' }}>Easy</option>
        <option value="medium" {{ $tugas->difficulty == 'medium' ? 'selected' : '' }}>Medium</option>
        <option value="hard" {{ $tugas->difficulty == 'hard' ? 'selected' : '' }}>Hard</option>
    </select>

    <button type="submit">Update</button>
</form>
