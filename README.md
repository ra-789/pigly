# アプリケーション名

pigly

## 環境構築

Docker ビルド 1.https://github.com/ra-789/pigly
2.DockerDesktop アプリを立ち上げる
3.docker-compose up -d --build

Laravel 環境構築
1.docker-compose exec php bash
2.composer install 3.新しく.env ファイルを作成
4..env に以下の環境変数を追加

```text
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```

5. アプリケーションキーの作成

```bash
php artisan key:generate
```

6. マイグレーションの実行

```bash
php artisan migrate
```

7. シーディングの実行

```bash
php artisan db:seed
```

## 使用技術(実行環境)

・PHP8.3.0
・Laravel8.83.8
・MySQL8.0.26

## ER 図

pigly.drawio

## URL

・管理画面：http://localhost:81/weight_logs
・登録画面：http://localhost:81//register/step1

・phpMyAdmin:：http://localhost:8080/
