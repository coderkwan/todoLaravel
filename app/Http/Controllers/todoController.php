<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class todoController extends Controller
{
	function index()
	{
		$data = Todo::get();
		return view("app")->with('data', $data);
	}

	function create(Request $request)
	{
		$newdata = new Todo();
		$newdata->todo = $request->input('todo');
		$newdata->complete = 0;
		$newdata->save();

		return redirect('/');
	}
	function delete(Request $request)
	{
		Todo::where('id', $request->input('id'))->delete();
		return redirect("/");
	}
	function edit($id)
	{
		$todo = Todo::where('id', $id)->get();
		return view("edit")->with('todo', $todo);
	}
	function update(Request $req)
	{
		$d = $req->input('id');
		$a = $req->input('todo');

		$todo = Todo::find($d);
		$todo->todo = $a;
		$todo->save();

		return redirect("/");
	}
}
