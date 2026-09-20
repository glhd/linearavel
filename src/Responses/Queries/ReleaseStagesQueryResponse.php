<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ReleaseStageConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class ReleaseStagesQueryResponse extends LinearResponse
{
	public function resolve(): ReleaseStageConnection
	{
		return ReleaseStageConnection::from($this->json('data.releaseStages'));
	}
}
