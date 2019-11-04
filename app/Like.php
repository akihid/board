<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  protected $fillable = ['user_id', 'board_id'];

    public function board()
    {
      return $this->belongsTo('App\Board');
    }

    public function User()
    {
      return $this->belongsTo('App\User');
    }
}
