@extends('master')

@section('content')


    <div class="col -md-8">
<h2>create new  user</h2>


<form method="POST" action="/register">
    {{csrf_field()}}

    <div class="form-group">
    <label for="name"> Name</label>
    <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="full name">
    </div>

    <div class="form-group">
    <label for="email">E-mail</label>
    <input type="email" class="form-control" value="{{old('email')}}" name="email" id="email">
    </div>



    <div class="form-group">
        <label for="password">password</label>
      <input type="password" class="form-control" value="{{old('password')}}" name="password" id="password" placeholder="olz enter your password">
    </div>

    <button type="submit" class="btn btn-primary">Sign up</button>
  </form>

    </div>

@stop
