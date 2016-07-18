@extends('layout')

@section('title')
    A list of free books you can get after registration
@stop

@section('content')
    {{$books->links()}}
    <table class="table table-striped table-hover table-bordered">
        <thead>
        <td>Title</td>
        <td>Author</td>
        <td>Genre</td>
        <td>Year</td>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{$book->title}}</td>
                <td>{{$book->author}}</td>
                <td>{{$book->genre}}</td>
                <td>{{$book->year}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$books->links()}}
@stop