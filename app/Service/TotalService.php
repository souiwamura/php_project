<?php

namespace App\Service;

use Khill\Lavacharts\Lavacharts as Lava;
use Carbon\Carbon;
use App\Dao\TotalDao;

/**
 * 投稿数集計(lavacharts使用：複合グラフは向かないみたい グラフ背景を透過できない)
 *
 * @auth s.i
 * @since 2019/05/11
 * @version 1.0
 */
class TotalService
{

    static $dao;

    public function __construct()
    {
        $this::$dao = new TotalDao;
    }

    /**
     * 集計データ取得
     *
     * @param scId-選択ID
     * @param userId-ユーザID
     * @return array-メッセージと集計テーブル情報
     */
    public function getTotal($scid, $userId)
    {
        $data= "";
        $message = "";
        $chartTitle = "";
        $chgLavel = "";

        // 各集計データ取得とラベル準備
        if($scid == 'getMt') {
            $datas = $this::$dao->getMtData($userId);

            $chartTitle = '月次集計';
            $chgLavel = 'Month';
            

        } else if($scid == 'getWt') {
            $datas = $this::$dao->getWtData($userId);

            $chartTitle = '週次集計';
            $chgLavel = 'Week';

        }

        // データテーブル情報作成もしくはメッセージ作成
        if(isset($datas)) {

            $chartInfo = $this->getChartsInfo($datas, $chartTitle, $chgLavel);

            $array['chartInfo'] = $chartInfo;

        } else {

            $array['message'] = '対象データがありません。';

        }

        return $array;
    }

    /**
     * チャート情報取得
     *
     * @param datas-集計データ
     * @param chartTitle-グラフタイトル
     * @param chgLavel-項目ラベル
     * @return lava-データテーブル情報
     */
    private function getChartsInfo($datas, $chartTitle, $chgLavel) {

        $chartInfo = new Lava;

        $result = $chartInfo->DataTable();

        // カラム追加(空箱)～２個
        $result->addDateColumn($chgLavel)
            ->addNumberColumn('投稿数');

        // 空箱にデータを詰める
        foreach($datas as $post) {
            $result->addRow([
                $post->yearMonth,
                $post->count,
            ]);

        }

        // データテーブル情報作成(棒グラフ)
        $chartInfo->ColumnChart('postTotalColumn', $result
            , [
                'title' => $chartTitle,
                'legend' => [
                    'alignment' => 'center',
                ],
                'chartArea' => [
                    'width'  => 700,
                    'height' => 400,
                ],
                'bar' => [
                    'groupWidth' => '10%',
                ],
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 16,
                ],
            ]);

        return $chartInfo;
    }
}
