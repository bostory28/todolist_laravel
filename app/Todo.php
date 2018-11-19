<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    protected $table = 'todolist';
    protected $fillable = ['title'];
    //$guarded = ['title'];
    use SoftDeletes;
    protected $dates = ['delete_at'];
}
