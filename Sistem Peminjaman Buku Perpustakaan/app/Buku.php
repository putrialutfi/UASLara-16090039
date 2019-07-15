<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'kode_buku';
    public $incrementing = false;
    protected $fillable = [
      'kode_buku',
      'judul_buku',
      'id_rak',
      'id_penulis',
      'id_kategori',
      'id_penerbit',
      'tahun',
      'no_isbn',
      'deleted',
      'created_by',
      'updated_by'
    ];

    public function rak() {
      return $this->belongsTo('App\Rak', 'id_rak');
    }

    public function penulis() {
      return $this->belongsTo('App\Penulis', 'id_penulis');
    }

    public function kategori() {
      return $this->belongsTo('App\Kategori', 'id_kategori');
    }

    public function penerbit() {
      return $this->belongsTo('App\Penerbit', 'id_penerbit');
    }

    public function peminjaman() {
      return $this->hasMany('App\Peminjaman', 'id_kodebuku');
    }

}
