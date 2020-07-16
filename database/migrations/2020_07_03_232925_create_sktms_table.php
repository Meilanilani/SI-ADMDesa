<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSktmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_sktms', function (Blueprint $table) {
            $table->increments('id_sktms');
            $table->string('nik_anak',16);
            $table->string('nik_orangtua',16);
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
        Schema::dropIfExists('sktms');
    }
}
