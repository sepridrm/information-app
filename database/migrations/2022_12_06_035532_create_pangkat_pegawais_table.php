<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePangkatPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pangkat_pegawais', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pegawai');
            $table->unsignedSmallInteger('id_Pangkat');
            $table->timestamps();

            $table->foreign("id_pegawai")->references("id")->on("pegawais")->onDelete('cascade');
            $table->foreign("id_Pangkat")->references("id")->on("pangkats")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pangkat_pegawais');
    }
}
