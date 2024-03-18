<?php

namespace Glhd\Linearavel\Responses;

use Spatie\LaravelData\Data;

/**
 * @template TResponseData of Data
 * @extends LinearResponse<TResponseData>
 * @mixin TResponseData
 */
class LinearObjectResponse extends LinearResponse
{
	/** @return TResponseData */
	public function resolve()
	{
		return $this->class::from($this->json("data.{$this->name}"));
	}
}
