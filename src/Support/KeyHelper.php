<?php

namespace Glhd\Linearavel\Support;

use Glhd\Linearavel\Data\Queries\Team;
use Glhd\Linearavel\Data\Queries\User;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\DataConfig;

class KeyHelper
{
	public function __construct(
		protected DataConfig $data_config,
	) {
	}
	
	/** @var class-string<Data> $fqcn */
	public function get(string $fqcn, ?array $only = null, ?array $except = null): Collection
	{
		return $this->data_config
			->getDataClass($fqcn)
			->properties
			->keys()
			->when($only, fn(Collection $keys) => $keys->only($only))
			->when($except, fn(Collection $keys) => $keys->except($except));
	}
}
