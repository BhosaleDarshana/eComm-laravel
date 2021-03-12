@extends('master')
@section('content')
<div class="container custom-login">
<div class="row">
<div class="col-sm-4 col-sm-offset-4">
<form action="login" method="POST">
  <div class="form-group">
  @csrf
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
</div>
</div>
@endsection