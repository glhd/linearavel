<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\IssueBatchPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueBatchUpdateResponse extends LinearResponse
{
	public function resolve(): IssueBatchPayload
	{
		return IssueBatchPayload::from($this->json('data.issueBatchUpdate'));
	}
}
