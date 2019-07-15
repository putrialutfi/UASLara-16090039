<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    public $incrementing = false;
    protected $fillable = [
      'id_kategori',
      'nama_kategori',
    ];

    public function buku() {
      return $this->hasMany('App\Buku', 'id_kategori');
    }
}
