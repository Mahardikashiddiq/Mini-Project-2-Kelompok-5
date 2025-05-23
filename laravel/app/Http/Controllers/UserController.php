<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $admin = Session::get('admin');

        // Ambil semua data user dari database
        $users = User::all();

        // Kirim data ke view
        return view('tambah_user', ['users' => $users]);
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'email' => 'required|email|ends_with:@gmail.com',
            'password'   => 'required|string|min:6',
            'nama' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:1000',
        ]);

        // Handle upload avatar
        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        // Simpan ke database
        User::create([
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'nama'    => $request->nama,
            'address'    => $request->address,
            'phone'    => $request->phone,
            'bio'      => $request->bio,
        ]);

        return redirect()->back()->with('success', 'User berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);  // Menemukan user berdasarkan ID
            $user->delete();  // Menghapus user dari database
            return response()->json(['success' => true]);  // Mengembalikan respon sukses
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'User not found or error occurred.']);  // Menangani kesalahan
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'email' => 'required|email|ends_with:@gmail.com|unique:user,email,' . $id,
            'nama' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:1000',
            'password' => 'nullable|string|min:6',
        ]);

        // Siapkan data update
        $data = [
            'email' => $request->email,
            'nama' => $request->nama,
            'address' => $request->address,
            'phone' => $request->phone,
            'bio' => $request->bio,
        ];

        // Kalau password diisi, hash dan tambahkan
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Simpan perubahan
        $user->update($data);

        return response()->json(['success' => true]);
    }

}



