<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('title', 'ASC')->paginate(10);

        return view('book.book', array('books' => $books));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => ['required'],
            'author' => ['required', 'regex:/^[a-zA-Z]+$/'],
            'year' => ['required', 'regex: /^[0-9]+$/'],
            'genre' => ['required', 'regex:/^[a-zA-Z]+$/']
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return Redirect::to('book/create')->withErrors($validator)->withInput();
        } else {
            $book = new Book($request->all());
            $book->save();
            Session::flash('message', 'Succesfully added book');
            return Redirect::to('book');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('book.show', array('book'=>Book::find($id)));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('book.edit', ['book' => Book::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => ['required'],
            'author' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'year' => ['required', 'regex: /^[0-9]+$/'],
            'genre' => ['required', 'regex:/^[a-zA-Z\s]+$/']
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return Redirect::to('book/create')->withErrors($validator)->withInput();
        } else {
            $book = Book::find($id);
            //$book->title = $request->title;
            //$book->author = $request->author;
            //$book->genre = $request->genre;
            //$book->year = $request->year;
            //$book->save();
            $book->update($request->all());

            Session::flash('message', 'Succesfully updated book');
            return Redirect::to('book');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        Session::flash('message', 'Book succesfully deleted');
        return Redirect::to('/book');
    }
}
