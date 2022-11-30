@extends('Member.member_master')
@section('title', 'Номын жагсаалт')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img src="{{ asset('storage/images/'.$books[0]->image) }}" alt="">
        </div>
            @foreach($books as $book)
            <div class="col-sm-7">
            <h3>Номны нэр: {{ $book->title }}</h3>
            <p>Зохиогч: {{ $book->author }}</p>
            <p>Төрөл: {{ $book->cat_name }}</p>
            <p>Төлөв: {{ $book->flag_name }}</p>
            <p>Үнэ:{{$book->price}}</p>
            <h3>Номны товч тайлбар</h3><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, magnam doloremque. Vitae nesciunt porro laboriosam iure, ipsa laudantium recusandae obcaecati reprehenderit sunt omnis quia rerum ipsam impedit tenetur alias molestiae.</p>
            <button class="btn btn-primary"><a style="color:black"href="{{url('member_orderdetail')}}">Түрэслэх</a></button>
                <button class="btn btn-primary"><a style="color:black"href="{{url('member_orderdetail')}}"> Худалдаж авах</a></button>

        </div>
        <div class="col-sm-6">


        </div>
        @endforeach
    </div>
</div>
@endsection