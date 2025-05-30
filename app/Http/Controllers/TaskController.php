<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;
use App\Models\Jenis;
use App\Models\memo;
class TaskController extends Controller
{
    public function index(Request $request)
    {   
        $query = Task::query();

        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }
        if ($request->filled('condition')) {
            $query->where('condition', $request->condition);
        }
        if ($request->filled('difficulty')) {
            $query->where('difficulty', $request->difficulty);
        }
        $tugas = $query->with('jenis')->get();
        $jenis = Jenis::all();

        return view('tugas.index', ['tugas' => $tugas,'jenisList' => $jenis]);
    }
    public function create()
    {
    $jenis = Jenis::all();
    return view('tugas.create', ['jenisList' => $jenis]);
    }

    public function store(Request $request)
    {   

        $data=$request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
            'jenis' => 'required',
            'condition' => 'required',
            'difficulty' => 'required',
        ]);
        Task::create($data);

        return redirect('/tugas')->with('success', 'Tugas berhasil ditambahkan!');

    }
    
    public function edit(Request $request, $id)
    {
        $tugas = Task::find($id);
        $jenis = Jenis::all();
        return view('tugas.edit', ['tugas' => $tugas, 'jenisList' => $jenis]);
    }
    public function update(Request $request, $id)
    {
        $data=$request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
            'jenis' => 'required',
            'condition' => 'required',
            'difficulty' => 'required',
        ]);
        
        Task::find($id)->update($data);

        return redirect('/tugas')->with('success', 'Tugas berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $tugas = Task::find($id);
        $tugas->delete();

        return redirect('/tugas')->with('success', 'Tugas berhasil dihapus!');
    }
    public function archive(Request $request, $id)
    {   
        $tugas = Task::find($id);
        
        $data = new memo();
        $data->judul = $tugas->judul;
        $data->isi = $tugas->isi;
        $data->tanggal = $tugas->tanggal;
        $data->jenis = $tugas->jenis;
        $data->condition = $tugas->condition;
        $data->difficulty = $tugas->difficulty;
        $data->save();
        $tugas->delete();
        
        return redirect('/tugas')->with('success', 'Tugas berhasil diarsipkan!');
    }
}
