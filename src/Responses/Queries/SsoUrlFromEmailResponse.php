<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\SsoUrlFromEmailResponse;
use Glhd\Linearavel\Responses\LinearResponse;

class SsoUrlFromEmailResponse extends LinearResponse
{
	public function resolve(): SsoUrlFromEmailResponse
	{
		return SsoUrlFromEmailResponse::from($this->json('data.ssoUrlFromEmail'));
	}
}
