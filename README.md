# sotusei
g'sの卒業制作


タイトル：<br />
未定<br />

概要：<br />
#グループチャット内で
みんなの希望に沿ったお店（ホテル、etc）が
リアルタイムに表示される
webアプリ

必要な機能とそれに伴う技術：<br />
**・チャットシステム**<br />
　技術：milkcocoa

・投票機能
　技術：javascript

・各種API（まずはグルメに絞る）とのリアルタイム連携
　技術：milkcocoa

・テキスト解析APIとの連携
 技術：milkcocoa

・スマートフォン最適化
 技術：html,css

使用API
・グルメ

ホットペッパーAPI（http://api.hotpepper.jp/reference.html）
利用制限
写真にクレジット表記、ホットペッパーロゴ表記が必須（表示エリアの圧迫が懸念点）

ぐるなびAPI
レストラン検索API（http://api.gnavi.co.jp/api/manual/restsearch/）
利用制限
1リクエストに対するレスポンス10件まで
写真にクレジット表記、店舗ページへのリンク、ぐるなびロゴ表記が必須（表示エリアの圧迫が懸念点）


・テキスト
yahooテキスト解析
日本語形態素解析を使用（http://developer.yahoo.co.jp/webapi/jlp/ma/v1/parse.html）
httpでリクエスト送信→xmlでレスポンス→xmlをパースして表示
利用制限
50000/24時間、1リクエスト100kb

true teller（野村総研）テキスト解析API
有料利用


