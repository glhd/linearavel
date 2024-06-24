<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\TemplatePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class TemplateCreateResponse extends LinearResponse
{
	public function resolve(): TemplatePayload
	{
		return TemplatePayload::from($this->json('data.templateCreate'));
	}
}
