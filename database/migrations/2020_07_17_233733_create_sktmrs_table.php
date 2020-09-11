<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSktmrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_sktmrs', function (Blueprint $table) {
            $table->increments('id_detail_sktmrs');
            $table->string('nik_pemohon',16);
            $table->string('nik_yg_bersangkutan',16);
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
        Schema::dropIfExists('sktmrs');
    }
}
