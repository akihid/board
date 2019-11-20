<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Board;

class BoardTest extends TestCase
{
    /**
     * Get All Boards Path Test
     *
     * @return void
     */
    public function testGetAllBoardsPath()
    {
      $response = $this->get('/boards');

      $response->assertStatus(200);
    }

    /**
     * Get Board Detail Path Test
     *
     * @return void
     */
    public function testGetBoardPath()
    {
      $board = Board::get()->first();
      $response = $this->get("/boards/$board->id");

      $response->assertStatus(200);
    }

    /**
     * Get Board Detail Path Not Exists Test
     *
     * @return void
     */
    public function testGetBoardPathNotExists()
    {
        $response = $this->get('/boards/0');

        $response->assertStatus(404);
    }
}
