<?php

namespace Glhd\Linearavel\Support;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Connectors\LinearOAuthConnector;
use Glhd\Linearavel\Support\CodeGeneration\PhpStormMetaWriter;
use Glhd\Linearavel\Support\CodeGeneration\WriteQueue;
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
				base_url: config('linearavel.base_url', 'https://api.linear.app/graphql'),
				oauth: config('linearavel.client_id') ? new LinearOAuthConnector(
					client_id: config('linearavel.client_id'),
					client_secret: config('linearavel.client_secret'),
					scopes: array_map('trim', explode(',', config('linearavel.scopes'))),
				) : null,
			);
		});
		
		$this->app->singleton(KeyHelper::class);
		$this->app->singleton(WriteQueue::class);
		$this->app->singleton(PhpStormMetaWriter::class);
		
		require_once __DIR__.'/helpers.php';
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
