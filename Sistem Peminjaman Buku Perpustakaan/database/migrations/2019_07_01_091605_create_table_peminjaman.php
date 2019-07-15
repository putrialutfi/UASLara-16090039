<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePeminjaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->string('kode_peminjaman', 30)->primary();
            $table->timestamp('tgl_pinjam');
            $table->timestamp('tgl_kembali');
            $table->string('id_anggota', 30);
            $table->string('id_kodebuku', 30);
            $table->enum('status', ['1','0']);
            $table->string('id_petugas', 30)->nullable();
            $table->enum('deleted', ['0','1']);
            $table->string('created_by', 30)->nullable();
            $table->string('updated_by', 30)->nullable();
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
        Schema::dropIfExists('peminjaman');
    }
}
