<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
      'kode_peminjaman',
      'tgl_pinjam',
      'tgl_kembali',
      'id_anggota',
      'id_kodebuku',
      'status',
      'id_petugas',
      'deleted',
      'created_by',
      'updated_by'
    ];

    protected $dates = [
      'tgl_pinjam',
      'tgl_kembali'
    ];

    public function anggotaUserPinjam() {
      return $this->belongsTo('App\User', 'id_anggota');
    }

    public function buku() {
      return $this->belongsTo('App\Buku', 'id_kodebuku');
    }

    public function petugasUserPinjam() {
      return $this->belongsTo('App\User', 'id_petugas');
    }

    public function pengembalian() {
      return $this->hasOne('App\Pengembalian', 'id_kodepeminjaman', 'kode_peminjaman');
    }
}
