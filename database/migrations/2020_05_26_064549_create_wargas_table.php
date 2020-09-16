<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warga', function (Blueprint $table) {
            $table->increments('id_warga');
            $table->string('no_kk', 16);
            $table->string('no_nik', 16)->unique();
            $table->string('nama_lengkap', 100);
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->enum('agama', ['Islam', 'Katolik', 'Protestan', 'Hindu', 'Buddha', 'Kong Hu Cu', 'Laim-lain']);
            $table->enum('pendidikan', ['Belum Sekolah', 'SD/ MI', 'SMP/MTs', 'SMA/MA/SMK', 'D3', 'D4/S1', 'S2', 'S3']);
            $table->string('pekerjaan', 50);
            $table->enum('status_perkawinan', ['Belum Menikah', 'Menikah', 'Cerai Mati', 'Cerai Hidup']);
            $table->enum('status_hub_keluarga', ['Kepala Keluarga', 'Istri', 'Anak', 'Famili Lain']);
            $table->string('nama_ayah', 50);
            $table->string('nama_ibu', 50);
            $table->string('alamat');   

            
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warga');
    }
}
