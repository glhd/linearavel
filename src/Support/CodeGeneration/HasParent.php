<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use PhpParser\Node\Name;

trait HasParent
{
	protected ClassTransformer $parent;
	
	protected function fqcn(string $fqcn): Name
	{
		$this->parent->use($fqcn);
		
		return new Name(class_basename($fqcn));
	}
}
