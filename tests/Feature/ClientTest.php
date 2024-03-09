<?php

namespace Glhd\Linearavel\Tests\Feature;

use Glhd\Linearavel\Support\Client;
use Glhd\Linearavel\Support\CodeGeneration\Transformer;
use Glhd\Linearavel\Tests\TestCase;

class ClientTest extends TestCase
{
	public function test_it_can_fetch_teams(): void
	{
		dd(app(Client::class)->teams(['id', 'name', 'organization.id']));
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
