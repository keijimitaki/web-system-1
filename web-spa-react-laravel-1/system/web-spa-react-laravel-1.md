#php7.4 + Laravel8 API


２．laravel8 のインストール
srcフォルダ内を空削除

dockerコンテナに入る
docker-compose exec -it textbook-web-php-laravel-php sh

２－１．

Laravelのインストール
composer create-project laravel/laravel:^8.0 .



３－１
Nginxのアクセスが上手くいかない
やりたいこと

この場合は、フロントのビルド済みReact
http://localhost:1211/

この場合は、バックエンドのLaravel
http://localhost:1211/api/


---


ブラウザからはhtt://localhost:1211/api/でアクセスし物理ディレクトリの以下でLaravelを動かしたい。
　/var/www/html/api/  ・・・ここでLaravelを動かしたい。
 
試したこと
　


http://localhost:1211/api/public/index.html


☆重要☆
多分、Nginxのポート毎に1つのrootしか指定できない。
なので、80ポートはフロント用、81ポートはバックエンド用みたいに分ける必要がある

上手くいかない

http://localhost:1211/

http://localhost:1212/index.html


これがよさそう
nginx サブディレクトリ毎
https://www.spiceworks.co.jp/blog/?p=15661


nginx_81php_error.logにこんなエラーが
https://www.xenos.jp/~zen/blog2/index.php/2021/08/17/post-5750/
2023/02/19 12:33:11 [error] 21#21: *2 FastCGI sent in stderr: "Primary script unknown" while reading response header from upstream, client: 192.168.96.1, server: localhost, request: "GET /api HTTP/1.1", upstream: "fastcgi://192.168.96.3:9000", host: "localhost:1212"
2023/02/19 12:33:15 [error] 21#21: *2 FastCGI sent in stderr: "Primary script unknown" while reading response header from upstream, client: 192.168.96.1, server: localhost, request: "GET / HTTP/1.1", upstream: "fastcgi://192.168.96.3:9000", host: "localhost:1212"
2023/02/19 12:33:32 [error] 21#21: *2 FastCGI sent in stderr: "Primary script unknown" while reading response header from upstream, client: 192.168.96.1, server: localhost, request: "GET /index.php HTTP/1.1", upstream: "fastcgi://192.168.96.3:9000", host: "localhost:1212"
2023/02/19 12:34:33 [error] 21#21: *2 FastCGI sent in stderr: "Primary script unknown" while reading response header from upstream, client: 192.168.96.1, server: localhost, request: "GET /index.php HTTP/1.1", upstream: "fastcgi://192.168.96.3:9000", host: "localhost:1212"
2023/02/19 12:34:37 [error] 21#21: *2 FastCGI sent in stderr: "Primary script unknown" while reading response header from upstream, client: 192.168.96.1, server: localhost, request: "GET / HTTP/1.1", upstream: "fastcgi://192.168.96.3:9000", host: "localhost:1212"


アプローチが違うがコレはどうか
ポートは１つで別ディレクトリ
https://teratail.com/questions/260988
