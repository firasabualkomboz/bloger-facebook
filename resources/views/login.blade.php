@extends('master')

@section('content')


    <div class="col -md-8">
<h2>Login user</h2>


<form method="POST" action="/login">
    {{csrf_field()}}


    <div class="form-group">
    <label for="email">E-mail</label>
    <input type="email" class="form-control" value="{{old('email')}}" name="email" id="email">
    </div>


    <div class="form-group">
        <label for="password">password</label>
      <input type="password" class="form-control" value="{{old('password')}}" name="password" id="password" placeholder="olz enter your password">
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
  </form>

  <div>
    @foreach ($errors->all() as $error)
 {{    $error}} <br>
    @endforeach
</div>




    </div>

@stop
