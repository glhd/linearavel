<?php

namespace Glhd\Linearavel\Support;

use Glhd\Linearavel\Data\Queries\Team;
use Glhd\Linearavel\Data\Queries\User;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\DataConfig;
use Spatie\LaravelData\Support\DataProperty;

class KeyHelper
{
	public function __construct(
		protected DataConfig $data_config,
	) {
	}
	
	/** @var class-string<Data> $fqcn */
	public function get(string $fqcn, ?array $only = null, ?array $except = null, bool $nested = false): Collection
	{
		return $this->data_config
			->getDataClass($fqcn)
			->properties
			->mapWithKeys(function(DataProperty $property) use ($nested) {
				return [
					$property->name => $property->type->dataClass
						? ($nested
							? collect()
							: $this->get($property->type->dataClass, nested: true))
						: null,
				];
			})
			->when($only, fn(Collection $keys) => $keys->only($only))
			->when($except, fn(Collection $keys) => $keys->except($except));
	}
}
