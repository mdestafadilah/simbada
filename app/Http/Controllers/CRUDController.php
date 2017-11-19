<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;

class CRUDController extends Controller
{

	public function index()
	{
		$cruds = Crud::all()->toArray();
		return view('crud.index', compact('cruds'));
	}

	public function store(Request $request)
	{
		// Object CRUD
		$crud = new Crud([
			'title' => $request->get('title'),
			'post' => $request->get('post')
		]);

		$crud->save();
		return redirect('/crud');
	}

	public function view($id)
	{

	}

	public function edit($id)
	{
		$crud = Crud::find($id);
		return view('crud.edit', compact('crud','id'));
	}

	public function update(Request $request, $id)
	{
		$crud = Crud::find($id);
		$crud->title = $request->get('title');
		$crud->post = $request->get('post');
		$crud->save();
		return redirect('/crud');
	}

	public function destroy($id)
	{
		$crud = Crud::find($id);
		$crud->delete();
		return redirect('/crud');
	}

    public function create()
    {
    	return view('crud.create');
    }
}
