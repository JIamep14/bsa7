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



Route::resource('user', 'UserController');

Route::group (['middleware' => ['auth', 'role']], function () {

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
});

Route::get('/', function () { return view('freebooks', ['books' => Book::orderBy('title', 'ASC')->paginate(20)]);});

//Route::auth();

// Authentication Routes...
$this->get('login', 'Auth\AuthController@showLoginForm');
$this->post('login', 'Auth\AuthController@login');
$this->get('logout', 'Auth\AuthController@logout');

// Registration Routes...
$this->get('register', 'Auth\AuthController@showRegistrationForm');
$this->post('register', 'Auth\AuthController@register');

// Password Reset Routes...
$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
$this->post('password/reset', 'Auth\PasswordController@reset');

Route::get('/home', 'HomeController@index');

Route::get('auth/google', 'Auth\AuthController@redirectToProvider');
Route::get('auth/google/callback', 'Auth\AuthController@handleProviderCallback');