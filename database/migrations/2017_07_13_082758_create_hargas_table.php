<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
              Schema::create('hargas', function (Blueprint $table) {
                  $table->increments('id');
                  $table->integer('time_group');
                  $table->string('status_pelanggan');
                  $table->integer('id_lapangan');
                  $table->integer('harga_sewa');
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
        Schema::dropIfExists('hargas');
    }
}
