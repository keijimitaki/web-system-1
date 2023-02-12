現場利用が多いと思うのでRails6にする
画面はWebpackerが必要なので
https://blog.cloud-acct.com/posts/u-rails-dockerfile/


１．docker-compose build

２．srcフォルダにGemfileとGemfile.lockを作成

３．コンテナに入る
docker-compose run -it textbook-web-ruby-rails6-ruby bash

３－１．
gem install rails -v 6.1
→version 6 が入る

rails new .
→srcフォルダ直下にアプリが作成される

rails -s

３－２．
Gemfileに以下を追加
https://wakunkyo.com/net-protoc-retry-error/
gem 'net-http'
gem 'mysql2'

エラーが出るのでWebpackのインストール
bundle exec rails webpacker:install
https://qiita.com/yokota02210301/items/46f44af5787a1a492bd4

３－３．
rails webpacker:install
5系を選択

４．再度build



----------------
NySQL導入
https://www.sejuku.net/blog/28403