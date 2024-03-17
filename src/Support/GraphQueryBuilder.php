<?php

namespace Glhd\Linearavel\Support;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\DataConfig;
use Spatie\LaravelData\Support\DataProperty;

class GraphQueryBuilder
{
	public function __construct(
		protected string $type,
		protected string $name,
		protected array $fields = [],
		protected array $arguments = [],
		protected ?string $alias = null,
	) {
	}
	
	public function __toString(): string
	{
		$alias = $this->alias ? " {$this->alias}" : '';
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
	
	protected function formatArguments(array $arguments): string
	{
		return '';
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
