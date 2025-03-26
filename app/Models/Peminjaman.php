<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = "peminjaman";
    protected $fillable = [
        'nama_peminjam',
        'user_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'kode_buku',
        'judul',
        'penulis',
        'tahun_terbit',
        'buku_id',
        'kategori',
    ];
}
