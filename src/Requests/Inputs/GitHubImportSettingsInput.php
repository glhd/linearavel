<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;
use Glhd\Linearavel\Data\Enums\GithubOrgType;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/GitHubImportSettingsInput */
class GitHubImportSettingsInput
{
	public function __construct(
		public string $orgLogin,
		public string $orgAvatarUrl,
		/** @var iterable<GitHubRepoInput>|Collection<int, GitHubRepoInput> */
		public iterable $repositories,
		public GithubOrgType $orgType,
		public ?string $labels = null,
		public ?DateTimeInterface $repositoriesSyncedAt = null,
		public ?float $repositoryCount = null
	) {
	}
}
