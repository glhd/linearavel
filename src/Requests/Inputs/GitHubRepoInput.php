<?php

namespace Glhd\Linearavel\Requests\Inputs;

class GitHubRepoInput
{
	public function __construct(public string $fullName, public float $id)
	{
	}
}
