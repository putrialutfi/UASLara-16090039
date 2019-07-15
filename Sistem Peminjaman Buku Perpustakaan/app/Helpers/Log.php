<?php
namespace App\Helpers;

use App\LogModel;

class Log
{
     public function log($id_user = null, $act)
     {
         LogModel::record(
           $id_user,
           $act,
         );
     }

     public static function instance()
     {
         return new Log();
     }
}
