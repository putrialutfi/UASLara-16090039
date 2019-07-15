<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogModel extends Model
{
    protected $table = 'logs';
    protected $primaryKey = 'id';
    protected $fillable = [
      'id_user',
      'act'
    ];

    public static function record($id_user = null, $act)
    {
        return static::create([
            'id_user' => is_null($id_user) ? null : $id_user->id,
            'act' => $act,
        ]);
    }

}
