@extends('layout')

@section('title')
    Give a book
@stop

@section('content')
    @if(Session::has('error'))
        <div class="alert alert-dismissible alert-success">
            {{Session::get('error')}}
        </div>
    @endif
    {!! Form::open(array('url'=>'/user/'.$user->id.'/givebook', 'method'=>'POST')) !!}
    <div class="form-group">
        {!! Form::label('', 'Info') !!}
        {!! Form::text('info', $user->firstname.' ' . $user->lastname . ', ' . $user->email, array('class' => 'form-control', 'readonly')) !!}
    </div>

    <div class="form-group">
        <select class="form-control" name="select">
            <option value="0"></option>
            @foreach($books as $book)
                <option value="{{$book->id}}">{{$book->title .', '. $book->author .', '. $book->genre .', '. $book->year}}</option>

            @endforeach
        </select>
    </div>
    {!! Form::submit('Save', array('class' => 'btn btn-primary'))  !!}
    {!! Form::close() !!}
@stop