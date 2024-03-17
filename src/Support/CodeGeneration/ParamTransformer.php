<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use PhpParser\Node;
use PhpParser\Node\Identifier;
use PhpParser\Node\NullableType;
use PhpParser\Node\Param;
use PhpParser\Node\UnionType;

abstract class ParamTransformer extends InvokableTransformer
{
	use HasTypeNodes;
	use HasParent;
	
	protected ?FunctionTransformer $function = null;
	
	public static function acceptsNull(Node $node): bool
	{
		if ($node instanceof NullableType) {
			return true;
		}
		
		if ($node instanceof UnionType) {
			return collect($node->types)
				->contains(fn($type) => $type instanceof Identifier && 'null' === $type->name);
		}
		
		return false;
	}
	
	abstract public function __invoke(): Param;
}
