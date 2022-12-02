<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Нүүр хуудас')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @yield('style') 
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{url('listbook')}}">Library</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('listbook')}}">Бүх ном</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link disabled" href="{{url('insertbook')}}">Ном нэмэх</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link disabled" href="{{url('register')}}">Бүртгэх</a>
                    </li>
                </ul>
                <form action="/search"  class="form-inline my-2 my-lg-0">
                    <input class="form-control search-box mr-sm-2" type="text" name="query" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success my-2 mr-3 my-sm-0" type="submit">Search</button>
                    <button class="btn btn-warning"> <a href="{{url('logout')}}">Гарах</a></button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>

</html>