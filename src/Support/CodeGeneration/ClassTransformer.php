<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\NamedTypeNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Use_;
use PhpParser\Node\UseItem;
use Spatie\LaravelData\Data;

abstract class ClassTransformer
{
	protected array $uses = [];
	
	abstract public function __invoke(): array;
	
	public function use(string $fqcn): static
	{
		$this->uses[] = $fqcn;
		
		return $this;
	}
	
	protected function uses(): ?Use_
	{
		if (! count($this->uses)) {
			return null;
		}
		
		$uses = collect($this->uses)
			->unique()
			->map(fn($fqcn) => new UseItem(new Name($fqcn)))
			->all();
		
		return new Use_($uses);
	}
}
