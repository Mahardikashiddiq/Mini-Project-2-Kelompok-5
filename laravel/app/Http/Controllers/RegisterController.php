<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|ends_with:@gmail.com',
            'password' => 'required|min:6',
        ]);

        $role = $request->input('role');
        $email = $request->input('email');
        $password = $request->input('password');

        if ($role === 'admin') {
            return response()->json(['status' => false, 'message' => 'Admin tidak bisa Sign Up.']);
        }

        $existingUser = DB::table('user')->where('email', $email)->first();

        if ($existingUser) {
            return response()->json(['status' => false, 'message' => 'Email sudah terdaftar. Silakan Sign In.']);
        }

        DB::table('user')->insert([
            'email' => $email,
            'password' => Hash::make($password),
            'created_at' => now(),
        ]);

        // Ambil data user yang barusan disimpan
        $newUser = DB::table('user')->where('email', $email)->first();

        // Simpan ke session dalam bentuk array
        Session::put('user', [
            'email' => $newUser->email,
            'role' => 'user'
        ]);

        return response()->json(['status' => true, 'message' => 'Pendaftaran berhasil!']);
    }

    public function logout(Request $request)
    {
        Session::forget('user');
        return redirect('/')->with('message', 'Logout berhasil!');
    }
}
