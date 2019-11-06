<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Storage;

class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth')->only(['show', 'edit', 'update']);
    }
    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
      $boards = $user->boards;
      $likes = $user->likes;
      return view('users.show', compact('user', 'boards', 'likes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      if ($user->id !== Auth::id()) {
        return redirect()->route('users.show', ['user'=>Auth::user()])->with('message', '編集する権限がありません');
      }
      return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
      $file = $request->avator_url;
      if (!empty($file)) {
        $path = Storage::disk('s3')->putFile('/', $file, 'public');
        $user->update([
          'avator_url' => Storage::disk('s3')->url($path),
          'name' => $request->name,
          'email' => $request->email,
          'detail' => $request->detail,
        ]);
      } else {
        $user->update([
          'name' => $request->name,
          'email' => $request->email,
          'detail' => $request->detail,
        ]);
      }
      return redirect()->route('users.show', ['user'=>$user])->with('message', 'ユーザー情報を更新しました');
    }
}
