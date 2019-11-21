<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BoardRequest;
use Illuminate\Support\Facades\Auth;

class BoardsController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if (empty($request->keyword)) {
        $keyword = null;
        $boards = Board::latest('created_at')->paginate(8);
      } else {
        $keyword = $request->keyword;
        $boards = Board::latest('created_at')->where('title', 'LIKE', "%$keyword%")->paginate(8);
      }

      return view('boards.index', compact('boards', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('boards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BoardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BoardRequest $request)
    {
      $board = Auth::user()->boards()->create($request->validated());

      return redirect()->route('boards.index')->with('message', '投稿しました');
    }
    /**
     * Display the specified resource.
     *
     * @param  Board  $board
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board)
    { 
      $like = null;
      if (Auth::check()) {
        $like = $board->likes()->where('user_id', Auth::user()->id)->first();
      } 
      return view('boards.show', compact('board', 'like'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Board  $board
     * @return \Illuminate\Http\Response
     */
    public function edit(Board $board)
    {
      if ($board->user_id !== Auth::id()) {
        return redirect()->route('boards.show', ['board'=>$board])->with('message', '編集する権限がありません');
      }
      return view('boards.edit', compact('board'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BoardRequest  $request
     * @param  Board  $board
     * @return \Illuminate\Http\Response
     */
    public function update(BoardRequest $request, Board $board)
    {
      $board->update($request->validated());
  
      return redirect()->route('boards.index')->with('message', '更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Board  $board
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board)
    {
      $board->delete();

      return redirect()->route('boards.index')->with('message', '削除しました');
    }
}
