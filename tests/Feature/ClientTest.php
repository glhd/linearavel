<?php

namespace Glhd\Linearavel\Tests\Feature;

use Glhd\Linearavel\Data\Team;
use Glhd\Linearavel\Facades\Linear;
use Glhd\Linearavel\Support\CodeGeneration\MetaGenerator;
use Glhd\Linearavel\Tests\TestCase;

class ClientTest extends TestCase
{
	public function test_it_can_fetch_teams(): void
	{
		dd(Linear::viewer('id', 'name', 'organization.id', 'organization.name'));
	}
}
