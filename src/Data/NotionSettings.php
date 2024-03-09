<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class NotionSettings extends Data
{
    function __construct(public Optional|string $workspaceId, public Optional|string $workspaceName)
    {
    }
}
