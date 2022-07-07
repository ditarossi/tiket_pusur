<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiWisata extends Model
{
    use HasFactory;
    use HasFactory;
    public $table = "transaksiWisata";
    protected $primaryKey = 'id';
    protected $fillable = [
        'wisata_id',
        'trx_id'
    ];

    public function trans()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo('App\Models\Transaksi','trx_id','id');
    }
}
