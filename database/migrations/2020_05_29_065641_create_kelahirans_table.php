<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelahiransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kelahiran', function (Blueprint $table) {
            $table->increments('id_ket_kelahiran');
            $table->string('nama_anak', 50);
            $table->string('tempat_lahir_anak', 50);
            $table->date('tanggal_lahir_anak');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->time('jam_lahir');
            $table->integer('anak_ke');
            $table->integer('id_persuratan')->unsigned();
            $table->string('nik_ayah',16);
            $table->string('nik_ibu',16);
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
        Schema::dropIfExists('kelahiran');
    }
}
