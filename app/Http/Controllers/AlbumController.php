<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\foto;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function showAlbum()
    {
        // Mendapatkan ID pengguna yang saat ini masuk
        $userId = auth()->id();
    
        // Mengambil data Album berdasarkan ID pengguna yang masuk
        $coverimage = Album::where('user_id', $userId)->get();
    
        return view('Your_Gallery', compact('coverimage'));
    }

    public function showPhotos($albumId)
    {
        // Mengambil data foto berdasarkan album_id
        $Detailalbum = foto::where('album_id', $albumId)->get();
        
        return view('detailalbum', [
            'Detailalbum' => $Detailalbum,
        ]);
    }

    public function uploadalbum(Request $request)
    {
        $request->validate([
            'namaalbum' => 'required|string|max:255',
            'coverimage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal_dibuat' => 'required|date', // Sesuaikan dengan kebutuhan
            'deskripsi' => 'nullable|string',
        ]);

        // Mengambil file foto dari request
        $image = $request->file('coverimage');
        // Membuat nama unik untuk file foto
        $imageName = time().'.'.$image->extension();
        // Menyimpan file foto ke dalam folder public/images
        $image->move(public_path('images'), $imageName);

        // Membuat entri baru dalam database
        album::create([
            'namaalbum' => $request->namaalbum,
            'coverimage' => $imageName,
            'tanggal_dibuat' => $request->tanggal_dibuat,
            'deskripsi' => $request->deskripsi,
            // Jika diperlukan, tambahkan bidang lainnya sesuai kebutuhan
            'user_id' => auth()->user()->id,
        ]);

        // Redirect ke halaman tertentu atau berikan respons sesuai kebutuhan
        return redirect()->route('inputimage')->with('success', 'Foto berhasil diunggah!');
    }


    public function delete($id)
    {
        $al = Album::find($id);
        if (!$al) {
            return redirect()->back()->with('error', 'al tidak ditemukan.');
        }
        // Album::destroy($album->id);
        $al->delete();
        return redirect()->back()->with('success', 'al berhasil dihapus.');
    }

}
