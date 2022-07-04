<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasWisata extends Model
{
    use HasFactory;
    public $table = "fasilitasWisata";
    protected $primaryKey = 'id';
    public $fillable = [ 

        'nama_wisata', 'fasilitas'

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
