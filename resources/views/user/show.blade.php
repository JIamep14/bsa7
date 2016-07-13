@extends('layout')

@section('title')
    User profile
@stop

@section('content')
    {!! Form::open() !!}

    <div class="form-group">
        {!! Form::label('', 'First Name') !!}
        {!! Form::text('firstname', $user->firstname , array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('', 'Last Name') !!}
        {!! Form::text('lastname', $user->lastname, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('', 'Email') !!}
        {!! Form::text('email', $user->email, array('class' => 'form-control')) !!}
    </div>
    {!! Form::close() !!}
@stop