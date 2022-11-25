@extends('book.master')
@section('title', 'NUUR HUUDAS')

@section('content')
<form action="insertbook" method="post">
    {{ csrf_field() }}
    <table>
        <tr>
            <td>ISBN</td>
            <td><input type="text" name="isbn"></td>
        </tr>
        <tr>
            <td>Author</td>
            <td><input type="text" name="author"></td>
        </tr>
        <tr>
            <td>Title</td>
            <td><input type="text" name="title"></td>
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
                  <option value = "{{$category->category_id}}"> {{ $category->category_name}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
    </table>
    <input type="submit" value="Insert">
    @if (count($errors)>0) 
       @foreach($errors->all() as $error)
       <li>{{$error}}</li>
       @endforeach
       @endif
</form>
@endsection