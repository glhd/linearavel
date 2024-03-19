<?php

namespace Glhd\Linearavel\Support;

class GraphQueryBuilder
{
	public static function make(string $type, string $name): static
	{
		return new static($type, $name);
	}
	
	public function __construct(
		protected string $type,
		protected string $name,
		protected array $fields = [],
		protected array $arguments = [],
		protected ?string $alias = null,
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
		$this->arguments = $overwrite
			? $arguments
			: array_replace_recursive($this->arguments, $arguments);
		
		return $this;
	}
	
	public function __toString(): string
	{
		$alias = $this->alias
			? " {$this->alias}"
			: '';
		$args = $this->formatArguments($this->arguments);
		$fields = $this->formatFields($this->fields);
		
		return <<<gql
		{$this->type}{$alias} {
			{$this->name}{$args} {
				{$fields}
			}
		}
		gql;
	}
	
	protected function formatArguments(array $arguments, int $depth = 0): string
	{
		if (! count($arguments)) {
			return '';
		}
		
		$indent = "\t\t".(str_repeat("\t", $depth));
		
		$result = collect($arguments)
			->map(function($value, $key) use ($depth, $indent) {
				$line = "{$key}: ";
				
				if (is_object($value)) {
					$value = array_filter((array) $value);
				}
				
				if (is_array($value)) {
					$line .= "{\n{$indent}\t".$this->formatArguments($value, $depth + 1)."\n{$indent}}";
				} else {
					$line .= json_encode($value);
				}
				
				return $line;
			})
			->implode(",\n{$indent}");
		
		if ($depth) {
			return $result;
		}
		
		return str_contains($result, "\n")
			? "(\n{$indent}{$result}\n\t)"
			: "({$result})";
	}
	
	protected function formatFields(array $keys, int $depth = 0): string
	{
		$indent = "\t\t".(str_repeat("\t", $depth));
		
		return collect($keys)
			->unless($depth, fn($keys) => $keys->flip()->undot())
			->map(function($value, $key) use ($depth, $indent) {
				$line = $key;
				
				if (is_array($value)) {
					$line .= " {\n{$indent}\t".$this->formatFields($value, $depth + 1)."\n{$indent}}";
				}
				
				return $line;
			})
			->implode("\n{$indent}");
	}
}
