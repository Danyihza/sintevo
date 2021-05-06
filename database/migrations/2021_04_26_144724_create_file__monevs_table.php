<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileMonevsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_monev', function (Blueprint $table) {
            $table->string('id_file')->primary();
            $table->string('id_user');
            $table->string('tanggal');
            $table->string('jenis_kegiatan');
            $table->string('keterangan_file');
            
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
        Schema::dropIfExists('file_monev');
    }
}
