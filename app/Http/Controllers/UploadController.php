<?php

namespace App\Http\Controllers;

use App\Models\foto;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function inputimage()
    {
        return view('frominput');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'judulfoto' => 'required|string|max:255',
            'imagefile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust max size as needed
            'deksipsifoto' => 'nullable|string',
            'lokasifoto' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('imagefile')) {
            $image = $request->file('imagefile');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            foto::create([
                'judulfoto' => $request->judulfoto,
                'imagefile' => $imageName,
                'deksipsifoto' => $request->deksipsifoto,
                'lokasifoto' => $request->lokasifoto,
                // assuming you have a relationship with the authenticated user
                'user_id' => auth()->user()->id, 
            ]);

            return redirect()->back()->with('success', 'Foto berhasil diunggah.');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah foto.');
    }
}
