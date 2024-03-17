<?php

namespace Glhd\Linearavel\Requests\Inputs;

class GitHubRepoInput
{
	function __construct(public string $fullName, public float $id)
	{
	}
}
