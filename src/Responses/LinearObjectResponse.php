<?php

namespace Glhd\Linearavel\Responses;

use Illuminate\Support\Collection;
use Saloon\Http\Response;
use Spatie\LaravelData\Data;

/**
 * @template-covariant T of Data
 * @mixin T
 */
class LinearObjectResponse extends LinearResponse
{
	/** @return T */
	public function resolve(): Data
	{
		return $this->class::from($this->json("data.{$this->name}"));
	}
}
