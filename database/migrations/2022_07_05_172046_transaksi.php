<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignID('users_id');
            $table->string('wisata_id');
            $table->date('Tanggal_Kunjungan');         
            $table->integer('jumlah');  
            $table->char('tagihan', 15);  
            $table->string('status_pemesanan'); 
            $table->string('reschedule'); 
            $table->string('refund'); 
            $table->string('bukti_transaksi'); 
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
