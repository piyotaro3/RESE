# アプリケーション名

飲食店予約サイト

![トップページ](https://github.com/piyotaro3/RESE/assets/121168107/248a8060-3443-4433-a7a5-be7ee396cc6d)

##　作成した目的

プログラミングスクールの卒業課題として作成しました。

## アプリケーションURL

デプロイしていないため、デプロイ済みのURLはありません。
ローカル環境で実行可能です。

##　他のリポジトリ

関連するリポジトリはありません。

##　機能一覧

- 会員登録機能
- ログイン機能
- 予約機能（日時、時間、人数）
- 予約キャンセル機能
- お気に入り登録機能・削除機能

##　使用技術（実行環境）

- 言語：PHP フレームワーク：Laravel 8.83.27

## テーブル設計

![テーブル設計1](https://github.com/piyotaro3/RESE/assets/121168107/a51f47e9-f608-41f4-803a-1865fbb2c2c4)

![テーブル設計2](https://github.com/piyotaro3/RESE/assets/121168107/29609d64-b756-41cb-aac9-f64b7f332db7)

## ER図

![ER図](https://github.com/piyotaro3/RESE/assets/121168107/ef4c5977-0a7d-45d3-9df7-2e253506cca0)

# 環境構築

## 手順1

プロジェクト直下へ移動し「composer update」とコマンド入力する。

##　手順2

.envを編集
DB_DATABASE=使用するデータベース名
DB_USERNAME=DBユーザー名（デフォルトだとroot）
DB_PASSWORD=DBパスワード（未設定なら空にする）で編集する。

## 手順3

データベースの作成
create database [データベース名];で作成する。

## 手順4

マイグレーションとシーディングの実行
「php artisan serve --seed」を実行する。

## その他注意事項

- 都道府県について

今回は東京都、大阪府、福岡県の3つの都道府県のみでしたのでシーディングはこの3県にしています。

- 予約機能について

予約日は翌日以降に選択できます。
時間帯は店舗に営業時間がないため、00：00～23：30の間で30分単位で選択できます。
人数は1人～99人まで選択できます。

- 予約完了後のページについて

以下の画像は予約完了後のページです。　　
画像では「戻る」ボタンですが、コーチーとの打ち合わせで「マイページ」へ移動するように変更しています。
<img width="1437" alt="done" src="https://github.com/piyotaro3/RESE/assets/121168107/53e99103-c51f-4c3d-ac95-8395ee810e97">
