<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use Glhd\Linearavel\Support\KeyHelper;

class MetaGenerator
{
	public function __construct(
		protected string $root,
		protected string $method,
	) {
	}
	
	public function generate()
	{
		$keys = app(KeyHelper::class)
			->get($this->root)
			->map(fn ($key) => var_export($key, true))
			->implode(', ');
		
		return <<<PHP
		expectedArguments(
			\Glhd\Linearavel\Support\Client::{$this->method}(),
			0,
			{$keys}
		);
		expectedArguments(
			\Glhd\Linearavel\Facades\Linear::{$this->method}(),
			0,
			{$keys}
		);
		PHP;
	}
}
