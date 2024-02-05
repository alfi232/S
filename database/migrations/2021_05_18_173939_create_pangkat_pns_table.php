<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePangkatPnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pangkat_pns', function (Blueprint $table) {
            $table->smallIncrements('id_pangkat_pns');
            $table->char('nip_pegawai',18);
            $table->smallInteger('id_golongan')->unsigned();
            $table->date('tmt');
            $table->string('penjabat',60);
            $table->string('nomor',60);
            $table->date('tanggal');

             // foreign key dari tabel golongan
             $table->foreign('id_golongan')->references('id_golongan')->on('golongan')->onUpdate('cascade');

             // foreign key dari tabel pegawai
             $table->foreign('nip_pegawai')->references('nip_pegawai')->on('pegawai')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pangkat_pns');
    }
}
