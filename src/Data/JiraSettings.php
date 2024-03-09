<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\JiraLinearMapping, Illuminate\Support\Collection, Glhd\Linearavel\Data\JiraProjectData, Spatie\LaravelData\Optional;
class JiraSettings extends Data
{
    function __construct(
        /** @var Collection<int, JiraLinearMapping> */
        public Collection $projectMapping,
        /** @var Collection<int, JiraProjectData> */
        public Collection $projects,
        public Optional|bool|null $isJiraServer
    )
    {
    }
}
