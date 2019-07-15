<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    protected $table = 'penulis';
    protected $primaryKey = 'id_penulis';
    public $incrementing = false;
    protected $fillable = [
      'id_penulis',
      'nama_penulis',
    ];

    public function buku() {
      return $this->hasMany('App\Buku', 'id_penulis');
    }
}
