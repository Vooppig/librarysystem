@extends('Member.member_master')
@section('title', 'Ном захиалга')
@section('content')
<h1>{{ $tul }}</h1>
<table class="table">
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Үнэ</td>
      <td>₮{{$books->price}}</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Нэр</td>
      <td>{{ $books->title }}</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Зохиолч</td>
      <td>{{ $books->author }}</td>
    </tr>
  </tbody>
</table>
<div>
  <form action="/orderplace" method="post">
    @csrf
    <div class="form-group">
      <input type="hidden" name="type" value="{{$type}}">
      <input type="hidden" name="id" value="{{ $books->id }}">
      <input type="hidden" name="price" id="" readonly value="{{$books->price}}">
      <textarea name="address" placeholder="Хүргэх хаяг оруулна уу" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <label for="pwd">Төлбөрийн нөхцөл:</label><br> <br>
      <input type="radio" value="cash" name="payment"><span>Интэрнэт банк</span> <br> <br>
      <input type="radio" value="cash" name="payment"><span>Банкны карт</span> <br><br>
      <input type="radio" value="cash" name="payment"><span>Payment On Delivery</span><br> <br>
    </div>
    <button class="btn btn-primary">Захиалах</button>
  </form>
</div>

@endsection
