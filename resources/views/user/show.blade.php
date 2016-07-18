@extends('layout')

@section('title')
    User profile
@stop

@section('content')
    {!! Form::open() !!}

    <div class="form-group">
        {!! Form::label('', 'First Name') !!}
        {!! Form::text('firstname', $user->firstname , array('class' => 'form-control', 'readonly')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('', 'Last Name') !!}
        {!! Form::text('lastname', $user->lastname, array('class' => 'form-control', 'readonly')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('', 'Email') !!}
        {!! Form::text('email', $user->email, array('class' => 'form-control', 'readonly')) !!}
    </div>
    {!! Form::close() !!}
    <a href="{{ Auth::user()->id }}/edit" class="btn btn-primary">Edit</a><br><br>
    <table class="table table-striped table-hover table-bordered">
        <thead>
        <td>Book info</td>
        <td>Action</td>
        </thead>
        <tbody>
        @foreach($user->books as $book)
            <tr>
                <td>
                    {{  $book->title .' - '. $book->author .' - '. $book->genre .' - '. $book->year  }}
                </td>
                <td>
                    @if(Auth::user()->isAdmin())<a href="/book/{{$book->id}}" class="btn btn-small btn-success">Return</a>@endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop