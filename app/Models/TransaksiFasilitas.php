<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiFasilitas extends Model
{
    use HasFactory;
    use HasFactory;
    public $table = "transaksiFasilitas";
    protected $primaryKey = 'id';
    protected $fillable = [
        'fasilitas_id',
        'trx_id'
    ];

    public function fas()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo('App\Models\Fasilitas','fasilitas_id','id');
    }

    public function trans()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo('App\Models\Transaksi','trx_id','id');
    }
}
