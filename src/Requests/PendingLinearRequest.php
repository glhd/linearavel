<?php

namespace Glhd\Linearavel\Requests;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Spatie\LaravelData\Data;

/**
 * @template TAbstractPendingData of Data
 */
abstract class PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [];
	
	public static function make(array $args): static
	{
		return new static(app(LinearConnector::class), $args);
	}
	
	/**
	 * @param \Glhd\Linearavel\Connectors\LinearConnector $connector
	 * @param \Glhd\Linearavel\Support\GraphQueryBuilder $query
	 */
	public function __construct(
		protected LinearConnector $connector,
		protected GraphQueryBuilder $query,
	) {
	}
	
	public function with(string $related, string ...$fields): static
	{
		$this->query->withFields(array_map(fn($field) => "{$related}.{$field}", $fields));
		
		return $this;
	}
	
	protected function normalizeFields(array $fields): array
	{
		// If they just asked for all default fields, we can skip
		// iterating over everything
		if (['*'] === $fields) {
			return static::DEFAULT_ATTRIBUTES;
		}
		
		// Otherwise, we'll turn a '*' into the default fields and
		// then deduplicate everything
		return collect($fields)
			->dot()
			->map(fn($field) => '*' === $field ? static::DEFAULT_ATTRIBUTES : $field)
			->flatten()
			->unique()
			->values()
			->all();
	}
}
