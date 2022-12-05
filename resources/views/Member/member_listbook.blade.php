@extends('Member.member_master')
@section('title', 'Номын жагсаалт')
@section('style')
<style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: white;
        margin: 0;
    }

    .column {
        float: left;
        width: 25%;
        padding: 10px 10px;
    }

    .row {
        margin: 0 5px;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    .card {
        box-shadow: 0 0px 15px 0 rgba(0, 0, 0, 0.2);
        margin: 6px;
        padding: 20px;
        text-align: center;
        background-color: white;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        border-radius: 20px;


    }

    @media screen and (max-width: 600px) {
        .column {
            width: 100%;
            display: block;
            margin-bottom: 20px;
        }

    }
</style>
@endsection
@section('content')
<h1>Номын жагсаалт</h1>
@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif
<div class="container">
    <div class="row">
        @foreach($books as $book)
        <div class="row">
            <div class="card">
                <a style="color:inherit;text-decoration:none" href="detail/{{$book->id}}">
                    <img src="{{ asset('storage/images/'.$book->image) }}" alt="" width="200px" height="200px">
                    <h3 style="font-size:100%">{{$book->title}}</h3>
                    <p style="font-size:100%">Зохиогч: {{ $book->author }}</p>
                    <p style="font-size:80%"> Төрөл: {{ $book->cat_name }}</p>
                    <p style="font-size:80%">Төлөв: {{ $book->flag_name }}</p>
                    <p>Үнэ: {{$book->price}}₮</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection