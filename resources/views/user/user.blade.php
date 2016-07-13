@extends('layout')

@section('title')@stop

@section('content')
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <td>ID</td>
            <td>First Name </td>
            <td>Last Name </td>
            <td>Email </td>
            <td>Books </td>
            <td>Actions </td>
        </thead>

        <tbody>
        {{ $users->links() }}
        @foreach($users as $user)
            <tr>
                <td>{{  $user->id   }}</td>
                <td>{{  $user->firstname    }}</td>
                <td>{{  $user->lastname   }}</td>
                <td>{{  $user->email    }}</td>
                <td>
                @foreach($user->books as $book)
                        <a href="/book/{{ $book->id }}" class="btn btn-primary btn-xs">{{$book->title}}</a><br>
                @endforeach</td>
                <td>
                    <a href="/user/{{$user->id}}" class="btn btn-small btn-success">Show</a>
                    <a href="/user/{{$user->id}}/edit" class="btn btn-small btn-warning">Edit</a>
                    <a href="/user/{{$user->id}}/givebook" class="btn btn-small btn-default">Give a free book</a>
                    {!! Form::open(array('url' => 'user/'.$user->id, 'class'=>'pull-right')) !!}
                    {!! Form::hidden('_method', 'delete') !!}
                    {!! Form::submit('Delete', array('class' => 'btn btn-small btn-danger')) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
@stop