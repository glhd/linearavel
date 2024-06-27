<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/GitHubSettings */
class GitHubSettings extends Data
{
	public function __construct(
		public Optional|string $orgAvatarUrl,
		public Optional|string $orgLogin,
		/** @var Collection<int, GitHubRepo> */
		public Optional|Collection|null $repositories,
		/** @var Collection<int, TeamRepoMapping> */
		public Optional|Collection|null $repositoriesMapping
	) {
	}
}
