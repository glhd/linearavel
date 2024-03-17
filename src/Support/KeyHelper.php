<?php

namespace Glhd\Linearavel\Support;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\DataConfig;
use Spatie\LaravelData\Support\DataProperty;

class KeyHelper
{
	protected array $seen = [];
	
	public function __construct(
		protected DataConfig $data_config,
	) {
	}
	
	/** @var class-string<Data> $fqcn */
	public function get(string $fqcn, int $depth = 0, int $max = 2): Collection|array
	{
		return $this->data_config
			->getDataClass($fqcn)
			->properties
			->mapWithKeys(function(DataProperty $property) use ($depth, $max) {
				if ($property->type->dataClass && $depth < $max) {
					return [$property->name => $this->get($property->type->dataClass, depth: $depth + 1, max: $max)];
				}
				
				return [$property->name => null];
			})
			->dot()
			->when(
				$depth,
				fn($collection) => $collection->toArray(),
				fn($collection) => $collection->keys(),
			);
	}
}
