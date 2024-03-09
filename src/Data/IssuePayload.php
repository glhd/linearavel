<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Issue;
class IssuePayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|Issue|null $issue, public Optional|bool $success)
    {
    }
}
