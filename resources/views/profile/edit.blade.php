<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>プロフィール編集</h1>
    <form action="{{route('profile.update',auth()->user()->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{auth()->user()->name}}">
        <input type="file" name="profile_path">
        <button type="submit">更新</button>
    </form>
</body>
</html>