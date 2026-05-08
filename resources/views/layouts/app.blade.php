<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Todoアプリ')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header>
        <h1>Todoアプリ</h1>

        <nav>

            <a href="{{ route('todos.index') }}" class="btn">一覧</a>
            <a href="{{ route('todos.create') }}" class="btn">作成</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn">ログアウト</button>
            </form>
            <div class="profile">
                @if(auth()->user()->profile_path)
                <img src="{{ asset('storage/' . auth()->user()->profile_path) }}" alt="プロフィール画像" class="profile-icon">
                @else
                <img src="{{ asset('storage/default.png') }}" alt="デフォルト画像" class="profile-icon">
                @endif

            </div>
            <div class="username"><a href="{{route('profile.index')}}">{{auth()->user()->name}}</a>さん</div>
            
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>© Todo App</p>
    </footer>
</body>

</html>