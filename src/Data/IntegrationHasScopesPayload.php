<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Illuminate\Support\Collection;
class IntegrationHasScopesPayload extends Data
{
    function __construct(
        public Optional|bool $hasAllScopes,
        /** @var Collection<int, string> */
        public Optional|Collection $missingScopes
    )
    {
    }
}
