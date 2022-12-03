@extends('Member.member_master')
@section('title', 'Номын жагсаалт')
@section('content')
<div class="container">
    @foreach($books as $book)
    <div class="row">
        <div class="col-sm-4">
            <h3>Номны нэр: {{ $book->title }}</h3>
            <img src="{{ asset('storage/images/'.$book->image) }}" alt="" width="300px" height="300px">
            <b>
                <p>Зохиогч: {{ $book->author }}</p>
                <p>Төрөл: {{ $book->cat_name }}</p>
                <p>Төлөв: {{ $book->flag_name }}</p>
                <p>Үнэ:{{$book->price}}</p>
            </b>
        </div>
        <div class="col-sm-6">
            <div class="position-static">
                <h3>Номны товч тайлбар</h3>
                <div class="position-absolute top-0 start-0 translate-middle">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, magnam doloremque. Vitae nesciunt porro laboriosam iure, ipsa laudantium recusandae obcaecati reprehenderit sunt omnis quia rerum ipsam impedit tenetur alias molestiae.</p>
                    <button class="btn btn-primary"><a style="color:black" href="{{url('member_orderdetail')}}/{{$book->id}}">Түрэслэх</a></button>
                    <button class="btn btn-primary"><a style="color:black" href="{{url('member_orderbuydetail')}}/{{$book->id}}"> Худалдаж авах</a></button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection