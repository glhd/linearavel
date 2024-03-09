<?php

namespace Glhd\Linearavel\Support;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LinearavelServiceProvider extends ServiceProvider
{
	public function boot()
	{
		// require_once __DIR__.'/helpers.php';
		// $this->bootConfig();
		// $this->bootViews();
		// $this->bootBladeComponents();
	}
	
	public function register()
	{
		$this->mergeConfigFrom($this->packageConfigFile(), 'linearavel');
		
		$this->app->singleton(Client::class, function() {
			return new Client(
				api_key: config('linearavel.api_key'),
				key_helper: app(KeyHelper::class),
				base_url: config('linearavel.base_url'),
			);
		});
		
		$this->app->singleton(KeyHelper::class);
	}
	
	protected function bootViews(): self
	{
		$this->loadViewsFrom($this->packageViewsDirectory(), 'linearavel');
		
		$this->publishes([
			$this->packageViewsDirectory() => $this->app->resourcePath('views/vendor/linearavel'),
		], 'linearavel-views');
		
		return $this;
	}
	
	protected function bootBladeComponents(): self
	{
		if (version_compare($this->app->version(), '8.0.0', '>=')) {
			Blade::componentNamespace('Glhd\\Linearavel\\Components', 'linearavel');
		}
		
		return $this;
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
	
	protected function packageTranslationsDirectory(): string
	{
		return dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'translations';
	}
	
	protected function packageViewsDirectory(): string
	{
		return dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'views';
	}
}
