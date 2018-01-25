<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('no_spk');
            $table->integer('costumer_id');
            $table->bigInteger('pembiayaan');
            $table->integer('jangka_waktu');
            $table->enum('bulan_minggu', ['bulanan', 'mingguan']);
            $table->bigInteger('tabungan_1x_angsuran')->nullable();
            $table->string('hari_cair');
            $table->date('tanggal_cair');
            $table->bigInteger('pokok');
            $table->bigInteger('jasa')->nullable();
            $table->bigInteger('total_angsuran')->nullable();
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
        Schema::dropIfExists('loans');
    }
}
