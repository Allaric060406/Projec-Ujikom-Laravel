<?php

namespace App\Http\Controllers;

use App\Models\foto;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indexDashboard()
    {
        $semuaFoto = Foto::all();
        
        return view('dashboard', ['semuaFoto' => $semuaFoto]);
    }
}
