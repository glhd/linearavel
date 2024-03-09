<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Issue, Illuminate\Support\Collection;
class IssueBatchPayload extends Data
{
    function __construct(
        public Optional|float $lastSyncId,
        /** @var Collection<int, Issue> */
        public Collection $issues,
        public Optional|bool $success
    )
    {
    }
}
