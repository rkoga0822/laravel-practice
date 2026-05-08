<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    <h1>プロフィール画面</h1>
    <p>ニックネーム：{{auth()->user()->name}}</p>
    @if(auth()->user()->profile_path)
    <img src="{{ asset('storage/' . auth()->user()->profile_path) }}" alt="プロフィール画像" class="profile-icon">
    @else
    <img src="{{ asset('storage/default.png') }}" alt="デフォルト画像" class="profile-icon">
    @endif
    <br>
    
    <a href="{{route('profile.edit',auth()->user()->id)}}">編集</a>
    
    <form action="{{route('profile.destroy',auth()->user()->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('本当に削除しますか？')">アカウント削除</button>
    </form>
    
    <a href="{{route('todos.index')}}">一覧に戻る</a>
</body>

</html>