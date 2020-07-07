<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersuratansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persuratan', function (Blueprint $table) {
            $table->increments('id_persuratan');
            $table->string('no_surat', 50);
            $table->string('ket_keperluan_surat')->nullable();
            $table->string('foto_pengantar', 255)->nullable();
            $table->string('foto_kk', 255)->nullable();
            $table->string('foto_ktp', 255)->nullable();
            $table->string('foto_suratnikah', 255)->nullable();
            $table->string('foto_suratkelahiran', 255)->nullable();
            $table->string('foto_suratkematianrs', 255)->nullable();
            $table->string('foto_ijazah', 255)->nullable();
            $table->string('foto_suratizin', 255)->nullable();
            $table->string('foto_akta_cerai', 255)->nullable();
            $table->string('foto_surat_pindah_sebelumnya', 255)->nullable();
            $table->string('foto_akta_notaris', 255)->nullable();
            $table->string('foto_sertifikat_tanah', 255)->nullable();
            $table->string('foto_sptpbb', 255)->nullable();
            $table->date('tgl_pembuatan');
            $table->date('tgl_masa_berlaku')->nullable();
            $table->enum('status_surat', ['Proses', 'Selesai']);
           
            $table->integer('id_warga')->unsigned();
            $table->timestamps();
            
            $table->foreign('id_warga')->references('id_warga')->on('warga')->onDelete('cascade');
        });
            
    }

    /**  
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persuratan');
    }
}
