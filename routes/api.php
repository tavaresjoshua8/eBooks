<?php

use Illuminate\Http\Request;
use App\Category;
use App\Book;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('test', function(){
    return [
       "message" => "Hello World!"
    ];
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/books', function(){
    return Book::orderBy('name')->paginate(20);
});
Route::get('/categories', function(){
    return Category::select('id', 'name', 'slug', 'folder', 'saveIn')->orderBy('name')->paginate(20);
});

// Category Details
Route::get('/category/{slug}', function($slug){
   return Category::select('id', 'name', 'slug', 'folder', 'saveIn')->where('slug', $slug)->first();
});
// Get Books by Category
Route::get('/category/{slug}/books', function($slug){
    $books = Category::where('slug', $slug)->first()->books()->paginate(20);
    $books->each(function($book){
        if( is_null($book->year) )
            $book->year = "s.f.";
    });
    return $books;
});
// Book Details
Route::get('/book/{slug}', function($slug){
    $book = Book::select('id', 'name', 'slug', 'author', 'translation', 'editorial')->where('slug', $slug)->first();
    $book->image = asset($book->image);
    return $book;
});
// Get Category by Book
Route::get('/book/{slug}/category', function($slug){
    return Book::where('slug', $slug)->first()->category()->select('id', 'name', 'slug', 'folder', 'saveIn')->first();
});
