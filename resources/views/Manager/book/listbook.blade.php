@extends('Manager.book.master')
@section('title', 'Номын жагсаалт')
@section('content')
<h1>List of Book</h1>
<div class="container">
    <div class="row">
        @foreach($books as $book)
        <div class="row">
            <div class="card">
                <img src="{{ asset('storage/images/'.$book->image) }}" alt="" width="200px" height="200px">
                <h3>{{$book->title}}</h3>
                <p>{{ $book->author }}</p>
                <p>{{ $book->cat_name }}</p>
                <p>{{ $book->flag_name }}</p>
                <p>
                    <a href="{{url('deletebook')}}/{{ $book->id }}"> Устгах</a>
                    <a href="{{url('updatebook')}}/{{ $book->id }}"> Засварлах</a>
                </p>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- <table border="1" width="100%" cellpadding="5" cellspacing="-1">
    <th>isbn</th>
    <th>title</th>
    <th>author</th>
    <th>publisher</th>
    <th>category</th>
    <th>???</th>
    <th></th>
    <th></th>
    @foreach($books as $book)
    <tr>
        <td>{{ $book->isbn }}</td>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->publisher }}</td>
        <td>{{ $book->cat_name }}</td>
        <td>{{ $book->flag_name }}</td>
        <td><a href="deletebook/{{ $book->id }}"> Delete</td>
        <td><a href="updatebook/{{ $book->id }}"> Update</td>
    </tr>
    @endforeach
</table> -->
@endsection