<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>取下がありました</title>
</head>

<body>
    <h2>確認担当者様へ</h2>
    <p>申請No:{{ $post['id'] }}の取下がありました。<br>
        下記内容のご確認をお願い致します。<br></p>

    <ul>
        <li>申請No:{{ $post['id'] }}</li>
        <li>申請者:{{ $post->user['name'] }}</li>
        <li>申請日時：{{ $post['created_at'] }}</li>
        <li>購入先：{{ $post['purchase'] }}</li>
        <li>合計金額：{{ number_format($post['total_amount'], 0, '.', ',') }}</li>
        {{-- <li>確認画面URL：<a href="{{ route('post.destroy_reapplication')}}">こちら</a></li> --}}
    </ul>
</body>

</html>
