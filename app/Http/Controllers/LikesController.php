<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Like;
use App\Board;

class LikesController extends Controller
{
    public function __construct()
      {
        $this->middleware('auth');
      }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $board = Board::find($request->board_id);
      $params = $request->all();
      $board->likes()->create($params);
      return redirect()->route('boards.show', ['board'=>$board])->with('message', 'お気に入り登録しました');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
      $board = $like->board;
      $like->delete();

      return redirect()->route('boards.show', ['board'=>$board])->with('message', 'お気に入り解除しました');
    }
}
