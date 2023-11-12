<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kendaraan');
            $table->unsignedBigInteger('id_customer');
            $table->integer('jumlah_kendaraan');
            $table->unsignedBigInteger('total_harga');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_kendaraan')->references('id')->on('kendaraan')->onDelete('cascade');
            $table->foreign('id_customer')->references('id')->on('customer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
