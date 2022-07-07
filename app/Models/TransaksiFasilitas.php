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

}
