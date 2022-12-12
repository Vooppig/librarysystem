@extends('Manager.book.master')

@section('content')
<h1>Шинэ хэрэглэгч бүртгэх</h1>
<div class="container">
    <form method="post" action="register">
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
        </div>
        <div class="form-group">
            <input type="address" class="form-control" placeholder="Enter Your Address" name="address">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter Your Registration Number" name="reg_num" required>
        </div>
        <div class="form-group">
            <input type="tel" id="phone" class="form-control" placeholder="Enter Your Phone Number" name="number" required>
        </div>
        <div class="form-group">
            <input type="number" id="card_number" class="form-control" placeholder="Enter Your Credit Card Number" maxlength="16" name="card_num" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="password"  placeholder="Password" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="Confirm Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Бүртгүүлэх</button>
        <button type="reset" class="btn btn-primary" value="Reset">Арилгах</button>
    </form>
</div>

@endsection