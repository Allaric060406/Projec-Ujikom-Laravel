<?php

namespace App\Http\Controllers;

use App\Models\album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function showAlbum()
    {
        return view('Your_Gallery');
    }

    public function uploadalbum(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'user_id'=>'required',
            'namaalbum' => 'required',
            'deskripsi' => 'required',
            'tanggal_dibuat' => 'required|date',
        ]);
        // Membuat album baru
        $album = album::create($validatedData);

        // Jika album berhasil dibuat, redirect pengguna ke halaman lain
        if ($album) {
            return redirect()->route('dashboard')->with('success', 'Album berhasil dibuat!');
        } else {
            // Jika gagal, kembali ke halaman pembuatan album dengan pesan kesalahan
            return back()->withInput()->with('error', 'Gagal membuat album. Silakan coba lagi.');
        }

    }
}
