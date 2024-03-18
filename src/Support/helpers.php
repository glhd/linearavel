<?php

use Glhd\Linearavel\Connectors\LinearConnector;

if (! function_exists('linear')) { // @codeCoverageIgnore
	function linear(): LinearConnector
	{
		return app(LinearConnector::class);
	}
}
