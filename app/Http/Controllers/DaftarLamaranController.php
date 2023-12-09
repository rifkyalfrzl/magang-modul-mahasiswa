<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MyJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarLamaranController extends Controller
{
    public function index()
    {
        // Ambil daftar lamaran berdasarkan username pengguna yang login
        $username = Auth::user()->username;
        $apply = MyJob::where('username', $username)->get();

        return view('pages.daftar_lamaran', compact('apply'));
    }
}
