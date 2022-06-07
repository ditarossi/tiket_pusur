<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    public $table = "detail";
    protected $primaryKey = 'id';
    protected $fillable = [
        'wisata_id',
        'fasilitas_id',
        'deskripsi',
        'keterangan',
        'foto',
    ];

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
