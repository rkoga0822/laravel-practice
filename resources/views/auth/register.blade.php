<h2>新規登録</h2>

<form method="POST" action="{{ route('register.store') }}">
    @csrf

    <div>
        <label for="name">ニックネーム</label>
        <input type="text" name="name">
    </div>

    <div>
        <label for="email">メールアドレス</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}">

        @error('email')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password">パスワード</label>
        <input id="password" type="password" name="password">

        @error('password')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password">パスワード確認</label>
        <input id="passwordconfirm" type="password" name="passwordconfirm">

    </div>

    <button type="submit">新規登録</button>
</form>