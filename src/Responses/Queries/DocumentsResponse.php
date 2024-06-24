<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\DocumentConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class DocumentsResponse extends LinearResponse
{
	public function resolve(): DocumentConnection
	{
		return DocumentConnection::from($this->json('data.documents'));
	}
}
