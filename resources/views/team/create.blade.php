@extends('layouts.master')


@section('title')
    KOTH Team
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
        <div class="nav navbar-nav navbar-right">             
            <li class="dropdown">
              	<a href="#" class="dropdown-toggle btn-large" data-toggle="dropdown" role="menu" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <span class="caret"></span></a>
              	<ul class="dropdown-menu">
                	<li><a href="#">Account</a></li>
                	<li><a href="/">Sign Off</a></li>
              	</ul>
        	</li>     
        </div>
    </div>
	
@stop

@section('content')
	<h2>Team</h2>
	<p>The next step is to create a team. You can have as many teams as you'd like. You will submit a pick for every team you own every week until that team loses.</p>
	<form method="POST" action='/team/create'>
		<input type="hidden" value="{{ csrf_token() }}" name="_token">
        <div class="form-group" id = "teams">
            <label for="team" class="sr-only" id = "teamsLabel">Team Name</label>
            <input 
            	type="text" 
            	class="form-control input-large" 
            	id="teamName" 
            	name="teamName"
            	placeholder="Team Name"
            >
        </div>
        <span style = "cursor:pointer; padding-left:.75em" id = "addTeam" name-"addTeam"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add Team</span>

        <br /><br />
        <button type = "submit" id = "teamSave" class = "btn btn-default">Save</button>
	    
    </form>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
	<script type="text/javascript" src="/js/dropdown.js"></script>
	<script type="text/javaScript" src="/js/signUp.js"></script>
@stop