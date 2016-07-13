@extends('layout')

@section('title')
    Book profile
@stop

@section('content')

    {!! Form::open(array('url'=>'book/'.$book->id.'/return', 'method'=>'POST')) !!}

    <div class="form-group">
        {!! Form::label('', 'Title') !!}
        {!! Form::text('title', $book->title, array('class' => 'form-control', 'readonly')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('', 'Author') !!}
        {!! Form::text('author', $book->author, array('class' => 'form-control', 'readonly')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('', 'Genre') !!}
        {!! Form::text('genre', $book->genre, array('class' => 'form-control', 'readonly')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('', 'Year') !!}
        {!! Form::text('year', $book->year, array('class' => 'form-control', 'readonly')) !!} <br>
        @if(!is_null($book->user))
        {!! Form::submit('Return book', array('class' => 'btn btn-primary')) !!}
        @endif
    </div>
    {!! Form::close() !!}
@stop