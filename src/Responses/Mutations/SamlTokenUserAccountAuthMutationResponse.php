<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\AuthResolverResponse;
use Glhd\Linearavel\Responses\LinearResponse;

class SamlTokenUserAccountAuthMutationResponse extends LinearResponse
{
	public function resolve(): AuthResolverResponse
	{
		return AuthResolverResponse::from($this->json('data.samlTokenUserAccountAuth'));
	}
}
