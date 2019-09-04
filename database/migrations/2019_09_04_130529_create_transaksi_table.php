<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pelanggan');
            $table->integer('meteran_baru');
            $table->integer('meteran_tagihan');
            $table->integer('pembayaran');
            $table->integer('tagihan');
            $table->integer('kembalian');
            $table->date('tanggal');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->integer('status_bayar');
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
        Schema::dropIfExists('transaksi');
    }
}
