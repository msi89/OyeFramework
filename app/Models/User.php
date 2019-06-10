<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

    protected $table = 'users';
    protected $fillable = ['email','name','username'];

    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'posts_id');
    }
}