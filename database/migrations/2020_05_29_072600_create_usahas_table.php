<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsahasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_usaha', function (Blueprint $table) {
            $table->increments('id_ket_usaha');
            $table->string('nama_perusahaan',100);
            $table->string('jenis_usaha', 100);
            $table->string('alamat_perusahaan');
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
        Schema::dropIfExists('usahas');
    }
}
