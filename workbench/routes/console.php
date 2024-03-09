<?php

use Glhd\Linearavel\Support\CodeGeneration\Transformer;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('generate:data', function() {
	/** @var \Illuminate\Console\Command $this */
	
	$transformer = new Transformer(__DIR__.'/../../local.graphql', output: $this->getOutput());
	$transformer->write();
});
