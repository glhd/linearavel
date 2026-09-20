<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\GithubOrgType;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/GitHubSettingsInput */
class GitHubSettingsInput
{
	public function __construct(
		public string $orgLogin,
		public ?string $orgAvatarUrl = null,
		public ?string $externalOrgId = null,
		/** @var iterable<GitHubRepoInput>|Collection<int, GitHubRepoInput> */
		public ?iterable $repositories = null,
		/** @var iterable<GitHubRepoMappingInput>|Collection<int, GitHubRepoMappingInput> */
		public ?iterable $repositoriesMapping = null,
		public ?GithubOrgType $orgType = null,
		public ?bool $codeAccess = null,
		public ?string $enterpriseUrl = null
	) {
	}
}
