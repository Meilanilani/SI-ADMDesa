<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaksiranTanahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ket_taksiran_tanah', function (Blueprint $table) {
            $table->increments('id_ket_taksiran_tanah');
            $table->string('no_sertifikat_tanah', 100);
            $table->integer('luas_tanah');
            $table->string('pemilik_batas_utara');
            $table->string('pemilik_batas_selatan');
            $table->string('pemilik_batas_timur');
            $table->string('pemilik_batas_barat');
            $table->date('tgl_kepemilikan');
            $table->integer('harga_tanah');
            $table->integer('harga_bangunan');
            $table->integer('id_persuratan')->unsigned();
            $table->timestamps();
            $table->foreign('id_persuratan')->references('id_persuratan')->on('persuratan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taksiran_tanahs');
    }
}
