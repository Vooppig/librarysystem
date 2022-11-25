@extends('book.master')

@section('title', 'nuur huudas')

@section('style')
<style>
    h1{
        background-color: pink;
        margin: 10px;
    }
    p{
        background-color:pink;
        padding: 10px
    }
</style>
@endsection
@section('content')
<h1>This is Home Page</h1>
<p>
    This web site is library.
    Welcome to our library.
</p>
@endsection
