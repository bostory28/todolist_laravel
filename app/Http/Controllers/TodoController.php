<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use DB;
use App\Todo;

class TodoController extends Controller
{
    public function store(Request $request) {
      //dd($request->all());
      //dd(Request::all());
      $title = $request -> input('title');

      //DB::insert('insert into todolist (title) values (?)', [$title]);

      //DB::table('todolist')->insert(['title'=>$title]);

      //$todo = new Todo();
      //$todo->title = $title;
      //$todo->save();

      Todo::create([
        'title'=>$title
      ]);
      return redirect('/');;
    }

    public function done($id) {
      $todo = Todo::find($id);

      if ($todo -> done == 1) {
        $todo -> done = 0;
      } else {
        $todo -> done = 1;
      }
      $todo -> save();

      return redirect('/');
    }

    public function destroy($id) {
      $todo = Todo::find($id);
      $todo -> delete($id);

      return redirect('/');
    }
}
