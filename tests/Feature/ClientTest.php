<?php

namespace Glhd\Linearavel\Tests\Feature;

use Glhd\Linearavel\Data\Team;
use Glhd\Linearavel\Facades\Linear;
use Glhd\Linearavel\Support\Client;
use Glhd\Linearavel\Support\CodeGeneration\MetaGenerator;
use Glhd\Linearavel\Support\CodeGeneration\Transformer;
use Glhd\Linearavel\Tests\TestCase;
use Illuminate\Support\Facades\Http;

class ClientTest extends TestCase
{
	public function test_it_can_fetch_teams(): void
	{
		Linear::teams('name', 'icon', 'key')->dd();
	}
	
	public function test_meta_generator(): void
	{
		$generator = new MetaGenerator(Team::class);
		$generator->generate();
	}
	
	public function test_transformer(): void
	{
		$transformer = new Transformer(__DIR__.'/../../local.graphql', 'Glhd\\Linearavel\\');
		// echo $transformer->write();
	}
}

enum Foo: string
{
	case bar = 'bar';
}
