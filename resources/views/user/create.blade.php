@extends('layout')

@section('title')
    Add new user
@stop

@section('content')

    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    {!! Form::open(['url' => 'user']) !!}

    <div class="form-group">
        {!! Form::label('', 'First Name') !!}
        {!! Form::text('firstname', Form::old('firstname'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('', 'Last Name') !!}
        {!! Form::text('lastname', Form::old('lastname'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('', 'Email') !!}
        {!! Form::text('email', Form::old('email'), array('class' => 'form-control')) !!}
    </div>
    {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
    {!! Form::close() !!}
@stop