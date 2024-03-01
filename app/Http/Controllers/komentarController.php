<?php

namespace App\Http\Controllers;

use App\Models\foto;
use App\Models\komentarfoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class komentarController extends Controller
{

    // show Comentar
    public function showKomentarFoto(komentarfoto $komentar, $foto_id)
    {
        // Temukan foto berdasarkan ID yang diberikan
        $foto = foto::findOrFail($foto_id);

        // Ambil semua komentar yang terkait dengan foto tersebut
        $komentar = komentarfoto::where('foto_id', $foto_id)->with('user')->get();

        return view('komentarview', compact('foto', 'komentar'));
    }


    // Post Komentar
    public function createKomentar(Request $request, $id)

    {
        $request->validate([
            'isikomentar' => 'required|string|max:255',
        ]);
    
        $foto = Foto::findOrFail($id);
    
        $komentar = new KomentarFoto();
        $komentar->user_id = Auth::id();
        $komentar->foto_id = $foto->id;
        $komentar->isikomentar = $request->isikomentar;
        $komentar->save();
        
        return redirect()->route('komentar.foto', $foto->id)->with('success', 'Komentar berhasil ditambahkan');
    }
}
