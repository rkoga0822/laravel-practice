@extends('layouts.app')
@section('title','Todo一覧')
@section('content')
    <h2>Todo一覧</h2>

<div class="todo-list">
    @foreach ($todos as $todo)
        <div class="todo-card">
            <h3 class="todo-card-title">
                {{ $todo->title }}
            </h3>

            <p class="todo-card-body">
                {{ $todo->body }}
            </p>

            <p class="todo-card-date">
                作成日：{{ $todo->created_at->format('Y-m-d') }}
            </p>
            <a href="{{route('todos.edit',$todo)}}" class="btn">編集</a>
            <form action="{{route('todos.destroy',$todo)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit".  onclick="return confirm('本当に削除しますか？')" class="btn">削除</button>
            </form>
        </div>
    @endforeach
</div>       
    
@endsection