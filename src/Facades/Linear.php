<?php

namespace Glhd\Linearavel\Facades;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Team;
use Glhd\Linearavel\Data\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Collection<int, Team> teams(string ...$keys)
 * @method static User viewer(string ...$keys)
 */
class Linear extends Facade
{
	protected static function getFacadeAccessor(): string
	{
		return LinearConnector::class;
	}
}
