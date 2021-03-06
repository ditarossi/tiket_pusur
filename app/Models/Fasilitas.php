<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    public $table = "fasilitas";
    protected $primaryKey = 'id';
    protected $fillable = [
        'fasilitas',
        'harga',
    ];

    public function pemesanan()
    {
        return $this->belongsTo('App\Models\Pemesanan');
    }

    public function resi()
    {
        return $this->belongsTo('App\Models\Resi');
    }

    public function tiket()
    {
        return $this->belongsTo('App\Models\Tiket');
    }

    public function wisata()
    {
        return $this->hasMany('App\Models\Wisata');
    }
    public function trans()
    {
        return $this->hasMany('App\Models\TransaksiFasilitas');
    }
    public function transutama()
    {
        return $this->belongsTo('App\Models\Transaksi');
    }
}
