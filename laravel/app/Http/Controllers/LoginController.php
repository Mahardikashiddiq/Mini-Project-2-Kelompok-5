<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $role = $request->input('role');
        $email = $request->input('email');
        $password = $request->input('password');

        $table = $role === 'admin' ? 'admin' : 'user';

        $user = DB::table($table)->where('email', $email)->first();

        if (!$user) {
            return response()->json(['status' => false, 'message' => 'Akun tidak ditemukan. Silakan Sign Up.']);
        }
        

        if (!Hash::check($password, $user->password)) {
            return response()->json(['status' => false, 'message' => 'Password salah.']);
        }

        // Simpan ke session, tambahkan nama (kalau ada), jika tidak, pakai dari email
        $nama = $user->nama ?? explode('@', $user->email)[0];

        if ($role === 'admin') {
            Session::put('admin', [
                'email' => $user->email,
                'role' => $role,
                'nama' => $nama,
                'address' => $user->address ?? '',
                'bio' => $user->bio ?? '',
                'phone' => $user->phone ?? '',
                'profile_picture' => $user->profile_picture ?? '',
            ]);
        } else {
            Session::put('user', [
                'email' => $user->email,
                'role' => $role,
                'nama' => $nama,
                'address' => $user->address ?? '',
                'bio' => $user->bio ?? '',
                'phone' => $user->phone ?? '',
                'profile_picture' => $user->profile_picture ?? '',
            ]);
        }

        return response()->json(['status' => true, 'message' => 'Login berhasil!', 'role' => $role]);

    }

    public function logout(Request $request)
    {
        // Hapus data session user
        $request->session()->forget('user');

        // Redirect ke halaman login atau beranda
        return redirect('/')->with('message', 'Logout berhasil!');
    }
    
}
