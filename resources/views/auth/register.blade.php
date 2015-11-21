@extends('layouts.master')


@section('title')
    KOTH Account
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')


@stop

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
	<h2>Register</h2>
    <p>Information on this page helps identify you and your preferences.</p>
    @if(count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <span class='fa fa-exclamation-circle'></span> {{ $error }}
            @endforeach
        </div>
    @endif
    <div class="container">
	    <form method="POST" action='/register'>
	    	{!! csrf_field() !!}
	        <h3>About You</h3>
	        
	            <div class = "form-group">
	                <label for="firstName">First Name</label>
	                <input 
	                	type = "text" 
	                	id = "firstName" 
	                	name = "firstName" 
	                	class = "form-control" 
	                	placeholder = "First Name"
	                	value = {{ old('firstName') }}
	                	required
	                	>
	            </div>
	            <div id = "firstNameHint"></div>
	            <div class = "form-group">
	                <label for="lastName">Last Name</label>
	                <input 
	                	type = "text" 
	                	id = "lastName" 
	                	name = "lastName" 
	                	class = "form-control" 
	                	placeholder = "Last Name"
	                	value = {{ old('lastName') }}
	                	>
	            </div>
	            <div id = "lastNameHint"></div>
	            <div class = "form-group">
	                <label for="email">Email Address</label>
	                <input 
	                	type = "email" 
	                	id = "email" 
	                	name = "email" 
	                	class = "form-control" 
	                	placeholder = "Email Address" 
	                	value = {{ old('email') }}
	                	required
	                	>
	            </div>
	            <div id="emailHint"></div>
	        

	        <h3>Password</h3>
	            <div class = "form-group">
	                <label for = "password">Password</label>
	                <input 
	                	type = "password" 
	                	id="password" 
	                	name="password" 
	                	class = "form-control" 
	                	placeholder = "Password (8 characters or more)">
	            </div>
	            <div id = "passwordHint"></div>
	            <div class = "form-group">
	                <label for = "confirmPassword">Confirm Password</label>
	                <input 
	                	type = "password" 
	                	id="password_confirmation" 
	                	name="password_confirmation"
	                	class = "form-control" 
	                	placeholder = "Confirm Password">
	            </div>
	            <div id = "confirmPasswordHint"></div>
	        

			<br />
	        <button type = "submit" class = "btn btn-default">Save</button>
	    
	    </form>

    </div>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
	<script type="text/javascript" src="/js/signUp.js"></script>

@stop