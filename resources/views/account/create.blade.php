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
	<h2>Account</h2>
    <p>Information on this page helps identify you and your preferences.</p>
    
    <div class="container">
	    <form method="POST" action='/account/create'>
	    	<input type="hidden" value="{{ csrf_token() }}" name="_token">
	        <h3>About You</h3>
	        <fieldset name = "userInformation">
	            <div class = "form-group">
	                <label for="firstName">First Name</label>
	                <input 
	                	type = "text" 
	                	id = "firstName" 
	                	name = "firstName" 
	                	class = "form-control" 
	                	placeholder = "First Name"
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
	                	required
	                	>
	            </div>
	            <div id="emailHint"></div>
	        </fieldset>

	        <h3>Password</h3>
	        <fieldset name = "password">
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
	                	id="confirmPassword" 
	                	class = "form-control" 
	                	placeholder = "Confirm Password">
	            </div>
	            <div id = "confirmPasswordHint"></div>
	        </fieldset>

			<br />
	        <button type = "submit" id = "accountSave" class = "btn btn-default">Save</button>
	    
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