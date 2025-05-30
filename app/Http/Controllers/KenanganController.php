<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\memo;
use App\Models\Jenis;

class KenanganController extends Controller
{
    public function index( Request $request)
    {   
        
        $query = memo::query();

        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }
        if ($request->filled('condition')) {
            $query->where('condition', $request->condition);
        }
        if ($request->filled('difficulty')) {
            $query->where('difficulty', $request->difficulty);
        }
        $memo = $query->with('jenis')->get();
        $jenis = Jenis::all();

        return view('kenangan.index', ['jenisList' => $jenis,'kenangan' => $memo]);
    }
    public function destroy($id)
    {
        memo::find($id)->delete();
        return redirect()->route('kenangan.index')->with('success', 'Memory deleted successfully!');
    }
}
