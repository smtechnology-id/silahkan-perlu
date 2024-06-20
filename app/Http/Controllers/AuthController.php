<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,pimpinan',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        Auth::login($user);

        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }

    public function loginPost(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Ambil kredensial dari permintaan
        $credentials = $request->only('email', 'password');
        // Coba autentikasi pengguna
        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil, arahkan ke halaman sesuai level pengguna
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 'pimpinan') {
                return redirect()->route('pimpinan.dashboard');
            }
        }

        // Jika autentikasi gagal, arahkan kembali ke halaman login dengan pesan kesalahan
        return redirect()->route('index')->with('error', 'Email or password is incorrect.');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        
        return redirect()->route('index')->with('error', 'Berhasil Logout.');
    }
}
