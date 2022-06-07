<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ResiPembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resi_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignID('pemesanan_id');
            $table->foreignID('users_id');
            $table->foreignID('wisata_id'); 
            $table->foreignID('fasilitas_id');
            $table->date('Tanggal_Kunjungan');         
            $table->integer('jumlah');  
            $table->char('tagihan', 15);  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
