<?php

namespace Glhd\Linearavel\Responses;

use Spatie\LaravelData\Data;

/**
 * @template TDataImpl of Data
 * @extends LinearResponse<TDataImpl>
 * @mixin TDataImpl
 */
class LinearObjectResponse extends LinearResponse
{
	/** @return TDataImpl */
	public function resolve()
	{
		return $this->class::from($this->json("data.{$this->name}"));
	}
}
