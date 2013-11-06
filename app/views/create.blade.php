@extends('layout')

@section('content')

	<div class="page-header">
		<h1>Create Game <small>and someday finish it!</small></h1>
	</div>

	<form action="{{ action('GamesController@handleCreate') }}" method="post" role="form">
		<div class="form-group @if($errors->has('title')) has-error @endif">
			<label class="control-label" for="title">Title</label>
			<input type="text" class="form-control" name="title" />
			<span class="help-block error">{{ $errors->first('title') }}</span>
		</div>

		<div class="form-group @if($errors->has('publisher')) has-error @endif">
			<label class="control-label" for="publisher">Publisher</label>
			<input type="text" class="form-control" name="publisher" />
			<span class="help-block error">{{ $errors->first('publisher') }}</span>
		</div>

		<div class="checkbox">
			<label for="complete">
				<input type="checkbox" name="complete" />Clocked it?
			</label>
		</div>

		<input type="submit" value="Create" class="btn btn-primary" />

		<a href="{{ action('GamesController@index') }}" class="btn btn-link">Cancel</a>
	</form>
@stop
