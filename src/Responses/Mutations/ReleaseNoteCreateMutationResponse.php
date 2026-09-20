<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ReleaseNotePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ReleaseNoteCreateMutationResponse extends LinearResponse
{
	public function resolve(): ReleaseNotePayload
	{
		return ReleaseNotePayload::from($this->json('data.releaseNoteCreate'));
	}
}
