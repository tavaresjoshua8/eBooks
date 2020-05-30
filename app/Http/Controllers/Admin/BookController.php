<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use File;

use App\Book;
use App\Category;

class BookController extends Controller
{

	public function __construct(){
		$this->middleware('auth');
	}

    public function index()
    {
    	$books = Book::orderBy('folio', 'ASC')->paginate();

    	return view('admin.books.index', compact('books'));
    }

    public function create()
    {
    	$categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');

    	return view('admin.books.create', compact('categories'));
    }

    public function store(BookStoreRequest $request)
    {
    	$book = Book::create($request->all());
        $category = Category::find($book->category_id);

        //IMAGE
        if($request->file('image')){
            $path = 'images/' . $category->folder . '/' . $book->slug . '.jpeg';
            if(Storage::disk('public')->put($path, file_get_contents($request->file('image')))){
                $book->fill(['image'=>$path])->save();
            }
        }

    	return redirect()->route('books.create')
    		->with('info', trans('admin.books.saved'))->with('category', $category->id);
    }

    public function show($id)
    {
    	$book = Book::find($id);
    	$category = Category::find($book->category_id);

    	return view('admin.books.show', compact('book', 'category'));
    }

    public function edit($id)
    {
    	$book = Book::find($id);
    	$categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');

    	return view('admin.books.edit', compact('book', 'categories'));
    }

    public function update(BookUpdateRequest $request, $id)
    {
    	$book = Book::find($id);
    	$oldCategory = $book->category_id;
    	$book->fill($request->all())->save();

        $category = $book->category;

        //IMAGE
        if($request->file('image')){
            $path = 'images/' . $category->folder . '/' . $book->slug . '.jpeg';
            if(Storage::disk('public')->put($path, file_get_contents($request->file('image')))){
                $book->fill(['image'=>$path])->save();
            }
        } else if($oldCategory != $category->id){
            $path = 'images/' . $category->folder . '/' . $book->slug . '.jpeg';
            if(Storage::disk('public')->move($book->image, $path))
                $book->fill(['image'=>$path])->save();
        }

    	return redirect()->route('books.edit', $book->id)
    		->with('info', trans('admin.books.updated'));
    }

    public function destroy($id)
    {
    	$book = Book::findOrFail($id);

        $image_path = public_path($book->image);
        if(File::exists($image_path)){
            File::delete($image_path);
        }

        $book->delete();
    	return back()->with('info', trans('admin.books.deleted'));
    }
}
