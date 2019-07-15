<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    protected $table = 'pengaturan';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
      'id_rak',
      'ket'
    ];
}
