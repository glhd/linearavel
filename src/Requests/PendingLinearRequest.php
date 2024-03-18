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
	/**
	 * @param string $name
	 * @param class-string<TAbstractPendingData> $class
	 * @param \Glhd\Linearavel\Connectors\LinearConnector $connector
	 * @param \Glhd\Linearavel\Support\GraphQueryBuilder $query
	 */
	public function __construct(
		protected string $name,
		protected string $class,
		protected LinearConnector $connector,
		protected GraphQueryBuilder $query,
	) {
	}
	
	public function with(string $related, string ...$fields): static
	{
		$this->query->withFields(array_map(fn($field) => "{$related}.{$field}", $fields));
		
		return $this;
	}
}
