<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

/** @method __invoke(WriteQueue $queue): void */
abstract class InvokableTransformer
{
	public static function transform(...$args)
	{
		$transformer = new static(...$args);
		
		return $transformer(app(WriteQueue::class));
	}
}
