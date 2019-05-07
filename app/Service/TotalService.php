<?php

namespace App\Service;

use Illuminate\Support\Facades\DB;
use \Khill\Lavacharts\Lavacharts as Lava;

class TotalService
{
    // 集計データ取得
    public function getTotal($scid)
    {
       $data= "";

       if($scid == 'getMt') {
           $data = "Mt";
       } else if($scid == 'getYt') {
           $data = "Yt";
       }
       return $data;
    }
}
