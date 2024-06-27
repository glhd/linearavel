<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\TypeDefinitionNode;
use GraphQL\Language\AST\TypeNode;
use GraphQL\Language\AST\TypeSystemDefinitionNode;
use Illuminate\Support\Stringable;
use PhpParser\Comment\Doc;
use UnexpectedValueException;

class DocBlock
{
	protected array $annotations = [];
	
	public static function make(): static
	{
		return new static();
	}
	
	public function see(string $see): static
	{
		$this->annotations[] = "@see {$see}";
		
		return $this;
	}
	
	public function extends(string $extends, ?string $generic_type = null): static
	{
		$annotation = "@extends {$extends}";
		
		if ($generic_type) {
			$annotation .= "<{$generic_type}>";
		}
		
		$this->annotations[] = $annotation;
		
		return $this;
	}
	
	public function asAttribute(): array
	{
		return [new Doc((string) $this)];
	}
	
	public function __toString(): string
	{
		if (1 === count($this->annotations)) {
			return "/** {$this->annotations[0]} */";
		}
		
		$annotations = implode("\n", array_map(fn($annotation) => " * {$annotation}", $this->annotations));
		
		return "/**\n{$annotations}\n */";
	}
}
