<?php

namespace App\Http\Controllers;

use App\Board;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
      $board = Board::find($request->board_id);
      $params = $request->all();
      $board->comments()->create($params);
      return redirect()->route('boards.show', ['board'=>$board])->with('message', 'コメントを投稿しました');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  Comment  $board
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
      $board = $comment->board;
      $comment->delete();

      return redirect()->route('boards.show', ['board'=>$board])->with('message', 'コメントを削除しました');
    }
}
