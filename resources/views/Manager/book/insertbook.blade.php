@extends('Manager.book.master')
@section('title', 'Ном нэмэх')

@section('content')
<div class="container">
    <form action="{{url('insertbook')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <table>
            <tr>
                <td>ISBN</td>
                <td><input type="text" name="isbn" class="form-control"></td>
            </tr>
            <tr>
                <td>Author</td>
                <td><input type="text" name="author" class="form-control"></td>
            </tr>
            <tr>
                <td>Title</td>
                <td><input type="text" name="title" class="form-control"></td>
            </tr>
            <tr>
                <td>Publisher</td>
                <td>
                    <select name="publisher" class="form-control">
                        <option value="">--Choose a publisher --</option>
                        <option value="Amazon Printing">Amazon Printing</option>
                        <option value="Blue">Blue Printing</option>
                        <option value="Strawberry">Strawberry Printing</option>
                        <option value="Nepko">Nepko</option>
                </select>
                </td>
            </tr>
            <tr>
                <td>Category</td>
                <td>
                    <select name="category" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}"> {{ $category->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Flag</td>
                <td>
                    <select name="flag" id="flag" class="form-control">
                        @foreach($flags as $flag)
                        <option value="{{$flag->id}}"> {{ $flag->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="number" name="price" value=10 class="form-control"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="form-group mb-3">
                        <input type="file" name="image" id="" class="form-control" required>
                    </div>
                </td>
            </tr>
        </table>
        <td><input type="submit" value="Ном нэмэх"></td>
        @if (count($errors)>0)
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
        @endif
    </form>
</div>
@endsection