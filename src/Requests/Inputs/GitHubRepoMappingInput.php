<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/GitHubRepoMappingInput */
class GitHubRepoMappingInput
{
	public function __construct(
		public string $id,
		public string $linearTeamId,
		public float $gitHubRepoId,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $gitHubLabels = null,
		public ?bool $bidirectional = null,
		public ?bool $default = null
	) {
	}
}
