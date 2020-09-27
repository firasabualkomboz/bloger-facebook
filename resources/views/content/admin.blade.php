@extends('master')

@section('content')

<h4>Control Panle</h4>
<h6>List of users</h6>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nmae</th>
        <th scope="col">Email</th>
        <th scope="col">Users</th>
        <th scope="col">Editor</th>
        <th scope="col">Admin</th>
      </tr>
    </thead>

    <tbody>
        @foreach ($users as $user)
        <form method="post" action="/add-role">
            {{csrf_field()}}
            <input type="hidden" name="email" value="{{$user->email}}">
        <tr>
        <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <input name="role_user" type="checkbox" onChange="this.form.submit()"

                {{$user->hasRole('User')?'checked':''}}>
            </td>
            <td>
                <input name="role_editor" type="checkbox" onChange="this.form.submit()"
                {{$user->hasRole('Editor')?'checked':''}}>
            </td>
            <td>
                <input name="role_admin" type="checkbox" onChange="this.form.submit()" {{$user->hasRole('Admin')?'checked':''}}>
            </td>

          </tr>
        </form>
        @endforeach



    </tbody>
  </table>
@stop
