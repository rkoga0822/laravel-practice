@extends('layouts.app')

@section('title', 'Todo作成')

@section('content')
<h2>Todo作成</h2>

<div class="form-area">
    <form action="{{route('todos.store')}}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="タイトル"><br>
        <textarea name="body" placeholder="本文"></textarea><br>
        <!-- <input type="file" name="attachment"><br> -->
        <button type="submit">追加</button>
    </form>
</div>


@endsection