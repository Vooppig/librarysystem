@extends('Member.member_master')
@section('title', 'Ном захиалга')
@section('content')
<h1>Таны захиалагийн түүх </h1>
<table class="table">

  <tbody>
    @foreach($books as $book)
    <tr>
      <td> Номны нэр: <b>{{ $book->title }}</b></td>
      <td><img src="{{ asset('storage/images/'.$book->image) }}" alt="" width="300px" height="200px"></td>
      <td>Үнэ: ₮{{$book->price}}</td>
      <td>Торгууль: </td>
      <td><button class="btn btn-primary">Хүсэлт сунгах</button></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection