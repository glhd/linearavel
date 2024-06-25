<?php

namespace Glhd\Linearavel\Tests;

use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Support\LinearavelServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Saloon\Http\Faking\MockClient;
use Spatie\LaravelData\LaravelDataServiceProvider;

abstract class TestCase extends Orchestra
{
	protected function assertSaloonSent(string|callable $value): void
	{
		MockClient::getGlobal()->assertSent($value);
	}
	
	protected function getPackageProviders($app)
	{
		return [
			LinearavelServiceProvider::class,
			LaravelDataServiceProvider::class,
		];
	}
	
	protected function getPackageAliases($app)
	{
		return [];
	}
	
	protected function getApplicationTimezone($app)
	{
		return 'America/New_York';
	}
}
