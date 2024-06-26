<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Application;
use Glhd\Linearavel\Responses\LinearResponse;

class ApplicationInfoQueryResponse extends LinearResponse
{
	public function resolve(): Application
	{
		return Application::from($this->json('data.applicationInfo'));
	}
}
