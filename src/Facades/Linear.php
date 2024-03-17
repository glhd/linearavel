<?php

namespace Glhd\Linearavel\Facades;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\User;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Glhd\Linearavel\Requests\PendingLinearRequest<User> viewer()
 */
class Linear extends Facade
{
	protected static function getFacadeAccessor(): string
	{
		return LinearConnector::class;
	}
}
