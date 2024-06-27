<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use Glhd\Linearavel\Contracts\SkipsCodeGeneration;

function should_skip(string $class_name): bool
{
	return class_exists($class_name) 
		&& is_a($class_name, SkipsCodeGeneration::class, true);
}
