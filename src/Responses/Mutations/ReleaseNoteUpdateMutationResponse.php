<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ReleaseNotePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ReleaseNoteUpdateMutationResponse extends LinearResponse
{
	public function resolve(): ReleaseNotePayload
	{
		return ReleaseNotePayload::from($this->json('data.releaseNoteUpdate'));
	}
}
