<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//         Schema::create('set_prices', function (Blueprint $table) {
    //         $table->increments('id');
    //         $table->integer('id_harga');
    //         $table->integer('time_group')->unsigned()->index();
    //         $table->foreign('time_group')->references('time_group')->on('set_times')
    //           ->onDelete('cascade')
    //           ->onUpdate('cascade');
    //         $table->string('status_pelanggan');
    //         $table->integer->('id_lapangan')->unsigned()->index();
    //         $table->foreign('id_lapangan')->references('id_lapangan')->on('fields')
    //           ->onDelete('casecade')
    //           ->onUpdate('casecade');
    //         $table->integer('harga_sewa')->unsigned()->index();
    //         $table->foreign('harga_sewa')->references('harga_sewa')->on('fields')
    //           ->onDelete('casecade')
    //           ->onUpdate('casecade');
    //
    //         $table->timestamps();
    //     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('set_prices');
    }
}
