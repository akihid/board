<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BoardRequest;
use Illuminate\Support\Facades\Auth;

class BoardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $boards = Board::latest('created_at')->get();

      return view('boards.index', compact('boards'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Board  $board
     * @return \Illuminate\Http\Response
     */
    public function edit(Board $board)
    {
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
