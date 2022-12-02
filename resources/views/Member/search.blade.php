@extends('Member.member_master')
@section('title', 'NUUR HUUDAS')
@section('content')
<form action="{{url('booksearch')}}" method="post">
    <div>
        <table> 
            {{ csrf_field() }}
            <select name="search_type" id="">
                <option value="title">Title</option>
                <option value="author">Author</option>
                <option value="isbn">ISBN</option>
            </select>
            <td>flag</td>
            <td>
                <select name="flag" id="flag">
                    @foreach($flags as $flag)
                    <option value="{{$flag->id}}"> {{ $flag->name}}</option>
                    @endforeach
                </select>
            </td>
            </tr>
            <tr>
                <td>Category</td>
                <td>
                    <select name="category">
                        <option value="">--Choose a category --</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}"> {{ $category->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Publisher</td>
                <td>
                    <select name="publisher">
                        <option value="">--Choose a publisher --</option>
                        <option value="amazon">Amazon Printing</option>
                        <option value="blue">Blue Printing</option>
                        <option value="Strawberry">Strawberry Printing</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ISBN</td>
                <td><input type="number" name="isbn" id=""></td>
            </tr>
        </table>
    </div>
    <input type="submit" value="Search">
</form>
@if(isset($results))
<table border="1" width="100%" cellpadding="5" cellspacing="-1">
    @foreach($results as $book)
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
@endif
@endsection