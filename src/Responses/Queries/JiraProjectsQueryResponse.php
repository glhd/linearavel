<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\JiraProjectConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class JiraProjectsQueryResponse extends LinearResponse
{
	public function resolve(): JiraProjectConnection
	{
		return JiraProjectConnection::from($this->json('data.jiraProjects'));
	}
}
