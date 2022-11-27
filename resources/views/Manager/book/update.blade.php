@extends('Manager.book.master')
@section('title', 'NUUR HUUDAS')

@section('content')
<form action="{{url('updatebook')}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="id" value='{{$book->id}}'>
    <table>
        <tr>
            <td>ISBN</td>
            <td><input type="text" name="isbn" value="{{$book->isbn}}"></td>
        </tr>
        <tr>
            <td>Author</td>
            <td><input type="text" name="author" value="{{$book->author}}"></td>
        </tr>
        <tr>
            <td>Title</td>
            <td><input type="text" name="title" value="{{$book->title}}"></td>
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
            <td>Category</td>
            <td>
                <select name="category">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($book->category == $category->id) {{'selected'}} @endif> {{ $category->name}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>Flag</td>
            <td>
                <select name="flag" id="flag">
                    @foreach($flags as $flag)
                    <option value="{{$flag->id}}" @if($book->flag == $flag->id) {{'selected'}} @endif> {{ $flag->name}}</option>
                    @endforeach
                </select>

            </td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type="number" name="price" value="{{$book->price}}"></td>
        </tr>
    </table>
    <input type="submit" value="Save">
    @if (count($errors)>0)
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    @endif
</form>
@endsection