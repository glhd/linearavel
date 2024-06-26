<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Stringable;

class Finder
{
	protected static ?string $base_path = null;
	
	public static function make(string $class_name): static
	{
		return new static($class_name);
	}
	
	public static function basePath(?string $path = null): string
	{
		static::$base_path ??= dirname(__DIR__, 3).'/src/';
		
		return $path
			? static::$base_path.'/'.$path
			: static::$base_path;
	}
	
	public function __construct(
		public string $class_name,
		public Filesystem $fs = new Filesystem(),
	) {
	}
	
	public function absolutePath(): Stringable
	{
		$path = str($this->class_name)
			->start('\\')
			->replace('\\', '/')
			->replace('/Glhd/Linearavel/', static::basePath())
			->append('.php');
		
		$this->fs->ensureDirectoryExists($path->dirname());
		
		return $path;
	}
	
	public function relativePath(): Stringable
	{
		return $this->absolutePath()->after(static::basePath());
	}
}
