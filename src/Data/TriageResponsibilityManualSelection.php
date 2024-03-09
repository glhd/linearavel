<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Illuminate\Support\Collection, Spatie\LaravelData\Optional;
class TriageResponsibilityManualSelection extends Data
{
    function __construct(
        /** @var Collection<int, string> */
        public Collection $userIds,
        public Optional|int|null $assignmentIndex
    )
    {
    }
}
