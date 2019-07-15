<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $incrementing = false;
    protected $fillable = [
        'id',
        'name',
        'tempat_lahir',
        'tanggal_lahir',
        'no_telp',
        'alamat',
        'status',
        'role',
        'email',
        'username',
        'password',
        'deleted',
        'created_by',
        'updated_by'
    ];

    protected $dates = [
      'tanggal_lahir'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pinjamAnggota() {
      return $this->hasMany('App\Peminjaman', 'id_anggota');
    }

    public function pinjamPetugas() {
      return $this->hasMany('App\Peminjaman', 'id_petugas');
    }

    public function kembaliPetugas() {
      return $this->hasMany('App\Pengembalian', 'id_kodepetugas');
    }
}
