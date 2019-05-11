<?php

namespace App\Http\Controllers;

use App\Service\TotalService;
//use Illuminate\Http\Request;
use App\Http\Requests\GetTotalRequest;

class TotalController extends Controller
{
    static $service;

    public function __construct()
    {
        $this->middleware('auth');
        $this::$service = new TotalService();
    }

    // 集計機能取り纏め(試しに入れてみた)
    public function getTotal(GetTotalRequest $request)
    {
        $scid = $request->scid;
        $userId = $request->userId;
        $array = $this::$service->getTotal($scid, $userId);

        return view('total.top',['array' => $array]);
    }
}
?>