@extends('Manager.book.master')

@section('content')
<h1>Нэвтрэх</h1>
<form method="post" action="login">
    @csrf
  
  <div class="form-group">
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
     </div>
  <div class="form-group">
    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
  </div>
  <button type="submit" class="btn btn-primary">Нэвтрэх</button>
  <button type="reset" class="btn btn-primary" value="Reset">Арилгах</button>
</form>
@endsection