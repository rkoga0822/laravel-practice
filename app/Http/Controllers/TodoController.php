<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TodoController extends Controller
{
    //一覧表示
    public function index()
    {
        $todos = Todo::where('user_id', Auth::id())->get();

        return view('todos.index', compact('todos'));
    }

    //todo新規作成ページへ遷移
    public function create(): View
    {
        return view('todos.create');
    }

    //todo新規作成
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'body' => ['nullable'],
        ]);

        Todo::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('todos.index');
    }

    //todo編集ページ遷移
    public function edit(Todo $todo): View
    {
        return view('todos.edit', compact('todo'));
    }
    //更新処理
    public function update(Request $request, Todo $todo):RedirectResponse
    {
        $request->validate([
            'title'=>['required'],
            'body'=>['nullable'],
        ]);

        $todo->update([
            'title'=>$request->title,
            'body'=>$request->body,
        ]);

        return redirect()->route('todos.index');
    }

    public function destroy(Todo $todo)
    {

    }
}
