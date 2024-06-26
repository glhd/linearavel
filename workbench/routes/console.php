<?php

use Glhd\Linearavel\Support\CodeGeneration\MetaGenerator;
use Glhd\Linearavel\Support\CodeGeneration\Transformer;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Spatie\LaravelData\Data;

Artisan::command('generate:data', function() {
	/** @var \Illuminate\Console\Command $this */
	$transformer = new Transformer(__DIR__.'/../../local.graphql', command: $this);
	$transformer->write();
});

Artisan::command('reset:data', function() {
	$fs = new Filesystem();
	$base_path = dirname(__DIR__, 2);
	
	$fs->delete([
		$base_path.'/src/Connectors/MutatesLinear.php',
		$base_path.'/src/Connectors/QueriesLinear.php',
	]);
	
	$fs->deleteDirectory($base_path.'/src/Data/Enums', preserve: true);
	
	// We have to do it this way, rather than `deleteDirectory`, because we only want to delete
	// the PHP files in `src/Data` — not the subdirectories
	$fs->delete(
		collect(new FilesystemIterator($base_path.'/src/Data'))
		->filter(fn(SplFileInfo $file) => $file->isFile() && 'php' === $file->getExtension())
		->map(fn(SplFileInfo $file) => $file->getPathname())
		->values()
		->toArray()
	);
	
	$fs->deleteDirectory($base_path.'/src/Requests/Inputs', preserve: true);
	$fs->deleteDirectory($base_path.'/src/Requests/Pending', preserve: true);
	$fs->deleteDirectory($base_path.'/src/Responses/Mutations', preserve: true);
	$fs->deleteDirectory($base_path.'/src/Responses/Queries', preserve: true);
});

Artisan::command('generate:meta {method} {root}', function() {
	/** @var \Illuminate\Console\Command $this */
	$method = $this->argument('method');
	$root = $this->argument('root');
	
	if (! Str::startsWith($root, '\\')) {
		$root = 'Glhd\\Linearavel\\Data\\'.$root;
	}
	
	if (! is_a($root, Data::class, true)) {
		throw new RuntimeException("'{$root}' is not a data class");
	}
	
	$generator = new MetaGenerator($root, $method);
	$this->line($generator->generate());
});
