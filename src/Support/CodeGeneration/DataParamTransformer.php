<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\ListTypeNode;
use GraphQL\Language\AST\NamedTypeNode;
use GraphQL\Language\AST\TypeNode;
use Illuminate\Support\Collection;
use PhpParser\Comment\Doc;
use PhpParser\Node\Arg;
use PhpParser\Node\Attribute;
use PhpParser\Node\AttributeGroup;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Param;
use PhpParser\Node\UnionType;
use PhpParser\NodeAbstract;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
use Spatie\LaravelData\Optional;

class DataParamTransformer extends ConstructorParamTransformer
{
	protected Param $param;
	
	public function __construct(
		protected FieldDefinitionNode $node,
		protected ClassTransformer $parent,
	) {
	}
	
	public function __invoke(): Param
	{
		$this->param = new Param(
			var: new Variable($this->node->name->value),
			flags: 1,
		);
		
		$this->param->type = $this->nodeType($this->node->type);
		
		return $this->param;
	}
	
	protected function listType(ListTypeNode $node, bool $nullable): NodeAbstract
	{
		$type = $this->typeToName($node->type);
		$this->param->setDocComment(new Doc("/** @var Collection<int, {$type}> */"));
		$this->parent->use(Collection::class);
		
		// Lists of data objects are hydrated by laravel-data on their own, but lists of
		// scalars and enums need an explicit cast to become a Collection
		if (! $this->isDataItem($node->type)) {
			$this->param->attrGroups ??= [];
			$this->param->attrGroups[] = new AttributeGroup([
				new Attribute($this->fqcn(WithCast::class), [
					new Arg(new ClassConstFetch($this->fqcn(EnumerableCast::class), new Identifier('class'))),
				]),
			]);
		}
		
		return new UnionType(array_filter([
			new Name('Optional'),
			new Name('Collection'),
			$nullable
				? new Identifier('null')
				: null,
		]));
	}
	
	/** Will laravel-data hydrate the items of this list into data objects by itself? */
	protected function isDataItem(TypeNode $node): bool
	{
		$name = $this->underlyingTypeNode($node)->name->value;
		
		if (in_array($name, ['Boolean', 'Float', 'Int', 'String', 'ID', 'DateTime'], true)) {
			return false;
		}
		
		$transformer = $this->transformer();
		
		if ($transformer->scalars->has($name)) {
			return false;
		}
		
		$fqcn = $transformer->registry->get($name);
		
		return $fqcn
			&& str_starts_with($fqcn, Taxonomy::ns('Data', prefix: true))
			&& ! str_starts_with($fqcn, Taxonomy::ns('Data\\Enums', prefix: true))
			&& ! str_starts_with($fqcn, Taxonomy::ns('Data\\Contracts', prefix: true));
	}
	
	protected function namedType(NamedTypeNode $node, bool $nullable = false): NodeAbstract
	{
		if ('DateTime' === $node->name->value) {
			$this->param->attrGroups ??= [];
			$this->param->attrGroups[] = new AttributeGroup([new Attribute($this->fqcn(LinearDate::class))]);
		}
		
		$this->parent->use(Optional::class);
		
		$types = [
			new Name('Optional'),
			$this->typeToName($node),
		];
		
		if ($nullable) {
			$types[] = new Identifier('null');
		}
		
		return new UnionType($types);
	}
	
	protected function dateTimeType(): Name
	{
		return $this->fqcn(CarbonImmutable::class);
	}
}
