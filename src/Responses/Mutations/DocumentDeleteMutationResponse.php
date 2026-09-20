<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\DocumentArchivePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class DocumentDeleteMutationResponse extends LinearResponse
{
	public function resolve(): DocumentArchivePayload
	{
		return DocumentArchivePayload::from($this->json('data.documentDelete'));
	}
}
