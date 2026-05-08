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
            <a href="{{route('todos.edit',$todo)}}">編集</a>
        </div>
    @endforeach
</div>       
    
@endsection