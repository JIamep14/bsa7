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
        <ul class="nav navbar-nav">
            <li><a href="/user">View all users</a></li>
            <li><a href="/user/create">Add new user</a></li>
            <li><a href="/book">View all books</a></li>
            <li><a href="/book/create">Add new book</a></li>
        </ul>
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