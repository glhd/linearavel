<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/GitHubSettingsInput */
class GitHubSettingsInput
{
	public function __construct(
		public string $orgAvatarUrl,
		public string $orgLogin,
		/** @var iterable<GitHubRepoInput>|Collection<int, GitHubRepoInput> */
		public ?iterable $repositories = null,
		/** @var iterable<TeamRepoMappingInput>|Collection<int, TeamRepoMappingInput> */
		public ?iterable $repositoriesMapping = null
	) {
	}
}
