<?php

namespace Glhd\Linearavel\Facades;

use Glhd\Linearavel\Connectors\LinearConnector;
use Illuminate\Support\Facades\Facade;

class Linear extends Facade
{
	protected static function getFacadeAccessor(): string
	{
		return LinearConnector::class;
	}
}
