<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    public $table = "transaksi";
    protected $primaryKey = 'id';
    protected $fillable = [
        'users_id',
        'kode_tr',
        'wisata_id',
        'Tanggal_Kunjungan',
        'jam',
        'jumlah',
        'tagihan',
        'status_pemesanan',
        'reschedule',
        'bukti_transaksi',
        'waktu_transaksi',
        'note'
    ];

    public function user()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo('App\Models\User','users_id','id');
    }
    public function wisata()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo('App\Models\DaftarWisata','wisata_id','id');
    }
    public function transfas()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->hasMany('App\Models\TransaksiFasilitas');
    }

    public function fasi()
    {
        return $this->hasMany('App\Models\Fasilitas');
    }
}
