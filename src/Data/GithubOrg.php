<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\GithubRepo, Illuminate\Support\Collection;
class GithubOrg extends Data
{
    function __construct(
        public Optional|string $id,
        public Optional|string $login,
        /** @var Collection<int, GithubRepo> */
        public Collection $repositories,
        public Optional|bool|null $isPersonal
    )
    {
    }
}
