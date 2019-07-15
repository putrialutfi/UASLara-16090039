<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePengembalian extends Migration
{

    public function up()
    {
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->string('kode_pengembalian', 30)->primary();
            $table->string('id_kodepeminjaman', 30);
            $table->date('tgl_pengembalian');
            $table->string('denda', 10);
            $table->string('id_kodepetugas', 30);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengembalian');
    }
}
