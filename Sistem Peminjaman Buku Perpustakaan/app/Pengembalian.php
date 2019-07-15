<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $table = 'pengembalian';
    protected $primaryKey = 'kode_pengembalian';
    public $incrementing = false;
    protected $fillable = [
      'kode_pengembalian',
      'id_kodepeminjaman',
      'tgl_pengembalian',
      'denda',
      'id_kodepetugas',
      'deleted',
      'deleted_by'
    ];

    protected $dates = [
      'tgl_pengembalian'
    ];

    public function peminjaman() {
      return $this->belongsTo('App\Peminjaman', 'id_kodepeminjaman', 'kode_peminjaman');
    }

    public function petugasUserKembali() {
      return $this->belongsTo('App\User', 'id_kodepetugas');
    }
}
