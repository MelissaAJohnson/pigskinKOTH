@extends('layouts.master')


@section('title')
    Pigskin KOTH
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')

  <link href="/css/custom.css" type='text/css' rel='stylesheet'>

@stop

@section('top_nav')
    <div class="navbar navbar-static-top">
      <div class="navbar-inner">
        <div class="container">             
            <ul class="nav pull-right">
                <li>
                    <a href="#">Login</a>
                </li>
            </ul>              
        </div>
      </div>
    </div>
 @stop

@section('content')

  <div class="jumbotron">
    <div class="container">
      <h1>Love Football Pools?</h1>
      <p>Pigskin King of the Hill provides the thrill of a friendly football wager without all the work of fantasy leagues. Just pick a team you expect to win every week. If they win, you're in. If they lose, you're out. The catch? You can only pick a team once for the whole season.</p>
      <p><a class="btn btn-primary btn-lg" href="/account" role="button">Join Now &raquo;</a></p>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-4 text-center my-border" id="NumberLeaguePlayers">
        <h2>{{ $team_count }}</h2>
        <p>National League Players</p>
      </div>
      <div class="col-md-4 text-center my-border" id="NumberSurvivingPlayers">
        <h2>{{ $active_count }}</h2>
        <p>League Survivors</p>
     </div>
      <!-- Future: to accommodate double elimination rules
        <div class="col-md-3 text-center my-border" id="NumberPlayersNoLosses">
        <h2>5</h2>
        <p>Players with no losses</p>
      </div> -->
    </div>
  </div>

  <br />

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop