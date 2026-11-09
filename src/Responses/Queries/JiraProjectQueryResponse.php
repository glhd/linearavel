<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\JiraProject;
use Glhd\Linearavel\Responses\LinearResponse;

class JiraProjectQueryResponse extends LinearResponse
{
	public function resolve(): JiraProject
	{
		return JiraProject::from($this->json('data.jiraProject'));
	}
}
