<?php

namespace Glhd\Linearavel\Facades;

use Glhd\Linearavel\Support\Client;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Support\Collection<int, \Glhd\Linearavel\Data\Team> teams(string ...$keys)
 */
class Linear extends Facade
{
	protected static function getFacadeAccessor()
	{
		return Client::class;
	}
}
