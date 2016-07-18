<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-inverse">

        @if (Auth::guest())

            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="margin-right: 20px;">
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
            </ul>

        @else
            @if(Auth::user()->is_admin)
                <ul class="nav navbar-nav">
                    <li><a href="/user">View all users</a></li>
                    <li><a href="/user/create">Add new user</a></li>
                    <li><a href="/book">View all books</a></li>
                    <li><a href="/book/create">Add new book</a></li>
                </ul>
            @else
                <ul class="nav navbar-nav">
                    <li><a href="/">Home</a></li>
                </ul>
            @endif
            <ul class="nav navbar-nav navbar-right" style="margin-right: 20px;">
                <li><a href="/user/{{Auth::user()->id}}">{{Auth::user()->email}}</a></li>
                <li><a href="{{url('/logout')}}">Logout</a></li>
            </ul>

        @endif
    </nav>
    <div class="col-md-12 col-md-offset-0">
        <h1>@yield('title')</h1>
        @if(Session::has('message'))
            <div class="alert alert-dismissible alert-success">
                {{Session::get('message')}}
            </div>
        @endif
        <hr>

        @yield('content')
    </div>
</div>
</body>
</html>