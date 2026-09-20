<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\PasskeyLoginStartResponse;
use Glhd\Linearavel\Responses\LinearResponse;

class PasskeyLoginStartMutationResponse extends LinearResponse
{
	public function resolve(): PasskeyLoginStartResponse
	{
		return PasskeyLoginStartResponse::from($this->json('data.passkeyLoginStart'));
	}
}
