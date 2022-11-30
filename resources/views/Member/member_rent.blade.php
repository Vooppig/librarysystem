@extends('Member.member_master')
@section('title', 'Ном Түрээс')
@section('style')
@endsection
@section('content')
<h1>Ном Түрээслэх</h1>
@if(isset($response))
<div class="alert alert-success">{{$response}}</div>
@endif
@endsection