<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Illuminate\Support\Collection, Glhd\Linearavel\Data\AuthMembership;
class AuthOauthClientWithMemberships extends Data
{
    function __construct(
        public Optional|string $name,
        public Optional|string|null $imageUrl,
        /** @var Collection<int, string> */
        public Collection $scope,
        public Optional|string $appId,
        public Optional|string $clientId,
        public Optional|string|null $webhookUrl,
        public Optional|float $totalMembers,
        /** @var Collection<int, AuthMembership> */
        public Collection $memberships
    )
    {
    }
}
