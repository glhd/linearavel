<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Illuminate\Support\Collection;
class AuthorizedApplicationBase extends Data
{
    function __construct(
        public Optional|string $name,
        public Optional|string|null $imageUrl,
        /** @var Collection<int, string> */
        public Collection $scope,
        public Optional|string $appId,
        public Optional|string $clientId
    )
    {
    }
}
