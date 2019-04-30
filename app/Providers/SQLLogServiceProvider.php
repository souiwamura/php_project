<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SQLLogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // 基本手に触らない
        // プロバイダーが読み込まれる前に実行される
        // サーバコンテナ(tomcatなど)に何らかのオブジェクトなどを格納するために使用される
        // 設定を誤ると危険
    }

    /**
     * log用
     *
     * @return void
     */
    public function boot()
    {
        \DB::listen(function ($query) {
            $sql = $query->sql;
            for ($i = 0; $i < count($query->bindings); $i++) {
                $sql = preg_replace("/\?/", $query->bindings[$i], $sql, 1);
            }
            \Log::info($sql);
        });
    }
}
