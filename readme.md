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

確認後はログアウトをお願い致します。

### 制作背景・意図
PHPを学び始める最初のステップとして勉強を初めて２週間くらいで作成した物です。また自分自身がメンターを探している最中だったので、簡易的な物でも無料で連絡先交換出来るスキルのマッチングサイトがあったらいいな、という方向性で作りました。

### 課題や今後実装したい機能
curd処理の勉強にはなったと思うが、まだrailsとの違いに戸惑う部分も多いのでまずはrailsで出来ていたことを出来るようにしたい。特にDB周りは設計し直して、一度送ったリクエストは再リクエスト出来ないようにしたい。

laravelの理解も最低限したいが、フレームワークを使わずアプリを作ったことがないので、出来たら次のアプリはまずはphpの記述だけで作り、それをフレームワークで作り直すことで理解を深めたい。

### 工夫したポイント
基礎的なcrud処理の確認をするための物だったのでなるべくフロントに時間をかけたくなかったのでboostrapを使った。前に使った時に中途半端に導入したので今回は全体的にbootstrapで簡単に書いた。

### 挙動・DEMO
１：まずは提供するスキルと教えて欲しいスキルをカードに登録します
![phppractice1](https://user-images.githubusercontent.com/59106983/85519215-1da70700-b63c-11ea-9aae-ddb08e60a0f1.gif)

２：それを見たユーザー（ここでは田中さん）が技術を交換しないかとリクエストします（自分の連絡先を相手に教えます）。
![phppractice2](https://user-images.githubusercontent.com/59106983/85519403-68c11a00-b63c-11ea-9c5b-d9a66cc30d06.gif)

３：リクエストを受けたユーザーだけがマイページで誰からどんなリクエストがあったのかを確認出来ます。
![phppractice3](https://user-images.githubusercontent.com/59106983/85519695-d8370980-b63c-11ea-84f5-66ef1edd7e67.gif)

### DB
### usersテーブル
|Column|Type|Options|
|------|----|-------|
|id|bigint(20)|unsigned,null: false|
|name|varchar(255)|null: false|
|email|varchar(255)|null: false, unique:true|
|email_verified_at|timestamp||
|password|varchar(255)|null: false|
|remember_token|varchar(100)||
|created_at|timestamp||
|updated_at|timestamp||


### Association
- hasMany:userinfos 
- hasMany:students

### user_infosテーブル
|Column|Type|Options|
|------|----|-------|
|id|bigint(20)|unsigned, null: false|
|user_id|bigint(20)|unsigned, null: false, foreignkey:true|
|nickname|varchar(20)|null: false|
|time|tinyint(4)|null: false|
|whatyougive|varchar(20)|null: false|
|whatyouwant|varchar(20)|null: false|
|created_at|timestamp||
|updated_at|timestamp||


### Association
- belongsTo: user 



### studentsテーブル
|Column|Type|Options|
|------|----|-------|
|id|bigint(20)|unsigned, null: false|
|user_id|bigint(20)|unsigned, null: false, foreignkey:true|
|studentname|varchar(255)|null: false|
|studentemail|varchar(255)|null: false|
|studentwant|varchar(255)|null: false|
|studentgive|varchar(255)|null: false|
|cardtime|tinyint(4)|null:false|
|created_at|timestamp||
|updated_at|timestamp||


### Association
- belongsTo:user

### 補足
作りながら勉強しているので実際のDBの構造には現状では使ってないカラムやリレーションが含まれている場合があります。




