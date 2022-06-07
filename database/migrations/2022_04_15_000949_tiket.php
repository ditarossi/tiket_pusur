<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tiket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiket', function (Blueprint $table) {
            $table->id();
            $table->foreignID('pemesanan_id');
            $table->foreignID('users_id'); 
            $table->foreignID('resi_id'); 
            $table->foreignID('bukti_transaksi_id'); 
            $table->foreignID('wisata_id'); 
            $table->foreignID('fasilitas_id'); 
            $table->date('Tanggal_Kunjungan'); 
            $table->integer('jumlah'); 
            $table->string('status_pembayaran');    
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
