<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\AccessKeyReleasePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ReleaseSyncByAccessKeyMutationResponse extends LinearResponse
{
	public function resolve(): AccessKeyReleasePayload
	{
		return AccessKeyReleasePayload::from($this->json('data.releaseSyncByAccessKey'));
	}
}
