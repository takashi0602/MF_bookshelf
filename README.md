Composerのインストール

```
composer install
```

npmのインストール

```
npm i
```



.envの作成

```
cp .env.example .env
```

APP_KEYの生成

```
php artisan key:generate
```

各APIキーの設定

.envの `FACEBOOK_ID`, `FACEBOOK_SECRET`, `TWITTER_ID`, `TWITTER_SECRET`, `GITHUB_ID`, `GITHUB_SECRET` に各自で取得した値を設定してください.



データベースの作成

```
cd database

touch database.sqlite

cd ..
```



マイグレーションの実行

```
php artisan migrate
```



ローカルサーバの起動

```
php artisan serve
```