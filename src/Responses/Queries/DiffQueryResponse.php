<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Diff;
use Glhd\Linearavel\Responses\LinearResponse;

class DiffQueryResponse extends LinearResponse
{
	public function resolve(): Diff
	{
		return Diff::from($this->json('data.diff'));
	}
}
