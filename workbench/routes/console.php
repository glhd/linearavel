<?php

use Glhd\Linearavel\Support\CodeGeneration\MetaGenerator;
use Glhd\Linearavel\Support\CodeGeneration\SchemaComparison;
use Glhd\Linearavel\Support\CodeGeneration\SchemaFetcher;
use Glhd\Linearavel\Support\CodeGeneration\Transformer;
use GraphQL\Utils\BuildSchema;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Spatie\LaravelData\Data;

if (! function_exists('linearavel_base_path')) {
	function linearavel_base_path(string $path = ''): string
	{
		return rtrim(dirname(__DIR__, 2).'/'.ltrim($path, '/'), '/');
	}
}

Artisan::command('generate:data', function() {
	/** @var \Illuminate\Console\Command $this */
	$transformer = new Transformer(linearavel_base_path('local.graphql'), command: $this);
	$transformer->write();
});

Artisan::command('reset:data', function() {
	$fs = new Filesystem();
	$base_path = linearavel_base_path();
	
	$fs->delete([
		$base_path.'/src/Connectors/MutatesLinear.php',
		$base_path.'/src/Connectors/QueriesLinear.php',
	]);
	
	$fs->deleteDirectory($base_path.'/src/Data/Enums', preserve: true);
	$fs->deleteDirectory($base_path.'/src/Data/Contracts', preserve: true);
	
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
	$fs->deleteDirectory($base_path.'/src/Requests/Pending');
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

Artisan::command('linear:schema {--dry-run : Report on drift without writing the schema file}', function() {
	/** @var \Illuminate\Console\Command $this */
	$api_key = getenv('LINEAR_API_KEY') ?: '';
	
	if (blank($api_key)) {
		$this->error('Set LINEAR_API_KEY to fetch the schema.');
		return 1;
	}
	
	$path = linearavel_base_path('local.graphql');
	
	$this->info('Fetching the live Linear schema...');
	
	$fetcher = new SchemaFetcher($api_key, getenv('LINEAR_BASE_URL') ?: 'https://api.linear.app/graphql');
	$new_sdl = $fetcher->sdl();
	
	// The committed schema was not necessarily printed by us, so normalise it
	// before comparing—otherwise formatting alone would look like a change
	$old_sdl = file_exists($path)
		? SchemaFetcher::print(BuildSchema::build(file_get_contents($path), options: ['assumeValid' => true]))
		: '';
	
	if ('' === $old_sdl) {
		$this->warn('No existing schema to compare against; treating this as a change.');
	}
	
	$comparison = SchemaComparison::between($old_sdl ?: $new_sdl, $new_sdl);
	$changed = '' === $old_sdl || $comparison->changed();
	$bump = '' === $old_sdl ? SchemaComparison::PATCH : $comparison->bump();
	
	if (! $this->option('dry-run')) {
		file_put_contents($path, $new_sdl);
		$this->line("Wrote <info>{$path}</info>");
	}
	
	$this->newLine();
	$this->line($comparison->summary());
	$this->newLine();
	$this->line("Version bump: <info>{$bump}</info>");
	
	// Written for GitHub Actions to read
	if ($output = getenv('GITHUB_OUTPUT')) {
		file_put_contents($output, implode("\n", [
			'changed='.($changed ? 'true' : 'false'),
			'bump='.$bump,
		])."\n", FILE_APPEND);
	}
	
	if ($summary_path = getenv('LINEAR_SCHEMA_SUMMARY')) {
		file_put_contents($summary_path, $comparison->summary()."\n");
	}
	
	return 0;
});

Artisan::command('linear:next-version {current}', function() {
	/** @var \Illuminate\Console\Command $this */
	$current = ltrim($this->argument('current'), 'v');
	$bump = getenv('LINEAR_VERSION_BUMP') ?: 'patch';
	
	[$major, $minor, $patch] = array_map('intval', array_pad(explode('.', $current, 3), 3, 0));
	
	// Below 1.0 a breaking schema change moves the minor version; after that, the major
	match ($bump) {
		'minor' => $major >= 1
			? [$major, $minor, $patch] = [$major + 1, 0, 0]
			: [$minor, $patch] = [$minor + 1, 0],
		'patch' => $patch++,
		default => null,
	};
	
	$this->line("{$major}.{$minor}.{$patch}");
});
