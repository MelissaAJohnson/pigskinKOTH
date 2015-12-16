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
    
    	@if (count($myPicks) < 1)
    		<h4>Create a team to play!</h4>
    		<p>When you add a team and make picks, your picks will show here</p>
    		<a href="/team/create"><span class="glyphicon glyphicon-plus"></span> Add Team</a>
    	@else
	    	<table class = 'table table-condensed'>	
		    	<tr>
		    		<th>Team</th>
		    		@for ($i = 1; $i < $currentWeek + 1; $i++) 
		    			<th class="text-center">{{ $i }}</th>
		    		@endfor 
		    		<th></th>
		    	</tr>
				@foreach($myPicks as $myPick) 		
					<tr>
						<td>{{ $myPick->name }}</td>
			        	@foreach($myPick->pick as $myPick)
			            	<td class="text-center">{{ $myPick->nflteam->abbreviation }}</td>
			            @endforeach
		            	<td>
							<button 
								type="button" 
								id="editPickButton"
								name="editPickButton"
								class="btn btn-default btn-xs"
								data-nonsence = "{{ $myPick->id }}"
								data-id = "{{ $myPick->team->id }}"
								data-name = "{{ $myPick->team->name }}"
								data-pick = "{{ $myPick->nflteam->id }}">
								<span 
									class="glyphicon glyphicon-pencil" 
									data-toggle="modal" 
									data-target="#editModal" 
									data-toggle="tooltip" 
									title="Click to edit last pick">
									Edit Pick
								</span>
							</button>
							&nbsp;&nbsp;
							<button 
								type="button" 
								id="makePickButton" 
								name="makePickButton" 
								class="btn btn-primary btn-xs" 
								data-id = "{{ $myPick->team->id }}" 
								data-name = "{{ $myPick->team->name }}">
								<span 
									class="glyphicon glyphicon-plus" 
									data-toggle="modal" 
									data-target="#makeModal" 
									data-toggle="tooltip" 
									title="Click to add next week's pick"> 
									Make Pick
								</span>
							</button>
						</td>
				    </tr>	  	        	 
				@endforeach
			</table>
			<!-- <a href="/team/create"><span class="glyphicon glyphicon-plus"></span> Add Another Team</a> -->
		@endif
    


    <h3>League Picks</h3>
	<table class = 'table table-condensed'>
		<tr>
    		<th>Team</th>
    		@for ($i = 1; $i < $currentWeek + 1; $i++) 
    			<th class="text-center">{{ $i }}</th>
    		@endfor 
    		<th></th>
    	</tr>

			@foreach($teams as $team) 		
				<tr>
					<td>{{ $team->name }}</td>
			        	@foreach($team->pick as $pick)
			            	<td class="text-center">{{ $pick->nflteam->abbreviation}}</td>
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
		      	<form method="POST" action='/dashboard/pickEdit'>
			      	<div class="modal-body">
			        	<p>Picks must be made no later than Friday, 3PM Central time. If you want to pick a team playing Thursday, the pick must be made before game start.</p>
				    	<input type="hidden" value="{{ csrf_token() }}" name="_token">
			            <div class = "form-group">
			            	<input type = "hidden" id="editPickId" name="editPickId">
			            	<label for="pickWeek">Week</label>
			            	<input type = "text" id="editPickWeek" name="editPickWeek" class = "form-control" value= "{{ $currentWeek }}" disabled><br />
			            	<label for="team">Team</label>
			            	<input type = "hidden" id="editPickTeamId" name="editPickTeamId">
			            	<input type = "text" id="editPickTeamName" name="editPickTeamName" class = "form-control" disabled><br />
			                <label for="pick">Pick</label>
                           	<select name='pick' id='pick' class='form-control'>
				                @foreach($teams_for_dropdown as $nflteam_id => $nflteam_name)

				                    {{ $selected = ($nflteam_id == $myPick->id) ? 'selected' : '' }}

				                    <option value='{{ $nflteam_id }}' {{ $selected }}> {{ $nflteam_name }} </option>
				                @endforeach
				            </select>


			            </div>
		      		</div>
		   		 
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        	<button type="submit" id="pickEdit" class="btn btn-primary">Save changes</button>
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
		      		<!-- <input type='hidden' name='edit_team_id' value=''> -->
			      	<div class="modal-body">
			        	<p>Picks must be made no later than Friday, 3PM Central time. If you want to pick a team playing Thursday, the pick must be made before game start.</p>
				    	<input type="hidden" value="{{ csrf_token() }}" name="_token">
			            <div class = "form-group">
			            	<label for="pickWeek">Week</label>
			            	<input type = "text" class = "form-control" id="pickWeek" name="pick_week" value= "{{ $currentWeek + 1 }}" disabled><br />
			            	<label for="team">Team</label>
			            	<input type = "hidden" id="makePickTeamId" name="makePickTeamId"><br />
			            	<input type = "text" id="makePickTeamName" name="makePickTeamName" class = "form-control" disabled><br />
			                <label for="pick">Pick</label>
			                <select id="pick" name="pick" class="form-control">
		                        <option value="">Select Team</option>
		                        <option value="1">Arizona Cardinals (ARI)</option>
		                        <option value="2">Atlanta Falcons (ATL)</option>
		                        <option value="3">Baltimore Ravens (BAL)</option>
		                        <option value="4">Buffalo Bills (BUF)</option>
		                        <option value="5">Carolina Panthers (CAR)</option>
		                        <option value="6">Chicago Bears (CHI)</option>
		                        <option value="7">Cincinnati Bengels (CIN)</option>
		                        <option value="8">Cleveland Browns (CLE)</option>
		                        <option value="9">Dallas Cowboys (DAL)</option>
		                        <option value="10">Denver Broncos (DEN)</option>
		                        <option value="11">Detroit Lions (DET)</option>
		                        <option value="12">Green Bay Packers (GB)</option>
		                        <option value="13">Houston Texans (HOU)</option>
		                        <option value="14">Indianapolis Colts (IND)</option>
		                        <option value="15">Jacksonville Jaguars (JAC)</option>
		                        <option value="16">Kansas City Chiefs (KAN)</option>
		                        <option value="17">Miami Dolphins (MIA)</option>
		                        <option value="18">Minnesota Vikings (MIN)</option>
		                        <option value="19">New England Patriots (NE)</option>
		                        <option value="20">New Orleans Saints (NO)</option>
		                        <option value="21">New York Giants (NYG)</option>
		                        <option value="22">New York Jets(NYJ)</option>
		                        <option value="23">Oakland Raiders (OAK)</option>
		                        <option value="24">Philadelphia Eagles (PHI)</option>
		                        <option value="25">Pittsburgh Steelers (PIT)</option>
		                        <option value="26">Saint Louis Rams (STL)</option>
		                        <option value="27">San Diego Chargers (SD)</option>
		                        <option value="28">San Francisco 49ers (SF)</option>
		                        <option value="29">Seattle Seahawks (SEA)</option>
		                        <option value="30">Tampa Bay Buccaneers (TB)</option>
		                        <option value="31">Tennessee Titans (TEN)</option>
		                        <option value="32">Washington Redskins (WA)</option>
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

