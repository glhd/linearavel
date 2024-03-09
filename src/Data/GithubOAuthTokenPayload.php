<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\GithubOrg, Illuminate\Support\Collection;
class GithubOAuthTokenPayload extends Data
{
    function __construct(
        public Optional|string|null $token,
        /** @var Collection<int, GithubOrg> */
        public Collection $organizations
    )
    {
    }
}
