<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\OAuthApplicationCodingSessionTrustedSource;
use Glhd\Linearavel\Responses\LinearResponse;

class OauthApplicationCodingSessionTrustedSourceQueryResponse extends LinearResponse
{
	public function resolve(): OAuthApplicationCodingSessionTrustedSource
	{
		return OAuthApplicationCodingSessionTrustedSource::from($this->json('data.oauthApplicationCodingSessionTrustedSource'));
	}
}
