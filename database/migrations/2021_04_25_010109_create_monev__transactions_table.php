<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonevTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monev_finansial', function (Blueprint $table) {
            $table->string('id_finansial', 16)->primary();
            $table->string('id_user');
            $table->string('tanggal');
            $table->string('jenis_transaksi');
            $table->string('keterangan_transaksi');
            $table->integer('jumlah');
            $table->string('path_file');
            $table->string('origin_file');
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
        Schema::dropIfExists('monev_finansial');
    }
}
