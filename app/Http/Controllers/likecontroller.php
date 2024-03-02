<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class likecontroller extends Controller
{
    public function like(Photo $photo)
    {
        $like = new likefoto();
        $like->user_id = auth()->id();
        $like->foto_id = $id;
        $like->save();

        return back();
    }
}
