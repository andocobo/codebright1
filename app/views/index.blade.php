@extends('layout')

@section('content')

	<!-- Indicates caution should be taken with this action -->
	<a style="float: right;" href="{{ action('UserController@logoutAction') }}" class="btn btn-warning">Logout</a>
	
	<div class="page-header">
		<h1>All Games <small>Gotta catch 'em all!</small></h1>
		<h6>Welcome to your games, {{ Auth::user()->username }}</h6>
	</div>

	<div class="panel panel-default">
		<div class="panel-body">
			<a href="{{ action('GamesController@create') }}" class="btn btn-primary">Create game</a>
		</div>
	</div>

	@if(Session::has('success'))
	    <div class="alert alert-success">
	        <strong>Hooray!</strong> {{ Session::get('success') }}
	    </div>
	@endif

	@if(Session::has('delete'))
	    <div class="alert alert-success">
	        <strong>Another one down!</strong> {{ Session::get('delete') }}
	    </div>
	@endif

	@if(Session::has('updated'))
	    <div class="alert alert-success">
	        <strong>Success!</strong> {{ Session::get('updated') }}
	    </div>
	@endif

	<?php $games = $data['games']; ?>

	@if ($games->isEmpty())
		<p>There are no games</p>
	@else
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Title</th>
					<th>Publisher</th>
					<th>Clocked it?</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($games as $game)
				<tr>
					<td>{{ $game->title }}</td>
					<td>{{ $game->publisher }}</td>
					<td>{{ $game->complete ? 'Yes' : 'No' }}</td>
					<td>
						<a href="{{ action('GamesController@edit', $game->id) }}" class="btn btn-default">Edit</a>
						<a href="{{ action('GamesController@delete', $game->id) }}" class="btn btn-danger">Delete</a>
					</td>
				</tr>

				@endforeach
			</tbody>
		</table>
	@endif
@stop