<?php

namespace Glhd\Linearavel\Tests\Feature;

use Glhd\Linearavel\Support\Client;
use Glhd\Linearavel\Tests\TestCase;

class ClientTest extends TestCase
{
	public function test_it_can_fetch_teams(): void
	{
		dd(app(Client::class)->teams());
	}
}
