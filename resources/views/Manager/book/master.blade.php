<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','nuur huudas')</title>
    @yield('style')
</head>

<body>
    <div>
        <a href="bookhome">Home</a>
        <a href="listbook">Book List</a>
        <a href="insertbook">Add Book</a>
        <a href="booksearch">Search Book</a>
    </div>
    <div>
        @yield('content')
    </div>
</body>

</html>