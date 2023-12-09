<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Menggunakan model User yang sesuai

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    public function showLoginForm()
    {
        return view('sesi.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        // Menggunakan 'username' sebagai kriteria pencarian
        $user = User::where('username', $credentials['username'])->first();
    
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->with('error', 'Username atau Password salah.');
        }
    
        // Melakukan login pengguna
        Auth::login($user);
        
        // Tambahkan pengecekan di sini untuk menentukan layout yang akan digunakan setelah login
        if (Auth::check()) {
            $request->session()->put('user_id', $user->id);
            return redirect('/beranda'); // Redirect ke halaman beranda setelah login
        } else {
            return back()->with('error', 'Gagal login.');
        }
    }

    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->forget('user_id'); // Hapus 'user_id' dari sesi
    return redirect('/login-page');
}
}
