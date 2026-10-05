<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\OriginInstallationDetails;
use Glhd\Linearavel\Responses\LinearResponse;

class OriginInstallationQueryResponse extends LinearResponse
{
	public function resolve(): OriginInstallationDetails
	{
		return OriginInstallationDetails::from($this->json('data.originInstallation'));
	}
}
