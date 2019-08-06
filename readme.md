# ApiRequest
ApiへHttpリクエストを送り、DBにデータを保存します。

## 使用ライブラリ
Guzzle, PHP HTTP client<br>
https://github.com/guzzle/guzzle

install<br/>
`composer install`

## 使い方
/index ページにある入力フォームに画像ファイルパスを入力してください。<br/>
送信ボタンを押すと、APIにリクエストが送られ、AIで分析が行われます。<br/>
そして、その画像が所属するClassが返却されます。<br/>
APIのレスポンスはDBに保存されます。
