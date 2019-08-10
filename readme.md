# ApiRequest
ApiへHttpリクエストを送り、DBにデータを保存します。

## 使用ライブラリ
Guzzle, PHP HTTP client<br>
https://github.com/guzzle/guzzle

install<br/>
`composer install`

## 使い方
/index ページにある入力フォームに日本語文字列を入力してください。<br/>
送信ボタンを押すと、APIにリクエストが送られ、ひらがなに変換されます。<br/>
APIのレスポンスはDBに保存されます。
