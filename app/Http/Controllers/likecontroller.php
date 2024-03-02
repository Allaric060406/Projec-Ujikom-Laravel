<?php

namespace App\Http\Controllers;

use App\Models\foto;
use App\Models\likefoto;
use Illuminate\Http\Request;

class likecontroller extends Controller
{
    public function like($id)
    {
        $like = new likefoto();
        $like->user_id = auth()->id();
        $like->foto_id = $id;
        $like->save();

        return back();
    }

    public function destroylike($id)
    {
        $userId = auth()->id();
        $like = likefoto::where('user_id',$userId)->where('foto_id',$id)->first();

        if($like){
            $like->delete();
        }
        return back();
    }
}
