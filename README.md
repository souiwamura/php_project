# php_project
PHP学習用

<pre>
【2019/4/17】
php : laravel環境構築まで実施済
github : originまでの直接pushまで確認済

【2019/4/18】
git:新規laravelプロジェクトの情報を一括push ← ignoreで外しているため、.envなどpush出来ていないものがある（デフォルトでそうなっている）
php : サンプルアプリケーション作成中 ← お試し表示の段階で画面が表示されていない（解決）
                                  ← 【原因】①web.phpの記載ミス ②layout.blade.phpの配置場所誤りと継承記載ミス

【2019/04/19-20】
git:logの日本語文字化け対応 configコマンドによるutf-8対応 ← ローカルのみの対応 リモートブランチには未反映(てか、コミット非対称のようだ)
php:投稿ページ追加 ← 昨日に引き続き、brade関連（layout親子紐づけと子ページ追加）、コントローラ、ルーティングに関して追加実施
    投稿詳細ページ追加 ← 昨日に引き続き、brade関連（layout親子紐づけと子ページ追加）、コントローラ、ルーティングに関して追加実施

【2019/04/21】
wiki:git履歴抹殺についてのまとめ記載
github:デフォルトファイルのため.env.exampleファイル削除
php:デザイン周りを修正 外部読み込みをしていたためローカルに修正 ← デザイン修正を柔軟にするため

【2019/04/22】
php:コントローラでコメント間違いあり、修正すること。 create、storeの二つ

【2019/04/23】
php:コメント追加機能を作成(コントローラとviewの2ファイル新規作成) postコントローラ内のコメントを一部追記 ルーティング追記
    バリデーションクラスを作成
github:各リモートコミット(push)に対する課題記載
       不要物の削除とignoreへの追記

【2019/04/24】
php:認証機能途中まで実装 ログアウトがまだ 投稿詳細ページ遷移でURL崩れ
    ファイル整理実施(親レイアウトまとめと子レイアウトフォルダ分け 親コントローラと子コントローラフォルダ分け)
github:認証機能実装に伴い、.envに個人情報を入れたためリモートのファイル削除 ignoreに追加済み

【2019/04/25】
php:ログアウト機能実装 導線整理

【2019/04/26】
php:各種コントローラで機能の認証対象について設定
    初期画面についてデザイン変更
wiki:認証がらみ記載
github:履歴の整理 developのmaster反映

【2019/04/27-28】
php:投稿編集ページ追加 ユーザ登録後の導線修正 デザイン修正 ページ文言修正

【2019/04/29】
php:投稿削除機能追加 データ送信処理見直し(post:submit get:link) リクエストクラス追加(削除、更新用) レイアウト見直し
環境:環境ごとのenv切り替え追加 サーバ起動bat作成(ignoreで外す)
wiki:env切り替え時の参考情報追記

【2019/04/30】
php:サービス追加 レコードロック追加 トランザクション追加 ※DAOクラスはどうするか未定 eloquent任せのため
    共通処理についてクラスを作るか未定 ← 今のところは一部だけprivate関数でお試し作成
</pre>
