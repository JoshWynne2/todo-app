<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {

		$todos = Todo::orderBy('created_at', 'desc')->get();

		return view('todos.index', [
			'todos' => $todos
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create() {
		return view('todos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request) {
		
		// dd("hi");

		$rules = [
			'title' => 'required|string|unique:todos,title|min:2',
			'body'	=> 'required|string|max:500'
		];

		$messages = [
			'title.unique' => 'Todo title is already in use (needs to be unique)'
		];

		$request->validate($rules, $messages);

		$todo = new Todo;
		$todo->title = $request->title;
		$todo->body = $request->body;
		$todo->save();

		return redirect()
			->route("todo.index")
			->with('status', 'Created a new todo');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id) {
		$todo = Todo::findOrFail($id);

		return view('todos.show', ['todo' => $todo]);
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id) {
		
		$todo = Todo::findOrFail($id);

		return view('todos.edit', [
			'todo' => $todo
		]);

	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id) {
		
		$rules = [
			'title' => "required|string|unique:todos,title,{$id}|min:2",
			'body'	=> 'required|string|max:500'
		];

		$messages = [
			'title.unique' => 'Todo title is already in use (needs to be unique)'
		];

		$request->validate($rules, $messages);

		$todo = todo::findOrFail($id);
		$todo->title = $request->title;
		$todo->body = $request->body;
		$todo->save();

		return redirect()
			->route("todo.index")
			->with('status', 'Edited a todo');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id) {
		$todo = Todo::findOrFail($id);
		$todo->delete();

		return redirect()
			->route("todo.index")
			->with('status', 'Todo Deleted!');
	}
}