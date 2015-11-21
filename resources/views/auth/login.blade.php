@extends('layouts.master')

@section('top_nav')
    <div class="navbar navbar-static-top">
      <div class="navbar-inner">
        <div class="container">             
            <ul class="nav pull-right">
                <li>
                    <a href="/">Home</a>
                </li>
            </ul>              
        </div>
      </div>
    </div>
 @stop

@section('content')

    <p>Don't have an account? <a href='/register'>Register here...</a></p>

    <h1>Login</h1>

    @if(count($errors) > 0)
        <!-- <ul class='errors'> -->
            @foreach ($errors->all() as $error)
                <span class='fa fa-exclamation-circle'></span> {{ $error }} <br /><br />
            @endforeach
        <!-- </ul> -->
    @endif

    <form method='POST' action='/login'>

        {!! csrf_field() !!}

        <div class='form-group'>
            <label for='email'>Email</label>
            <input type='text' name='email' id='email' class = "form-control" value='{{ old('email') }}'>
        </div>

        <div class='form-group'>
            <label for='password'>Password</label>
            <input type='password' name='password' id='password' class = "form-control" value='{{ old('password') }}'>
        </div>

        <div class='form-group'>
            <input type='checkbox' name='remember' id='remember'>
            <label for='remember' class='checkboxLabel'>Remember me</label>
        </div>

        <button type='submit' class='btn btn-primary'>Login</button>

    </form>
@stop