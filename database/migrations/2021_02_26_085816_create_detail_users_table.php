<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_users', function (Blueprint $table) {
            $table->string('id_detail', 50)->primary();
            $table->integer('kategori');
            $table->string('nama_brand');
            $table->string('deskripsi');
            $table->string('alamat');
            $table->string('nama_ketua');
            $table->string('no_whatsapp');
            $table->integer('status');
            $table->integer('prodi')->nullable();
            $table->string('website')->nullable();
            $table->string('instagram')->nullable();
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
        Schema::dropIfExists('detail_users');
    }
}
