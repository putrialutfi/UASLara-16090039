<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    protected $table = 'rak';
    protected $primaryKey = 'id_rak';
    public $incrementing = false;
    protected $fillable = [
      'id_rak',
      'nama_rak'
    ];

    public function buku() {
      return $this->hasMany('App\Buku', 'id_rak');
    }
}
