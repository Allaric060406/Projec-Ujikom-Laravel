<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\foto;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class UploadController extends Controller
{
    public function inputimage()
    {
        $datacategory = Album::all();
        return view('frominput',compact('datacategory'));
    }

    public function viewupdate(Request $request,$id)
    {
            $data =foto::find($id);
            $datalabum =Album::all();
            return view ('updatefoto',compact('data','datalabum'));
        
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
        return redirect()->route('showupload')->with('success', 'Foto berhasil diunggah!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judulfoto' => 'required|string|max:255',
            'imagefile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'album_id' => 'required', // Sesuaikan dengan kebutuhan
            'lokasifoto' =>'nullable|string',
            'deskripsifoto' => 'nullable|string',
        ]);

        $foto = Foto::findOrFail($id);

        // Jika ada file foto yang diunggah, proses penyimpanan gambar baru
        if ($request->hasFile('imagefile')) {
            $image = $request->file('imagefile');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
            $foto->imagefile = $imageName;
        }

        // Memperbarui data lainnya
        $foto->judulfoto = $request->judulfoto;
        $foto->album_id = $request->album_id;
        $foto->lokasifoto = $request->lokasifoto;
        $foto->deskripsifoto = $request->deskripsifoto;

        // Menyimpan perubahan ke dalam database
        $foto->save();

        // Redirect ke halaman tertentu atau berikan respons sesuai kebutuhan
        return redirect()->route('showupload')->with('success', 'Foto berhasil diperbarui!');
    }

    public function delete($id)
    {
        $foto = Foto::find($id);
        if (!$foto) {
            return redirect()->back()->with('error', 'Foto tidak ditemukan.');
        }
        $foto->delete();
        return redirect()->back()->with('success', 'Foto berhasil dihapus.');
    }

}

