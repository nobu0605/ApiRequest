# ApiRequest
ApiへHttpリクエストを送り、DBにデータを保存します。

## 使用ライブラリ
Guzzle, PHP HTTP client<br>
https://github.com/guzzle/guzzle

install<br/>
`composer install`

## 使い方
/index ページに入力フォームがあるので、画像ファイルパスを入力してください。
APIにリクエストが送られ、AIで分析し、その画像が所属するClassが返却されます。
APIのレスポンスはDBに保存されます。
