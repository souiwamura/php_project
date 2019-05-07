<?php

namespace App\Http\Controllers;

use App\Service\TotalService;
use Illuminate\Http\Request;

class TotalController extends Controller
{
    static $service;

    public function __construct()
    {
        $this->middleware('auth');

        $this::$service = new TotalService();
    }

    // 集計機能取り纏め(試しに入れてみた)
    public function getTotal(Request $request)
    {

        $scid = $request->scid;
        $dtTotal = $this::$service->getTotal($scid);

        return view('total.top', [ 'data' => $dtTotal ]);
    }
}
?>