<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    public $table = "pemesanan";
    protected $primaryKey = 'id';
    protected $fillable = [
        'users_id',
        'wisata_id',
        'fasilitas_id',
        'Tanggal_Kunjungan',
        'jumlah',
        'tagihan',
        'status_pembayaran',
    ];

    public function user()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo('App\Models\User','users_id','id');
    }

    public function wisata()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo('App\Models\Wisata','wisata_id','id');
    }

    public function fasilitas()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo('App\Models\Fasilitas','fasilitas_id','id');
    }

    public function resi()
    {
        return $this->belongsTo('App\Models\Resi');
    }

    public function tiket()
    {
        return $this->belongsTo('App\Models\Tiket');
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
