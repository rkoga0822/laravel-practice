<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::where('user_id', Auth::id())->get();

        return view('todos.index', compact('todos'));
    }

    public function create():View
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>['required'],
            'body'=>['nullable'],
        ]);

        Todo::create([
        'title' => $request->title,
        'body' => $request->body,
        'user_id'=>Auth::id(),
    ]);

        return redirect()->route('todos.index');
    }
}
