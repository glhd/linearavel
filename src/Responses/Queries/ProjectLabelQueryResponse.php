<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ProjectLabel;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectLabelQueryResponse extends LinearResponse
{
	public function resolve(): ProjectLabel
	{
		return ProjectLabel::from($this->json('data.projectLabel'));
	}
}
