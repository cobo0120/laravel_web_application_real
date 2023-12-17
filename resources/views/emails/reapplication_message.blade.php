<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>申請の再申請</title>
</head>

<body>
    <h2>申請の再申請</h2>
    <p>再申請されました<br>
        下記内容の申請の確認をお願い致します。<br></p>

    <ul>
        <li>申請No:{{ $post['id'] }}</li>
        <li>申請者:{{ $post->user['name'] }}</li>
        <li>申請日時：{{ $post['created_at'] }}</li>
        <li>購入先：{{ $post['purchase'] }}</li>
        <li>備考（再申請理由）：{{ $post['remarks'] }}</li>
        <li>合計金額：{{ number_format($post['total_amount'], 0, '.', ',') }}</li>
        <li>確認画面URL：<a href="{{ route('post.create_authorizer', ['id' => $post['id']]) }}">詳細はこちら</a></li>
    </ul>
</body>

</html>
