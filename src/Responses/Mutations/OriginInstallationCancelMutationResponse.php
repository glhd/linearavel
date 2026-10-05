<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\OriginInstallationCancelPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class OriginInstallationCancelMutationResponse extends LinearResponse
{
	public function resolve(): OriginInstallationCancelPayload
	{
		return OriginInstallationCancelPayload::from($this->json('data.originInstallationCancel'));
	}
}
