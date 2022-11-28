@extends('Manager.book.master')
@section('title', 'Номын жагсаалт')
@section('style')
<style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
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
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        padding: 16px;
        text-align: center;
        background-color: #f1f1f1;
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
<div class="container">
    <div class="row">
        @foreach($books as $book)
        <div class="card">
            <img src="{{ asset('storage/images/'.$book->image) }}" alt="" width="150px" height="150px">
            <h3>{{$book->title}}</h3>
            <p>Зохиогч: {{ $book->author }}</p>
            <p>Төрөл: {{ $book->cat_name }}</p>
            <p>Төлөв: {{ $book->flag_name }}</p>
            <p>
                <a href="{{url('deletebook')}}/{{ $book->id }}"> Устгах</a>
                <a href="{{url('updatebook')}}/{{ $book->id }}"> Засварлах</a>
            </p>
        </div>
        @endforeach
    </div>
</div>
@endsection