<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'string'; // Penting karena 'nim' bukan integer

    // ✅ Perbaikan di sini: ubah `public` jadi `protected`
    protected $fillable = [
        'nim',
        'nama',
        'jk',
        'tgl_lahir',
        'jurusan',
        'alamat',
    ];
}
