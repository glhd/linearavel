<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CandidateRepository */
class CandidateRepositoryInput
{
	public function __construct(public string $repositoryFullName, public string $hostname)
	{
	}
}
