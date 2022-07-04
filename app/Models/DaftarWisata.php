<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarWisata extends Model
{
    use HasFactory;
    public $table = "daftar_wisata";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_wisata',
        'deskripsi',
        'kuota',
        'harga',
        'keterangan',
        'foto',
    ];
}
