<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\IssueImport;
class IssueImportPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|IssueImport|null $issueImport, public Optional|bool $success)
    {
    }
}
