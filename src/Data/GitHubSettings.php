<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\GitHubRepo, Illuminate\Support\Collection, Glhd\Linearavel\Data\TeamRepoMapping;
class GitHubSettings extends Data
{
    function __construct(
        public Optional|string $orgAvatarUrl,
        public Optional|string $orgLogin,
        /** @var Collection<int, GitHubRepo> */
        public Collection $repositories,
        /** @var Collection<int, TeamRepoMapping> */
        public Collection $repositoriesMapping
    )
    {
    }
}
