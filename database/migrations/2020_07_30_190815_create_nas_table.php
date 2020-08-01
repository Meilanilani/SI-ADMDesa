<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_na', function (Blueprint $table) {
            $table->increments('id_detail_na');
            $table->string('nik_anak', 16);
            $table->string('nik_ayah',16);
            $table->string('nik_ibu',16);
            $table->timestamps();
            $table->integer('id_persuratan')->unsigned();
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
        Schema::dropIfExists('nas');
    }
}
