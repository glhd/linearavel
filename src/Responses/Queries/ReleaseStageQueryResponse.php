<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ReleaseStage;
use Glhd\Linearavel\Responses\LinearResponse;

class ReleaseStageQueryResponse extends LinearResponse
{
	public function resolve(): ReleaseStage
	{
		return ReleaseStage::from($this->json('data.releaseStage'));
	}
}
