<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiTf extends Model
{
    use HasFactory;
    public $table = "bukti_transaksi";
    protected $primaryKey = 'id';
    protected $fillable = [
        'users_id',
        'resi_id',
        'foto',
    ];

    public function resi()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo('App\Models\Resi','resi_id','id');
    }

    public function user()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo('App\Models\User','users_id','id');
    }

    public function tiket()
    {
        return $this->belongsTo('App\Models\Tiket');
    }
}
