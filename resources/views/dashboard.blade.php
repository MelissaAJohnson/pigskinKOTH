@extends('layouts.master')


@section('title')
    KOTH Dashboard
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')

	<link href="/css/navbar-static-top.css" rel="stylesheet">

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
	<h1>Dashboard</h1>
    <div id="myPicksTable"></div>
    <div id="leaguePicksTable"></div>

	<!-- <?php 
		$picks = \App\Pick::all();

		foreach ($picks as $pick) {
			echo $pick->owner_id." ".$pick->week." ".$pick->pick."<br />";
		}
	?> -->
	
	<table class = 'table table-condensed'>
		<?php 
			$picks = \App\Pick::orderBy('pick_owner','ASC', 'week')->get();

			foreach($picks as $pick) { 
		?>
	        <tr>
	            <td>{{ $pick->pick_owner }}</td>
	            <td>{{ $pick->week }}</td>
	            <td>{{ $pick->pick }}</td>
		    </tr>

		<?php }; ?> 
	</table>
  	

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
	<script type="text/javascript" src="/js/dropdown.js"></script>
	<script type="text/javascript" src="/js/dashboard.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
@stop