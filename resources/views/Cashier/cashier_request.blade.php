@extends('Cashier.cashier_master')
@section('title', 'Ном захиалга')
@section('content')
<h1>Захиалагын түүх </h1>
<table class="table">
  <tbody>
    @foreach($books as $book)
    <tr>
      <td> Номны нэр: <b>{{ $book->title }}</b></td>
      <td><img src="{{ asset('storage/images/'.$book->image) }}" alt="" width="300px" height="200px"></td>
      <td> <b>Хэрэглэгч нэр: {{$book->name}}</b></td>
      <td>Утасны дугаар: <b>{{$book->phone_num}}</b></td>
      <td class="from date">Түрээс эхэлсэн: <b>{{$book->reserve_date}}</b></td>
      <td class="end date">Түрээсийн хугацаа дуусах: <b>{{$book->end_date}}</b></td>
      <td>
        <a href="{{url('ext_approve')}}/{{$book->id}}">
          <button class="btn btn-primary">Хугацаа сунгах</button>
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection