<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\TypeDefinitionNode;
use GraphQL\Language\AST\TypeNode;
use GraphQL\Language\AST\TypeSystemDefinitionNode;
use Illuminate\Support\Stringable;
use UnexpectedValueException;

class DocBlock
{
	public function __construct(
		public array $annotations = [],
	) {
	}
	
	public function see(string $see): static
	{
		$this->annotations[] = "@see {$see}";
		
		return $this;
	}
	
	public function __toString(): string
	{
		return '/** */';
	}
}
