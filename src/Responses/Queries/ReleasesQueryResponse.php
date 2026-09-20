<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ReleaseConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class ReleasesQueryResponse extends LinearResponse
{
	public function resolve(): ReleaseConnection
	{
		return ReleaseConnection::from($this->json('data.releases'));
	}
}
