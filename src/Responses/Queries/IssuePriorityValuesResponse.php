<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\IssuePriorityValue;
use Glhd\Linearavel\Responses\LinearResponse;
use Illuminate\Support\Collection;

class IssuePriorityValuesResponse extends LinearResponse
{
	/** @returns Collection<int, IssuePriorityValue> */
	public function resolve(): Collection
	{
		return IssuePriorityValue::collect($this->json('data.issuePriorityValues'), Collection::class);
	}
}
