<?php

namespace Glhd\Linearavel\Responses;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;

/**
 * @template T of Data
 */
class LinearListResponse extends LinearResponse
{
	/** @return Collection<int, T> */
	public function resolve(): Collection
	{
		return $this->class::collect($this->json("data.{$this->name}"), Collection::class);
	}
}
