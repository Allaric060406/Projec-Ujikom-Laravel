<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\foto;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function inputimage()
    {
        $datacategory = Album::all();
        return view('frominput',compact('datacategory'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'judulfoto' => 'required|string|max:255',
            'imagefile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'album_id' => 'required', // Sesuaikan dengan kebutuhan
            'lokasifoto' =>'nullable|string',
            'deskripsifoto' => 'nullable|string',
        ]);

        // Mengambil file foto dari request
        $image = $request->file('imagefile');
        // Membuat nama unik untuk file foto
        $imageName = time().'.'.$image->extension();
        // Menyimpan file foto ke dalam folder public/images
        $image->move(public_path('images'), $imageName);

        // Membuat entri baru dalam database
        Foto::create([
            'judulfoto' => $request->judulfoto,
            'imagefile' => $imageName,
            'album_id' => $request->album_id,
            'deskripsifoto' => $request->deskripsifoto,
            'lokasifoto' => $request->lokasifoto,
            // Jika diperlukan, tambahkan bidang lainnya sesuai kebutuhan
            'user_id' => auth()->user()->id,
        ]);

        // Redirect ke halaman tertentu atau berikan respons sesuai kebutuhan
        return redirect()->route('dashboard')->with('success', 'Foto berhasil diunggah!');
    }
}

