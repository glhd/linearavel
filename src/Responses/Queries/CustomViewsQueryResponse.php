<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\CustomViewConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class CustomViewsQueryResponse extends LinearResponse
{
	public function resolve(): CustomViewConnection
	{
		return CustomViewConnection::from($this->json('data.customViews'));
	}
}
