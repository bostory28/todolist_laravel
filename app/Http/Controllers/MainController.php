<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class MainController extends Controller
{
    public function index() {
      $todos = Todo::all();
      //$todos = Todo::withTrashed() -> get();
      //$todos = Todo::onlyTrashed() -> get();
      //$todos -> restore();
      return view('main', ['todos'=>$todos]);
    }
}
