<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class JiraLinearMapping extends Data
{
    function __construct(public Optional|string $jiraProjectId, public Optional|string $linearTeamId, public Optional|bool|null $bidirectional, public Optional|bool|null $default)
    {
    }
}
