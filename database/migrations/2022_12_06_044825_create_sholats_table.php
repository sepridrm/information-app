<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSholatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sholats', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('waktu');
            $table->time('imsak');
            $table->time('subuh');
            $table->time('terbit');
            $table->time('duha');
            $table->time('zuhur');
            $table->time('asar');
            $table->time('magrib');
            $table->time('isa');
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
        Schema::dropIfExists('sholats');
    }
}
