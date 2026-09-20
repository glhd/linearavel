<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ReleaseNote;
use Glhd\Linearavel\Responses\LinearResponse;

class ReleaseNoteQueryResponse extends LinearResponse
{
	public function resolve(): ReleaseNote
	{
		return ReleaseNote::from($this->json('data.releaseNote'));
	}
}
