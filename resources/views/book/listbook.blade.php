@extends('book.master')

@section('content')
<h1>List of Book</h1>
<table border="1" width="100%" cellpadding="5" cellspacing="-1">
@foreach($books as $book)
<tr>
    <td>{{ $book->isbn}}</td>
    <td>{{ $book->title}}</td>
    <td>{{ $book->author}}</td>
    <td>{{ $book->publisher}}</td>
    <td>{{ $book->category}}</td>
    <td><a href="deletebook/{{$book->book_id}}"> delete</td>
</tr>
@endforeach
</table>
@endsection