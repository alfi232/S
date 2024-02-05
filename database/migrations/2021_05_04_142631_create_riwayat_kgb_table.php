<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatKgbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_kgb', function (Blueprint $table) {
            $table->smallIncrements('id_riwayat_kgb');
            $table->char('nip_pegawai',18);
            $table->smallInteger('id_golongan')->unsigned();
            $table->string('penjabat',60);
            $table->string('nomor',60);
            $table->date('tanggal');
            $table->integer('jumlah_gaji');
            $table->string('mkg',3);
            $table->date('mulai_berlaku');
            $table->date('batas_berlaku');
            $table->string('peraturan',100);
            $table->tinyInteger('status');//0=aktif 1 = nonaktif
            
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
        Schema::dropIfExists('riwayat_kgb');
    }
}
