## FreeMenta

### 概要
自分が提供出来るスキルと教えて欲しいスキルを登録しておくと、それを見た人からスキルを交換しませんか？と連絡先が送られてくる、という仕様です。

### 主に使用した技術・言語
 - php
 - Laravel
 - html
 - bootstrap
 - heroku
 
### デプロイ先
https://intense-mesa-88579.herokuapp.com/

現在herokuにアップしていますが、dockerの実験で使う際に変えるかもしれません。

テスト用アカウントemail: yamada@yamada.yamada

テスト用アカウントpassword: yamadayamada

### 制作背景・意図
PHPを学び始める最初のステップとして勉強を初めて２週間くらいで作成した物です。また自分自身がメンターを探している最中だったので、簡易的な物でも無料で連絡先交換出来るスキルのマッチングサイトがあったらいいな、という方向性で作りました。

### 課題や今後実装したい機能
curd処理の勉強にはなったと思うが、まだrailsとの違いに戸惑う部分も多いのでまずはrailsで出来ていたことを出来るようにしたい。特にDB周りは設計し直して、一度送ったリクエストは再リクエスト出来ないようにしたい。

laravelの理解も最低限したいが、フレームワークを使わずアプリを作ったことがないので、出来たら次のアプリはphpの記述だけで作り、セキュリティを考慮してフレームワークで作り直す、という手法を取りたい。

### 工夫したポイント
基礎的なcrud処理の確認をするための物だったのでなるべくフロントに時間をかけたくなかったのでboostrapを使った。前に使った時に中途半端に導入したので今回は全体的にbootstrapで簡単に書いた。

### 挙動
gif画像が入る

### DB
### usersテーブル
|Column|Type|Options|
|------|----|-------|
|id|bigint(20)|null: false|
|name|varchar(255)|null: false|
|email|string|null: false, unique:true|
|email_verified_at|timestamp||
|password|varchar(255)|null: false|
|remember_token|varchar(100)||
|created_at|timestamp||
|updated_at|timestamp||


### Association
- has_many: 
- has_one : 

### user_infosテーブル
|Column|Type|Options|
|------|----|-------|
|id|bigint(20)|null: false|
|user_id|bigint(20)|null: false|
|nickname|varchar(20)|null: false|
|time|tinyint(4)|null: false|
|whatyougive|varchar(20)|null: false|
|whatyouwant|varchar(20)|null: false|
|created_at|timestamp||
|updated_at|timestamp||


### Association
- has_many: 
- has_one : 



