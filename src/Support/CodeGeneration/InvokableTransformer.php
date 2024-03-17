<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

/** @method __invoke() */
abstract class InvokableTransformer
{
	public static function transform(...$args)
	{
		$transformer = new static(...$args);
		
		return $transformer();
	}
}
