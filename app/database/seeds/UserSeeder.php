<?php

class UserSeeder extends DatabaseSeeder
{
	public function run()
	{
		$users = [
			[
				'username'	=>	'andocobo',
				'password'	=>	Hash::make('hamilton'),
				'email'		=>	'andrew@quillstudios.com.au'
			]
		];

		foreach($users as $user) 
		{
			User::create($user);
		}
	}
}