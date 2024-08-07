<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\CycleArchivePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class CycleArchiveMutationResponse extends LinearResponse
{
	public function resolve(): CycleArchivePayload
	{
		return CycleArchivePayload::from($this->json('data.cycleArchive'));
	}
}
