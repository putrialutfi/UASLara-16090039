<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->string('kode_buku', 6)->primary();
            $table->string('judul_buku', 50);
            $table->string('id_rak', 50);
            $table->string('id_penulis', 50);
            $table->string('id_kategori', 50);
            $table->string('id_penerbit', 50);
            $table->year('tahun');
            $table->string('no_isbn', 45);
            $table->enum('deleted', ['0', '1']);
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
        Schema::dropIfExists('buku');
    }
}
