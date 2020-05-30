<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['web']], function () {
	Route::redirect('/', 'home');

	Auth::routes(['register'=>false, 'reset'=>false]);

	// Lang
	Route::get('lang/{lang}', function ($lang) {
        session(['lang' => $lang]);
        return \Redirect::back();
    })->where([
        'lang' => 'en|es|fr|it|de|ru'
    ]);

	// Web
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/busqueda', 'Web\PageController@search')->name('books.search');
	Route::get('/interesado-en/{name}', 'Web\PageController@show')->name('showbooks');
	Route::post('/sobre/', 'Web\PageController@about')->name('about');
	// Route::get('/leer/{slug}', 'Web\PageController@read')->name('read');
	Route::get('/especialidad/{especialidad}', 'Web\PageController@especialidad')->name('especialidad');
	Route::get('/otros/{especialidad}', 'Web\PageController@especialidad')->name('otros');
	Route::get('/asignaturas/{especialidad}', 'Web\PageController@especialidad')->name('asignaturas');

	// Admin
	Route::resource('books', 'Admin\BookController');
	Route::resource('categories', 'Admin\CategoryController');
});

// DataTables
Route::prefix('/api/datatables')->group(function(){
    Route::get('categories', function(){
		return datatables()
			->eloquent(App\Category::query())
			->addColumn('show', function($book){
				return view('admin.categories.partials.show', ['id' => $book->id]);
			})
			->addColumn('edit', function($book){
				return view('admin.categories.partials.edit', ['id' => $book->id]);
			})
			->addColumn('delete', function($book){
				return view('admin.categories.partials.delete', ['id' => $book->id]);
			})
			->rawColumns(['show', 'edit', 'delete'])
			->toJson();
	})->middleware('auth');

	Route::get('books', function(){
		return datatables()
			->eloquent(App\Book::query())
			->addColumn('category', function($book){
			    return $book->category->name;
			})
			->addColumn('show', function($book){
				return view('admin.books.partials.show', ['id' => $book->id]);
			})
			->addColumn('edit', function($book){
				return view('admin.books.partials.edit', ['id' => $book->id]);
			})
			->addColumn('delete', function($book){
				return view('admin.books.partials.delete', ['id' => $book->id]);
			})
			->rawColumns(['show', 'edit', 'delete'])
			->toJson();
	})->middleware('auth');
});