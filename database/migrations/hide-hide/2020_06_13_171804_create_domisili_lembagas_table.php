<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomisiliLembagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domisili_lembaga', function (Blueprint $table) {
            $table->increments('id_domisili_lembaga');
            $table->string('nama_lembaga');
            $table->string('alamat_lembaga');
            $table->string('no_telp_lembaga');
            $table->string('bidang_lembaga');
            $table->integer('jumlah_pegawai');
            $table->integer('jam_kerja');
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
        Schema::dropIfExists('domisili_lembaga');
    }
}
