<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Document;
use Glhd\Linearavel\Responses\LinearResponse;

class DocumentResponse extends LinearResponse
{
	public function resolve(): Document
	{
		return Document::from($this->json('data.document'));
	}
}
