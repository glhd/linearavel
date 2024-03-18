<?php

namespace Glhd\Linearavel\Tests\Feature;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Tests\TestCase;

class LinearConnectorTest extends TestCase
{
	public function test_generics(): void
	{
		app(LinearConnector::class)
			->teams()
			->get()
			->resolve()
			->first()
			->name;
	}
}
