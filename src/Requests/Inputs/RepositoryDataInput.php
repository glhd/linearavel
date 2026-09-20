<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/RepositoryDataInput */
class RepositoryDataInput
{
	public function __construct(public string $owner, public string $name, public string $provider, public string $url)
	{
	}
}
