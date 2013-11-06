<?php

// app/controllers/UserController.php

class UserController extends BaseController
{
	public function handleLogin()
	{
		$errors = new Illuminate\Support\MessageBag;

		if ($old = Input::old("errors"))
        {
            $errors = $old;
        }

        $data = [
            "errors" => $errors
        ];


		if (Input::server("REQUEST_METHOD") == "POST")
	   	{
			// Handle create form submission
			$v = new Services\Validators\User;

			if($v->passes())
			{
				// Validation passed, check credentials in db, if correct take to list of games
				$credentials = [
                    "username" => Input::get("username"),
                    "password" => Input::get("password")
                ];

				if(Auth::attempt($credentials))
				{
					return Redirect::action('GamesController@index');	
				}
			}

			$data["errors"] = new Illuminate\Support\MessageBag([
                "password" => [
                    "Username and/or password invalid."
                ]
            ]);

			return Redirect::back()->withInput($data);
			
		}

		return View::make('login', $data);
	}

	public function logoutAction()
	{
	    Auth::logout();
	    return Redirect::to("/");
	}
}