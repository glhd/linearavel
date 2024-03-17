<?php

namespace Glhd\Linearavel\Support;

use Glhd\Linearavel\Connectors\LinearConnector;
use Illuminate\Support\ServiceProvider;

class LinearavelServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->bootConfig();
	}
	
	public function register()
	{
		$this->mergeConfigFrom($this->packageConfigFile(), 'linearavel');
		
		$this->app->singleton(LinearConnector::class, function() {
			return new LinearConnector(
				api_key: config('linearavel.api_key'),
				key_helper: app(KeyHelper::class),
				base_url: config('linearavel.base_url', 'https://api.linear.app/graphql'),
			);
		});
		
		$this->app->singleton(KeyHelper::class);
	}
	
	protected function bootConfig(): self
	{
		$this->publishes([
			$this->packageConfigFile() => $this->app->configPath('linearavel.php'),
		], 'linearavel-config');
		
		return $this;
	}
	
	protected function packageConfigFile(): string
	{
		return dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'linearavel.php';
	}
}
