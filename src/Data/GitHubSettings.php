<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class GitHubSettings extends Data
{
	public function __construct(
		public Optional|string $orgAvatarUrl,
		public Optional|string $orgLogin,
		/** @var Collection<int, GitHubRepo> */
		public Optional|Collection $repositories,
		/** @var Collection<int, TeamRepoMapping> */
		public Optional|Collection $repositoriesMapping
	) {
	}
}
