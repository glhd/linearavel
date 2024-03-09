<?php

use Glhd\Linearavel\Data\Team;
use Glhd\Linearavel\Support\CodeGeneration\MetaGenerator;
use Glhd\Linearavel\Support\CodeGeneration\Transformer;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Spatie\LaravelData\Data;

Artisan::command('generate:data', function() {
	/** @var \Illuminate\Console\Command $this */
	
	$transformer = new Transformer(__DIR__.'/../../local.graphql', command: $this);
	$transformer->write();
});

Artisan::command('generate:meta {method} {root}', function() {
	/** @var \Illuminate\Console\Command $this */
	
	$method = $this->argument('method');
	$root = $this->argument('root');
	
	if (!Str::startsWith($root, '\\')) {
		$root = 'Glhd\\Linearavel\\Data\\'.$root;
	}
	
	if (! is_a($root, Data::class, true)) {
		throw new RuntimeException("'{$root}' is not a data class");
	}
	
	$generator = new MetaGenerator($root, $method);
	$this->line($generator->generate());
});
