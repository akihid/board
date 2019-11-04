<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;

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
      if (!empty($request->avator_url)) {
        $filename = $request->file('avator_url')->store('public/avator_images');
        $user->update([
          'avator_url' => basename($filename),
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
