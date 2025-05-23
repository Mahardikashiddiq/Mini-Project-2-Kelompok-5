<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function showEditProfileForm()
    {
        // Ambil user dari session
        $sessionUser = Session::get('user') ?? Session::get('admin');
        
        if (!$sessionUser) {
            return redirect()->route('login'); // Misal, redirect ke login
        }

        $role = $sessionUser['role'];

        // Ambil data user berdasarkan email
        $user = $role === 'admin'
            ? Admin::where('email', $sessionUser['email'])->first()
            : User::where('email', $sessionUser['email'])->first();

        if (!$user) {
            return redirect()->route('profil')->with('error', 'User tidak ditemukan');
        }

        // // Ambil nama dari email (sebelum '@')
        // $username = explode('@', $user['email'])[0];
        // $user['nama'] = $username;

        return view('profil', ['user' => $user, 'role' => $role]);
    }

    public function update(Request $request)
    {
        // Ambil data user dari session
        $sessionUser = Session::get('user') ?? Session::get('admin');

        if (!$sessionUser) {
            return response()->json(['success' => false, 'message' => 'Anda belum login.'], 401);
        }

        // Akses data tergantung apakah session berupa array atau object
        $email = $sessionUser['email'];
        $role = $sessionUser['role'];

        // Ambil data user berdasarkan email
        $user = $role === 'admin'
            ? Admin::where('email', $email)->first()
            : User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Pengguna tidak ditemukan.'], 404);
        }

        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'phone' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // Update data user
        $user->nama = $request->input('nama');
        $user->address = $request->input('address');
        $user->bio = $request->input('bio');
        $user->phone = $request->input('phone');

        // Jika ada gambar profil baru
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('public/profile_pictures');
            $user->profile_picture = str_replace('public/', 'storage/', $path);
        }

        // Simpan perubahan
        $user->save();

        // Perbarui session sesuai role
        Session::put($role, [
            'email' => $user->email,
            'role' => $role,
            'nama' => $user->nama ?? '',
            'address' => $user->address ?? '',
            'bio' => $user->bio ?? '',
            'phone' => $user->phone ?? '',
            'profile_picture' => $user->profile_picture ?? '',
        ]);

        return response()->json(['success' => true, 'message' => 'Profil berhasil diperbarui.']);
    }
}
