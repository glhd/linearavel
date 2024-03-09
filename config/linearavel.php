<?php

return [
	/*
	|--------------------------------------------------------------------------
	| Linear API
	|--------------------------------------------------------------------------
	|
	| Set up your Linear API key and base URL to get started.
	|
	*/
	
	'api_key' => env('LINEAR_API_KEY'),
	'base_url' => env('LINEAR_BASE_URL', 'https://api.linear.app/graphql'),
];
