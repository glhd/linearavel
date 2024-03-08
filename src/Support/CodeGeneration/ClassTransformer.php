<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\NamedTypeNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use Illuminate\Support\Collection;
use PhpParser\Node\Name;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Use_;
use PhpParser\Node\UseItem;
use Spatie\LaravelData\Data;

class ClassTransformer
{
	protected array $uses = [];
	
	public static function transform(
		ObjectTypeDefinitionNode $node,
		string $namespace = '\\',
	) {
		$transformer = new static($node, $namespace);
		return $transformer();
	}
	
	public function __construct(
		protected ObjectTypeDefinitionNode $node,
		public string $namespace = '\\',
	) {
		$this->use(Data::class);
	}
	
	public function use(string $fqcn): static
	{
		$this->uses[] = $fqcn;
		
		return $this;
	}
	
	public function __invoke(): array
	{
		// Generate the data first, since they may push items into `$uses`
		$params = $this->params();
		$implements = $this->implements();
		
		return array_filter([
			new Namespace_(new Name($this->namespace.'Data')),
			$this->uses(),
			new Class_($this->node->name->value, [
				'stmts' => [new ClassMethod('__construct', ['params' => $params])],
				'extends' => new Name('Data'),
				'implements' => $implements,
			]),
		]);
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
	
	protected function params(): array
	{
		return collect($this->node->fields)
			->map(fn(FieldDefinitionNode $node) => ParamTransformer::transform($node, $this))
			->all();
	}
	
	protected function implements(): array
	{
		return collect($this->node->interfaces)
			->map(function(NamedTypeNode $node) {
				$fqcn = $this->namespace.'Data\\Contracts\\'.$node->name->value;
				$this->use($fqcn);
				
				return new Name($node->name->value);
			})
			->all();
	}
}
