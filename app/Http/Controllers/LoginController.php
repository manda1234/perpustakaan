<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\User; // Corrected this line to import User model
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('Login.index');
    }

    public function loginProsess(Request $request)
    {
        // Validasi input dari form login
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password minimal 6 karakter',
        ]);
    
        // Ambil data input
        $credentials = $request->only('username', 'password');
    
        // Coba login dengan Auth
        if (Auth::attempt($credentials)) {
            // Jika berhasil login
            $request->session()->regenerate(); // untuk mencegah session fixation
            return redirect()->intended('/dashboard'); // ganti sesuai route dashboard kamu
        }
    
        // Jika gagal login
        return back()->withErrors([
            'username' => 'Username atau password salah',
        ])->withInput();
    }
    
    
    public function showRegisterForm()
    {
        return view('login.register');
    }

    // Proses registrasi
    public function prosesRegister(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Simpan user baru
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Redirect ke login dengan flash message sukses
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
