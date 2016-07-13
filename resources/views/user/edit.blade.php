@extends('layout')

@section('title')
    Edit User
@stop

@section('content')
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>

    {!! Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PATCH')) !!}
    <div class="form-group">
        {!! Form::label('', 'First Name') !!}
        {!! Form::text('firstname', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('', 'Last Name') !!}
        {!! Form::text('lastname', null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('', 'Email') !!}
        {!! Form::text('email', null, array('class' => 'form-control')) !!}
    </div>
    {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
    {!! Form::close() !!}
@stop