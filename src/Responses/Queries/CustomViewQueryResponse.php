<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\CustomView;
use Glhd\Linearavel\Responses\LinearResponse;

class CustomViewQueryResponse extends LinearResponse
{
	public function resolve(): CustomView
	{
		return CustomView::from($this->json('data.customView'));
	}
}
