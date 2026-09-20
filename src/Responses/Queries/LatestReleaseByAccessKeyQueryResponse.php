<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\AccessKeyRelease;
use Glhd\Linearavel\Responses\LinearResponse;

class LatestReleaseByAccessKeyQueryResponse extends LinearResponse
{
	public function resolve(): ?AccessKeyRelease
	{
		$data = $this->json('data.latestReleaseByAccessKey');
		
		return null === $data ? null : AccessKeyRelease::from($data);
	}
}
