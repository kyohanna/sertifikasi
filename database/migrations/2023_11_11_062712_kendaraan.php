<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kendaraan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis');
            $table->string('model');
            $table->integer('tahun');
            $table->integer('jumlah_penumpang');
            $table->string('manufaktur');
            $table->unsignedBigInteger('harga');
            //Mobil
            $table->string('bahan_bakar')->nullable()->default(null);
            $table->integer('luas_bagasi')->nullable()->default(null);
            //Motor
            $table->integer('jumlah_roda')->nullable()->default(null);
            $table->integer('luas_kargo')->nullable()->default(null);
            //Truk
            $table->integer('ukuran_bagasi')->nullable()->default(null);
            $table->integer('kapasitas_bensin')->nullable()->default(null);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kendaraan');
    }
}
