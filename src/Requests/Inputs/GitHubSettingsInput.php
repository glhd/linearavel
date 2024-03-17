<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class GitHubSettingsInput
{
	public function __construct(
		public string $orgAvatarUrl,
		public string $orgLogin,
		/** @var Collection<int, GitHubRepoInput> */
		public Collection $repositories,
		/** @var Collection<int, TeamRepoMappingInput> */
		public Collection $repositoriesMapping
	) {
	}
}
