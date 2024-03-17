<?php

namespace Glhd\Linearavel\Tests\Feature;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Facades\Linear;
use Glhd\Linearavel\Tests\TestCase;

class LinearConnectorTest extends TestCase
{
	public function test_it_can_fetch_teams(): void
	{
		app(LinearConnector::class)
			->teams(
				first: 10,
				includeArchived: false,
			);
		// dd(Linear::teams()->get('id', 'name', 'organization.id', 'organization.name'));
	}
}
