<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resi extends Model
{
    use HasFactory;
    public $table = "resi_pembayaran";
    protected $primaryKey = 'id';
    protected $fillable = [
        'pemesanan_id',
        'users_id',
        'wisata_id',
        'fasilitas_id',
        'Tanggal_Kunjungan',
        'jumlah',
        'tagihan',
        'status_pembayaran',
    ];

    public function pemesanan()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo('App\Models\Pemesanan','pemesanan_id','id');
    }

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

    public function buktitf()
    {
        return $this->belongsTo('App\Models\BuktiTf');
    }

    public function tiket()
    {
        return $this->belongsTo('App\Models\Tiket');
    }
}
