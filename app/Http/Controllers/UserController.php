<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    //
    public function index()
    {
        $user = User::where('id', Auth::id())->get();

        return view('profile.index', compact('user'));
    }

    public function create() {}

    public function store(Request $request) {}

    public function show(User $user) {}

    //ユーザー編集画面に遷移
    public function edit(User $profile): View
    {
        return view('profile.edit', [
            'user' => $profile
        ]);
    }

    //ユーザー名、プロフィール画像編集ロジック
    public function update(Request $request, User $profile)
    {
        $request->validate([
            'name' => ['required'],
            'profile_path' => ['nullable', 'image'],
        ]);

        $profilePath = $profile->profile_path;

        if ($request->hasFile('profile_path')) {
            $profilePath = $request
                ->file('profile_path')
                ->store('profiles', 'public');
        }

        $profile->update([
            'name' => $request->name,
            'profile_path' => $profilePath,
        ]);

        return redirect()->route('profile.index');
    }

    //ユーザー論理削除（復元はDBから直接いじる）
    public function destroy(User $user): RedirectResponse
    {

        /** @var User $user */
        $user = Auth::user();

        $user->delete();

        Auth::logout();

        return redirect()->route('login');
    }
}
