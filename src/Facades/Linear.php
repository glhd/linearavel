<?php

namespace Glhd\Linearavel\Facades;

use Glhd\Linearavel\Data\Team;
use Glhd\Linearavel\Support\Client;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Collection<int, Team> teams(string ...$keys)
 * @method static \Glhd\Linearavel\Data\User viewer(string ...$keys)
 */
class Linear extends Facade
{
	protected static function getFacadeAccessor()
	{
		return Client::class;
	}
}
