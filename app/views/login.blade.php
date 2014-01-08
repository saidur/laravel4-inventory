@extends('layouts')
@section('content')
    <div class="page-header">
        <h1>Login <small></small></h1>
    </div>

    @if(Session::has('message'))
         <p class="alert">{{ Session::get('message') }}</p>
    @endif

    <form action="{{action('AuthController@createLogin')}}" method="post" role="form">
        <div class="form-group">
            <label for="title">Email (test@gmail.com)</label>
            <input type="text" class="form-control" name="email" />
        </div>
        <div class="form-group">
            <label for="publisher">Password</label>
            <input type="password" class="form-control" name="password" />
        </div>
        
        <input type="submit" value="Register" class="btn btn-primary" />
        <!-- <a href="{{ action('AuthController@createLogin') }}" class="btn btn-link">Cancel</a>-->
    </form>
@stop