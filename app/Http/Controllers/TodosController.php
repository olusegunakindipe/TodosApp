<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Session;
class TodosController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos')->with('todos', $todos);
    }

    public function store(Request $request)
    {

        $todo = new Todo;
        $todo->todo = $request->todo;
        $todo->save();
        Session::flash('success', 'Your todo was Created');
        return redirect()->back();
    }

    public function delete($id)
    {
       $todo = Todo::find($id);
       $todo->delete();
       Session::flash('success', 'Your todo was Deleted');

       return redirect()->back();
    }

    public function update($id)
    {
        $todo = Todo::find($id);

        return view('update')->with('todo', $todo);
    }

    public function save(Request $request, $id)
    {
        $todo = Todo::find($id);

        $todo->todo = $request->todo;
        $todo->save();
        Session::flash('success', 'Your todo has been updated');

        return redirect()->route('todos');
    }

    public function completed($id)
    {
        $todo = Todo::find($id);

        $todo->completed = 1;
        $todo->save();
        Session::flash('success', 'Your todo was marked as Completed');

        return redirect()->back();

    }
}
