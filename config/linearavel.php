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
	
	/*
	|--------------------------------------------------------------------------
	| OAuth app (client credentials)
	|--------------------------------------------------------------------------
	|
	| To act as an OAuth app instead of a user, turn on "Client credentials
	| tokens" for the app in Linear and set its client ID and secret. When a
	| client ID is set, it's used in place of the API key. Scopes are a
	| comma-separated list.
	|
	*/
	
	'client_id' => env('LINEAR_CLIENT_ID'),
	'client_secret' => env('LINEAR_CLIENT_SECRET'),
	'scopes' => env('LINEAR_SCOPES', 'read,write'),
];
