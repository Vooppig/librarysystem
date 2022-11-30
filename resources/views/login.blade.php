<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title','Нэвтрэх')</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  @yield('style')

  @yield('content')
  <div style="display: flex; justify-content: center;">
  <div>
    <div class="container">
    <h1>Нэвтрэх</h1>
      <form method="post" action="login">
        @csrf
        @yield('style')
        <div class="form-group">
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Нэвтрэх</button>
        <button type="reset" class="btn btn-primary" value="Reset">Арилгах</button>
      </form>
    </div>
  </div>
  </div>

  @yield('content')