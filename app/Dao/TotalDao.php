<?php
namespace App\Dao;

use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * 集計用クラス
 *
 * @auth s.i
 * @since 2019/05/09
 * @version 1.0
 */
class TotalDao
{
    public function __construc()
    {
        $this->middleware('auth');
    }

    // 週次集計用
    public function getWtData($userId) {

        $data = Post::wherebetween('created_at', array(Carbon::now()->subWeek(1)->format('Y-m-d')
            , Carbon::now()->format('Y-m-d')))
            ->where('create_user_id', '=', $userId)
            ->groupBy('yearMonth')
            ->orderBy('yearMonth', 'desc')
            ->get([DB::raw("date_format(created_at, '%Y%-%m%-%d') as yearMonth"), DB::raw('count(created_at) as count')]);

        return $data;
    }

    // 月次集計用
    public function getMtData($userId) {

        $data = Post::where(DB::raw("date_format(created_at, '%Y%-%m')"), '=', array(Carbon::now()->format('Y-m')))
            ->where('create_user_id', '=', $userId)
            ->groupBy('yearMonth')
            ->orderBy('yearMonth', 'desc')
            ->get([DB::raw("date_format(created_at, '%Y%-%m') as yearMonth"), DB::raw('count(created_at) as count')]);

        return $data;
    }
}
?>
