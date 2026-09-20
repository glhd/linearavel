<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\OAuthApplicationArchivePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class OauthApplicationArchiveMutationResponse extends LinearResponse
{
	public function resolve(): OAuthApplicationArchivePayload
	{
		return OAuthApplicationArchivePayload::from($this->json('data.oauthApplicationArchive'));
	}
}
