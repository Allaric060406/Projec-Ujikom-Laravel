<?php

namespace App\Http\Controllers;

use App\Models\komentarfoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class komentarController extends Controller
{

    
    // create komentar
    public function createKomentar($fotoId, $isiKomentar)
    {
        // Membuat komentar baru
        $komentar = new komentarfoto();
        $komentar->isikomentar = $isiKomentar;
        $komentar->foto_id = $fotoId; // Menggunakan ID foto yang diberikan

        // Menyimpan ID pengguna yang membuat komentar (jika ada pengguna yang sedang terautentikasi)
        if (Auth::check()) {
            $komentar->user_id = Auth::user()->id;
        }

        // Menyimpan komentar
        $komentar->save();

        // Mengembalikan komentar yang baru dibuat
        return $komentar;

        
    }
}
