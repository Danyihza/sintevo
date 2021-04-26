<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonevsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monev', function (Blueprint $table) {
            $table->string('id_monev', 8)->primary();
            $table->string('id_user');
            $table->string('jenis_monev', 20);
            $table->string('status_progress', 35);
            $table->text('uraian');
            $table->string('tanggal');
            $table->string('path')->nullable();
            $table->string('nama_file')->nullable();
            $table->text('feedback')->nullable();
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
        Schema::dropIfExists('monev');
    }
}
