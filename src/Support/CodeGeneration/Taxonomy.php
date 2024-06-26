<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\TypeDefinitionNode;
use GraphQL\Language\AST\TypeNode;
use GraphQL\Language\AST\TypeSystemDefinitionNode;
use Illuminate\Support\Stringable;
use UnexpectedValueException;

class Taxonomy
{
	public const NS = 'Glhd\\Linearavel\\';
	
	public Stringable $name;
	
	public static function make(mixed $source, string $kind = 'query')
	{
		return new static($source, $kind);
	}
	
	public static function ns(?string $namespace = null, bool $prefix = false): string
	{
		return str(static::NS)
			->append($namespace)
			->when($prefix, fn($ns) => $ns->finish('\\'), fn($ns) => $ns->rtrim('\\'))
			->toString();
	}
	
	public function __construct(
		mixed $source,
		public string $kind = 'query',
	) {
		$this->name = match (true) {
			$source instanceof TypeDefinitionNode => str($source->getName()->value),
			$source instanceof FieldDefinitionNode, $source instanceof TypeSystemDefinitionNode, $source instanceof TypeNode => str($source->name->value),
			is_string($source) => str($source),
			default => throw new UnexpectedValueException('Cannot infer taxonomy for '.get_debug_type($source)),
		};
	}
	
	public function data(): Stringable
	{
		return $this->name->prepend(static::ns('Data', prefix: true));
	}
	
	public function contract(): Stringable
	{
		return $this->name->prepend(static::ns('Data\\Contracts', prefix: true));
	}
	
	public function directive(): Stringable
	{
		return $this->name->prepend(static::ns('Data\\Directives', prefix: true));
	}
	
	public function enum(): Stringable
	{
		return $this->name->prepend(static::ns('Data\\Enums', prefix: true));
	}
	
	public function requestInput(): Stringable
	{
		return $this->name
			->studly()
			->finish('Input')
			->prepend(static::ns('Requests\\Inputs', prefix: true));
	}
	
	public function pendingRequest(): Stringable
	{
		return $this->name
			->studly()
			->prepend('Pending')
			->append(str($this->kind)->singular()->studly())
			->finish('Request')
			->prepend(str(static::ns('Requests\\Pending', prefix: true)));
	}
	
	public function response(): Stringable
	{
		$namespace = str(static::ns('Responses', prefix: true))
			->append(str($this->kind)->plural()->studly())
			->finish('\\');
		
		return $this->name
			->studly()
			->append(str($this->kind)->singular()->studly())
			->finish('Response')
			->prepend($namespace);
	}
}
