<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\EmailUserAccountAuthChallengeResponse;
use Glhd\Linearavel\Responses\LinearResponse;

class EmailUserAccountAuthChallengeMutationResponse extends LinearResponse
{
	public function resolve(): EmailUserAccountAuthChallengeResponse
	{
		return EmailUserAccountAuthChallengeResponse::from($this->json('data.emailUserAccountAuthChallenge'));
	}
}
