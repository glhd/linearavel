<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Template;
use Glhd\Linearavel\Responses\LinearResponse;

class TemplateQueryResponse extends LinearResponse
{
	public function resolve(): Template
	{
		return Template::from($this->json('data.template'));
	}
}
