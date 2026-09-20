<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ReleaseNoteConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class ReleaseNotesQueryResponse extends LinearResponse
{
	public function resolve(): ReleaseNoteConnection
	{
		return ReleaseNoteConnection::from($this->json('data.releaseNotes'));
	}
}
