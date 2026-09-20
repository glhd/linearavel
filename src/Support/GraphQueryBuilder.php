<?php

namespace Glhd\Linearavel\Support;

use Illuminate\Support\Traits\Conditionable;

class GraphQueryBuilder
{
	use Conditionable;

	/**
	 * The field key that opens an inline fragment for a union or interface member.
	 *
	 * Field keys are dot-separated, so the `... on Type` syntax cannot be used
	 * directly. Use this instead: `GraphQueryBuilder::fragment('Issue').'.id'`.
	 */
	public static function fragment(string $type): string
	{
		return "on {$type}";
	}
	
	public static function make(string $type, string $name, ?array $args = null, array $argument_types = []): static
	{
		return (new static($type, $name, argument_types: $argument_types))
			->when($args, fn(self $builder) => $builder->withArguments($args));
	}

	/**
	 * @param array<string, mixed> $arguments
	 * @param array<string, string> $argument_types Argument name to GraphQL type, e.g. `['id' => 'String!']`
	 */
	public function __construct(
		protected string $type,
		protected string $name,
		protected array $fields = [],
		protected array $arguments = [],
		protected ?string $alias = null,
		protected array $argument_types = [],
	) {
	}

	public function withFields(array $fields, bool $overwrite = false): static
	{
		$this->fields = $overwrite
			? $fields
			: array_merge($this->fields, $fields);

		return $this;
	}

	public function withArguments(array $arguments, bool $overwrite = false): static
	{
		$arguments = array_filter($arguments, fn($arg) => null !== $arg);

		$this->arguments = $overwrite
			? $arguments
			: array_replace($this->arguments, $arguments);

		return $this;
	}

	/**
	 * Declare the GraphQL type of one or more arguments. Typed arguments are sent as
	 * GraphQL variables; untyped ones are inlined into the query as literals.
	 *
	 * @param array<string, string> $argument_types
	 */
	public function withArgumentTypes(array $argument_types, bool $overwrite = false): static
	{
		$this->argument_types = $overwrite
			? $argument_types
			: array_replace($this->argument_types, $argument_types);

		return $this;
	}

	/** The `variables` payload that accompanies this query. */
	public function variables(): array
	{
		$variables = [];

		foreach ($this->variableDefinitions() as $name => $type) {
			$variables[$name] = GraphValue::toVariable($this->arguments[$name]);
		}

		return $variables;
	}

	public function __toString(): string
	{
		$alias = $this->alias
			? " {$this->alias}"
			: '';
		$signature = $this->formatSignature();
		$args = $this->formatArguments();
		$fields = $this->formatFields($this->fields);

		return <<<gql
		{$this->type}{$alias}{$signature} {
			{$this->name}{$args} {
				{$fields}
			}
		}
		gql;
	}

	/** @return array<string, string> Argument name to GraphQL type, for arguments we actually have values for */
	protected function variableDefinitions(): array
	{
		return array_intersect_key($this->argument_types, $this->arguments);
	}

	protected function formatSignature(): string
	{
		$definitions = $this->variableDefinitions();

		if (! count($definitions)) {
			return '';
		}

		$parts = [];

		foreach ($definitions as $name => $type) {
			$parts[] = "\${$name}: {$type}";
		}

		return '('.implode(', ', $parts).')';
	}

	protected function formatArguments(): string
	{
		if (! count($this->arguments)) {
			return '';
		}

		$definitions = $this->variableDefinitions();
		$multiline = false;
		$parts = [];

		foreach ($this->arguments as $key => $value) {
			if (isset($definitions[$key])) {
				$parts[] = "{$key}: \${$key}";
				continue;
			}

			$literal = GraphValue::toLiteral($value);
			$multiline = $multiline || str_contains($literal, "\n");
			$parts[] = "{$key}: {$literal}";
		}

		return $multiline
			? "(\n\t\t".implode(",\n\t\t", $parts)."\n\t)"
			: '('.implode(', ', $parts).')';
	}

	protected function formatFields(array $keys, int $depth = 0): string
	{
		$indent = "\t\t".(str_repeat("\t", $depth));

		return collect($keys)
			->unless($depth, fn($keys) => $keys->flip()->undot())
			->map(function($value, $key) use ($depth, $indent) {
				// Inline fragments come through as `on TypeName`
				$line = str_starts_with((string) $key, 'on ')
					? "... {$key}"
					: $key;

				if (is_array($value)) {
					$line .= " {\n{$indent}\t".$this->formatFields($value, $depth + 1)."\n{$indent}}";
				}

				return $line;
			})
			->implode("\n{$indent}");
	}
}
