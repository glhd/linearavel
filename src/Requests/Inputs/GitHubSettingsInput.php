<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

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
