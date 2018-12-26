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
            $table->integer('user_id');
            $table->integer('produk_id');
            $table->integer('usaha_id');
            $table->string('nama_tujuan');
            $table->string('nohp_tujuan');
            $table->text('alamat_tujuan');
            $table->integer('jumlah_beli');
            $table->boolean('status_bayar')->default(0);
            $table->string('status_kirim')->default('menunggu');
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
