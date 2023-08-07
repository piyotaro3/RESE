# アプリケーション名

飲食店予約サイト
![トップページ（ゲスト）](https://github.com/piyotaro3/RESE/assets/121168107/4f009e45-811d-4185-9ba8-e577dc99293f)
![トップページ（ログイン済み）](https://github.com/piyotaro3/RESE/assets/121168107/66c87049-8f2c-416a-ae26-4523cc7f8701)
## 作成した目的

外部の飲食店予約サービスは手数料を取られるので自社で予約サービスを持ちたい。

## アプリケーションURL

デプロイしていないため、デプロイ済みのURLはありません。
ローカル環境で実行可能です。

## 他のリポジトリ

関連するリポジトリはありません。

## 機能一覧

- 会員登録機能
- ログイン機能
- ログアウト機能
- ユーザー情報取得
- ユーザー飲食店お気に入り一覧取得
- ユーザー飲食店予約情報取得
- ユーザーレビュー一覧取得
- 飲食店一覧取得
- 飲食店詳細取得
- 飲食店レビュー一覧取得
- 飲食店評価平均取得
- 飲食店お気に入り追加
- 飲食店お気に入り削除
- 飲食店予約情報追加
- 飲食店予約情報削除
- 飲食店予約情報変更
- レビュー情報追加
- レビュー情報変更
- レビュー情報削除
- エリアで検索する
- ジャンルで検索する
- 店名で検索する

## 使用技術（実行環境）

- 言語: PHP  Ver 8.2.4
- フレームワーク: Laravel  Ver 8.83.27
- データベース: MySQL  Ver 15.1
- XAMPP(ローカル環境): Apache 2.4.56 

## テーブル設計

![テーブル設計1](https://github.com/piyotaro3/RESE/assets/121168107/b1bb99e3-339b-4a0e-9978-bf21bef7c589)

![テーブル設計2](https://github.com/piyotaro3/RESE/assets/121168107/c4e044fe-9d5b-4d7b-951e-6633f67f36a9)

![テーブル設計3](https://github.com/piyotaro3/RESE/assets/121168107/f7cf76d0-b485-4a57-8f0d-fe05abebd0e0)

[設計書テーブル設計リンク](https://docs.google.com/spreadsheets/d/12Nau_FOSCNsigQEucaz1TtsAd9S1u5gjqL1Teh3By74/edit#gid=1904085266)

## ER図

![ER図](https://github.com/piyotaro3/RESE/assets/121168107/072f5972-48dd-42e5-a8a8-1c0f78647e65)

[設計書ER図リンク](https://docs.google.com/spreadsheets/d/12Nau_FOSCNsigQEucaz1TtsAd9S1u5gjqL1Teh3By74/edit#gid=634778829)

# 環境構築

## 手順1

エクスプローラーまたはコマンドプロンプトでプロジェクト直下へ移動し、コマンドプロンプトで「composer update」とコマンド入力する。

## 手順2

データベースの作成
create database [データベース名];で作成する。

## 手順3

コマンドプロンプトで「cp .env.example .env」で.envを作成する。 

## 手順4

.envを編集する。
- DB_DATABASE=使用するデータベース名
- DB_USERNAME=DBユーザー名（デフォルトだとroot）
- DB_PASSWORD=DBパスワード（未設定なら空にする）で編集する。

## 手順5
マイグレーションとシーディングの実行
「php artisan migrate --seed」を実行する。

# その他注意事項

##　テストユーザーについて
テストユーザーを作成しています。
以下でログイン可能です。
- ユーザー名： UserName
- email:  User@test.com
- password: 12345678
  
## 都道府県について

今回は東京都、大阪府、福岡県の3つの都道府県のみでしたのでシーディングはこの3県にしています。

## 予約機能について

予約日は翌日以降に選択できます。
時間帯は店舗に営業時間がないため、00：00～23：30の間で30分単位で選択できます。
人数は1人～99人まで選択できます。

## 予約完了後のページについて

以下の画像は予約完了後のページです。　　
画像では「戻る」ボタンですが、コーチーとの打ち合わせで「マイページ」へ移動するように変更しています。
<img width="1437" alt="done" src="https://github.com/piyotaro3/RESE/assets/121168107/53e99103-c51f-4c3d-ac95-8395ee810e97">

## レビュー機能について

レビューは予約1件につき1投稿できる仕様です（変更や削除は可能です）。
レビューはマイページ→来店履歴→評価するから投稿可能です。
レビュー投稿は来店日の翌日以降に可能です。

## 案件シートリンク
  [案件シート](https://docs.google.com/spreadsheets/d/12Nau_FOSCNsigQEucaz1TtsAd9S1u5gjqL1Teh3By74/edit#gid=522964981)
