<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi Laravel (yaitu, plural 'admins')
    protected $table = 'admin';

    // Tentukan kolom yang dapat diisi (fillable)
    protected $fillable = [
        'email', 'password', 'role', 'nama', 'address', 'phone', 'bio'
    ];

    // Tidak perlu mengisi timestamps jika tidak menggunakan created_at dan updated_at
    public $timestamps = true;
}

