<?php

// app/controllers/GamesController.php

class GamesController extends BaseController 
{
	public function index()
	{

		// Show a listing of games
		if (Auth::check())
		{
			$data['check'] = 'User is currently logged in.';
		}

		else
		{
			$data['check'] = 'User is NOT currently logged in.';
		}

		$data['games'] = Game::orderBy('title')->get();

		return View::make('index', compact('data')); // Compact is a PHP function (not Laravel). It create an array out of a number of variables.
	}

	public function create()
	{
		// Show the create game form 
		return View::make('create');
	}

	public function handleCreate()
	{
		// Handle create form submission
		$v = new Services\Validators\Game;

		$game = new Game;
		$game->title = Input::get('title');
		$game->publisher = Input::get('publisher');
		$game->complete = Input::has('complete');
	
		if($v->passes())
		{
			$game->save();

			return Redirect::action('GamesController@index')->with('success', 'The new game has been created');	
		}

			return Redirect::back()->withInput()->withErrors($v->errors);
		
	}

	public function edit(Game $game)
	{
		// Show edit form
		return View::make('edit', compact('game'));
	}

	public function handleEdit()
	{
		$v = new Services\Validators\Game;

		// Handle the edit form submission
		$game = Game::findOrFail(Input::get('id'));
		$game->title = Input::get('title');
		$game->publisher = Input::get('publisher');
		$game->complete = Input::has('complete');
		
		if($v->passes())
		{
			$game->save();

			return Redirect::action('GamesController@index')->with('updated', $game->title.' game details updated');
		}

		else
		{
			return Redirect::to('edit/'.$game->id)->withErrors($v->getErrors())->withInput();
		}

	}

	public function delete(Game $game)
	{
		// Show the delete confirmation page
		return View::make('delete', compact('game'));
	}

	public function handleDelete()
	{
		/// Handle the deleting 
		$id = Input::get('game');
		$game = Game::findOrFail($id);
		$game->delete();

		return Redirect::action('GamesController@index')->with('delete', 'Game successfully deleted.');
	}


}