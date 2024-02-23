<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\foto;
use App\Models\User;
use Illuminate\Http\Request;

class showuploadcontroller extends Controller
{
    public function showupload()
    {
        $User = auth()->id();
        $User = foto::with('album')->where('user_id', $User)->get();
        return view('showupload', compact('User'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'album_id' => 'required|exists:albums,id',
            'judulfoto' => 'required|string',
            'deskripsifoto' => 'required|string',
            'lokasifoto' => 'required|string',
        ]);

        // Cari foto berdasarkan ID
        $foto = Foto::findOrFail($id);

        // Update atribut foto
        $foto->user_id = $request->user_id;
        $foto->album_id = $request->album_id;
        $foto->judulfoto = $request->judulfoto;
        $foto->deskripsifoto = $request->deskripsifoto;
        $foto->lokasifoto = $request->lokasifoto;

        // Simpan perubahan
        $foto->save();

        // Berikan respons sukses dan arahkan kembali ke view showupload
        return redirect()->route('nama_route_showupload')->with('success', 'Foto berhasil diperbarui');
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
