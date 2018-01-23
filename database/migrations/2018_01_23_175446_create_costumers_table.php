<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costumers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('no_spk')->unique();
            $table->integer('no_anggaran')->unique();
            $table->string('nama_pemohon');
            $table->date('tempat_tanggal_lahir');
            $table->text('alamat');
            $table->string('desa');
            $table->string('pembiayaan');
            $table->integer('jangka_waktu');
            $table->enum('bulan/minggu',['bulanan','mingguan']);
            $table->integer('tabungan_1x_angsuran')->nullable();
            $table->string('hari_cair');
            $table->date('tanggal_cair');
            $table->integer('pokok');
            $table->integer('jasa');
            $table->integer('total_anggaran');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costumers');
    }
}
