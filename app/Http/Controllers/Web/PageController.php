<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Category;

class PageController extends Controller
{

    public function especialidad($especialidad)
    {
        $category = Category::where('slug', $especialidad)->first();
    	$books = $category->books()->orderBy('name', 'ASC')->paginate(24);
    	return view('web.books.home', compact('books'));
    }

    public function search(Request $request){
        $request->search = str_replace(' ', '%', $request->search);
    	$books = Book::select('name')->where('name', 'LIKE', '%' . $request->search . '%')->get();
    	return \response()->json($books);
    }

    public function show($name){
        $name = str_replace(' ', '%', $name);
        $books = Book::where('name', 'LIKE', "%$name%")->paginate(24);
    	return view('web.books.home', compact('books'));
    }

    public function about(Request $request)
    {
        $book = Book::where('slug', $request->slug)->first();
        return view('web.books.modal', compact('book'));
    }

    public function read($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $category = Category::find($book->category_id);
        return view('web.books.read', compact('book', 'category'));
    }
}
