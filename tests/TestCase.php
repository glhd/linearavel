<?php

namespace Glhd\Linearavel\Tests;

use Dotenv\Dotenv;
use Glhd\Linearavel\Support\LinearavelServiceProvider;
use Illuminate\Container\Container;
use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\LaravelData\LaravelDataServiceProvider;

abstract class TestCase extends Orchestra
{
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
