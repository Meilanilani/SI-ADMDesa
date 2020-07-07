<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBabinsasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ket_babinsa', function (Blueprint $table) {
            $table->increments('id_ket_babinsa');
            $table->string('nama_babinsa', 100);
            $table->string('pangkat_babinsa', 100);
            $table->string('jabatan_babinsa', 100);
            $table->integer('tb_calon');
            $table->integer('bb_calon');
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
        Schema::dropIfExists('babinsas');
    }
}
