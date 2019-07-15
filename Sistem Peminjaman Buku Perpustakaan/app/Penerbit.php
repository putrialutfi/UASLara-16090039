<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $table = 'penerbit';
    protected $primaryKey = 'id_penerbit';
    public $incrementing = false;
    protected $fillable = [
      'id_penerbit',
      'nama_penerbit',
    ];

    public function buku() {
      return $this->hasMany('App\Buku', 'id_penerbit');
    }
}
