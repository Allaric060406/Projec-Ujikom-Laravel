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
    
    
}
