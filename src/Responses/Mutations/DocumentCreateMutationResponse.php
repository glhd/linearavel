<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\DocumentPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class DocumentCreateMutationResponse extends LinearResponse
{
	public function resolve(): DocumentPayload
	{
		return DocumentPayload::from($this->json('data.documentCreate'));
	}
}
