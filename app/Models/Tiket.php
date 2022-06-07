<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    public $table = "tiket";
    protected $primaryKey = 'id';
    protected $fillable = [
        'pemesanan_id',
        'users_id',
        'resi_id',
        'bukti_transaksi_id',
        'wisata_id',
        'fasilitas_id',
        'Tanggal_Kunjungan',
        'jumlah',
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

    public function resi()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo('App\Models\Resi','resi_id','id');
    }

    public function bukti()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo('App\Models\Bukti','bukti_transaksi_id','id');
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
}
