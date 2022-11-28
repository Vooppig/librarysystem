@extends('Member.member_master')
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
@if(session('message'))
  <div class="alert alert-success">{{session('msg')}}</div>
  @endif
<div class="container">
    <div class="row">
        @foreach($books as $book)
        <div class="row">
            <div class="card">
                <img src="{{ asset('storage/images/'.$book->image) }}" alt="" width="150px" height="150px">
                <h3>{{$book->title}}</h3>
                <p>Зохиогч: {{ $book->author }}</p>
                <p>Төрөл: {{ $book->cat_name }}</p>
                <p>Төлөв: {{ $book->flag_name }}</p>
                <p>Үнэ:{{$book->price}}</p>
                <button class="btn btn-warning"><a style="color:black"href="{{url('member_rent')}}">Түрэслэх</a></button>
                <button class="btn btn-primary"><a style="color:black"href="{{url('member_rent')}}"> Худалдаж авах</a></button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection