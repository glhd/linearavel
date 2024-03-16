<?php

namespace Glhd\Linearavel\Tests\Feature;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Tests\TestCase;

class ClientTest extends TestCase
{
	public function test_it_can_fetch_teams(): void
	{
		app(LinearConnector::class)
			->teams('id', 'name', 'organization.id', 'organization.name');
	}
}
