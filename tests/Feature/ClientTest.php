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
		Linear::teams('id', 'members.edges.node.id');
	}
	
	public function test_meta_generator(): void
	{
		$generator = new MetaGenerator(Team::class, 'teams');
		$generator->generate();
	}
}
