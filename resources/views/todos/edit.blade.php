<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>todo更新</h2>
    <form action="{{route('todos.update',$todo)}}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="title" placeholder="タイトル" value="{{$todo->title}}"><br>
        <textarea name="body" placeholder="本文">{{$todo->body}}</textarea><br>
        <button type="submit">更新</button>
        <button type="button" onclick="history.back()">戻る</button>
    </form>
</body>
</html>