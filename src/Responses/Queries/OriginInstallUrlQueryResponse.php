<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\OriginInstallUrlPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class OriginInstallUrlQueryResponse extends LinearResponse
{
	public function resolve(): OriginInstallUrlPayload
	{
		return OriginInstallUrlPayload::from($this->json('data.originInstallUrl'));
	}
}
