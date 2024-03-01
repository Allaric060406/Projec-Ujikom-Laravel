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
        return redirect()->route('showAlbum')->with('success', 'Foto berhasil diunggah!');
    }

    // show form edit album
    public function showeditalbum($id)
    {
        $albumedit = Album::findOrFail($id);
        // Anda dapat menyesuaikan view yang digunakan sesuai dengan kebutuhan aplikasi Anda
        return view('updatealbum', compact('albumedit'));
    }

    // fungsi edit post album
    public function updatealbum(Request $request, $id)
    {
        $album = Album::findOrFail($id);

        // Validate input
        $validatedData = $request->validate([
            'namaalbum' => 'required|string|max:255',
            'coverimage' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming 2MB as maximum size
            'deskripsi' => 'nullable|string',
        ]);

        // Update album data
        $album->namaalbum = $validatedData['namaalbum'];
        $album->deskripsi = $validatedData['deskripsi'];

        // Handle cover image update
        if ($request->hasFile('coverimage')) {
            $image = $request->file('coverimage');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $album->coverimage = $imageName;
        }

        // Save changes
        $album->save();

        return redirect()->route('showAlbum', ['album' => $album->id])->with('success', 'Album berhasil diperbarui');
    }

    // Delete Album
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
