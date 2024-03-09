<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\IssueLabel;
class IssueLabelPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|IssueLabel $issueLabel, public Optional|bool $success)
    {
    }
}
