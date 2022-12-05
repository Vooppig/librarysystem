@extends('Member.member_master')
@section('title', 'Дансны үлдэгдэл')
@section('content')
<h1>Данс</h1>
<p style="font-size:200%">Таны үлдэгдэл: {{$amount[0]->amount}}</p>
@endsection