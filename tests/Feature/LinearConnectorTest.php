<?php

namespace Glhd\Linearavel\Tests\Feature;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Tests\TestCase;

class LinearConnectorTest extends TestCase
{
	public function test_generics(): void
	{
		$user = app(LinearConnector::class)
			->viewer()
			->get()
			->resolve()
			->organization;
	}
}
