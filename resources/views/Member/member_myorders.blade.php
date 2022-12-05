@extends('Member.member_master')
@section('title', 'Ном захиалга')
@section('content')
<h1>My orders</h1>
<table class="table">

  <tbody>
    @foreach($books as $book)
    <tr>
      <td>{{ $book->title }}</td>
      <td><img src="{{ asset('storage/images/'.$book->image) }}" alt="" width="150px" height="150px"></td>
      <td>Үнэ</td>
      <td>₮{{$book->price}}</td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection