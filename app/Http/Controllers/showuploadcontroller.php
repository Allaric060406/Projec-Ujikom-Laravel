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
