<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\TemplatePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class TemplateUpdateResponse extends LinearResponse
{
	public function resolve(): TemplatePayload
	{
		return TemplatePayload::from($this->json('data.templateUpdate'));
	}
}
