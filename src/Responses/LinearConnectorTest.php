<?php

namespace Glhd\Linearavel\Responses;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Facades\Linear;
use Glhd\Linearavel\Tests\TestCase;

class LinearConnectorTest extends TestCase
{
	public function test_it_can_fetch_the_viewer(): void
	{
		$viewer = Linear::viewer()
			->with('organization', 'id', 'name')
			->get('id', 'name', 'active', 'avatarUrl', 'timezone', 'isMe');
		
		dd($viewer->name);
	}
	
	public function test_it_can_fetch_teams(): void
	{
		$response = app(LinearConnector::class)
			->teams(
				first: 10,
				includeArchived: false,
			)
			->get('nodes.id', 'nodes.name', 'nodes.organization.id', 'nodes.organization.name')
			->resolve()
			->first();
		
		dd($response);
	}
}
