<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\IssueRelation;
class IssueRelationPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|IssueRelation $issueRelation, public Optional|bool $success)
    {
    }
}
