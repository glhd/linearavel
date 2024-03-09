<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\AuthOauthClient, Glhd\Linearavel\Data\OauthToken, Illuminate\Support\Collection;
class AuthOauthClientWithTokens extends Data
{
    function __construct(
        public Optional|AuthOauthClient $client,
        /** @var Collection<int, OauthToken> */
        public Collection $tokens
    )
    {
    }
}
