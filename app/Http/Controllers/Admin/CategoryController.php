<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Controllers\Controller;

use App\Category;

class CategoryController extends Controller
{

	public function __construct(){
		$this->middleware('auth');
	}

    public function index()
    {
    	return view('admin.categories.index');
    }

    public function create()
    {
    	return view('admin.categories.create');
    }

    public function store(CategoryStoreRequest $request)
    {
    	$category = Category::create($request->all());

    	return redirect()->route('categories.edit', $category->id)
    		->with('info', trans('admin.categories.saved'));
    }

    public function show($id)
    {
    	$category = Category::find($id);

    	return view('admin.categories.show', compact('category'));
    }

    public function edit($id)
    {
    	$category = Category::find($id);

    	return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
    	$category = Category::find($id);
    	$category->fill($request->all())->save();

    	return redirect()->route('categories.edit', $category->id)
    		->with('info', trans('admin.categories.updated'));
    }

    public function destroy($id)
    {
    	Category::find($id)->delete();

    	return back()->with('info', trans('admin.categories.deleted'));
    }
}
