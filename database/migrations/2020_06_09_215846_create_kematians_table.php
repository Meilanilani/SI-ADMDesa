<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKematiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kematian', function (Blueprint $table) {
            $table->increments('id_detail_kematian');
            $table->string('nik_yg_bersangkutan',16);
            $table->date('tgl_kematian');
            $table->string('tempat_kematian', 50);
            $table->string('penyebab_kematian', 50);
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
        Schema::dropIfExists('kematians');
    }
}
