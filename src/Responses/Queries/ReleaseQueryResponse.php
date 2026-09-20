<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Release;
use Glhd\Linearavel\Responses\LinearResponse;

class ReleaseQueryResponse extends LinearResponse
{
	public function resolve(): Release
	{
		return Release::from($this->json('data.release'));
	}
}
