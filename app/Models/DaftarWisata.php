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
        'jam',
        'kuota',
        'harga',
        'foto',
    ];

    public function fwisata()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->HasMany('App\Models\FasilitasWisata','fasilitas_id','id');
    }
    public function transaksi()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->HasMany('App\Models\Transaksi');
    }
}
