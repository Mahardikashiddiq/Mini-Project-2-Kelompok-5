<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan data admin dengan password yang sudah di-hash
        Admin::create([
            'email' => 'nisa@gmail.com',
            'password' => Hash::make('admin123'), // Password yang sudah di-hash
            'nama' => 'Admin',
            'address' => 'Jakarta, Indonesia', // jika ada
            'phone' => '08123456789', // jika ada
            'bio' => 'Administrator of the system', // jika ada
        ]);

        Admin::create([
            'email' => 'riyan@gmail.com',
            'password' => Hash::make('admin123'), // Password yang sudah di-hash
            'nama' => 'Admin',
            'address' => 'Jakarta, Indonesia', // jika ada
            'phone' => '08123456789', // jika ada
            'bio' => 'Administrator of the system', // jika ada
        ]);

        Admin::create([
            'email' => 'mahar@gmail.com',
            'password' => Hash::make('admin123'), // Password yang sudah di-hash
            'nama' => 'Admin',
            'address' => 'Jakarta, Indonesia', // jika ada
            'phone' => '08123456789', // jika ada
            'bio' => 'Administrator of the system', // jika ada
        ]);

        Admin::create([
            'email' => 'dian@gmail.com',
            'password' => Hash::make('admin123'), // Password yang sudah di-hash
            'nama' => 'Admin',
            'address' => 'Jakarta, Indonesia', // jika ada
            'phone' => '08123456789', // jika ada
            'bio' => 'Administrator of the system', // jika ada
        ]);
    }
}
