<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\User;
use App\Book;
//Route::get('/', 'UserController@index');

Route::get('/', function () { return redirect('user');});

Route::resource('user', 'UserController');
Route::resource('book', 'BookController');


Route::get('user/{id}/givebook', function($id) {
    return view('user.givebook', ['user'=>User::find($id), 'books'=>Book::where('user_id','=','0')->get()]);
});
Route::post('user/{id}/givebook', function($id, Request $request) {
    $book_id = Request::input('select');
    if($book_id == '0') {
        Session::flash('error', 'You did not select book');
        return Redirect::to('/user/'.$id.'/givebook');
    } else {
        $user = User::find($id);
        $book = Book::find($book_id);
        $user->books()->save($book);
        Session::flash('message', 'User got his book succesfully');
        return Redirect::to('/user');
    }
});

Route::post('book/{id}/return', function($id){
    $book = Book::find($id);
    $user_id = $book->user->id;
    $book->user_id = 0;
    $book->save();
    return Redirect::to('user/'.$user_id);
});

Route::auth();

Route::get('/home', 'HomeController@index');
