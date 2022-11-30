@extends('Member.member_master')
@section('title', 'Ном захиалга')
@section('content')
<h1>Ном Түрээс&Худалдаж авах</h1>
@foreach($books as $book)
<table class="table">
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Үнэ</td>
      <td>₮{{$book->price}}</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Нэр</td>
      <td>{{ $book->title }}</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Зохиолч</td>
      <td>{{ $book->author }}</td>
    </tr>
  </tbody>
</table>
<div>
  <form>
    <div class="mb-3">
      <label class="form-label">Төлбөрийн нөхцөл:</label>
      <input type="radio" name="payment"><span>Интэрнэт банк</span>
      <input type="radio" name="payment"><span>Банкны карт</span>
      <input type="radio" name="payment"><span>Payment On Delivery</span>
    </div>
    <button class="btn btn-primary"><a href="{{url('member_listbook')}}"style="color:inherit;text-decoration:none">Захиалах</button>
  </form>
</div>
@endforeach

@endsection
<!-- @if(isset($response))
<div class="alert alert-success">{{$response}}</div>
@endif -->