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

@stop

@section('top_nav')
	<div class="navbar navbar-static-top">
        <div class="nav navbar-nav navbar-right">             
            <li class="dropdown">
              	<a href="#" class="dropdown-toggle btn-large" data-toggle="dropdown" role="menu" aria-haspopup="true" aria-expanded="false">
              		{{ $user->first_name }} {{ $user->last_name }} 
              		<span class="caret"></span>
              	</a>
              	<ul class="dropdown-menu">
                	<li><a href="/account">Account</a></li>
                	<li><a href="/logout">Sign Off</a></li>
              	</ul>
        	</li>     
        </div>
    </div>
@stop


@section('content')
	<h1>Dashboard</h1>

	<!-- Account Owner Pick Table -->

    <br />
    <h3>My Picks</h3>
    
    	@if(count($myPicks) < 1)
    		<h4>Create a team to play!</h4>
    		<p>When you add a team and make picks, your picks will show here</p>
    		<a href="/team/create"><span class="glyphicon glyphicon-plus"></span> Add Team</a>
    	@else
	    	<table class = 'table table-condensed'>	
		    	<tr>
		    		<th>Team</th>
		    		@for ($i = 1; $i < $currentWeek->week + 1; $i++) 
		    			<th class="text-center">{{ $i }}</th>
		    		@endfor 
		    		<th></th>
		    	</tr>
				@foreach($myPicks as $myPick) 		
					<tr>
						<td>{{ $myPick->name }}</td>
			        	@foreach($myPick->pick as $myPick)
			            	<td class="text-center">{{ $myPick->pick }}</td>
			            @endforeach
		            	<td>
							<button type="button" class="btn btn-default btn-xs">
								<span class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#editModal" style="cursor:pointer; cursor: hand" > Edit Pick</span>
							</button>
							&nbsp;&nbsp;
							<button type="button" id="makePickButton" name="makePickButton" class="btn btn-primary btn-xs" data-id = "{{ $myPick->id }}" data-name = "{{ $myPick->team->name }}">
									<span class="glyphicon glyphicon-plus" data-toggle="modal" data-target="#makeModal" data-toggle="tooltip" title="Click to add next week's pick"> Make Pick</span>
							</button>
						</td>
				    </tr>	  	        	 
				@endforeach
			</table>
			<a href="/team/create"><span class="glyphicon glyphicon-plus"></span> Add Another Team</a>
		@endif
    


    <h3>League Picks</h3>
	<table class = 'table table-condensed'>
		<tr>
    		<th>Team</th>
    		@for ($i = 1; $i < $currentWeek->week +1 ; $i++) 
    			<th class="text-center">{{ $i }}</th>
    		@endfor 
    		<th></th>
    	</tr>

			@foreach($teams as $team) 		
				<tr>
					<td>{{ $team->name }}</td>
			        	@foreach($team->pick as $pick)
			            	<td class="text-center">{{ $pick->pick }}</td>
			            @endforeach
	
		        </tr>	  	        	 
			@endforeach

	</table>
  	
  	<!-- Edit Pick modal -->
	<div class="modal fade" id="editModal">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        	<h4 class="modal-title">Edit Pick</h4>
		      	</div>
		      	<form method="POST" action='/dashboard/pickCreate'>
			      	<div class="modal-body">
			        	<p>Picks must be made no later than Friday, 3PM Central time. If you want to pick a team playing Thursday, the pick must be made before game start.</p>
				    	<input type="hidden" value="{{ csrf_token() }}" name="_token">
			            <div class = "form-group">
			            	<label for="pickWeek">Week</label>
			            	<input type = "text" id="pickWeek" name="myPickWeek" class = "form-control" value= '4' disabled><br />
			            	<label for="team">Team</label>
			            	<input type = "hidden" id="editPickTeamId" name="editPickTeamId"><br />
			            	<input type = "text" id="editPickTeamName" name="editPickTeamName" class = "form-control" disabled><br />
			                <label for="pick">Pick</label>
			                <select id="pick" name="pick" class="form-control" value="">
		                        <option value="">Select Team</option>
		                        <option value="ARI">Arizona Cardinals (ARI)</option>
		                        <option value="ATL">Atlanta Falcons (ATL)</option>
		                        <option value="BAL">Baltimore Ravens (BAL)</option>
		                        <option value="BUF">Buffalo Bills (BUF)</option>
		                        <option value="CAR">Carolina Panthers (CAR)</option>
		                        <option value="CHI">Chicago Bears (CHI)</option>
		                        <option value="CIN">Cincinnati Bengels (CIN)</option>
		                        <option value="CLE">Cleveland Browns (CLE)</option>
		                        <option value="DAL">Dallas Cowboys (DAL)</option>
		                        <option value="DEN">Denver Broncos (DEN)</option>
		                        <option value="DET">Detroit Lions (DET)</option>
		                        <option value="ATL">Atlanta Falcons (ATL)</option>
		                        <option value="GB">Green Bay Packers (GB)</option>
		                        <option value="HOU">Houston Texans (HOU)</option>
		                        <option value="IND">Indianapolis Colts (IND)</option>
		                        <option value="JAC">Jacksonville Jaguars (JAC)</option>
		                        <option value="KAN">Kansas City Chiefs (KAN)</option>
		                        <option value="MIA">Miami Dolphins (MIA)</option>
		                        <option value="MIN">Minnesota Vikings (MIN)</option>
		                        <option value="NE">New England Patriots (NE)</option>
		                        <option value="NO">New Orleans Saints (NO)</option>
		                        <option value="NYG">New York Giants (NYG)</option>
		                        <option value="NYJ">New York Jets(NYJ)</option>
		                        <option value="OAK">Oakland Raiders (OAK)</option>
		                        <option value="PHI">Philadelphia Eagles (PHI)</option>
		                        <option value="PIT">Pittsburgh Steelers (PIT)</option>
		                        <option value="STL">Saint Louis Rams (STL)</option>
		                        <option value="SD">San Diego Chargers (SD)</option>
		                        <option value="SF">San Francisco 49ers (SF)</option>
		                        <option value="SEA">Seattle Seahawks (SEA)</option>
		                        <option value="TB">Tampa Bay Buccaneers (TB)</option>
		                        <option value="TEN">Tennessee Titans (TEN)</option>
		                        <option value="WA">Washington Redskins (WA)</option>
		                    </select>
			            </div>
		      		</div>
		   		 
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        	<button type="submit" id="pickCreate" class="btn btn-primary">Save changes</button>
			      	</div>
		      	</form>
	    	</div>
	  	</div>
	</div>

	<!-- Make Pick modal -->
	<div class="modal fade" id="makeModal">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        	<h4 class="modal-title">Make Pick</h4>
		      	</div>
		      	<form method="POST" action='/dashboard/pickCreate'>
		      		<input type='hidden' value='{{ csrf_token() }}' name='_token'>
		      		<input type='hidden' name='edit_team_id' value=''>
			      	<div class="modal-body">
			        	<p>Picks must be made no later than Friday, 3PM Central time. If you want to pick a team playing Thursday, the pick must be made before game start.</p>
				    	<input type="hidden" value="{{ csrf_token() }}" name="_token">
			            <div class = "form-group">
			            	<label for="pickWeek">Week</label>
			            	<input type = "text" class = "form-control" id="pickWeek" name="pick_week" value= "{{ $currentWeek->week + 1 }}" disabled><br />
			            	<label for="team">Team</label>
			            	<input type = "hidden" id="makePickTeamId" name="makePickTeamId"><br />
			            	<input type = "text" id="makePickTeamName" name="makePickTeamName" class = "form-control" disabled><br />
			                <label for="pick">Pick</label>
			                <select id="pick" name="pick" class="form-control">
		                        <option value="">Select Team</option>
		                        <option value="ARI">Arizona Cardinals (ARI)</option>
		                        <option value="ATL">Atlanta Falcons (ATL)</option>
		                        <option value="BAL">Baltimore Ravens (BAL)</option>
		                        <option value="BUF">Buffalo Bills (BUF)</option>
		                        <option value="CAR">Carolina Panthers (CAR)</option>
		                        <option value="CHI">Chicago Bears (CHI)</option>
		                        <option value="CIN">Cincinnati Bengels (CIN)</option>
		                        <option value="CLE">Cleveland Browns (CLE)</option>
		                        <option value="DAL">Dallas Cowboys (DAL)</option>
		                        <option value="DEN">Denver Broncos (DEN)</option>
		                        <option value="DET">Detroit Lions (DET)</option>
		                        <option value="ATL">Atlanta Falcons (ATL)</option>
		                        <option value="GB">Green Bay Packers (GB)</option>
		                        <option value="HOU">Houston Texans (HOU)</option>
		                        <option value="IND">Indianapolis Colts (IND)</option>
		                        <option value="JAC">Jacksonville Jaguars (JAC)</option>
		                        <option value="KAN">Kansas City Chiefs (KAN)</option>
		                        <option value="MIA">Miami Dolphins (MIA)</option>
		                        <option value="MIN">Minnesota Vikings (MIN)</option>
		                        <option value="NE">New England Patriots (NE)</option>
		                        <option value="NO">New Orleans Saints (NO)</option>
		                        <option value="NYG">New York Giants (NYG)</option>
		                        <option value="NYJ">New York Jets(NYJ)</option>
		                        <option value="OAK">Oakland Raiders (OAK)</option>
		                        <option value="PHI">Philadelphia Eagles (PHI)</option>
		                        <option value="PIT">Pittsburgh Steelers (PIT)</option>
		                        <option value="STL">Saint Louis Rams (STL)</option>
		                        <option value="SD">San Diego Chargers (SD)</option>
		                        <option value="SF">San Francisco 49ers (SF)</option>
		                        <option value="SEA">Seattle Seahawks (SEA)</option>
		                        <option value="TB">Tampa Bay Buccaneers (TB)</option>
		                        <option value="TEN">Tennessee Titans (TEN)</option>
		                        <option value="WA">Washington Redskins (WA)</option>
		                    </select>
			            </div>
		      		</div>
		   		 
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        	<button type="submit" id="pickCreate" class="btn btn-primary">Save changes</button>
			      	</div>
		      	</form>
	    	</div>
	  	</div>
	</div>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
	<script type="text/javascript" src="/js/dropdown.js"></script>
	<script type="text/javascript" src="/js/collapse.js"></script>
	<script type="text/javascript" src="/js/dashboard.js"></script>
	
	
    
@stop

